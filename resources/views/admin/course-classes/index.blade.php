<x-admin-layout subheader="Manage Classes" header="List of Classes">
    <div class="mt-4">
        @isset($course)
            <x-slot:description>
                Course: {{ $course->name }} ({{$course->crn}})
            </x-slot:description>
            <x-pui.link :href="route('admin.classes.create', $course)" icon="bi-file-plus">
                Create New Class
            </x-pui.link>
        @else
            <x-slot:description>
                Creating new classes is only available in a course's details page
            </x-slot:description>
        @endisset
    </div>
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Course
            </th>
            <th scope="col" class="px-6 py-3">
                Duration Date
            </th>
            @isset($course)
                <th scope="col" class="px-6 py-3">
                    Expected Sessions
                </th>
            @endisset
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($classes as $class)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $class->id }}
                </th>

                <td class="px-6 py-4">
                    {{ $class->course->name }} ({{$class->course->crn}})
                </td>

                <td class="px-6 py-4">
                    {{ $class->duration_date }}
                </td>

                @isset($course)
                    <td class="px-6 py-4">
                        {{-- N+1 --}}
                        {{ $class->getExpectedNumberOfClasses() }}
                        <x-pui.link :href="route('admin.schedules.create', [$course, $class])"
                                    icon="bi-plus-square"></x-pui.link>
                    </td>
                @endisset

                <td class="px-6 py-4 flex float-right gap-4">
                    @isset($course)
                        <x-pui.link :href="route('admin.classes.show', [$course, $class])" icon="bi-eye"></x-pui.link>
                        <x-pui.link :href="route('admin.classes.edit', [$course, $class])"
                                    icon="bi-pencil-square"></x-pui.link>
                        <form action="{{ route('admin.classes.destroy', [$course, $class]) }}" method="POST">
                            @csrf @method('DELETE')
                            <x-pui.link :href="route('admin.classes.destroy', [$course, $class])" color="text-red-600"
                                        hover-color="bg-red-600" icon="bi-trash3"
                                        onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                        </form>
                    @else
                        <x-pui.link :href="route('admin.courses.show', $class->course)" icon="bi-eye"></x-pui.link>
                    @endisset
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">
        {{ $classes->links() }}
    </div>
</x-admin-layout>
