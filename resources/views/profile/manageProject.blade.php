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
            @if (count($projects))
                <div class="flex mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                        <div
                            class="flex md:flex-row flex-col space-y-2 justify-between items-center py-4 bg-white dark:bg-gray-800 p-5">
                            <h2 class="text-xl font-bold font-sans text-slate-400">My Projects</h2>
                        </div>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>

                                    <th scope="col" class="px-6 py-3">
                                        Project Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Source
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{ $item->project_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->project_description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ $item->project_url }}"  target="_blank" rel="nofollow" class="text-blue-700">Click Here</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ date('d M Y', strtotime($item->created_at)) }}
                                        </td>
                                       
                                        <td class="px-6 py-4">
                                            <form action="{{ route('project.destroy',$item) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="font-medium bg-red-600 px-3 py-2 rounded text-white dark:text-blue-500 hover:underline">Delete</button>

                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            @else
                <div class="flex">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                        <div class="bg-white dark:bg-gray-800 p-8 flex flex-col gap-4">
                            <h2 class="md:text-6xl text-3xl font-bold font-sans text-slate-300">Not found</h2>
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"  class="bg-teal-500 text-white px-3 py-2 rounded-lg w-fit hover:bg-teal-700">Add Project</button>
                        </div>
                    </div>
                </div>
            @endif

  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Project</h3>
                  <form class="space-y-6" action="{{ route('project.store') }}" method="post">
                    @csrf
                      <div>
                          <label for="project_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Name</label>
                          <input type="text" name="project_name" id="project_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ old('project_name') }}" >
                      </div>
                      <div>
                          <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project URL</label>
                          <input type="url" name="project_url" value="{{ old('project_url') }}" id="url" placeholder="https://...." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                      </div>
                      <div>
                          <label for="project_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Description</label>
                          <textarea rows="5" name="project_description" id="project_description" placeholder="Write something about your work" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                      </div>
                     
                      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Project Now</button>
                      
                  </form>
              </div>
          </div>
      </div>
  </div> 
  


        </div>
    </div>
</x-app-layout>


<script>
    let btn = document.getElementById("upbtn");
    btn.style.display = "none";

    function previewImage(event) {
        btn.style.display = "flex";
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
