<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Forum
        </h2>
    </x-slot>

    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @guest
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endguest
    </div>

    @foreach ($discussions as $d)
    <section class="mt-2">
        <article class="bg-gray-100 border border-gray-200 p-4 rounded-xl">
            <div class="flex flex-row">
                <img src="https://i.pravatar.cc/60?u={{$d->user_id}}" width="30" height="30" alt="">
                <a href="{{ route('discussions.show', ['slug' => $d->slug ]) }}" class="font-bold ml-3">{{ ucwords($d->title)}}</a>
            </div>
            <div>
                <header>                 
                    <div class="float-right font-semibold"><a href="{{ route('channels.show', ['channel'=> $d->channel])}}">{{ ucfirst($d->channel->title)}}</div>                 
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
