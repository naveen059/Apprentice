@extends('layouts.auth')

@section('content')
    <div class="container mt-10" style="margin-left: 180px;">
        <div class="flex">
            <div class="w-9/10">
                <div class="max-w-md mx-auto">
                    <div class="bg-white p-10 rounded-md shadow-md">
                        <h2 class="text-xl font-bold mb-4 flex items-center">
                                                {{ __('Register') }}
                                                <img src="{{ asset('images/register.png')}}" width="100px" height="100px" class="mx-20" alt="Login Image">
                                            </h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <img src="{{ asset('images/auth.jpg')}}" class="h-full" alt="Registration Image">
            </div>
        </div>
    </div>
@endsection
