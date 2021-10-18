<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Forum
        </h2>
    </x-slot>

    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endauth
    </div>
    
    @foreach ($discussions as $discussion)
        <div>
            <span>{{ $discussion->created_at }}</span>
        </div>
        <div class=" bg-blue-700">
            {{ $discussion->content }}
        </div>
    @endforeach
    <div>
        <p class="mt-3">{{ $discussions->links() }}</p>
    </div>
</x-app-layout>