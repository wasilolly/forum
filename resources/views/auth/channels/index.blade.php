<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Channels') }}
        </h2>
    </x-slot>

    {{-- Channel.create --}}
    <div class=""w-full>       
        <form action="{{route('channels.store')}}" method="post" class="flex">
            @csrf
            <div>
                <x-label for="title" :value="__('New Channel')" class=" font-bold" />              
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>
            <div class="p-0 mt-6"> 
                <x-button class="ml-4">Create</x-button>
            </div>
           
        </form>
    </div>
    
    {{-- Table index --}}
  
    <table class="w-full">
        <thead>
            <tr class="text-left">
            <th> Created at </th>   
            <th >Name</th>
            <th >Discussion</th>
            <th >Edit</th>
            <th >Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($channels as $channel )
            <tr>
            <td>{{ $channel->created_at->diffForHumans()}}</td>
            <td>{{ ucfirst($channel->title) }}</td>
            <td>{{ $channel->discussions->count() }}</td>
            <td>
                <a href="{{route('channels.edit', ['channel' => $channel->id])}}">
                    <x-button class="p-0">Edit</x-button>
                </a>
            </td>
            <td>
                <form action="{{ route('channels.destroy', ['channel' => $channel->id ])}}" method="post" onsubmit="return confirm('Please confirm channel deletion, all discussion under channel will be deleted')">
                    @csrf
                    @method('DELETE')
                                   
                     <x-button class="bg-red-700 p-0">X</x-button>
                </form>
            </td>
            </tr>
            @endforeach           
        </tbody>
    </table>               
</x-app-layout>
