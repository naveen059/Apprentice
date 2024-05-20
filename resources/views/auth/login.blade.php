@extends('layouts.auth')

@section('content')
    <div class="container mx-auto mt-20">
        <div class="flex">
            <div class="w-1/2 h-full">
                <div class="bg-white shadow-md rounded-md p-12">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        {{ __('Login') }}
                        <img src="{{ asset('images/login.png')}}" width="100px" height="100px" class="mx-20" alt="Login Image">
                    </h2>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 flex items-center">
                            <input class="form-checkbox rounded border-gray-300 shadow-sm text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 text-sm text-gray-700" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-1/2">
                <img src="{{ asset('images/auth.jpg') }}" alt="Illustration" height="500px">
            </div>
        </div>
    </div>
@endsection
