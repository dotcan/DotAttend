@php /** @var \App\Models\ClassSchedule $schedule */ @endphp
<x-app-layout>
    <h2 class="block text-2xl font-bold text-white">Attendance Report
        of {{ $schedule->course_class->course->name }}
        <span class="text-gray-500 text-xs">{{ str($schedule->course_class->course->crn)->limit(8) }}</span>
    </h2>

    <!-- Table Section -->
    <div class="max-w-[100rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                            <tr>
                                <th scope="col" class="pl-6 py-3 text-left"></th>

                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      ID
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Status
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Reason
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Logged
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-right"></th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @php /** @var \App\Models\Attendance $attendance */ @endphp
                            @foreach($schedule->enrollments[0]->attendances as $attendance)
                                <tr>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="pl-6 py-3"></div>
                                    </td>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3">
                                            <div class="flex items-center">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ str(md5($attendance->id))->limit(8) }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    @php $absence = $attendance->absence @endphp
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                    <span @class(["inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium",
                                  "bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200" => !$absence,
                                  "bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200" => $absence && ($absence->id == 1 || !$absence->reason),
                                  "bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200" => $absence && ($absence->id != 1 && $absence->reason)
                                  ])>
                      <i @class(["bi", "bi-check-circle-fill" => !$absence, 'bi-x-circle-fill' => $absence && ($absence->id == 1 || !$absence->reason), 'bi-dash-circle-fill' => $absence && ($absence->id != 1 && $absence->reason)])></i>
                      {{ $absence ? 'Absent' : 'Attended' }}
                    </span>
                                        </div>
                                    </td>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                               <span class="text-xs text-gray-500">
                                                    {{ $absence ? $absence->reason : '' }}
                                               </span>
                                                @if(!isset($absence->reason))
                                                    <div
                                                        class="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                                                        <div
                                                            class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-gray-200"
                                                            role="progressbar" style="width: 0" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span
                                                class="text-sm text-gray-500">{{ $attendance->created_at->format('d M Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                               href="{{ route('attendances.show', $attendance) }}">
                                                <i class="bi bi-journal"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
</x-app-layout>
