@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row">
      <div class="md:w-1/2">
        <img src="{{asset('storage/'.$course->image)}}" alt="Course Image" class="w-full h-auto">
      </div>
      <div class="md:w-1/2 md:ml-4 mt-4 md:mt-0">
        <h1 class="text-3xl font-bold mb-4">{{$course->title}}</h1>
        <p class="text-gray-700 mb-4">Course Description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt eleifend odio, at accumsan magna commodo ut.</p>
        <ul class="list-disc ml-6">
          <li>Duration: {{$course->duration}}</li>
          <li>Feature 2</li>
          <li>Feature 3</li>
        </ul>
        <div class="flex items-center mb-4">
            <span class="text-lg font-semibold text-gray-800 mr-2">{{$course->discount_fees}}</span>
            <span class="text-gray-600">Per Month</span>
          </div>
        <div class="mt-8">
          <form action="{{route('make.payment',$course->slug)}}" method="post">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Enroll Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection