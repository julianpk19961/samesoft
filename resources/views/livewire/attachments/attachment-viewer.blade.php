<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SAME') }}</title>

    <!-- Fonts -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('img/favicon_32.png') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script defer src="{{ asset('js/all.min.js') }}"></script> --}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/abd130ae28.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-gray-500 shadow border-t-2">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <div width="100%" height="100%">
            <h2 class="text-center py-12">{{ $document->name }}</h2>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">


                        <iframe src="{{ $document->document_url ? $document->document_url : asset($document->content)}}"
                            width="100%" height="100%"
                            sandbox="allow-scripts allow-same-origin allow-forms allow-top-navigation allow-modals allow-popups allow-pointer-lock allow-geolocation allow-clipboard-read allow-clipboard-write allow-insecure-requests allow-downloads">

                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
</body>

</html>