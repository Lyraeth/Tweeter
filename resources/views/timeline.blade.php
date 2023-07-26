<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tweet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-primary">
                <div class="card-body">
                    <form action="{{ route('tweet.store') }}" method="post">
                        @csrf
                        <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Apa yang sedang kamu pikirkan?"
                            rows="3"></textarea>
                        <input type="submit" value="Tweet" class="btn btn-accent">
                    </form>
                </div>
            </div>
            @foreach ($tweets as $tweet)
                <div class="card my-4 bg-primary">
                    <div class="card-body">
                        <h2 class="text-xl font-bold">{{ $tweet->user->name }}</h2>
                        <span class="text-end">{{ $tweet->created_at->diffForHumans() }}</span>
                        <hr>
                        <p>{{ $tweet->content }}</p>
                        @can('update', $tweet)
                            <div class="text-end">
                                <a href="{{ route('tweet.edit', $tweet->id) }}" class="link link-hover text-green-400">Edit
                                </a>
                            </div>
                        @endcan
                        @can('delete', $tweet)
                            <form action="{{ route('tweet.destroy', $tweet->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
