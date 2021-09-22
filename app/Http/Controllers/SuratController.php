<?php

namespace App\Http\Controllers;

use App\Models\SuratSkd;
use App\Models\SuratSkp;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function sktm()
    {
        return view('surat.sktm.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2',
            'nik' => 'required|numeric|digits:16',
            'jk' => 'required',
            'tempatlahir' => 'required|string',
            'tanggallahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'statuspernikahan' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ]);
        Auth::user()->suratsktm()->create($data);
        return redirect()->to(Route('home'))->with('success', 'Berhasil Mengajukan Surat');
    }
    public function delete(SuratSktm $id)
    {
        $id->delete();
        return redirect()->to(Route('home'))->with('success', 'Berhasil Menghapus Surat');
    }

    public function skd()
    {
        return view('surat.skd.create');
    }
    public function storeskd(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2',
            'nik' => 'required|numeric|digits:16',
            'jk' => 'required',
            'tempatlahir' => 'required|string',
            'tanggallahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ]);
        Auth::user()->suratskd()->create($data);
        return redirect()->to(Route('home'))->with('success', 'Berhasil Mengajukan Surat');
    }
    public function deleteskd(SuratSkd $id)
    {
        $id->delete();
        return redirect()->to(Route('home'))->with('success', 'Berhasil Menghapus Surat');
    }

    public function skpp()
    {
        return view('surat.skpp.create');
    }
    public function storeskpp(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2',
            'nik' => 'required|numeric|digits:16',
            'jk' => 'required',
            'tempatlahir' => 'required|string',
            'tanggallahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'statuspernikahan' => 'required',
            'alamatasal' => 'required',
            'alamat_pindah_kelurahan' => 'required',
            'alamat_pindah_kecamatan' => 'required',
            'alamat_pindah_kabupaten' => 'required',
            'alamat_pindah_provinsi' => 'required',
            'keterangan' => 'required',
        ]);
        $data = Auth::user()->suratskpp()->create($data);
        return redirect()->to(Route('home'))->with('success', 'Berhasil Mengajukan Surat');
    }
    public function deleteskpp(SuratSkp $id)
    {
        $id->delete();
        return redirect()->to(Route('home'))->with('success', 'Berhasil Menghapus Surat');
    }
}
