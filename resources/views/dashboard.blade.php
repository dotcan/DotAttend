<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="pb-6 text-gray-900 dark:text-gray-100">
                    <x-pui.link :href="route('home')" icon="bi-house" class="mr-6">{{ __('Home') }}</x-pui.link>
                </div>
                <div class="pb-6 text-gray-900 dark:text-gray-100">
                    <x-pui.link :href="route('profile.edit')" icon="bi-person">{{ __('Profile') }}</x-pui.link>
                </div>
                <div class="pb-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-pui.link :href="route('logout')" color="text-red-600" hover-color="bg-red-600"
                                    icon="bi-box-arrow-left"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-pui.link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
