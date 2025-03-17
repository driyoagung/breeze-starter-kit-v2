<x-app-layout>
    <x-slot name="header">

        @slot('title', $store->name)
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __($store->name) }} - {{ $store->products_count }} Products
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($products as $product)
                <x-card class="relative">
                    <a href="{{ route('products.show', [$store, $product]) }}" class="absolute inset-0 size-full"></a>

                    <x-card.header class="">
                        <x-card.title>
                            {{ $product->name }}
                        </x-card.title>
                        <x-card.description>
                            {{ Number::currency($product->price, 'idr') }}
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
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </x-container>
</x-app-layout>
