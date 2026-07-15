@extends('admin.layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Pengaturan Sistem</h2>
            <p class="text-sm text-muted-foreground mt-1">Kelola konfigurasi dan jadwal PPDB</p>
        </div>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                <div class="col-span-full">
                    <h3 class="text-lg font-semibold text-foreground mb-3">Jadwal Pendaftaran</h3>
                </div>
                <div>
                    <label for="pendaftaran_mulai" class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai Pendaftaran</label>
                    <input type="date" name="pendaftaran_mulai" id="pendaftaran_mulai" value="{{ $settings['pendaftaran_mulai'] ?? '' }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring">
                    @error('pendaftaran_mulai')<p class="text-destructive text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="pendaftaran_selesai" class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai Pendaftaran</label>
                    <input type="date" name="pendaftaran_selesai" id="pendaftaran_selesai" value="{{ $settings['pendaftaran_selesai'] ?? '' }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring">
                    @error('pendaftaran_selesai')<p class="text-destructive text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="col-span-full mt-4">
                    <h3 class="text-lg font-semibold text-foreground mb-3">Jadwal Seleksi</h3>
                </div>
                <div>
                    <label for="seleksi_mulai" class="block text-sm font-medium text-foreground mb-1">Tanggal Mulai Seleksi</label>
                    <input type="date" name="seleksi_mulai" id="seleksi_mulai" value="{{ $settings['seleksi_mulai'] ?? '' }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring">
                    @error('seleksi_mulai')<p class="text-destructive text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="seleksi_selesai" class="block text-sm font-medium text-foreground mb-1">Tanggal Selesai Seleksi</label>
                    <input type="date" name="seleksi_selesai" id="seleksi_selesai" value="{{ $settings['seleksi_selesai'] ?? '' }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring">
                    @error('seleksi_selesai')<p class="text-destructive text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="col-span-full mt-4">
                    <h3 class="text-lg font-semibold text-foreground mb-3">Status PPDB</h3>
                </div>
                <div class="flex items-center gap-2">
                    <input type="hidden" name="ppdb_aktif" value="0">
                    <input type="checkbox" name="ppdb_aktif" id="ppdb_aktif" value="1" {{ ($settings['ppdb_aktif'] ?? '0') == '1' ? 'checked' : '' }} class="rounded-md border-border text-primary focus:ring-primary focus:border-primary">
                    <label for="ppdb_aktif" class="text-sm font-medium text-foreground">Aktifkan Pendaftaran PPDB Online</label>
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end">
                <button type="submit" class="px-6 py-2.5 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:opacity-90 transition-all shadow-sm shadow-primary/20">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection
