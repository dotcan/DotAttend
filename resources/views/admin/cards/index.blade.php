<x-admin-layout subheader="Manage Cards" header="List of RFID Cards">
    <div class="mt-4">
        <x-pui.link :href="route('admin.cards.create')" icon="bi-file-plus">
            Create New Card
        </x-pui.link>
    </div>
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Tag
            </th>
            <th scope="col" class="px-6 py-3">
                User
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($cards as $card)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $card->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $card->rfid_tag }}
                </td>
                <td class="px-6 py-4">
                    {{ $card->user_id ? $card->user->name . ' (' . $card->user->id . ')' : 'No one' }}
                </td>
                <td class="px-6 py-4 flex float-right gap-4">
                    <form action="{{ route('admin.cards.destroy', $card) }}" method="POST">
                        @csrf @method('DELETE')
                        <x-pui.link :href="route('admin.cards.destroy', $card)" color="text-red-600"
                                    hover-color="bg-red-600" icon="bi-trash3"
                                    onclick="event.preventDefault(); this.closest('form').submit();"></x-pui.link>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
    <div class="mt-4">{{ $cards->links() }}</div>
</x-admin-layout>
