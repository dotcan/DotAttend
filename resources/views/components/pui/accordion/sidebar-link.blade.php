@props(['icon'])

@php
    $classes = "hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-gray-400 rounded-md hover:bg-gray-800 hover:text-white select-none cursor-pointer";
    $attributes['href'] = null;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @isset($icon)
        <i class="bi {{ $icon }}"></i>
    @endisset
    {{ $slot }}
    <i class="bi bi-chevron-up hs-accordion-active:block ml-auto hidden text-gray-600 group-hover:text-gray-500"></i>
    <i class="bi bi-chevron-down hs-accordion-active:hidden ml-auto block text-gray-600 group-hover:text-gray-500"></i>
</a>
