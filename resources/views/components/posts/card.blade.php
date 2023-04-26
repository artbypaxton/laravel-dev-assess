@props(['post'])

<article class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex p-4 mb-4 flex-row">
    <img class="max-w-[200px] mr-4 mb-0" src="{{ !empty($post->img_url) ? '/storage/' . $post->img_url : 'https://placehold.co/600x400' }}" alt="{{ $post->title }}">

    <div class="flex-1">
        <h1 class="font-extrabold leading-tight text-gray-900 mb-4 text-2xl">{{ $post->title }}</h1>

        <p class="text-sm text-ellipsis overflow-hidden ... mb-4">
            {{ $post->description }}
        </p>
    </div>

    <div class="self-end w-[90px] text-right">
        <a href="/posts/{{ $post->id }}">Read more</a>
    </div>
</article>
