<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hello, ' . auth()->user()->name) }}
        </h2>
    </x-slot>

    <div class="flex w-full md:px-24 px-5 py-10 gap-10 md:flex-row flex-col">
        <div class="md:w-2/12">
            <div
                class="w-full bg-white border  border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-2">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown"
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10 text-center">

                    <form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data"
                        >
                        @csrf
                            <input type="file" id="upload" class="hidden" name="picture"
                                onchange="previewImage(event)">
                            <label for="upload"><img class="w-24 h-24 mb-3 rounded-full shadow-lg" id="image-preview"
                                    src="{{ auth()->user()->picture ? asset(auth()->user()->picture) : 'https://picsum.photos/300' }}"
                                    alt="Bonnie image" /></label>


                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">CWSian</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload
                        DP</button>
                            <a href="{{ route('profile.edit') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Edit
                                Profile</a>
                        </div>

                </form>

                </div>
            </div>

        </div>
        <div class="md:w-10/12">
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
                        <dt class="mb-2 text-3xl font-extrabold">1000s</dt>
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

            <div class="flex mt-5">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                    <div
                        class="flex md:flex-row flex-col space-y-2 justify-between items-center py-4 bg-white dark:bg-gray-800 p-5">
                        <h2 class="text-xl font-bold font-sans text-slate-400">My Courses</h2>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search-users"
                                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for users">
                        </div>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                            <div class="font-normal text-gray-500">{{ $item->course->duration }} Weeks
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
        </div>
    </div>
</x-app-layout>

<script>
    function previewImage(event) {
        var imageInput = event.target;
        var imagePreview = document.getElementById('image-preview');

        if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(imageInput.files[0]);
        }
    }
</script>
