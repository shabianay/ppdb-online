<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Update Profile Information --}}
            <div class="p-4 sm:p-8 bg-card shadow sm:rounded-xl border border-border">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-foreground">{{ __('Profile Information') }}</h2>
                            <p class="mt-1 text-sm text-muted-foreground">{{ __("Update your account's profile information and email address.") }}</p>
                        </header>

                        <form method="POST" action="{{ route('profile.update-information') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name" aria-label="Nama" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', auth()->user()->email) }}" required autocomplete="username" aria-label="Email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-foreground">
                                            {{ __('Your email address is unverified.') }}
                                            <a href="{{ route('verification.notice') }}" class="underline text-sm text-muted-foreground hover:text-foreground rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ring">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </a>
                                        </p>
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">{{ __('A new verification link has been sent to your email address.') }}</p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('profile-updated'))
                                    <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="text-sm text-muted-foreground">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            {{-- Update Password --}}
            <div class="p-4 sm:p-8 bg-card shadow sm:rounded-xl border border-border">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-foreground">{{ __('Update Password') }}</h2>
                            <p class="mt-1 text-sm text-muted-foreground">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
                        </header>

                        <form method="POST" action="{{ route('profile.update-password') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" aria-label="Password Saat Ini" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="update_password_password" :value="__('New Password')" />
                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" aria-label="Password Baru" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" aria-label="Konfirmasi Password Baru" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('password-updated'))
                                    <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="text-sm text-muted-foreground">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="p-4 sm:p-8 bg-card shadow sm:rounded-xl border border-border">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-foreground">{{ __('Delete Account') }}</h2>
                            <p class="mt-1 text-sm text-muted-foreground">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
                        </header>

                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        >{{ __('Delete Account') }}</x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
                            <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                <h2 class="text-lg font-medium text-foreground">{{ __('Are you sure you want to delete your account?') }}</h2>
                                <p class="mt-1 text-sm text-muted-foreground">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>

                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" aria-label="Password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                                    <x-danger-button class="ms-3">{{ __('Delete Account') }}</x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
