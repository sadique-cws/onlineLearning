@extends('auth.layout')

@section('authcontent')
<div class="border p-3 rounded shadow">
    <div class="flex mb-3 border-b pb-3">
        <h2 class="text-xl font-semibold font-sans text-slate-500">Forget Password?</h2>
    </div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form>
</div>
@endsection
