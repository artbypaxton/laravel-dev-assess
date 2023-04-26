<x-app-layout :user="$user">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-success :message="(session('success') ?? '')"></x-success>

                    <article class="mx-auto w-full max-w-3xl format format-sm sm:format-base lg:format-lg format-blue">
                        <header class="mb-4 lg:mb-6 not-format">
                            <address class="flex items-center mb-6 not-italic">
                                <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                                    <div>
                                        <span class="text-xl font-bold text-gray-900">{{ $post->user->name }}</span>
                                        <p class="text-base font-light text-gray-400 dark:text-gray-400"><time pubdate datetime="{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}" title="{{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}">Originally Published: {{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}</time></p>
                                        <p class="text-base font-light text-gray-400 dark:text-gray-400"><time pubdate datetime="{{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d') }}" title="{{ \Carbon\Carbon::parse($post->updated_at)->format('F jS, Y') }}">Last Updated: {{ \Carbon\Carbon::parse($post->updated_at)->format('F jS, Y') }}</time></p>
                                    </div>
                                </div>
                            </address>
                        </header>

                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">{{ $post->title }}</h1>

                        <img class="mb-4" src="{{ !empty($post->img_url) ? '/storage/' . $post->img_url : 'https://placehold.co/600x400' }}" alt="{{ $post->title }}">

                        <p class="lead font-bold mb-4">{{ $post->description }}</p>

                        <div class="text-gray-400">
                            {!! $post->content !!}
                        </div>

                        @if ($user->id == $post->user_id)
                            <div class="text-right">
                                <a class="mt-6 inline-block" href="/posts/{{ $post->id }}/edit">Edit Post</a>
                            </div>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
