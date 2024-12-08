<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-primary-button class="btn fs-4 text-white fs-2" style="background: linear-gradient(to left,#FF0000,#910000);">
            {{ __('LOGOUT') }}
        </x-primary-button>
    </form>
</x-app-layout>
