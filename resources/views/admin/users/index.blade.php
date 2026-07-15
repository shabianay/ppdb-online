@php
    $roleBadge = [
        'calon_siswa' => 'bg-primary/10 text-primary',
        'panitia' => 'bg-purple-500/10 text-purple-600 dark:text-purple-400',
        'bendahara' => 'bg-green-500/10 text-green-600 dark:text-green-400',
        'kepala_sekolah' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
        'super_admin' => 'bg-destructive/10 text-destructive dark:text-destructive',
    ];
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-foreground leading-tight">Manajemen User</h2>
            <button x-data @click="$dispatch('open-modal', 'create-user')" class="px-4 py-2 bg-primary text-primary-foreground rounded-lg hover:opacity-90 text-sm font-semibold">Tambah User</button>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
                <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col sm:flex-row items-end gap-4" role="search" aria-label="Cari data pengguna">
                    <div class="w-full">
                        <label class="block text-sm font-medium text-foreground mb-1">Cari</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="w-full rounded-lg border-border text-sm pl-10 focus:ring-ring focus:border-ring">
                        </div>
                    </div>
                    <div class="flex items-end gap-2">
                        <button type="submit" class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:opacity-90 transition-all shadow-sm">Cari</button>
                        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
                    </div>
                </form>
            </div>

            <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
                <div class="overflow-x-auto max-h-[600px]">
                    <table class="w-full text-sm" role="table" aria-label="Daftar pengguna">
                        <thead class="sticky top-0 z-10 bg-muted/90 backdrop-blur shadow-sm">
                            <tr>
                                <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Nama</th>
                                <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Email</th>
                                <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Role</th>
                                <th class="px-5 py-4 font-semibold text-muted-foreground text-left">No. HP</th>
                                <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Dibuat</th>
                                <th class="px-5 py-4 font-semibold text-muted-foreground text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @forelse($users as $user)
                            <tr class="even:bg-muted/20 hover:bg-accent/50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-foreground">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm text-muted-foreground">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $roleBadge[$user->role] ?? 'bg-muted' }}">
                                        {{ str_replace('_', ' ', ucfirst($user->role)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-muted-foreground">{{ $user->no_hp ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-muted-foreground">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-right text-sm">
                                    <button @click="$dispatch('open-modal', 'edit-user-{{ $user->id }}')" class="text-primary font-semibold">Edit</button>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="px-6 py-12 text-center text-muted-foreground">Belum ada user</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-5 py-3 border-t border-border">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
