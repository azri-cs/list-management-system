<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <body class="font-sans antialiased dark:bg-gray-900 dark:text-white/50">
    <div class="bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 sm:grid-cols-4">
                    <div class="flex lg:justify-start col-start-1">
                        <svg class="h-12 w-auto lg:h-16 fill-none text-green-700 dark:text-green-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15M9 5C9 6.10457 9.89543 7 11 7H13C14.1046 7 15 6.10457 15 5M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5M12 12H15M12 16H15M9 12H9.01M9 16H9.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div class="flex flex-col justify-center items-end">
                        <input type="checkbox" id="light-switch" name="light-switch" class="light-switch sr-only" />
                        <label class="relative cursor-pointer p-2" for="light-switch">
                            <svg class="dark:hidden" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-yellow-300" d="M7 0h2v2H7zM12.88 1.637l1.414 1.415-1.415 1.413-1.413-1.414zM14 7h2v2h-2zM12.95 14.433l-1.414-1.413 1.413-1.415 1.415 1.414zM7 14h2v2H7zM2.98 14.364l-1.413-1.415 1.414-1.414 1.414 1.415zM0 7h2v2H0zM3.05 1.706 4.463 3.12 3.05 4.535 1.636 3.12z" />
                                <path class="fill-yellow-400" d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z" />
                            </svg>
                            <svg class="hidden dark:block" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-yellow-100" d="M6.2 1C3.2 1.8 1 4.6 1 7.9 1 11.8 4.2 15 8.1 15c3.3 0 6-2.2 6.9-5.2C9.7 11.2 4.8 6.3 6.2 1Z" />
                                <path class="fill-yellow-200" d="M12.5 5a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 5Z" />
                            </svg>
                            <span class="sr-only">Switch to light / dark version</span>
                        </label>
                    </div>

                    <nav class="col-span-2 flex flex-1 lg:justify-end">
                        <a href="{{ route('offline.listings.index') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-red-500">
                            {{__('Try offline for free!')}}
                        </a>
                        <div class="mx-12"></div>
                        @guest
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-red-500">
                                {{__('Login')}}
                            </a>
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-red-500">
                                {{__('Register')}}
                            </a>
                        @endguest
                        @auth
                            <a href="{{ route('items.index') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-red-500">
                                {{__('Items')}}
                            </a>

                            <a href="{{ route('tags.index') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-red-500">
                                {{__('Tags')}}
                            </a>

                            <a href="{{ route('listings.index') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-red-500">
                                {{__('Listings')}}
                            </a>
                        @endauth
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5 transition duration-300 hover:bg-gray-100 dark:bg-gray-800 dark:ring-gray-800 dark:hover:bg-gray-700">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-green-700/10 dark:bg-green-500/10 sm:size-16">
                                <svg class="size-6 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Powerful List Management</h2>
                                <p class="mt-4 text-sm/relaxed text-gray-500 dark:text-gray-400">
                                    Create, organize, and manage your lists with ease. Our intuitive interface powered by Laravel and Livewire provides a seamless experience for personal and collaborative list management.
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5 transition duration-300 hover:bg-gray-100 dark:bg-gray-800 dark:ring-gray-800 dark:hover:bg-gray-700">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-green-700/10 dark:bg-green-500/10 sm:size-16">
                                <svg class="size-6 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">User-Centric Features</h2>
                                <p class="mt-4 text-sm/relaxed text-gray-500 dark:text-gray-400">
                                    Tailor your experience with personal profiles and list management. Our user-focused design ensures that you have full control over your data and preferences.
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5 transition duration-300 hover:bg-gray-100 dark:bg-gray-800 dark:ring-gray-800 dark:hover:bg-gray-700">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-green-700/10 dark:bg-green-500/10 sm:size-16">
                                <svg class="size-6 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Advanced Admin Controls</h2>
                                <p class="mt-4 text-sm/relaxed text-gray-500 dark:text-gray-400">
                                    Empower your administrators with robust tools to manage users, roles, and permissions. Our system provides flexible controls to ensure smooth operation and security.
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5 transition duration-300 hover:bg-gray-100 dark:bg-gray-800 dark:ring-gray-800 dark:hover:bg-gray-700">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-green-700/10 dark:bg-green-500/10 sm:size-16">
                                <svg class="size-6 text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Open Source Power</h2>
                                <p class="mt-4 text-sm/relaxed text-gray-500 dark:text-gray-400">
                                    Built on Laravel and Livewire, our system is fully open source. Contribute, customize, and extend functionality to suit your needs. Join our community of developers and users!
                                </p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="my-16 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Created by <a target="_blank" href="https://github.com/azri-cs">Azri</a> using Laravel v{{ Illuminate\Foundation\Application::VERSION }}.
                    </p>
                </footer>
            </div>
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
