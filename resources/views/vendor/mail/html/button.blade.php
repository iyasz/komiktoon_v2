@props([
    'url',
    'color' => 'primary',
])

<div class="text-center my-5">
    <a href="{{ $url }}" class="btn btn-primary border-0 py-3 px-4" target="_blank" rel="noopener">{{ $slot }}</a>
</div>
