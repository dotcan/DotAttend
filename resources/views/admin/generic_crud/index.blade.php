@php
    $stuff = [[], [], [], []];
@endphp
<x-admin-layout subheader="Manage Something" header="List of Things">
    <x-pui.table.work>
        <x-slot:head>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Field 1
            </th>
            <th scope="col" class="px-6 py-3">
                Field 2
            </th>
            <th scope="col" class="px-6 py-3"></th>
        </x-slot:head>

        @foreach($stuff as $something)
            <tr @class(["bg-white dark:bg-gray-900 dark:border-gray-700" => $loop->odd,
                        "bg-gray-50 dark:bg-gray-800 dark:border-gray-700" => $loop->even,
                        "border-b" => !$loop->last])>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <x-pui.link :href="route('home')">{{ __('Edit') }}</x-pui.link>
                </td>
            </tr>
        @endforeach
    </x-pui.table.work>
</x-admin-layout>
