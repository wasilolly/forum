<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Thread') }}
        </h2>
    </x-slot>

    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @guest
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endguest
    </div>

    
    <form action="{{ route('discussions.store') }}" method="post">
        @csrf
        <div>
            <x-label for="title" :value="__('New Thread Title')" class=" font-bold" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                autofocus />
            @error('title')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="channel" :value="__('Choose Channel')" class=" font-bold" />
            <select name="channel_id" id="channel_id" class="w-full">
                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-label for="content" :value="__('Content')" class="font-bold" />
            <textarea id="content" class="block mt-1 w-full" rows="15" type="text" name="content"
                required autofocus /></textarea>
            @error('content')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        @auth   
        <x-button class="mt-4">
            {{ __('Create') }}
        </x-button>
        @else
        <p>Please <a href="{{route('login')}}" class="underline font-bold">Log in</a> to leave comment</p>
        @endauth
    </form>
    </div>
</x-app-layout>
