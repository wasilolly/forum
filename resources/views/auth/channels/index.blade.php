<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Channels') }}
        </h2>
    </x-slot>

    {{-- Channel.index --}}
    <div class=" w-2/5">       
        <form action="{{route('channels.store')}}" method="post">
            @csrf
            <div>
                <x-label for="title" :value="__('New Channel')" class=" font-bold" />              
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>
            <x-button class="mt-4">
                {{ __('Create') }}
            </x-button>
        </form>
    </div>
    
    {{-- Table index --}}
  
    <table class="table-auto w-3/5">
        <thead>
            <tr class="text-left">
            <th class="w-1/2">Name</th>
            <th class="w-1/4">Edit</th>
            <th class="w-1/4">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($channels as $channel )
            <tr>
            <td>{{ ucfirst($channel->title) }}</td>
            <td>
                <a href="{{route('channels.edit', ['channel' => $channel->id])}}">
                    <x-button class="">Edit</x-button>
                </a>
            </td>
            <td>
                <form action=" {{ route('channels.destroy', ['channel' => $channel->id ])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-red-700 ">Delete</x-button>
                </form>
            </td>
            </tr>
            @endforeach           
        </tbody>
    </table>               
</x-app-layout>
