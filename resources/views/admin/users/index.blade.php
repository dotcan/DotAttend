<x-admin-layout subheader="Manage Users" header="List of Users">
    <div class="mt-4">
        <x-pui.link :href="route('admin.users.create')" icon="bi-file-plus">
            Create New User
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
                Type
            </th>
            <th scope="col" class="px-6 py-3">
                Card
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @php /** @var \App\Models\User[] $users */ @endphp
        @foreach($users as $user)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->type }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->card ? $user->card->rfid_tag : 'None' }}
                </td>
                <td class="px-6 py-4 flex float-right gap-4">
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                        @csrf @method('DELETE')
                        <x-pui.link :href="route('admin.users.destroy', $user)" color="text-red-600"
                                    hover-color="bg-red-600" icon="bi-trash3"
                                    onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</x-admin-layout>
