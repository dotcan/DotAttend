<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark:[color-scheme:dark]">
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
<body class="bg-gray-50 dark:bg-slate-900">
<!-- ========== MAIN CONTENT ========== -->
@include('layouts.extras.admin-sidebar')

<!-- Content -->
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <!-- Page Heading -->
    <header>
        @if(isset($subhead))
            <p class="mb-2 text-sm font-semibold text-blue-600">{{ $subhead }}</p>
        @endif
        @if(isset($header))
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ $header }}</h1>
        @endif
        @if(isset($description))
                <p class="mt-2 text-lg text-gray-800 dark:text-gray-400">{{ $description }}</p>
        @endif
    </header>
    <!-- End Page Heading -->
    <main id="content" role="main">
        <div class="text-gray-800 dark:text-white">
            {{ $slot }}
        </div>
    </main>
</div>
<!-- End Content -->
<!-- ========== END MAIN CONTENT ========== -->
</body>
</html>
