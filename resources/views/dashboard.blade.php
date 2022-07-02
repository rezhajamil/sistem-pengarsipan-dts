@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('components.sidebar')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->

    <div class="flex flex-col flex-1 w-full">
        <x-navbar :home=false></x-navbar>
        <main class="h-full overflow-y-auto">
            <div class="container grid px-6 mx-auto">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Dashboard
                </h2>
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Peserta
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $users->count() }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                            {{-- <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg> --}}
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Acara
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $events->count() }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Bio</th>
                                    <th class="px-4 py-3">NIK</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Nomor Telepon</th>
                                    <th class="px-4 py-3">Verifikasi Email</th>
                                    @if (auth()->user()->role == 1)
                                    <th class="px-4 py-3">Role</th>
                                    <th class="px-4 py-3">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count()<=0) <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 font-semibold text-center" colspan="7">Tidak Ada Data</td>
                                    </tr>
                                    @endif
                                    @foreach ($users as $index=>$user)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 font-semibold">{{ $index+1 }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->name }}" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $user->name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $user->gender }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $user->nik }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $user->phone }}</td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($user->email_verified_at)
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Verified
                                            </span>
                                            @else
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                Not Verified
                                            </span>
                                            @endif
                                        </td>
                                        @if (auth()->user()->role == 1)
                                        <td class="px-4 py-3 text-sm">{{ $user->userRole->name }}</td>
                                        <td class="px-4 py-3">
                                            <form action="{{ route('super.change_role',$user->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="text-sm text-green-600 font-semibold">Ganti Role</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination current="{{ $users->currentPage() }}" total="{{ $users->total() }}"></x-pagination>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
