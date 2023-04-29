<x-admin-layout subheader="Manage Schedules" :header="'Schedule #' . $schedule->id">
    <x-slot:description>
        Course: {{ $schedule->course_class->course->name }} ({{$schedule->course_class->course->crn}})
        #{{ $schedule->course_class->id}}
    </x-slot:description>
    <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
        <h3 class="text-3xl">
            Location: <span>{{ $schedule->location }}</span><br/>
            Days: <span>{{ $schedule->days_formatted }}</span><br/>
            From <span>{{ $schedule->start_time_formatted }} to {{ $schedule->end_time_formatted }}</span>
        </h3>
        <div class="mt-4">
            <x-pui.link :href="route('admin.enrollments.create', ['schedule' => $schedule])">Enroll Users</x-pui.link>
            <i class="bi bi-dot text-gray-500"></i>
            <x-pui.link :href="route('admin.enrollments.index', ['schedule' => $schedule])">View Enrollments</x-pui.link>
            <i class="bi bi-dot text-gray-500"></i>
            <x-pui.link :href="route('admin.sessions.index', ['schedule' => $schedule])">View Sessions</x-pui.link>
            <i class="bi bi-dot text-gray-500"></i>
            <x-pui.link :href="route('admin.attendances.index', ['schedule' => $schedule])">View Attendances</x-pui.link>
        </div>
    </div>
</x-admin-layout>
