<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full [color-scheme:dark]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}@if(isset($title))
            - {{ $title }}
        @endif</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 flex h-full selection:text-indigo-300 selection:bg-indigo-800 selection:rounded">
<div class="max-w-[70rem] flex flex-col mx-auto w-full h-full">
    <!-- ========== HEADER ========== -->
    <header class="mb-auto flex justify-center z-50 w-full py-4">
        <nav class="px-4 sm:px-6 lg:px-8" aria-label="Global">
            <a class="flex-none text-xl font-semibold sm:text-3xl dark:text-white select-none" href="{{ route('home') }}"
               aria-label="dotAttend">dotAttend</a>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <footer class="mt-auto text-center py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 select-none">
            @auth
                <div class="flex text-center justify-center gap-6 mb-1 text-sm">
                    <x-pui.link :href="route('home')" icon="bi-house">{{ __('Home') }}</x-pui.link>
                    <x-pui.link :href="route('dashboard')" icon="bi-gear-wide">{{ __('Settings') }}</x-pui.link>
                </div>
            @endauth
            <p class="text-xs text-gray-400">
                Made with <i class="bi bi-heart text-xs"></i> by the <span
                    class="text-white decoration-2 font-medium hover:text-gray-200 hover:decoration-gray-400">DotCan Team</span>
            </p>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->
</div>
</body>
</html>
