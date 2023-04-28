<x-admin-layout subheader="Manage RFID Scanners" header="List of Scanners">
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Location
            </th>
            <th scope="col" class="px-6 py-3">
                Marking Attendance
            </th>
            <th scope="col" class="px-6 py-3">
                ESP
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($scanners as $scan)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $scan->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $scan->location ?? 'None' }}
                </td>
                <td class="px-6 py-4">
                    {{ $scan->is_marking_attendance ? 'Yes' : 'No' }}
                </td>
                <td class="px-6 py-4">
                    {{ $scan->esp_id ?? 'Not Set' }}
                </td>
                <td class="px-6 py-4 flex float-right gap-4">
                    <x-pui.link :href="route('admin.rfid.show', $scan)" icon="bi-eye"></x-pui.link>
                    <x-pui.link :href="route('admin.rfid.edit', $scan)" icon="bi-pencil-square"></x-pui.link>
                    <form action="{{ route('admin.rfid.destroy', $scan) }}" method="POST">
                        @csrf @method('DELETE')
                        <x-pui.link :href="route('admin.rfid.destroy', $scan)" color="text-red-600"
                                    hover-color="bg-red-600" icon="bi-trash3"
                                    onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    {{ $scanners->links() }}
</x-admin-layout>
