@extends('layouts.base')

@section('content')
    <section class="bg-teal-600 text-white sm:py-7 sm:px-24 border mt-16">
        <div class="container mx-auto flex flex-col gap-2">

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('homepage') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-100 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center ">
                            <svg class="w-3 h-3 text-gray-100 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('courses') }}"
                                class="ml-1 text-sm font-medium text-gray-100 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Courses</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-100 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('courses',$course->category->cat_slug) }}"
                                class="ml-1 capitalize text-sm font-medium text-gray-100 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{$course->category->cat_title}}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-100 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-white md:ml-2 dark:text-gray-400">{{$course->title}}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-4xl font-bold">{{ $course->title }}</h1>
            <h6 class="text-slate-200 mt-3">Special Discounted Price</h6>
            <div class="flex items-center justify-between">
                <span class="font-bold  dark:text-white flex gap-3 items-end">
                    <span class="text-slate-100 text-4xl">₹{{ $course->discount_fees }}</span>
                    <span class="text-slate-100 text-lg font-thin line-through">₹{{ $course->fees }}</span>
                    <span class="text-green-800 bg-white p-2 rounded-full text-md">({{ $course->getDiscountPercentage() }}%
                        OFF)</span>
                </span>

            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 mt-5">
        <div class="flex flex-col md:flex-row p-5 gap-5">

            <div class="md:flex-[2] md:ml-4 mt-4 md:mt-0">
                <p class="text-gray-700 mb-4 leading-loose text-xl">{{$course->description}}</p>

                <h2 class="md:text-2xl text-sm text-slate-700 font-black my-5">This Batch Includes</h2>

                <div class=" rounded-lg border p-5  dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                    <dl class="grid max-w-screen-xl grid-cols-2 gap-4  mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-4 dark:text-white sm:p-8">
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold">{{$course->duration}}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Weeks</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold">10</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Public repositories</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold">10+</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Projects</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold">20+</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Assignments</dd>
                        </div>

                    </dl>
                </div>

                <h2 class="text-2xl text-slate-700 font-black my-5">Most Frequently Questions</h2>

                <div id="accordion-open" data-accordion="open">
                    <h2 id="accordion-open-heading-1">
                      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                        <span class="flex items-center"><svg class="w-5 h-5 mr-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> Who should join this batch?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                      </button>
                    </h2>
                    <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Classes will be on app or YouTube?</p>
                        <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                      </div>
                    </div>
                    <h2 id="accordion-open-heading-2">
                      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                        <span class="flex items-center"><svg class="w-5 h-5 mr-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>Mentioned price is Yearly fee or Monthly fee? </span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                      </button>
                    </h2>
                    <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, sed quae! Iure quae ex officia molestias neque voluptatem tempore nostrum aut assumenda explicabo est quam, rerum id dolor, voluptatibus enim.</p>
                        <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                      </div>
                    </div>
                    <h2 id="accordion-open-heading-3">
                      <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-3">
                        <span class="flex items-center"><svg class="w-5 h-5 mr-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> Classes will be live or recorded?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                      </button>
                    </h2>
                    <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                      <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laudantium temporibus voluptate cum possimus laboriosam veritatis accusantium sapiente ea dolor blanditiis vero vitae, aspernatur in ipsam excepturi dolore reiciendis maxime.</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                        <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                          <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                          <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

            </div>
            <div class="md:flex-1 md:relative">
                <div class="md:fixed">
                <div
                    class="w-full md:-mt-52 sm:-mt-48 md:right-24 md:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class=" rounded-t-lg" src="{{ asset('storage/' . $course->image) }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$course->title}}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-gray-900 dark:text-white">
                                <span  class="text-3xl">₹{{ $course->discount_fees }}</span>
                            </span>
                            <form action="{{ route('make.payment', $course->slug) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Enroll Now</button>
                            </form>
                        </div>
                    </div>
                </div>

    <div class="flex items-center space-x-4 w-full mt-2 bg-white p-3 border rounded-lg shadow">
        <img class="w-10 h-10 rounded-full" src="{{asset('img/instructor.jpg')}}" alt="">
        <div class="font-medium dark:text-white">
            <div>Syed Sadique Hussain</div>
            <div class="text-xs text-gray-500 dark:text-gray-400">8+ Years Experience in Software Engg</div>
        </div>
    </div>

            </div>
            </div>
        </div>


    </div>
@endsection
