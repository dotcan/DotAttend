<x-admin-layout subheader="Manage Schedules" header="Create New Schedule">
    <x-slot:description>
        Class #{{ $class->id }}
    </x-slot:description>
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <form action="{{ route('admin.schedules.store') }}" method="POST">
            @csrf
            <input type="hidden" name="course_class_id" value="{{ $class->id }}"/>
            <div class="mb-6">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Location
                </label>
                <input type="text" id="location" name="location"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="flex gap-x-6 mb-6">
                @for($i=0; $i<7; $i++)
                    @php $day = now()->startOfWeek()->addDays($i)->dayName @endphp
                    <div class="flex">
                        <input type="checkbox" name="days[]" value="{{ $day }}" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-checkbox-group-{{$i}}">
                        <label for="hs-checkbox-group-{{$i}}" class="text-sm text-gray-500 ml-3 dark:text-gray-400">{{ $day }}</label>
                    </div>
                @endfor
            </div>

            <div class="mb-6">
                <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Starting Time
                </label>
                <input type="time" id="start_time" name="start_time"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required>
            </div>
            <div class="mb-6">
                <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Ending Time
                </label>
                <input type="time" id="end_time" name="end_time"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required>
                <span class="text-xs text-gray-500">Ending time will be **:**:59 seconds | i.e, 09:29:59 AM</span>
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-admin-layout>
