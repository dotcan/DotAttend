<!-- Sidebar Toggle -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center py-4">
        <!-- Navigation Toggle -->
        <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar-dark" aria-controls="application-sidebar-dark" aria-label="Toggle navigation">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <!-- End Navigation Toggle -->

        <!-- Breadcrumb -->
        <ol class="ml-3 flex items-center whitespace-nowrap min-w-0" aria-label="Breadcrumb">
            <li class="flex items-center text-sm text-gray-800 dark:text-gray-400">
                Admin Dashboard
                <i class="bi bi-chevron-right flex-shrink-0 mx-3 overflow-visible text-gray-400 dark:text-gray-600"></i>
            </li>
            <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-400" aria-current="page">
                @isset($subhead)
                    {{ $subhead }}
                @endisset
            </li>
        </ol>
        <!-- End Breadcrumb -->
    </div>
</div>
<!-- End Sidebar Toggle -->

<!-- Sidebar -->
<div id="application-sidebar-dark" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] w-64 bg-gray-900 border-r border-gray-800 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold text-white" href="{{ route('admin.dashboard') }}" aria-label="Brand">{{ config('app.name') }}</a>
        <a class="float-right text-gray-500" href="{{ route('home') }}"><i class="bi bi-house-door"></i></a>
    </div>

    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <x-pui.sidebar-link :href="route('admin.dashboard')" icon="bi-house"
                                    :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </x-pui.sidebar-link>
            </li>
            <li>
                <x-pui.sidebar-link :href="route('admin.users.index')" icon="bi-people"
                                    :active="request()->routeIs('admin.users.index')">
                    {{ __('Users') }}
                </x-pui.sidebar-link>
            </li>
            <li>
                <x-pui.sidebar-link :href="route('admin.cards.index')" icon="bi-wallet"
                                    :active="request()->routeIs('admin.cards.index')">
                    {{ __('Cards') }}
                </x-pui.sidebar-link>
            </li>

            <li class="hs-accordion" id="courses-accordion">
                <x-pui.accordion.sidebar-link icon="bi-book">{{ __('Courses') }}</x-pui.accordion.sidebar-link>

                <div id="courses-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="pt-2 pl-2">
                        <li>
                            <x-pui.accordion.sidebar-child-link :href="route('admin.courses.index')">{{ __('Manage Courses') }}</x-pui.accordion.sidebar-child-link>
                        </li>
                        <li>
                            <x-pui.accordion.sidebar-child-link :href="route('admin.classes.index')">{{ __('Manage Classes') }}</x-pui.accordion.sidebar-child-link>
                        </li>
                        <li>
                            <x-pui.accordion.sidebar-child-link :href="route('admin.schedules.index')">{{ __('Manage Schedules') }}</x-pui.accordion.sidebar-child-link>
                        </li>
                        <li>
                            <x-pui.accordion.sidebar-child-link :href="route('admin.sessions.index')">{{ __('Manage Sessions') }}</x-pui.accordion.sidebar-child-link>
                        </li>
                        <li>
                            <x-pui.accordion.sidebar-child-link :href="route('admin.enrollments.index')">{{ __('Manage Enrollments') }}</x-pui.accordion.sidebar-child-link>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <x-pui.sidebar-link :href="route('admin.rfid.index')" icon="bi-upc-scan"
                                    :active="request()->routeIs('admin.rfid.index')">
                    {{ __('RFID Scanners') }}
                </x-pui.sidebar-link>
            </li>

            <li>
                <x-pui.sidebar-link :href="route('admin.attendances.index')" icon="bi-person-circle"
                                    :active="request()->routeIs('admin.attendances.index')">
                    {{ __('Attendances') }}
                </x-pui.sidebar-link>
            </li>

            @if(config('app.debug'))
                <li>
                    <x-pui.sidebar-link :href="route('telescope')" icon="bi-moon" target="_blank">
                        {{ __('Telescope') }}
                    </x-pui.sidebar-link>
                </li>
            @endif
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
