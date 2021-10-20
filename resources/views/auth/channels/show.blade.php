<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Channel: {{ ucfirst($channel->title) }}
        </h2>
    </x-slot>


    {{-- Channel.Edit --}}
    <div class="w-3/5 p-6 ml-5">
        <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post" class="flex">
            @csrf
            @method('PATCH')
            <div>
                <x-label for="title" :value="__('Edit Channel')" class=" font-bold" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$channel->title" required
                    autofocus />
            </div>
            <div>
                <x-button class="mt-7 ml-3">Update</x-button>
            </div>
        </form>
    </div>

    {{-- Table index --}}
    <table class="w-full text-left">
        <thead>
            <tr>
                <th>User</th>
                <th >Title</th>
                <th >Reply</th>
                <th >Likes</th>
                <th >Watchers</th>
                <th >Edit</th>
                <th >Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($channel->discussions as $discussion)
                <tr>
                    <td>{{ ucfirst($discussion->user->name) }}</td>

                    <td class="text-blue-900 hover:underline"><a href="{{ route('discussions.show',['slug' => $discussion->slug ])}}">{{ ucfirst($discussion->title) }}</a>    </td>
                    <td>{{ $discussion->replies->count() }}</td>
                    <td>{{ $discussion->likes->count() }}</td>
                    <td>{{ $discussion->watchers->count() }}</td>

                    <td>
                        <a href="{{ route('discussions.edit', ['slug' => $discussion->slug]) }}">
                            <x-button class="bg-blue-700">Edit</x-button>
                        </a>
                    </td>
                    <td>
                        <form action=" {{ route('discussions.destroy', ['slug' => $discussion->slug]) }}"
                            method="post" onsubmit="return confirm('Please confirm discussion deletion, all replies will be deleted')">
                            @csrf
                            @method('DELETE')
                            <x-button class="bg-red-700">X</x-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
