@extends('layouts.app')
@section('content')
<x-navbar :home=true />
@auth
@if (!auth()->user()->email_verified_at)
<div class="w-full bg-white dark:bg-slate-800 shadow-lg drop-shadow-lg">
    <div class="bg-red-600 mx-auto px-6 py-3 w-1/2 flex justify-between relative z-50">
        <span class="text-white font-bold">Email Anda Belum di Verifikasi</span>
        <a href="/verify-email" class="text-white hover:underline transition-all">Kirim Ulang Email Verifikasi</a>
    </div>
</div>
@endif
@endauth
<div class="w-full h-full py-6 bg-gradient-to-br from-blue-800 to-indigo-500 dark:from-slate-800 dark:to-slate-900">
    <div class="flex justify-center w-full h-fit">
        <div class="flex justify-between h-48 px-3 py-4 bg-white rounded-lg shadow-md gap-x-6 dark:shadow-slate-900 shadow-indigo-500">
            <img src="{{ asset('images/logo-kominfo.png') }}" alt="dts" class="object-contain w-1/2 h-full">
            <img src="{{ asset('images/dts-crop.png') }}" alt="dts" class="object-contain w-1/2 h-full">
        </div>
    </div>
    <span class="inline-block w-full mt-12 text-6xl font-bold text-center text-white uppercase">Daftarkan Dirimu Segera</span>
    <div class="flex flex-col w-full px-20 mt-20">
        @foreach ($active as $idx=>$active)
        <span class="inline-block w-full mt-12 text-4xl font-bold text-white uppercase">{{ $active->evCategory->short_name }}</span>
        <div class="grid w-full grid-cols-2 mt-4 gap-x-6 gap-y-6">

            @foreach ($events as $idx=>$data)
            @if ($active->category==$data->category)
            <div class="px-4 py-4 overflow-hidden bg-white rounded-xl">
                <div class="relative h-48 -mx-6 -mt-4 overflow-hidden">
                    <div class="absolute flex gap-x-3 top-4 left-6">
                        <span class="px-4 py-1 font-semibold text-white bg-teal-500 rounded-full select-none">{{ $data->partner }}</span>
                        <span class="px-4 py-1 font-semibold text-white bg-blue-600 rounded-full select-none">{{ $data->mode }}</span>
                    </div>
                    <img src="{{ asset('storage/'.$data->image) }}" alt="" class="object-cover object-center w-full h-full">
                </div>
                <div class="grid grid-cols-4">
                    <div class="flex flex-col col-span-3 my-3">
                        <span class="text-xl font-bold text-blue-600 dark:text-black">{{ $data->title}}</span>
                        <span class="text-base font-bold text-slate-600">{{ $data->location }} <span>{{ $data->address?'| '.$data->address:'' }}</span></span>
                        <span class="mt-4 font-semibold text-blue-600 dark:text-slate-800 ">Tanggal Pendaftaran</span>
                        <span class="text-slate-800">{{ date_format(date_create($data->registration_start),'d-M-Y') }} s/d {{ date_format(date_create($data->registration_end),'d-M-Y') }}</span>

                        <span class="mt-4 font-semibold text-blue-600 dark:text-slate-800 ">Tanggal Pelatihan</span>
                        <span class="text-slate-800">{{ date_format(date_create($data->event_start),'d-M-Y') }} s/d {{ date_format(date_create($data->event_end),'d-M-Y') }}</span>

                    </div>
                    <div class="col-span-1 -mb-4 -mr-4">
                        <form action="{{ route('user.event.register') }}" method="post" class="flex items-center justify-center w-full h-full">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <button type="submit" href="" class="flex items-center justify-center w-full h-full transition bg-blue-600 hover:bg-blue-700 dark:bg-slate-600 dark:hover:bg-slate-700">
                                <span class="text-lg font-bold text-white uppercase">Daftar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@if (session('error'))
<script>
    Swal.fire({
        title: 'Gagal Mendaftar'
        , text: 'Anda sudah mendaftar pada event ini'
        , icon: 'error'
    });

</script>
@endif
@if (session('success'))
<script>
    Swal.fire({
        title: 'Berhasil Mendaftar'
        , text: 'Anda berhasil mendaftar pada event ini'
        , icon: 'success'
    });

</script>
@endif
@endsection
