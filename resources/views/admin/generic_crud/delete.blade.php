<x-admin-layout subheader="Manage Something" header="Delete Thing">
    <div class="max-w-3xl lg:py-16">
        <form action="{{ route('home') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="mb-6">
                <h3 class="text-lg">Are you sure?</h3>
                <p class="text-xs text-gray-400">This action cannot be undone</p>
            </div>
            <button type="submit"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Yes, delete thing
            </button>
        </form>
    </div>
</x-admin-layout>
