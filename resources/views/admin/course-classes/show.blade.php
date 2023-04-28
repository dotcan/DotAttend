<x-admin-layout subheader="Manage Classes" :header="'Class #' . $class->id">
    <x-slot:description>
        Course:
        <x-pui.link :href="route('admin.courses.show', $class->course)">
            {{ $class->course->name }} ({{$class->course->crn}})
        </x-pui.link>
    </x-slot:description>
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <h3 class="text-3xl">
            Date: <span>{{ $class->duration_date }}</span>
        </h3>
        <div class="mt-4">
            <x-pui.link :href="route('admin.schedules.index', $class)">View Schedules</x-pui.link>
            <i class="bi bi-dot text-gray-500"></i>
            <x-pui.link :href="route('admin.schedules.create', $class)">Create New Schedule</x-pui.link>
        </div>
    </div>
</x-admin-layout>
