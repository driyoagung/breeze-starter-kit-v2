<x-app-layout>
    <x-slot name="header">

        @slot('title', 'Create a Stores')
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Create Stores') }}
        </h2>
    </x-slot>

    <x-container>

        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                    Create a New Store
                </x-card.title>
                <x-card.description>
                    You cand Create up to 5 store in your account
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data" class="[&>div]:mb-6"
                    novalidate>
                    @csrf
                    <div>
                        <x-input-label for="logo" :value="__('Logo')" class="sr-only" />
                        <input id="logo" type="file" name="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" required />
                    </div>
                    <div>

                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description"
                            required>{{ old('description') }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button>
                        Create
                    </x-primary-button>
                </form>
            </x-card.content>
        </x-card>

    </x-container>
</x-app-layout>
