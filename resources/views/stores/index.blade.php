<x-app-layout>
    <x-slot name="header">

        @slot('title', 'Stores')
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-card class="relative">
                    <a href="{{ route('stores.show', $store) }}" class="absolute inset-0 size-full"></a>
                    <div class="p-6 pb-0">
                        @if ($store->logo)
                            <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                                class="size-16 rounded-lg" />
                        @else
                            <div class="size-16 rounded-lg bg-zinc-700"></div>
                        @endif
                    </div>
                    <x-card.header class="">
                        <x-card.title>
                            {{ $store->name }}
                        </x-card.title>
                        <x-card.description>
                            {{ str($store->description)->limit(100) }}
                        </x-card.description>
                        @auth
                            @if ($store->user_id === auth()->user()->id)
                                <div class="flex justify-end">
                                    <a href="{{ route('stores.edit', $store) }}" class="text-blue-500">Edit</a>
                                </div>
                            @endif
                        @endauth
                    </x-card.header>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
