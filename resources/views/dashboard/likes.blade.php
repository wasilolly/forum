<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 leading-tight">
            <a href="/dashboard?filter=mythreads">My Threads</a>
        </h2>
        <h2 class="font-semibold text-sm text-gray-800 leading-tight ml-5">
           <a href="/dashboard?filter=myreplies">My Replies</a>
        </h2>
        <h2 class="font-semibold text-sm text-blue-900 leading-tight ml-5 underline">
           <a href="/dashboard?filter=mylikes" class="font-bold">My likes</a>
        </h2>
    </x-slot>
    
   
    @foreach ($likes as $like)
    <section class="mt-2">
        <article class="bg-gray-100 border border-gray-200 p-4 rounded-xl">
            <div class="flex flex-row">
                <img src="https://i.pravatar.cc/60?u={{$like->discussion->user_id}}" width="30" height="30" alt="">
                <a href="{{ route('discussions.show', ['slug' => $like->discussion->slug ]) }}" class="font-bold text-blue-900 ml-3 hover:underline">{{ ucwords($like->discussion->title)}}</a>
            </div>
            <div>
                <header>                 
                    <div class="float-right font-semibold text-blue-900 hover:underline"><a href="{{ route('channels.show', ['channel'=> $like->discussion->channel])}}">{{ ucfirst($like->discussion->channel->title)}}</div>                 
                    <h3 class="font-bold">{{$like->discussion->user->name}}</h3>                 
                    <p class="text-xs float-right">Posted
                        <time>{{ $like->discussion->created_at->diffForHumans()}}</time>
                    </p>
                    <span class="text-xs">{{$like->discussion->replies->count()}} Replies</span> 
                </header>
            </div>
            <p>{{ Str::limit($like->discussion->content, 200)  }}</p>
        </article>     
    </section> 
    @endforeach
    <div>
        <p class="mt-3">{{ $likes->links() }}</p>
    </div>

</x-app-layout>
