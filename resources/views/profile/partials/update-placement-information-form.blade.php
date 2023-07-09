<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Job/Internship Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile with Job/internship details such as your company, role etc.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.edit.placement') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="companyname" class="capitalize" :value="__('company name')" />
            <x-text-input id="companyname" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', ($placement->company_name)?$placement->company_name : '')" autofocus autocomplete="company_name" />
            <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
        </div>
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" :value="old('role', $placement->role)" autofocus autocomplete="role" />
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>
        <div>
            <label for="job_type">Job Type</label>
            <select id="job_type" name="job_type" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2" autofocus autocomplete="role">
                @if ($placement->job_type != NULL)
                    <option value="{{ $placement->job_type }}">{{ $placement->job_type }}</option>
                @else
                    <option value="">Select Job Type</option>    
                @endif
                <option value="internship">Internship</option>
                <option value="job">Job</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('job_type')" />
        </div>
       
        <div>
            <label for="description">Description</label>
            <textarea rows="5" id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2" autofocus autocomplete="description" placeholder="Write about your job profile">{{ $placement->description }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-teal-600">{{ __('Update Job Details') }}</x-primary-button>

            @if (session('status') === 'placement-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
