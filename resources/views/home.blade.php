@php
    $hour = now()->hour;
    if ($hour >= 0 && $hour < 12)
        $greet = ['Good Morning', '🌞'];
    elseif ($hour >= 12 && $hour < 16)
        $greet = ['Good Afternoon', '⛅'];
    elseif ($hour >= 16)
        $greet = ['Good Evening', '🌙'];
    else
        $greet = ['Hey', '👋🏼'];
@endphp
<x-app-layout>
    @auth
        <h2 class="block text-2xl font-bold text-white">{{ $greet[0] }}, {{ auth()->user()->short_last_name }} {{ $greet[1] }}</h2>
        <div class="mt-3">
            <x-pui.link :href="route('attendances.index')" icon="bi-person-bounding-box">{{ __('Attendance') }}</x-pui.link>
        </div>
    @else
        <h2 class="block text-2xl font-bold text-gray-500 sm:text-4xl mb-4">Hello There 👋🏼</h2>
        <x-pui.link :href="route('login')" icon="bi-box-arrow-in-right">{{ __('Login') }}</x-pui.link>
    @endauth
</x-app-layout>
