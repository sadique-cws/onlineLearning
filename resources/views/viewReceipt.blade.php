<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hello, ' . auth()->user()->name) }}
        </h2>
    </x-slot>

    <div class="flex w-full md:px-24 px-5 py-10 gap-10 md:flex-row flex-col">
        <div class="md:w-3/12">
            @include('profile.partials.dashboardSide')
        </div>
        <div class="md:w-9/12">
            <div class="flex md:flex-row flex-col  justify-between items-center bg-white dark:bg-gray-800 p-5">
                <h2 class="text-xl font-bold font-sans text-slate-400">My Static</h2>

            </div>
            <div class="px-2 bg-white rounded-lg md:px-4 dark:bg-gray-800" id="stats" role="tabpanel"
                aria-labelledby="stats-tab">

                <dl
                    class="grid max-w-screen-xl grid-cols-2 gap-8 px-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ count($course) }}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total Courses</dd>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ count($projects) }}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total Projects</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">1B+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Payments</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">90+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">WorkShops</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">4M+</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Intership</dd>
                    </div>
                </dl>
            </div>

            @if (count($course))
                <div class="flex mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                        <div
                            class="flex md:flex-row flex-col space-y-2 justify-between items-center py-4 bg-white dark:bg-gray-800 p-5">
                            <h2 class="text-xl font-bold font-sans text-slate-400">My Courses</h2>
                        </div>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>

                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Join Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $item->course->image) }}" alt="Jese image">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">{{ $item->course->title }}</div>
                                                <div class="font-normal text-gray-500">{{ $item->course->duration }}
                                                    Weeks
                                                </div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->course->category->cat_title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ date('d M Y', strtotime($item->course->start_date)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <!-- Modal toggle -->
                                            <a href="#" type="button" data-modal-target="editUserModal"
                                                data-modal-show="editUserModal"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Print
                                                Reciept</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            @else
                <div class="flex mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                        <div class="bg-white dark:bg-gray-800 p-8 flex flex-col gap-4">
                            <h2 class="md:text-6xl text-3xl font-bold font-sans text-slate-300">Start learning</h2>
                            <a href="{{ route('courses') }}" class="bg-sky-200 px-3 py-2 rounded-lg w-fit hover:bg-sky-400">Browse
                                Courses</a>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
</x-app-layout>
