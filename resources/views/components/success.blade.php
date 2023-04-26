@props(['message'])

@if (!empty($message))
    <div class="bg-green-100 rounded-lg py-5 px-6 mb-6 text-base text-green-900 mb-3 font-semibold" role="alert">
        {{ $message ?? '' }}
    </div>
@endif
