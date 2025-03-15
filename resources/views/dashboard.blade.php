<x-app-layout>
    <x-slot name="header">
        {{-- <x-slot name="title">
            Dashboard

        </x-slot> --}}
        @slot('title', 'Dashboard')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </x-container>
</x-app-layout>
