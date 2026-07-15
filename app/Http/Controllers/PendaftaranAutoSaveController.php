<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class PendaftaranAutoSaveController extends Controller
{
    public function store(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->input('pendaftar_id'));
        
        if (!auth()->check()) {
            abort(403);
        }
        
        if ($pendaftar->status !== 'draft') {
            return response()->json(['message' => 'Pendaftaran dengan status "' . $pendaftar->status . '" tidak dapat disimpan.'], 403);
        }

        $fields = $request->input('fields', []);
        $updateData = [];

        foreach ($fields as $field => $value) {
            $updateData[$field] = $value;
        }

        // Jika ada data orang tua
        if (isset($fields['ayah_nama']) || isset($fields['ibu_nama'])) {
            $orangTua = $pendaftar->orangTua;
            if ($orangTua) {
                $updateOrangTua = [];
                if (isset($fields['ayah_nama'])) $updateOrangTua['nama'] = $fields['ayah_nama'];
                if (isset($fields['ayah_pekerjaan'])) $updateOrangTua['pekerjaan'] = $fields['ayah_pekerjaan'];
                if (isset($fields['ayah_penghasilan'])) $updateOrangTua['penghasilan'] = $fields['ayah_penghasilan'];
                if (isset($fields['ayah_no_hp'])) $updateOrangTua['no_hp'] = $fields['ayah_no_hp'];
                if (isset($fields['ibu_nama'])) $updateOrangTua['nama'] = $fields['ibu_nama'];
                if (isset($fields['ibu_pekerjaan'])) $updateOrangTua['pekerjaan'] = $fields['ibu_pekerjaan'];
                if (isset($fields['ibu_penghasilan'])) $updateOrangTua['penghasilan'] = $fields['ibu_penghasilan'];
                if (isset($fields['ibu_no_hp'])) $updateOrangTua['no_hp'] = $fields['ibu_no_hp'];

                $orangTua->update($updateOrangTua);
            } else {
                $orangTuaData = [];
                
                if (isset($fields['ayah_nama'])) $orangTuaData['nama'] = $fields['ayah_nama'];
                if (isset($fields['ayah_pekerjaan'])) $orangTuaData['pekerjaan'] = $fields['ayah_pekerjaan'];
                if (isset($fields['ayah_penghasilan'])) $orangTuaData['penghasilan'] = $fields['ayah_penghasilan'];
                if (isset($fields['ayah_no_hp'])) $orangTuaData['no_hp'] = $fields['ayah_no_hp'];
                $orangTuaData['jenis'] = 'ayah';
                $orangTuaData['pendaftar_id'] = $pendaftar->id;
                
                OrangTua::create($orangTuaData);
                
                $orangTuaDataIbu = [];
                if (isset($fields['ibu_nama'])) $orangTuaDataIbu['nama'] = $fields['ibu_nama'];
                if (isset($fields['ibu_pekerjaan'])) $orangTuaDataIbu['pekerjaan'] = $fields['ibu_pekerjaan'];
                if (isset($fields['ibu_penghasilan'])) $orangTuaDataIbu['penghasilan'] = $fields['ibu_penghasilan'];
                if (isset($fields['ibu_no_hp'])) $orangTuaDataIbu['no_hp'] = $fields['ibu_no_hp'];
                $orangTuaDataIbu['jenis'] = 'ibu';
                $orangTuaDataIbu['pendaftar_id'] = $pendaftar->id;
                
                OrangTua::create($orangTuaDataIbu);
            }
        }

        foreach ($updateData as $key => $value) {
            $pendaftar->{$key} = $value;
        }

        $pendaftar->save();

        return response()->json(['success' => true, 'message' => 'Data tersimpan']);
    }
}