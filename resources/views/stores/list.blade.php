@use('App\Enums\StoreStatus')
<x-app-layout>
    <x-slot name="header">
        @slot('title', 'List Store')
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('List Store') }}
        </h2>
    </x-slot>

    <x-container>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-stores.item :$isAdmin :$store />
            @endforeach

        </div>
        <div class="mt-8">
            {{ $stores->links() }}

        </div>
    </x-container>
</x-app-layout>
