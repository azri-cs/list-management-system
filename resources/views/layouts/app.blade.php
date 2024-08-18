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
        @stack('header')
        <script>
            if (localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.querySelector('html').classList.add('dark');
            } else {
                document.querySelector('html').classList.remove('dark');
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const lightSwitches = document.querySelectorAll('.light-switch');

                if (lightSwitches.length > 0) {
                    lightSwitches.forEach((lightSwitch, i) => {

                        if (localStorage.getItem('dark-mode') === 'true') {
                            lightSwitch.checked = true;
                            document.documentElement.classList.add('dark');
                        }

                        lightSwitch.addEventListener('change', function() {
                            const { checked } = this;

                            lightSwitches.forEach((el, n) => {
                                if (n !== i) {
                                    el.checked = checked;
                                }
                            });

                            if (checked) {
                                document.documentElement.classList.add('dark');
                                localStorage.setItem('dark-mode', 'true');
                            } else {
                                document.documentElement.classList.remove('dark');
                                localStorage.setItem('dark-mode', 'false');
                            }
                        });

                    });
                } else {
                    console.log('No light switches found');
                }
            });
        </script>
    @stack('footer')
    </body>
</html>
