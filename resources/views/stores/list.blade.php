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
                <x-card>
                    <x-card.header>
                        <x-card.title>
                            {{ $store->name }}
                        </x-card.title>
                        <x-card.description>
                            Created at {{ $store->created_at->format('d F Y') }} by {{ $store->user->name }}

                        </x-card.description>
                    </x-card.header>
                    <x-card.content>
                        <section class="">
                            <p class="mb-6">
                                {{ $store->description }}
                            </p>

                            @if ($store->status === StoreStatus::PENDING)
                                <x-primary-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', `modal-{{ $store->id }}`)">{{ __(' Approve') }}</x-primary-button>

                                <x-modal name="modal-{{ $store->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('stores.approve', $store) }}" class="p-6">
                                        @csrf
                                        @method('put')
                                        <h2 class="text-lg font-medium text-zinc-900">
                                            {{ $store->name }}
                                        </h2>
                                        <p class="mt-1 text-sm text-zinc-600">
                                            {{ $store->description }}
                                        </p>
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>

                                            <x-primary-button class="ms-3">
                                                {{ __('Approve') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @endif
                        </section>
                    </x-card.content>
                </x-card>
            @endforeach

        </div>
        <div class="mt-8">
            {{ $stores->links() }}

        </div>
    </x-container>
</x-app-layout>
