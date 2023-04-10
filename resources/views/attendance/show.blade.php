@php /** @var \App\Models\Attendance $attendance */ @endphp
<x-app-layout>
    <h2 class="block text-2xl font-bold text-white">Report
        <span class="text-sm text-gray-500">#{{ str(md5($attendance->id))->limit(8) }}</span>
    </h2>
</x-app-layout>
