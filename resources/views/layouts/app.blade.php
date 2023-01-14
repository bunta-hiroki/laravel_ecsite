<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} -EC</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- FontAwesame -->
        <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Scripts -->
        
        <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

        <!-- styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">         

            @if(request()->is('admin*')) 
                @include('layouts.admin-navigation')
            @elseif(request()->is('owner*')) 
                @include('layouts.owner-navigation')
            @elseif(request()->is('user*')) 
                @include('layouts.user-navigation')
            @else 

                @auth('users')
                    @include('layouts.user-navigation')
                @else
                    <div class="w-full bg-white shadow">
                        <div class="max-w-7xl mx-auto">
                            <div class="flex justify-between w-full mx-auto sm:px-6 lg:px-8">
                                <!-- Logo -->
                                <div class="shrink-0 flex items-center">
                                    <a href="{{ route('user.index') }}">
                                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                                    </a>
                                </div>
                                <div class="hidden px-6 py-4 sm:block border-b border-gray-100 text-right">
                                    <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                    <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth

                {{--@if (Route::has('user.login'))
                    <div class="hidden px-6 py-4 sm:block bg-white border-b border-gray-100 text-right">
                        
                        @auth('users')
                            <a href="{{ url('/user/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('user.register'))
                                <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif--}}
            @endif 

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-1">
                    {{ $header }}
                </div>
            </header>

            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
            <footer class="text-gray-600 body-font bg-white w-full">
                <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
                    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <span class="ml-3 text-xl">xxxxxxxx</span>
                    </a>
                    <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2020 xxxxxxx —
                    <a class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@xxxxxxx</a>
                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                    <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                    </span>
                </div>
            </footer>
            
        </div>
    </body>
</html>