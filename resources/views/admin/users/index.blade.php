@extends('admin.layouts.app')

@section('title', 'Kelola User')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Kelola User</h1>
        <p class="text-muted-foreground mt-1 text-sm">Manajemen akun pengguna sistem.</p>
    </div>

    @php
        $roleMap = [
            'calon_siswa' => ['label' => 'Calon Siswa', 'classes' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400'],
            'panitia' => ['label' => 'Panitia', 'classes' => 'bg-purple-50 text-purple-700 dark:bg-purple-500/10 dark:text-purple-400'],
            'bendahara' => ['label' => 'Bendahara', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
            'kepala_sekolah' => ['label' => 'Kepala Sekolah', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
            'super_admin' => ['label' => 'Super Admin', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
            'admin' => ['label' => 'Admin', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
        ];
    @endphp

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <span class="text-sm text-muted-foreground">Total: <strong class="text-foreground">{{ $users->total() ?? count($users) }}</strong></span>
        <button x-data @click="$dispatch('open-modal', 'create-user')" class="px-5 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah User
        </button>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Daftar pengguna">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Nama</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Email</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Role</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden md:table-cell">No. HP</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Dibuat</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($users as $user)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3 font-medium text-foreground">{{ $user->name }}</td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $user->email }}</td>
                            <td class="px-5 py-3">
                                @php $role = $roleMap[$user->role] ?? ['label' => ucfirst($user->role), 'classes' => 'bg-muted text-muted-foreground']; @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $role['classes'] }}">{{ $role['label'] }}</span>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground hidden md:table-cell">{{ $user->no_hp ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs hidden lg:table-cell">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="px-5 py-3 text-center">
                                <button @click="$dispatch('open-modal', 'edit-user-{{ $user->id }}')" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit" aria-label="Edit user">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Belum ada user</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-border">{{ $users->links() }}</div>
    </div>
@endsection
