<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $discussion->title }}
        </h2>
    </x-slot>
    
    {{-- Auth Guard --}}
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @guest
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endguest
    </div>

    {{-- Disply Thread  --}}
    <section class="mt-2">
        <article class="bg-gray-100 border border-gray-200 p-3 rounded-xl">
            
            @auth
                @if (auth()->user()->id === $discussion->user_id)
                <a href="{{ route('discussions.edit', ['slug' => $discussion->slug])}}"><div class="float-right text-xs ml-3 bg-blue-900 font-bold text-white rounded-l ">Edit</div></a> 
                @endif
                @if($discussion->watchedByAuthUser())
                <a href="{{ route('discuss.unwatch', ['id' => $discussion->id])}}"><div class="float-right text-xs ml-3 bg-gray-900 font-bold text-white rounded-l">unWatch</div></a>
                @else
                <a href="{{ route('discuss.watch', ['id' => $discussion->id])}}"><div class="float-right text-xs ml-3 bg-gray-900 font-bold text-white rounded-l">Watch</div></a>
                @endif
            @endauth

            <div class="row">
                <div class="float-right">{{ $discussion->channel->title }}</div>
                <img src="https://i.pravatar.cc/60?u={{ $discussion->user_id }}" width="50" height="35" alt="">
                <h3 class="font-bold">{{ $discussion->user->name }}</h3>
                <span class="text-xs float-right">{{ $discussion->replies->count() }} Replies</span>
                <p class="text-sm">Posted
                    <time>{{ $discussion->created_at->diffForHumans() }}</time>
                </p>
            </div>
            <hr>
            <div>
                <main>
                    <div class="mt-5">
                        {{ $discussion->content }}
                    </div>
                    <hr>
                        <span class="float-right text-sm italic mt-2">{{$discussion->likes->count()}} Likes</span>
                        @auth                            
                            @if($discussion->likedByAuthUser())
                                <button class="bg-blue-400 mt-2 border border-blue-800"><a href="{{route('discuss.unlike', ['id'=> $discussion->id])}}">Unlike</a></button> 
                            @else
                                <button class="bg-blue-400 mt-2 border border-blue-800"><a href="{{route('discuss.like', ['id'=> $discussion->id])}}">Like</a></button> 
                            @endif
                        @endauth
                </main>
            </div>
        </article>
    </section>

    {{-- Display all replies --}}
    @foreach ($replies as $reply)
        <section class="ml-5 mt-2">
            <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
                <div class="flex-shrink-0">
                    <img src="https://i.pravatar.cc/60?u={{ $reply->user_id }}" width="60" height="60" alt="">
                </div>
                <div>
                    <header>
                        <h3 class="font-bold">{{ $reply->user->name }}</h3>
                        <p class="text-xs">Posted
                            <time>{{ $reply->created_at->format('F, j, Y, g:i a') }}</time>
                        </p>
                        <p class="mt-3 text-s">{{ $reply->content }}</p>
                    </header>
                </div>
            </article>
        </section>
    @endforeach

    <div>
        <p class="mt-3">{{ $replies->links() }}</p>
    </div>

    {{-- Create reply --}}
    <form action="{{route('reply.store', ['slug' => $discussion->slug])}}" method="post"
        class="bg-gray-100 border border-gray-200 p-2 rounded-xl mt-3">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width="40"
                height="40" class="rounded-full">
            <h2 class="ml-3">Something to add....</h2>
        </header>
        <div>
            <textarea name="content" class="w-full mt-3 rounded-xl" cols="60" rows="3"
                required></textarea>
            @error('content')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        @auth
        <button type="submit" class="text-white uppercase bg-blue-500 font:semibold text-xs py-2 px-10 rounded-2xl flex">Post</button>
        @else
        <p>Please <a href="{{route('login')}}" class="underline font-bold">Log in</a> to leave comment</p>
        @endauth
    </form>

</x-app-layout>
