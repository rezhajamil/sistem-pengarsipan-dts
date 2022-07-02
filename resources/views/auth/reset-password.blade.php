@extends('layouts.app')
@section('content')
<div class="flex justify-center items-center h-screen">
   
    <form class="px-4 py-3 mb-8 w-1/3 bg-white rounded-lg shadow-xl" action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="flex justify-between items-center">
            <span class="text-lg font-bold mr-auto">Reset Password</span>
            {{-- <a href="/" class=""><svg class="w-8 h-8 text-blue-600 hover:text-blue-800 transition" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg></a> --}}
        </div>
        <hr class="my-2 -mx-4 h-2">
         @if (session('status'))
        <div class="bg-green-400 rounded px-5 py-3">
            <span class="text-white font-bold">{{ session('status') }}</span>
        </div>
        @endif
        <label class="block mt-4 text-sm">
            <span class="text-gray-700">
                Email
            </span>
            <input
                class="block w-full mt-1 text-sm border px-3 py-2 border-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue"
                type="email"
                name="email"
                required
            />
            @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700">
                New Password
            </span>
            <input
                class="block w-full mt-1 text-sm border px-3 py-2 border-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue"
                type="password"
                name="password"
            />
            @error('password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700">
                Confirmation New Password
            </span>
            <input
                class="block w-full mt-1 text-sm border px-3 py-2 border-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue"
                type="password"
                name="password_confirmation"
            />
        </label>
        <button type="submit" class="py-2 px-3 my-3 rounded-md bg-blue-600 text-white font-semibold">Reset Password</button>
    </form>
</div>
@endsection