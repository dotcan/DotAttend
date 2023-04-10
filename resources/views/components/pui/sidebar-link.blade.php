@props(['active', 'icon'])

@php
    $classes = ($active ?? false)
            ? "flex items-center gap-x-3 py-2 px-2.5 bg-gray-700 text-sm text-white rounded-md select-none cursor-pointer"
            : "flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-400 rounded-md hover:bg-gray-800 hover:text-white-300 select-none";
    if ($active)
        $attributes['href'] = null;
@endphp

{{--<li {{ $attributes->merge(['class' => ['hs-accordion' => $is_accordion]]) }}>--}}
<a {{ $attributes->merge(['class' => $classes]) }}>
    @isset($icon)
        <i class="bi {{ $icon }}"></i>
    @endisset
    {{ $slot }}
</a>
{{--</li>--}}
