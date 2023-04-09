<x-app-layout>
    @auth
        <h2 class="block text-2xl font-bold text-white">Hey, {{ auth()->user()->shortLastName }} 👋🏼</h2>

        <div class="mt-3">
            <a href="{{ route('attendances.index') }}"
               class="relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100">
                <i class="bi bi-person-bounding-box"></i>
                Attendance
            </a>
        </div>
    @else
        <h2 class="block text-2xl font-bold text-gray-500 sm:text-4xl mb-4">Hello There 👋🏼</h2>
        <a href="{{ route('login') }}"
           class="mr-4 relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100">
            <i class="bi bi-box-arrow-in-right"></i>
            Login</a>
    @endauth
</x-app-layout>
