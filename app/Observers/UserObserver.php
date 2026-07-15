<?php

namespace App\Observers;

use App\Models\User;
use App\Models\ActivityLog;

class UserObserver
{
    public function created(User $user)
    {
        ActivityLog::log('create', $user, null, $user->toArray(), 'User baru dibuat');
    }

    public function updated(User $user)
    {
        $changes = $user->getChanges();
        unset($changes['updated_at']);
        unset($changes['password']);
        
        if (!empty($changes)) {
            $old = collect($changes)->mapWithKeys(fn($v, $k) => [$k => $user->getOriginal($k)])->toArray();
            ActivityLog::log('update', $user, $old, $changes, 'Data user diperbarui');
        }
    }

    public function deleted(User $user)
    {
        ActivityLog::log('delete', $user, $user->toArray(), null, 'User dihapus');
    }
}
