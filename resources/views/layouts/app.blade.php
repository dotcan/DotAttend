<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}@if(isset($title)) - {{ $title }}@endif</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-900 flex h-full">
        <div class="max-w-[70rem] flex flex-col mx-auto w-full h-full">
            <!-- ========== HEADER ========== -->
            <header class="mb-auto flex justify-center z-50 w-full py-4">
                <nav class="px-4 sm:px-6 lg:px-8" aria-label="Global">
                    <a class="flex-none text-xl font-semibold sm:text-3xl dark:text-white" href="{{ route('home') }}" aria-label="dotAttend">dotAttend</a>
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
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-gray-400">
                        Built with &#9825; by <span class="text-white decoration-2 font-medium hover:text-gray-200 hover:decoration-gray-400">Nadeem Mousa</span>
                    </p>
                </div>
            </footer>
            <!-- ========== END FOOTER ========== -->
        </div>
    </body>
</html>
