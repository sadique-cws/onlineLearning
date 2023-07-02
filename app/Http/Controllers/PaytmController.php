<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaytmController extends Controller
{
    
    // display a form for payment
    

    public function pay(Request $request, $slug)
    {
        $course = Course::where('slug',$slug)->firstOrFail();

        $userData = [ 
            'name' => Auth::user()->name, // Name of user
            'mobile' => Auth::user()->mobile, //Mobile number of user
            'email' => Auth::user()->email, //Email of user
            'fee' => $course->discount_fees,
            'order_id' => $request->mobile."_".rand(1,1000), //Order id
            'course_id' => $course->id,
            'user_id' => Auth::id(),
        ];

        $paytmuser = Payment::create($userData); // creates a new database record

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['order_id'], 
            'user' => $paytmuser->id,
            'mobile_number' => $userData['mobile'],
            'email' => $userData['email'], // your user email address
            'amount' => $course->discount_fees, // amount will be paid in INR.
            'callback_url' => route('status') // callback URL
        ]);
        return $payment->receive();  // initiate a new payment
    }

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();
        
        $order_id = $transaction->getOrderId(); // return a order id
      
        $transaction->getTransactionId(); // return a transaction id
    
        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            Payment::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('homepage'))->with('message', "Your payment is successfull.");

        } else if ($transaction->isFailed()) {
            Payment::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('homepage'))->with('message', "Your payment is failed.");
            
        } else if ($transaction->isOpen()) {
            Payment::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('homepage'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        
        // $transaction->getOrderId(); // Get order id
    }
}