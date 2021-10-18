<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Channel: {{  ucfirst($channel->title) }}
        </h2>
    </x-slot>

    
                     {{-- Channel.Edit --}}
                    <div class="w-3/5 p-6 ml-5">        
                        <form action="{{route('channels.update', ['channel' => $channel->id ])}}" method="post" class="flex">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="title" :value="__('Edit Channel')" class=" font-bold" />              
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$channel->title" required autofocus />
                            </div>
                            <div>
                                <x-button class="mt-7">Update</x-button>
                            </div>
                        </form>     
                    </div> 
                    
                    {{-- Table index --}}
                    <table class="table-auto">
                        <thead>
                          <tr>
                            <th class="w-1/2">Name</th>
                            <th class="w-1/4">Edit</th>
                            <th class="w-1/4">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($channel->discussions as $discussion )
                          <tr>
                            <td>{{ ucfirst($discussion->name) }}</td>
                            <td>
                                <a href="{{route('channels.edit', ['channel => $channel->id'])}}">
                                    <x-button class="bg-blue-700">Edit</x-button>
                                </a>
                            </td>
                            <td>
                                <form action=" {{ route('channels.destroy', ['channel' => $channel->id ])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="bg-red-700">Delete</x-button>
                                </form>
                            </td>
                          </tr>
                          @endforeach                       
                        </tbody>
                    </table>
                
</x-app-layout>
