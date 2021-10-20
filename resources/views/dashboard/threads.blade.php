<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-blue-900 leading-tight">
            <a href="/dashboard?filter=mythreads" class="font-bold underline">My Threads</a>
        </h2>
        <h2 class="font-semibold text-sm text-gray-800 leading-tight ml-5">
           <a href="/dashboard?filter=myreplies">My Replies</a>
        </h2>
        <h2 class="font-semibold text-sm text-gray-800 leading-tight ml-5">
           <a href="/dashboard?filter=mylikes">My likes</a>
        </h2>
    </x-slot>
    
   
    @foreach ($discussions as $d)
    <section class="mt-2">
        <article class="bg-gray-100 border border-gray-200 p-4 rounded-xl">
            <div class="flex flex-row">
                <img src="https://i.pravatar.cc/60?u={{$d->user_id}}" width="30" height="30" alt="">
                <a href="{{ route('discussions.show', ['slug' => $d->slug ]) }}" class="font-bold text-blue-900 ml-3 hover:underline"">{{ ucwords($d->title)}}</a>
            </div>
            <div>
                <header>                 
                    <div class="float-right font-semibold text-blue-900 hover:underline"><a href="{{ route('channels.show', ['channel'=> $d->channel])}}">{{ ucfirst($d->channel->title)}}</div>                 
                    <h3 class="font-bold">{{$d->user->name}}</h3>                 
                    <p class="text-xs float-right">Posted
                        <time>{{ $d->created_at->diffForHumans()}}</time>
                    </p>
                    <span class="text-xs">{{$d->replies->count()}} Replies</span> 
                </header>
            </div>
            <p>{{ Str::limit($d->content, 80, '....')  }}</p>
        </article>     
    </section> 
    @endforeach
    <div>
        <p class="mt-3">{{ $discussions->links() }}</p>
    </div>

</x-app-layout>
