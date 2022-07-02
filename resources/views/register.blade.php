@extends('layouts.app')
@section('content')
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="md:h-auto bg-white md:w-1/2 flex justify-center items-center">
                <img aria-hidden="true" class="sm:object-cover object-contain w-fit h-fit" src="{{ asset('images/dts.png') }}" alt="Office" />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <form class="w-full flex flex-col gap-y-2" method="post" action="{{ route('register') }}" x-data="{whatsapp:false,phone:'{{ old('phone') }}'}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        Daftar Akun
                    </h1>
                    <label class="flex justify-center">
                        <div class="relative group">
                            <img src="{{ asset('images/profile.png') }}" alt="avatar" class="object-cover rounded-full h-36 w-36 avatar-img">
                            <input type="hidden" name="data_avatar" value="">
                            <div class="absolute inset-0 flex-col items-center justify-center hidden w-full h-full transition bg-blue-600 rounded-full group-hover:flex flex-nowrap">
                                <label for="avatar" class="my-auto font-semibold text-white">Ganti Foto</label>
                                <input type="file" class="opacity-0 -z-10" name="avatar" id="avatar" accept="image/*" onchange="previewImage()">
                            </div>
                        </div>
                    </label>
                    @error('avatar')
                    <span class="block text-center text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nomor Induk Kependudukan*</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="nik" value="{{ old('nik') }}" required />
                    </label>
                    @error('nik')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Lengkap*</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="name" value="{{ old('name') }}" required />
                    </label>
                    @error('name')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Email*</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="example@gmail.com" type="email" name="email" value="{{ old('email') }}" required />
                    </label>
                    @error('email')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nomor Telepon*</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="081234567890" type="number" name="phone" value="{{ old('phone') }}" x-model="phone" required />
                    </label>
                    @error('phone')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-blue-600 form-checkbox focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" x-model="whatsapp" />
                        <span class="ml-2">
                            Nomor Whatsapp saya berbeda dengan nomor telepon
                        </span>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nomor Whatsapp*</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="081234567890" type="number" name="whatsapp" x-bind:value="phone" x-bind:readonly="!whatsapp" required />
                    </label>
                    @error('whatsapp')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex gap-x-3">
                        <label class="flex justify-center items-center gap-x-2 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Pria</span>
                            <input class="inline-block mt-1 text-sm dark:border-white dark:bg-white focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-blue-500 dark:focus:shadow-outline-blue form-input" placeholder="081234567890" type="radio" value="Pria" name="gender" checked />
                        </label>
                        <label class="flex justify-center items-center gap-x-2 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Wanita</span>
                            <input class="inline-block mt-1 text-sm dark:border-white dark:bg-white focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-blue-500 dark:focus:shadow-outline-blue form-input" placeholder="081234567890" type="radio" value="Wanita" name="gender" />
                        </label>
                    </div>
                    <label class="block mt-2 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Usaha</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="company" type="text" value="{{ old('company') }}" />
                    </label>
                    @error('company')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" name="password" type="password" />
                    </label>
                    @error('password')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Confirm password
                        </span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" name="password_confirmation" type="password" />
                    </label>

                    <!-- You should use a button here, as the anchor is only used for the example  -->
                    <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" type="submit">
                        Daftar
                    </button>

                    <p class="mt-4">
                        <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline" href="{{ route('login') }}">
                            Already have an account? Login
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage() {
        const input = document.querySelector('input[name=avatar]');
        const preview = document.querySelector('.avatar-img');
        const file = input.files[0];
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            preview.src = reader.result;
        });

        if (file) {
            reader.readAsDataURL(file);
        }
    }

</script>
@endsection
