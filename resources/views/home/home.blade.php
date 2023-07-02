@extends('layouts.base')

@section('content')
    <div class="px-10">

        <section class="bg-gray-900 text-white py-48 px-24">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold mb-6">Learn New Skills with Our Courses</h1>
                <p class="text-lg mb-8">Upgrade your knowledge and advance your career with our comprehensive online courses.
                </p>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-full">Browse
                    Courses</a>
            </div>
        </section>

        <!-- Courses Section -->
        <section class="py-16 px-12">
            <div class="container mx-auto">
                <h2 class="text-2xl font-bold mb-8">Popular Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    <!-- Course Card -->
                   @foreach ($courses as $item)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="course-image.jpg" alt="Course Image" class="w-full">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">{{ $item->title }}</h3>
                            <p class="text-gray-600">{{ $item->description }}</p>
                            <div class="mt-4">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full">{{$item->fees}}</span>
                                <span class="bg-gray-300 text-gray-700 px-2 py-1 rounded-full ml-2">{{ $item->duration }} Weeks</span>
                            </div>
                        </div>
                    </div>
                   @endforeach

                    <!-- Repeat the Course Card HTML for more courses -->

                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto">
            <p class="text-center">© 2023 My Education Site. All rights reserved.</p>
        </div>
    </footer>
@endsection
