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
