<x-teacher-layout subheader="Teacher's Dashboard" header="List of Schedules">
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                Course
            </th>
            <th scope="col" class="px-6 py-3">
                Location
            </th>
            <th scope="col" class="px-6 py-3">
                Days
            </th>
            <th scope="col" class="px-6 py-3">
                Duration
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($enrollments as $enrollment)
            @php $schedule = $enrollment->class_schedule @endphp
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $schedule->course_class->course->name }} ({{$schedule->course_class->course->crn}})
                    #{{ $schedule->course_class->id }}
                </th>

                <td class="px-6 py-4">
                    {{ $schedule->location ?? 'Not set' }}
                </td>

                <td class="px-6 py-4">
                    {{ $schedule->days_formatted }}
                </td>

                <td class="px-6 py-4">
                    {{ $schedule->start_time_formatted }} to {{ $schedule->end_time_formatted }}
                </td>

                <td class="px-6 py-4 flex float-right gap-4">
                    <x-pui.link :href="route('teacher.schedules.show', $schedule)"
                                icon="bi-eye"></x-pui.link>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">
        {{ $enrollments->links() }}
    </div>
</x-teacher-layout>
