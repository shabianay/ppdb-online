<?php

namespace App\Observers;

use App\Models\Pendaftar;
use App\Models\ActivityLog;

class PendaftarObserver
{
    public function created(Pendaftar $pendaftar)
    {
        ActivityLog::log('create', $pendaftar, null, $pendaftar->toArray(), 'Pendaftaran baru dibuat');
    }

    public function updated(Pendaftar $pendaftar)
    {
        $changes = $pendaftar->getChanges();
        unset($changes['updated_at']);
        
        if (!empty($changes)) {
            $old = collect($changes)->mapWithKeys(fn($v, $k) => [$k => $pendaftar->getOriginal($k)])->toArray();
            ActivityLog::log('update', $pendaftar, $old, $changes, 'Data pendaftaran diperbarui');
        }
    }

    public function deleted(Pendaftar $pendaftar)
    {
        ActivityLog::log('delete', $pendaftar, $pendaftar->toArray(), null, 'Pendaftaran dihapus');
    }
}
