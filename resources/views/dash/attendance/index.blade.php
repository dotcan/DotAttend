<x-app-layout>
    <h2 class="block text-2xl font-bold text-white">Your Attendance</h2>
    <div class="mt-3">
{{--        <a href="{{ request.url_for('home_user', user_id=user.id) }}"--}}
        <a href="{{ route('home') }}"
           class="relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100">
            <i class="bi bi-house"></i>
            Home
        </a>
    </div>

    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                        <!-- Header -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    Courses
                                </h2>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                            <tr>
                                <th scope="col" class="pl-6 py-3 text-left"></th>

                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Name
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Schedule
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
                      Completion
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-left">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Last Session
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-right"></th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
{{--                            @foreach($enrollments as $enr)--}}
                            <tr>
                                <td class="h-px w-px whitespace-nowrap">
                                    <div class="pl-6 py-3"></div>
                                </td>
                                <td class="h-px w-px whitespace-nowrap">
                                    <div class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3">
                                        <div class="flex items-center">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ 'course name' }}</span>
                                            <span class="block text-sm text-gray-500 ml-2 uppercase">{{ 'crn' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="h-px w-72 whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ 'sched start' }}-{{ 'sched end' }}</span>
                                        <span class="block text-sm text-gray-500">{{ 'days' }}</span>
                                    </div>
                                </td>
                                <td class="h-px w-px whitespace-nowrap">
                                    <div class="px-6 py-3">
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                      <i class="bi bi-check-circle-fill"></i>
                      Active
                    </span>
                                    </div>
                                </td>
                                <td class="h-px w-px whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <span class="text-xs text-gray-500">{{ 'num' }}</span>
                                            <div class="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                                                <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-gray-200" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="h-px w-px whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500">28 Dec, 12:12</span>
                                    </div>
                                </td>
                                <td class="h-px w-px whitespace-nowrap">
                                    <div class="px-6 py-1.5">
                                        <a class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium" href="#">
                                            <i class="bi bi-journal"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
{{--                            @endforeach--}}
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
