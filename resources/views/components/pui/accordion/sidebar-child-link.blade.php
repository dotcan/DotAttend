@props(['icon'])

@php
    $classes = "flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-400 rounded-md hover:bg-gray-800 hover:text-white select-none cursor-pointer";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @isset($icon)
        <i class="bi {{ $icon }}"></i>
    @endisset
    {{ $slot }}
</a>
