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
                    Event
                </h2>

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3">Mode</th>
                                    <th class="px-4 py-3">Partner</th>
                                    <th class="px-4 py-3">Lokasi</th>
                                    <th class="px-4 py-3">Alamat</th>
                                    <th class="px-4 py-3">Masa Pendaftaran</th>
                                    <th class="px-4 py-3">Masa Pelatihan</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($events->count()<=0) <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 font-semibold text-center" colspan="7">Tidak Ada Data</td>
                                    </tr>
                                    @endif
                                    @foreach ($events as $index=>$event)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 font-semibold">{{ $index+1 }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->title }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->evCategory->name }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->mode }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->partner }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->location }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->address }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->registration_start }} - {{ $event->registration_end }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $event->event_start }} - {{ $event->event_end }}</td>
                                        <td class="flex flex-col px-4 py-4 font-medium gap-y-2">
                                            <a href="{{ route('admin.event.show',$event->id) }}">
                                                <span class="text-sm text-green-600">Detail</span>
                                            </a>
                                            <a href="{{ route('admin.event.edit',$event->id) }}">
                                                <span class="text-sm text-blue-600">Edit</span>
                                            </a>
                                            <form action="{{ route('admin.event.destroy',$event->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-sm text-red-600 font-medium">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination current="{{ $events->currentPage() }}" total="{{ $events->total() }}"></x-pagination>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
