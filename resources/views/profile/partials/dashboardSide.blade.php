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
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 w-full dark:text-gray-200 dark:hover:text-white">logout
                    </button>
                    </form>
            </li>
        </ul>
    </div>
</div>
<div class="flex flex-col items-center pb-10 text-center">

    <form action="{{ route('profile.picture.update') }}" method="POST"
        class="flex flex-1 justify-center flex-col items-center" enctype="multipart/form-data">
        @csrf
        <input type="file" id="upload" class="hidden" name="picture"
            onchange="previewImage(event)">
        <label for="upload"><img class="w-24 h-24 mb-3 rounded-full shadow-lg" id="image-preview"
                src="{{ auth()->user()->picture ? asset(auth()->user()->picture) : 'img/default.jpg' }}"
                alt="Bonnie image" /></label>


        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}
        </h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">CWSian</span>
        <div class="flex mt-4 space-x-3 md:mt-6">
            <button type="submit" id="upbtn"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload
                DP</button>
            <a href="{{ route('profile.edit') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Edit
                Profile</a>
        </div>

    </form>

</div>
</div>
<ul
class="w-full mt-4 shadow-md text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

<a href="{{ route('project.index') }}"
    class="block w-full px-4 py-3 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
    Projects
</a>
</ul>