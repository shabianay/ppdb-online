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
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-500/10 text-green-600 dark:text-green-400 rounded-lg text-sm">{{ session('success') }}</div>
            @endif

            <div class="bg-card overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-border">
                        <thead class="bg-muted/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">No. HP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Dibuat</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-muted-foreground uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @forelse($users as $user)
                            <tr class="hover:bg-muted/50">
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
                <div class="p-4">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
