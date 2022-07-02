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
                    Detail Event
                </h2>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="w-full">
                        <div class="relative group">
                            <img alt="avatar" src="{{ asset('storage/'.$event->image) }}" class="object-cover w-full rounded-md h-fit max-h-[500px] flyer-img">
                        </div>
                        @error('image')
                        <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="flex flex-col mt-6">
                                <span class="text-2xl font-bold text-white">{{ $event->title }}</span>
                                <span class="font-semibold text-slate-400">{{ $event->evCategory->name }} | {{ $event->mode }}</span>
                            </div>
                            <div class="flex flex-col mt-6">
                                <span class="text-base font-bold text-white">Masa Pendaftaran</span>
                                <span class="text-base text-slate-400">{{ $event->registration_start }} s/d {{ $event->registration_end }}</span>
                            </div>
                            <div class="flex flex-col mt-6">
                                <span class="text-base font-bold text-white">Masa Kegiatan</span>
                                <span class="text-base text-slate-400">{{ $event->event_start }} s/d {{ $event->event_end }}</span>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-col mt-6">
                                <span class="text-base font-bold text-white">Partner Kegiatan</span>
                                <span class="text-base text-slate-400">{{ $event->partner }}</span>
                            </div>
                            <div class="flex flex-col mt-6">
                                <span class="text-base font-bold text-white">Lokasi Kegiatan</span>
                                <span class="text-base text-slate-400">{{ $event->location }}</span>
                            </div>
                            <div class="flex flex-col mt-6">
                                <span class="text-base font-bold text-white">Alamat Kegiatan</span>
                                <span class="text-base text-slate-400">{{ $event->address }}</span>
                            </div>
                        </div>
                        <div class="mt-4 col-span-full">
                            <span class="text-base font-bold text-white">Deskripsi</span>
                            <pre class="text-slate-400">{{ $event->description }}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
