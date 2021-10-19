<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @foreach ($discussions as $d)
        <section class="col-span-8 col-start-5 mt-2">
            <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
                <div class="flex-shrink-0">
                    <img src="https://i.pravatar.cc/60?u=id{{ $d->user->avatar }}" width="60" height="60" alt="">
                </div>
                <div>
                    <header>
                        <h3 class="font-bold">{{ $d->user->name }}</h3>
                        <p class="text-xs">Posted
                            <time>{{ $d->created_at->format('F, j, Y, g:i a') }}</time>
                        </p>
                        <p class="mt-3 text-s">{{ $d->content }}</p>
                    </header>
                </div>
            </article>
    @endforeach

</x-app-layout>
