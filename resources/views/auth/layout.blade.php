@extends('layouts.base')

@section('content')
    
<div class="flex">
    <div class="flex w-full mt-5 h-[96vh] items-center">
        <div class="w-6/12 mx-auto ">
            @section('authcontent')
                
            @show
        </div>
    </div>
</div>

@endsection