<x-admin-layout subheader="Manage Classes" :header="'Editing Class #' . $class->id">
    <x-slot:description>
        Course: {{ $class->course->name }} ({{$class->course->crn}})
    </x-slot:description>
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <form action="{{ route('admin.classes.update', $class) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Starting Date
                </label>
                <input type="date" id="start_date" name="start_date" value="{{ $class->start_date }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required>
            </div>
            <div class="mb-6">
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Ending Date
                </label>
                <input type="date" id="end_date" name="end_date" value="{{ $class->end_date }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required>
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-admin-layout>
