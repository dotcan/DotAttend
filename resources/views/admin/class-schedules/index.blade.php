<x-admin-layout subheader="Manage Schedules" header="List of Schedules">
    <x-slot:description>
        Creating new schedules is only available in a class's details page
    </x-slot:description>
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
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

        @foreach($schedules as $schedule)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $schedule->id }}
                </th>

                <td class="px-6 py-4">
                    {{ $schedule->course_class->course->name }} ({{$schedule->course_class->course->crn}}) #{{ $schedule->course_class->id }}
                </td>

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
                    <x-pui.link :href="route('admin.schedules.show', $schedule)"
                                icon="bi-eye"></x-pui.link>
                    <x-pui.link :href="route('admin.schedules.edit', $schedule)"
                                icon="bi-pencil-square"></x-pui.link>
                    <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST">
                        @csrf @method('DELETE')
                        <x-pui.link :href="route('admin.schedules.destroy', $schedule)"
                                    color="text-red-600"
                                    hover-color="bg-red-600" icon="bi-trash3"
                                    onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">
        {{ $schedules->links() }}
    </div>
</x-admin-layout>
