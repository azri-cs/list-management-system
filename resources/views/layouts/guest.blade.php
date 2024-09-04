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

        <script>
            if (localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.querySelector('html').classList.add('dark');
            } else {
                document.querySelector('html').classList.remove('dark');
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="{{ url('/') }}">
                    <x-application-logo class="h-20 w-auto lg:h-28 fill-none text-green-700 dark:text-green-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex flex-col items-end">
                    <input type="checkbox" id="light-switch" name="light-switch" class="light-switch sr-only" />
                    <label class="relative cursor-pointer p-2" for="light-switch">
                        <svg class="dark:hidden" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-amber-500" d="M7 0h2v2H7zM12.88 1.637l1.414 1.415-1.415 1.413-1.413-1.414zM14 7h2v2h-2zM12.95 14.433l-1.414-1.413 1.413-1.415 1.415 1.414zM7 14h2v2H7zM2.98 14.364l-1.413-1.415 1.414-1.414 1.414 1.415zM0 7h2v2H0zM3.05 1.706 4.463 3.12 3.05 4.535 1.636 3.12z" />
                            <path class="fill-amber-400" d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z" />
                        </svg>
                        <svg class="hidden dark:block" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-yellow-100" d="M6.2 1C3.2 1.8 1 4.6 1 7.9 1 11.8 4.2 15 8.1 15c3.3 0 6-2.2 6.9-5.2C9.7 11.2 4.8 6.3 6.2 1Z" />
                            <path class="fill-yellow-200" d="M12.5 5a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 5Z" />
                        </svg>
                        <span class="sr-only">Switch to light / dark version</span>
                    </label>
                </div>
                {{ $slot }}
            </div>
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
    </body>
</html>
