@extends('admin.layouts.app')

@section('title', 'Audit Trail')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Audit Trail</h2>
            <p class="text-sm text-muted-foreground mt-1">Riwayat aktivitas perubahan data dalam sistem</p>
        </div>
        <span class="text-sm text-muted-foreground">Total: <strong class="text-foreground">{{ number_format($logs->total()) }}</strong></span>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.audit-log.index') }}" role="search" aria-label="Cari data audit" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari deskripsi..." class="w-full rounded-lg border-border text-sm pl-10 focus:ring-ring focus:border-ring">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Tipe Aktivitas</label>
                <select name="type" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring">
                    <option value="">Semua Tipe</option>
                    <option value="create" {{ request('type') == 'create' ? 'selected' : '' }}>Create</option>
                    <option value="update" {{ request('type') == 'update' ? 'selected' : '' }}>Update</option>
                    <option value="delete" {{ request('type') == 'delete' ? 'selected' : '' }}>Delete</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Tanggal Awal</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full rounded-lg border-border text-sm focus:ring-ring focus:border-ring">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:opacity-90 transition-all shadow-sm shadow-primary/20">
                    <svg aria-hidden="true" class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                <a href="{{ route('admin.audit-log.index') }}" class="px-4 py-2 bg-muted text-muted-foreground rounded-lg text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    <div class="bg-card rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto max-h-[600px]">
            <table class="w-full text-sm border-collapse" role="table" aria-label="Daftar audit trail">
                <thead class="sticky top-0 z-10 bg-muted/90 backdrop-blur shadow-sm">
                    <tr>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Waktu</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">User</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Tipe</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Deskripsi</th>
                        <th class="px-5 py-4 font-semibold text-muted-foreground text-left">Model</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($logs as $log)
                        <tr class="hover:bg-accent/50 transition-colors even:bg-muted/20">
                            <td class="px-5 py-3 text-muted-foreground">{{ $log->created_at->format('d M Y H:i') }}</td>
                            <td class="px-5 py-3 text-foreground font-medium">{{ $log->user->name ?? '-' }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $typeClasses = [
                                        'create' => 'bg-green-500/10 text-green-600 dark:text-green-400',
                                        'update' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400',
                                        'delete' => 'bg-destructive/10 text-destructive',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $typeClasses[$log->type] ?? 'bg-muted text-muted-foreground' }}">
                                    {{ ucfirst($log->type) }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $log->description ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs">
                                {{ class_basename($log->subject_type) }} #{{ $log->subject_id }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-muted-foreground">
                                <svg aria-hidden="true" class="w-10 h-10 mx-auto mb-2 text-muted-foreground/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                                <p class="text-sm font-medium">Tidak ada data audit trail</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if (method_exists($logs, 'links'))
            <div class="px-5 py-3 border-t border-border">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
@endsection
