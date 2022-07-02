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
                    Tambah Event
                </h2>
                <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Nama Event*
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Nama" name="title" type="text" value="{{ old('title') }}" />
                        @error('title')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="inline-block mt-4 mr-3 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Kategori*
                        </span>
                        <select name="category" id="category" class="block mt-2 text-sm w-fit dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ old('category')==$item->id?'selected':'' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="inline-block mt-4 mr-3 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Mode*
                        </span>
                        <select name="mode" id="mode" class="block mt-2 text-sm w-fit dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                            @foreach ($mode as $item)
                            <option value="{{ $item }}" {{ old('mode')==$item?'selected':'' }}>{{ $item }}</option>

                            @endforeach
                        </select>
                        @error('mode')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="inline-block mt-4 text-sm w-80">
                        <span class="text-gray-700 dark:text-gray-400">
                            Partner Event
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Partner" name="partner" type="text" value="{{ old('partner') }}" />

                        @error('partner')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <br>
                    <label class="inline-block w-1/4 mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Tanggal Buka Pendaftaran
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="registration_start" type="date" value="{{ old('registration_start') }}" />

                        @error('registration_start')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="inline-block w-1/4 mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Tanggal Tutup Pendaftaran
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="registration_end" type="date" value="{{ old('registration_end') }}" />

                        @error('registration_end')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <br>
                    <label class="inline-block w-1/4 mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Tanggal Mulai Event
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="event_start" type="date" value="{{ old('event_start') }}" />

                        @error('event_start')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="inline-block w-1/4 mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Tanggal Selesai Event
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="event_end" type="date" value="{{ old('event_end') }}" />

                        @error('event_end')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="block w-full mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Lokasi Event
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Lokasi Kegiatan" name="location" type="text" value="{{ old('location') }}" />

                        @error('location')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="block w-full mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Alamat Event
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Alamat Kegiatan" name="address" type="text" value="{{ old('address') }}" />

                        @error('address')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="block w-full mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Flyer Event
                        </span>
                        <input class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="image" type="file" type="image" />
                        @error('image')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <label class="block w-full mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Deskripsi Event*
                        </span>
                        <textarea class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="description" type="image">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                        @enderror
                    </label>
                    <button type="submit" class="px-6 py-2 mt-3 text-white transition bg-blue-600 rounded hover:bg-blue-800">Simpan</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
