@props(['action', 'buttonText', 'post' => null])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $post->title ?? ''" required autofocus autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="img_url" :value="__('Image')" />
        <x-text-input id="img_url" class="p-2 border block mt-1 w-full" type="file" name="img_url" :value="old('img_url')" />
        <x-input-error :messages="$errors->get('img_url')" class="mt-2" />

        @if (!empty($post->img_url))
            <div class="flex mt-4">
                <p class="mr-4">Current Image:</p>
                <img class="max-w-[100px]" src="/storage/{{ $post->img_url }}" alt="{{ $post->img_url ?? 'NA' }}">
            </div>
        @endif
    </div>

    <div class="mt-4">
        <x-input-label for="description" :value="__('Description')" />
        <x-textarea-input id="description" class="p-2 border block mt-1 w-full resize-none" type="file" name="description" required autofocus autocomplete="description" rows="6">{{old('description') ?? $post->description ?? ''}}</x-textarea-input>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="content" :value="__('Content (Can include HTML)')" />
        <x-textarea-input id="content" class="p-2 border block mt-1 w-full resize-none" type="file" name="content" required autofocus autocomplete="content" rows="6">{{old('content') ?? $post->content ?? ''}}</x-textarea-input>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (!empty($post))
            <a href="/posts/{{ $post->id }}">View Post</a>
        @endif

        <x-primary-button class="ml-4">
            {{ $buttonText }}
        </x-primary-button>
    </div>
</form>
