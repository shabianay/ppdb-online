<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPendaftaranDeadline
{
    public function handle(Request $request, Closure $next): Response
    {
        $selesai = Setting::getValue('pendaftaran_selesai');
        
        if ($selesai && now()->gt($selesai)) {
            return redirect()->route('dashboard')
                ->with('error', 'Masa pendaftaran PPDB telah berakhir.');
        }

        $mulai = Setting::getValue('pendaftaran_mulai');
        
        if ($mulai && now()->lt($mulai)) {
            return redirect()->route('dashboard')
                ->with('error', 'Masa pendaftaran PPDB belum dimulai.');
        }

        $aktif = Setting::getValue('ppdb_aktif');
        
        if ($aktif !== '1') {
            return redirect()->route('dashboard')
                ->with('error', 'Pendaftaran PPDB sedang tidak aktif.');
        }

        return $next($request);
    }
}
