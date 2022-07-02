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
                    Peserta Event
                </h2>

                <form action="{{ route('admin.event_participant.index') }}" method="get">
                    <select name="event" id="event" class="inline-block mt-2 text-sm w-fit dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                        <option value="all" {{ !Request::get('event')||Request::get('event')=='all'?'selected':'' }}>Semua</option>
                        @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ Request::get('event')==$event->id?'selected':'' }}>{{ $event->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="inline-block ml-3 px-6 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-800">Filter</button>
                </form>
                {{-- {{ ddd($request('event')) }} --}}

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Event</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Telepon</th>
                                    <th class="px-4 py-3">Progress</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($participants->count()<=0) <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 font-semibold text-center" colspan="7">Tidak Ada Data</td>
                                    </tr>
                                    @endif
                                    @foreach ($participants as $index=>$data)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 font-semibold">{{ $index+1 }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $data->dataEvent->title }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $data->dataEvent->evCategory->short_name }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $data->dataUser->name }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $data->dataUser->email }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $data->dataUser->phone }}</td>
                                        <td class="px-4 py-3 font-medium">
                                            @if ($data->is_finished)
                                            <span class="px-2 py-1 font-semibold text-sm leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Selesai
                                            </span>
                                            @else
                                            <span class="px-2 py-1 font-semibold text-sm leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                Belum Selesai
                                            </span>
                                            @endif

                                        </td>
                                        <td class="flex flex-col px-4 py-4 font-medium gap-y-2">
                                            <form action="{{ route('admin.event_participant.destroy',$data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-sm font-semibold text-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination current="{{ $participants->currentPage() }}" total="{{ $participants->total() }}"></x-pagination>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
