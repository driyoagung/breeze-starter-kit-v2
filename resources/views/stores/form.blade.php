<x-app-layout>
    <x-slot name="header">

        @slot('title', $page_meta['title'])
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_meta['title'] }}
        </h2>
    </x-slot>

    <x-container>

        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                    {{ $page_meta['title'] }}
                </x-card.title>
                <x-card.description>
                    {{ $page_meta['description'] }}
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" class="[&>div]:mb-6"
                    novalidate>
                    @method($page_meta['method'])
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
                        {{ $page_meta['button'] }}
                    </x-primary-button>
                </form>
            </x-card.content>
        </x-card>

    </x-container>
</x-app-layout>
