@extends('layouts.base')

@section('content')

<div class="flex">
    <div class="flex w-full mt-5 h-[96vh] items-center">
        <div class="md:w-3/12 w-full px-5 mx-auto ">
            @section('authcontent')
                @show
        </div>
    </div>
</div>

@endsection
