<x-app-layout>
    <x-slot name="header">
        {{-- <x-slot name="title">
            Dashboard

        </x-slot> --}}
        @slot('title', 'Dashboard')
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card class="p-6">
            {{ __("You're logged in!") }}

        </x-card>
    </x-container>
</x-app-layout>
