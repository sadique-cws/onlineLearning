<nav class="bg-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-end py-2">
      
        <!-- Desktop Menu -->
        <div class="hidden sm:block">
          <div class="ml-4 flex items-center space-x-4">
            <a href="{{route('login')}}" class="hover:bg-green-600 bg-green-500 px-2 rounded-md text-white py-1">Student Login</a>
            <a href="{{route('register')}}" class="hover:bg-red-600 bg-red-500 px-2 rounded-md text-white py-1">Apply for Admission</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <nav class="bg-blue-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <!-- Logo -->
          <a href="/" class="text-white font-bold text-xl">{{ env('APP_NAME')}}</a>
        </div>
  
        <!-- Mobile Menu Button -->
        <div class="flex sm:hidden">
          <button type="button" class="text-white hover:text-gray-300 focus:outline-none focus:text-gray-300" aria-expanded="false">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
  
        <!-- Desktop Menu -->
        <div class="hidden sm:block">
          <div class="ml-4 flex items-center space-x-4">
            <a href="#" class="text-white hover:text-gray-300">Home</a>
            <a href="#" class="text-white hover:text-gray-300">Courses</a>
            <a href="#" class="text-white hover:text-gray-300">About</a>
            <a href="#" class="text-white hover:text-gray-300">Contact</a>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Mobile Menu (Hidden by default) -->
    <div class="sm:hidden hidden">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="#" class="text-white block hover:text-gray-300">Home</a>
        <a href="#" class="text-white block hover:text-gray-300">Courses</a>
        <a href="#" class="text-white block hover:text-gray-300">About</a>
        <a href="#" class="text-white block hover:text-gray-300">Contact</a>
      </div>
    </div>
  </nav>
  