@props(['color' => 'text-indigo-600', 'hoverColor' => 'bg-indigo-600', 'icon'])
<a {{ $attributes->merge(['class' => "relative font-medium $color before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:$hoverColor before:transition hover:before:scale-100"]) }}>
    @if(isset($icon))<i class="bi {{ $icon }}"></i>@endif
    {{ $slot }}
</a>
