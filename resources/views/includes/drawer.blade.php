<div id="drawer-disable-body-scrolling" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-disable-body-scrolling-label">
    <ul
    class="space-y-2 font-medium mb-5 md:hidden">
    <li>
        <a href="{{ route('homepage') }}"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            aria-current="page">Home</a>
    </li>
    <li>
        <a href="{{ route('about') }}"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">About</a>
    </li>
    <li>
        <a href="{{ route('courses') }}"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Courses</a>
    </li>
    <li>
        <a href="{{ route('placements') }}"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Achievements</a>
    </li>
    <li>
        <a href="{{ route('contact') }}"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Contact</a>
    </li>
</ul>
    <h5 id="drawer-disable-body-scrolling-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Categories</h5>
    <button type="button" data-drawer-hide="drawer-disable-body-scrolling" aria-controls="drawer-disable-body-scrolling" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
  <div class="py-4 overflow-y-auto">
      <ul class="space-y-2 font-medium">
        @foreach ($category as $item)
        <li>
            <a href="{{route('courses',$item->cat_slug)}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="ml-3">{{$item->cat_title}}</span>
            </a>
         </li>
        @endforeach

      </ul>
   </div>
</div>