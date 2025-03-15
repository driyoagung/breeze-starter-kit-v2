<x-app-layout>
    <x-slot name="header">

        @slot('title', 'Stores')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-card class="">
                    <div class="p-6 pb-0">
                        <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}" class="size-16 rounded-lg" />

                    </div>
                    <x-card.header class="">
                        <x-card.title>
                            {{ $store->name }}
                        </x-card.title>
                        <x-card.description>
                            {{ $store->description }}
                        </x-card.description>
                    </x-card.header>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
