@extends('layouts.base')

@section('content')

<section class="bg-teal-700 text-white md:py-7 md:px-24 border mt-20">
    <div class="container mx-auto flex flex-col gap-2">
        <h1 class="text-4xl font-bold">Our Students</h1>
        
        
    </div>
</section>
<section class="text-gray-600 body-font">
    <div class="container px-16 py-5 mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 -m-2 gap-3">
        
        @foreach ($newplacements as $item)
            
        <div class="w-full">
            <div class="h-full flex border shadow rounded-sm sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
              <img alt="team" class="flex-shrink-0 w-32 h-32 object-center object-cover sm:mb-0 mb-4" src="{{ $item->user->picture ? asset($item->user->picture) : 'img/default.jpg' }}">
              <div class="flex-grow sm:pl-8 p-4">
                <h2 class="title-font font-medium text-lg text-gray-900">{{ $item->user->name }}</h2>
                <h3 class="text-gray-500 mb-1">{{ $item->role }}</h3>
                <p class="mb-2 font-semibold text-sm">Company: <span class="text-blue-800">{{ $item->company_name }}</span></p>
                <p class="mb-4 text-xs">{{ $item->description }}</p>
              </div>
            </div>
          </div>

        @endforeach
        
        @foreach ($placements as $item)
            
        <div class="w-full">
            <div class="h-full flex border shadow rounded-sm sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
              <img alt="team" class="flex-shrink-0 w-32 h-32 object-center object-cover sm:mb-0 mb-4" src="{{ asset('img/placement/'.$item->image) }}">
              <div class="flex-grow sm:pl-8 p-4">
                <h2 class="title-font font-medium text-lg text-gray-900">{{ $item->name }}</h2>
                <h3 class="text-gray-500 mb-1">{{ $item->role }}</h3>
                <p class="mb-2 font-semibold text-sm">Company: <span class="text-blue-800">{{ $item->company_name }}</span></p>
                <p class="mb-4 text-xs">{{ $item->description }}</p>
              </div>
            </div>
          </div>

        @endforeach
    
      </div>
    </div>
  </section>
@endsection
