<x-app-layout>
    <x-slot name="header">
        {{-- <x-slot name="title">
            Dashboard

        </x-slot> --}}
        @slot('title', 'Home')
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 ">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </x-container>
</x-app-layout>
