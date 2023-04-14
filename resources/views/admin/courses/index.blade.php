<x-admin-layout subheader="Manage Courses" header="List of Courses">
    <div class="mt-4">
        <x-pui.link :href="route('admin.courses.create')" icon="bi-file-plus">
            Create New Course
        </x-pui.link>
    </div>
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                CRN
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($courses as $course)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $course->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $course->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $course->crn }}
                </td>
                <td class="px-6 py-4 flex float-right gap-4">
                    <x-pui.link :href="route('admin.courses.show', $course)" icon="bi-eye"></x-pui.link>
                    <x-pui.link :href="route('admin.courses.edit', $course)" icon="bi-pencil-square"></x-pui.link>
                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                        @csrf @method('DELETE')
                        <x-pui.link :href="route('admin.courses.destroy', $course)" color="text-red-600"
                                    hover-color="bg-red-600" icon="bi-trash3"
                                    onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</x-admin-layout>
