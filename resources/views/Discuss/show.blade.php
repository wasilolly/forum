<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $discussion->title }}
        </h2>
    </x-slot>

    <div>
        <span>{{$discussion->created_at}}</span>
    </div>
   <div class=" bg-blue-700">
       {{$discussion->content}}
   </div>
    
</x-app-layout>
