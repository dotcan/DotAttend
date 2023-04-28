<x-admin-layout subheader="Manage Courses" :header="'Course #' . $course->id">
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <h3 class="text-3xl">
            {{ $course->name }}
            <span class="text-sm text-gray-500">{{ $course->crn }}</span>
        </h3>
        <div class="mt-4">
            <x-pui.link :href="route('admin.classes.index', ['course' => $course->id])">View Classes</x-pui.link>
            <i class="bi bi-dot text-gray-500"></i>
            <x-pui.link :href="route('admin.classes.create', ['course' => $course->id])">Create New Class</x-pui.link>
        </div>

        <div>
            <x-pui.table.work>
                <x-slot:head>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duration Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expected Sessions
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </x-slot:head>

                @foreach($course->courseClasses as $class)
                    <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $class->id }}
                        </th>

                        <td class="px-6 py-4">
                            {{ $class->duration_date }}
                        </td>

                        <td class="px-6 py-4">
                            {{-- N+1 --}}
                            {{ $class->getExpectedNumberOfClasses($class->classSchedules[0] ?? null) }}
                            <x-pui.link :href="route('admin.schedules.create', ['class' => $class])"
                                        icon="bi-plus-square"></x-pui.link>
                        </td>

                        <td class="px-6 py-4 flex float-right gap-4">
                            <x-pui.link :href="route('admin.classes.show', $class)"
                                        icon="bi-eye"></x-pui.link>
                            <x-pui.link :href="route('admin.classes.edit', $class)"
                                        icon="bi-pencil-square"></x-pui.link>
                            <form action="{{ route('admin.classes.destroy', $class) }}" method="POST">
                                @csrf @method('DELETE')
                                <x-pui.link :href="route('admin.classes.destroy', $class)"
                                            color="text-red-600"
                                            hover-color="bg-red-600" icon="bi-trash3"
                                            onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-pui.table.work>
        </div>
    </div>
</x-admin-layout>
