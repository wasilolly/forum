<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editing: {{ $discussion->slug }}
        </h2>
    </x-slot>


    <form action="{{ route('discussions.update', ['slug' => $discussion->slug]) }}" method="post">
        @csrf
        @method('PATCH')

        <div>
            <x-label for="content" :value="__('Edit')" class="font-bold" />
            <textarea id="content" class="block mt-1 w-full" rows="15" type="text" name="content" required
                autofocus />{{ $discussion->content }}</textarea>
            @error('content')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <x-button class="mt-4">
            {{ __('Update') }}
        </x-button>
    </form>
</x-app-layout>
