<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Thread') }}
        </h2>
    </x-slot>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form action="{{ route('discussions.store') }}" method="post">
        @csrf
        <div>
            <x-label for="title" :value="__('New Thread')" class=" font-bold" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                autofocus />
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
        </div>
        <x-button class="mt-4">
            {{ __('Create') }}
        </x-button>
    </form>
    </div>
</x-app-layout>
