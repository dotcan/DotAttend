<x-teacher-layout subheader="Manage Attendances" header="Editing Attendance">
    <x-slot:description>
        For {{ $attendance->user->name }} ({{ $attendance->user->id }})
        enrolled in {{ $attendance->class_schedule->course_class->course->name }}
    </x-slot:description>
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <form action="{{ route('teacher.attendances.update', $attendance) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="is_absent" name="is_absent" type="checkbox" value="1"
                           @checked($attendance->absence ? 1 : 0)
                           class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                </div>
                <label for="is_absent" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Mark As Absent
                </label>
            </div>
            <div class="mb-6">
                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Reason
                </label>
                <input type="text" id="reason" name="reason" value="{{ $attendance->absence->reason ?? '' }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="To mark as a notified absence">
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-teacher-layout>
