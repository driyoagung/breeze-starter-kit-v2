<x-app-layout>
    <x-slot name="header">
        {{-- <x-slot name="title">
            Dashboard

        </x-slot> --}}
        @slot('title', 'Veify Email')
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Verify Email') }} <span class="text-zinc-500">({{ auth()->user()->email }})</span>
        </h2>
    </x-slot>
    <x-container>
        <div class="max-w-2xl bg-white border shadow-sm rounded-lg p-6">
            <div class="mb-4 text-sm text-zinc-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="flex items-center gap-2">
                    <a href="{{ route('profile.edit') }}"
                        class="text-sm text-zinc-600 underline hover:text-zinc-900">Edit profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="underline text-sm text-zinc-600 hover:text-zinc-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
