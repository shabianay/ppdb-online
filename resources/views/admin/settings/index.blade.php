@extends('admin.layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Pengaturan Sistem</h1>
        <p class="text-muted-foreground mt-1 text-sm">Kelola konfigurasi dan jadwal PPDB.</p>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h2 class="text-base font-semibold text-foreground">Konfigurasi PPDB</h2>
        </div>
        <form method="POST" action="{{ route('admin.settings.update') }}" class="p-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                <div class="md:col-span-2">
                    <h3 class="text-sm font-bold text-foreground uppercase tracking-wider mb-3">Jadwal Pendaftaran</h3>
                </div>
                <div>
                    <label for="pendaftaran_mulai" class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Mulai</label>
                    <input type="date" name="pendaftaran_mulai" id="pendaftaran_mulai" value="{{ $settings['pendaftaran_mulai'] ?? '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                    @error('pendaftaran_mulai')<p class="text-destructive text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="pendaftaran_selesai" class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Selesai</label>
                    <input type="date" name="pendaftaran_selesai" id="pendaftaran_selesai" value="{{ $settings['pendaftaran_selesai'] ?? '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                    @error('pendaftaran_selesai')<p class="text-destructive text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2 mt-2">
                    <h3 class="text-sm font-bold text-foreground uppercase tracking-wider mb-3">Jadwal Seleksi</h3>
                </div>
                <div>
                    <label for="seleksi_mulai" class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Mulai</label>
                    <input type="date" name="seleksi_mulai" id="seleksi_mulai" value="{{ $settings['seleksi_mulai'] ?? '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                    @error('seleksi_mulai')<p class="text-destructive text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="seleksi_selesai" class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal Selesai</label>
                    <input type="date" name="seleksi_selesai" id="seleksi_selesai" value="{{ $settings['seleksi_selesai'] ?? '' }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background">
                    @error('seleksi_selesai')<p class="text-destructive text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2 mt-2">
                    <h3 class="text-sm font-bold text-foreground uppercase tracking-wider mb-3">Status PPDB</h3>
                </div>
                <div class="flex items-center gap-3">
                    <input type="hidden" name="ppdb_aktif" value="0">
                    <input type="checkbox" name="ppdb_aktif" id="ppdb_aktif" value="1" {{ ($settings['ppdb_aktif'] ?? '0') == '1' ? 'checked' : '' }} class="rounded-lg border-border text-primary focus:ring-ring focus:ring-offset-0">
                    <label for="ppdb_aktif" class="text-sm font-medium text-foreground">Aktifkan Pendaftaran PPDB Online</label>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-border flex items-center justify-end">
                <button type="submit" class="px-6 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm">Simpan Pengaturan</button>
            </div>
        </form>
    </div>
@endsection
