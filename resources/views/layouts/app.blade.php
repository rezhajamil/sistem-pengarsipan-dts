<!DOCTYPE html>
<html :class="{ 'dark': !dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.header')
    <title>DTS | {{ $title??"Home" }}</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
    @yield('content')

    @yield('scripts')

    <script>
        document.addEventListener('trix-file-accept', function(event) {
            event.preventDefault();
        });

    </script>
</body>
</html>
