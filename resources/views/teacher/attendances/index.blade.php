<x-teacher-layout subheader="Manage Attendance" header="List of Attendances">
    <x-slot:description>
        @if(!empty($attendances))
            For {{  $attendances->first()->class_schedule->course_class->course->name }}
        @endif
    </x-slot:description>
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                Student
            </th>
            <th scope="col" class="px-6 py-3">
                Schedule
            </th>
            <th scope="col" class="px-6 py-3">
                Absent
            </th>
            <th scope="col" class="px-6 py-3">
                Timestamp
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($attendances as $att)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $att->user->short_last_name }} ({{$att->user->id}})
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.schedules.show', [$att->class_schedule->course_class->course, $att->class_schedule->course_class, $att->class_schedule]) }}">
                        {{ $att->class_schedule->start_time_formatted }}
                        - {{ $att->class_schedule->end_time_formatted }}
                    </a>
                </td>
                <td class="px-6 py-4">
                    @if($att->absence)
                        @if($att->absence->id != 1 && $att->absence->reason)
                            Notified
                        @else
                            Yes
                        @endif
                    @else
                        No
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{ $att->created_at->format('h:i A d/m/y') }}
                </td>
                <td class="px-6 py-4 flex float-right gap-4">
                    <x-pui.link :href="route('teacher.attendances.edit', $att)" icon="bi-pencil-square"></x-pui.link>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">
        {{ $attendances->links() }}
    </div>
</x-teacher-layout>
