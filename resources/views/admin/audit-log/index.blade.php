@extends('admin.layouts.app')

@section('title', 'Audit Trail')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Audit Trail</h1>
        <p class="text-muted-foreground mt-1 text-sm">Riwayat aktivitas perubahan data dalam sistem.</p>
    </div>

    <div class="flex items-center gap-3 mb-6">
        <span class="text-sm text-muted-foreground">Total: <strong class="text-foreground">{{ number_format($logs->total()) }}</strong></span>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border p-4 sm:p-5 mb-6">
        <form method="GET" action="{{ route('admin.audit-log.index') }}" role="search" aria-label="Cari data audit" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari deskripsi..." class="w-full rounded-xl border-border text-sm pl-10 focus:ring-ring focus:border-ring bg-background" aria-label="Cari audit">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tipe</label>
                <select name="type" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tipe Aktivitas">
                    <option value="">Semua Tipe</option>
                    <option value="create" {{ request('type') == 'create' ? 'selected' : '' }}>Create</option>
                    <option value="update" {{ request('type') == 'update' ? 'selected' : '' }}>Update</option>
                    <option value="delete" {{ request('type') == 'delete' ? 'selected' : '' }}>Delete</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1.5">Tanggal</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full rounded-xl border-border text-sm focus:ring-ring focus:border-ring bg-background" aria-label="Tanggal Awal">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 sm:flex-none px-5 py-2.5 bg-primary text-primary-foreground rounded-xl text-sm font-semibold hover:opacity-90 transition-all shadow-sm">Filter</button>
                <a href="{{ route('admin.audit-log.index') }}" class="px-4 py-2.5 bg-muted text-muted-foreground rounded-xl text-sm font-medium hover:bg-accent transition-colors">Reset</a>
            </div>
        </form>
    </div>

    <div class="bg-card rounded-2xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" role="table" aria-label="Daftar audit trail">
                <thead>
                    <tr class="border-b border-border bg-muted/30">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Waktu</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">User</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Tipe</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Deskripsi</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider hidden lg:table-cell">Model</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($logs as $log)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="px-5 py-3 text-muted-foreground text-xs whitespace-nowrap">{{ $log->created_at->format('d M Y H:i') }}</td>
                            <td class="px-5 py-3 text-foreground font-medium">{{ $log->user->name ?? '-' }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $typeMap = [
                                        'create' => ['label' => 'Create', 'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'],
                                        'update' => ['label' => 'Update', 'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400'],
                                        'delete' => ['label' => 'Delete', 'classes' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400'],
                                    ];
                                    $type = $typeMap[$log->type] ?? ['label' => ucfirst($log->type), 'classes' => 'bg-muted text-muted-foreground'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $type['classes'] }}">{{ $type['label'] }}</span>
                            </td>
                            <td class="px-5 py-3 text-muted-foreground">{{ $log->description ?? '-' }}</td>
                            <td class="px-5 py-3 text-muted-foreground text-xs hidden lg:table-cell">{{ class_basename($log->subject_type) }} #{{ $log->subject_id }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-muted flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                                    </div>
                                    <p class="text-sm font-medium text-muted-foreground">Tidak ada data audit trail</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if (method_exists($logs, 'links'))
            <div class="px-5 py-3 border-t border-border">{{ $logs->links() }}</div>
        @endif
    </div>
@endsection
