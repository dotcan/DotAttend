<div class="px-6">
    <a class="flex-none text-xl font-semibold text-white" href="{{ route('teacher.dashboard') }}" aria-label="Brand">{{ config('app.name') }}</a>
    <a class="float-right text-gray-500" href="{{ route('home') }}"><i class="bi bi-house-door"></i></a>
</div>

<nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="space-y-1.5">
        <li>
            <x-pui.sidebar-link :href="route('teacher.dashboard')" icon="bi-house"
                                :active="request()->routeIs('teacher.dashboard')">
                {{ __('Dashboard') }}
            </x-pui.sidebar-link>
        </li>
        <li>
            <x-pui.sidebar-link :href="route('teacher.schedules.index')" icon="bi-view-list"
                                :active="request()->routeIs('teacher.schedules.index')">
                {{ __('Schedules') }}
            </x-pui.sidebar-link>
        </li>
    </ul>
</nav>
