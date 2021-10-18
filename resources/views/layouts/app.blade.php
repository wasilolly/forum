<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Forum') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6  flex">
                               <div class="w-1/5 bg-white">
                                <x-button class="w-full font-extrabold"><a href="{{ route('discussions.create')}}">{{ __('New Thread') }}</a></x-button>
                                    <br> 
                                    <div><p class="font-bold h-10 ml-5"> All Channels </p></div>
                                     <hr>
                                        @foreach ($channels as $channel)
                                        <hr>
                                            <p class="ml-5 h-8 "> {{ ucfirst($channel->title) }} </p>
                                            
                                        @endforeach
                               </div>
                               
                               <div class="w-4/5 ml-10">
                                {{ $slot }}

                               </div>
                            </div>
                        </div>
                    </div>

            </main>
        </div>
    </body>
</html>
