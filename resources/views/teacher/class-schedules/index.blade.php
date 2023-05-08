<x-teacher-layout subheader="Manage Schedules" header="List of Schedules">
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


    </x-pui.table.work>
    <div class="mt-4">
    </div>
</x-teacher-layout>
