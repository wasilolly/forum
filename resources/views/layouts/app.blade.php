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
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 flex flex-row">
                {{ $header }}
            </div>
        </header>

        @if (session()->has('success'))
            <div x-data="{ show:true}" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class=" fixed bg-blue-500 text-white py-2 px-1 w-1/5 rounded-xl right-0 top-30 text-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Page Content -->
        <main>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 flex">
                        <div class="w-1/5 mt-2">
                           <a href="{{ route('discussions.create') }}">
                            <x-button class="w-full font-extrabold text-center ">New Thread</x-button>
                            </a>
                            <div>
                                <p class="font-bold h-8 ml-5">All Channels</p>
                            </div>
                            @foreach ($channels as $channel)
                                <p class="ml-5 h-8 "> <a href="{{ route('channels.show', ['channel'=> $channel])}}">{{ ucfirst($channel->title) }}</a></p>
                            @endforeach
                        </div>

                        <div class="w-4/5 ml-10 mt-2">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

 <!-- AlpineJS -->
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 <!-- Font Awesome -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
     integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</html>
