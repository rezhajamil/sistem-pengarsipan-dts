@extends('layouts.app')
@section('content')
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div
    class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
    >
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="md:h-auto md:w-1/2 flex justify-center items-center bg-white">
            <img
              aria-hidden="true"
              class="sm:object-cover object-contain w-fit h-fit"
              src="{{ asset('images/dts.png') }}"
              alt="Office"
            />
        </div>
        <div class="flex flex-col items-center justify-center p-6 sm:p-12 md:w-1/2">
            @if (session('status'))
                <div class="bg-gray-600 rounded w-full p-3">
                    <span class="font-bold text-white">{{ session('status') }}</span>
                </div>
            @endif
            <form class="w-full" method="post" action="{{ route('password.email') }}">
                @csrf
                <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                >
                Forgot password
                </h1>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email*</span>
                    <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="example@gmail.com"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    />
                </label>
                @error('email')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror
                <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                type="submit"
                >
                Recover password
                </button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection