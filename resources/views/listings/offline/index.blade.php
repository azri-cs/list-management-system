<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Listing Management System') }}</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="py-12">
    <div class="w-full bg-white overflow-hidden min-h-screen">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Work in Progress
            </h1>
            <div class="my-8">
                <x-primary-button-link class="ms-3" :url="route('welcome')">
                    {{ __('Return to Home') }}
                </x-primary-button-link>
            </div>
            <div class="flex justify-center mb-8">
                <img src="{{ asset('images/canvas-stand.svg') }}" alt="Work in Progress" class="w-full h-auto">
            </div>
        </div>
    </div>
</div>
</body>
</html>
