<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $no_hp = '';
    public string $nik = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'size:16', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'calon_siswa';

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register" class="space-y-4">
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap" aria-label="Nama Lengkap" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" placeholder="contoh@email.com" aria-label="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="no_hp" :value="__('No. Handphone')" />
            <x-text-input wire:model="no_hp" id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" placeholder="08xxxxxxxxxx" aria-label="Nomor Handphone" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="nik" :value="__('NIK (Nomor Induk Kependudukan)')" />
            <x-text-input wire:model="nik" id="nik" class="block mt-1 w-full" type="text" name="nik" maxlength="16" placeholder="16 digit NIK" aria-label="NIK (Nomor Induk Kependudukan)" />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" aria-label="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" aria-label="Konfirmasi Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-muted-foreground hover:text-foreground rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ring" href="{{ route('login') }}" wire:navigate>
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</div>
