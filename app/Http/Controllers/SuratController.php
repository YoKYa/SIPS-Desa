<?php

namespace App\Http\Controllers;

use App\Models\SuratSkd;
use App\Models\SuratSkp;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SuratController extends Controller
{
    public function suratmasuk()
    {
        $sktm = auth()->user()->suratsktm()->where('status', 'Diterima')->get();
        $skd = auth()->user()->suratskd()->where('status', 'Diterima')->get();
        $skpp = auth()->user()->suratskpp()->where('status', 'Diterima')->get();
        return view('surat.masuk.index', compact('sktm','skd','skpp'));
    }
    public function riwayatsurat()
    {
        $sktm = auth()->user()->suratsktm;
        $skd = auth()->user()->suratskd;
        $skpp = auth()->user()->suratskpp;
        return view('surat.masuk.index', compact('sktm','skd','skpp'));
    }
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
            // 'keterangan' => 'required',
        ]);
        $data = Auth::user()->suratskpp()->create($data);
        return redirect()->to(Route('home'))->with('success', 'Berhasil Mengajukan Surat');
    }
    public function deleteskpp(SuratSkp $id)
    {
        $id->delete();
        return redirect()->to(Route('home'))->with('success', 'Berhasil Menghapus Surat');
    }

    // Admin
    public function index()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            return view('surat.index');
        }
    }
    
    // SKTM
    public function showsktm()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            $sktm = SuratSktm::orderBy('id', 'desc')->where('status', 'Ajukan')->get();
            return view('surat.sktm.show', compact('sktm'));
        }
    }
    public function skshowsktm()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            $sktm = SuratSktm::orderBy('id', 'desc')->where('status', '!=' , 'Ajukan')->get();
            return view('surat.sktm.skshow', compact('sktm'));
        }
    }
    public function sktmshow(SuratSktm $id)
    {
        $data = $id;
        return view('surat.sktm.data', compact('data'));
    }
    public function sktmacc(SuratSktm $id)
    {
        $data = $id;
        return view('surat.sktm.acc', compact('data'));
    }
    public function storesktmacc(SuratSktm $id, Request $request)
    {
        $file = $request->file('file')->store('sktm');
        $id->update([
            'file' => $file,
            'status' => 'Diterima'
        ]);
        return redirect()->to(Route('surat.sktm'));
    }
    public function storesktmnacc(SuratSktm $id)
    {
        $id->update([
            'file' => null,
            'status' => 'Ditolak'
        ]);
        return redirect()->to(Route('surat.sktm'));
    }
    // SKD
    public function showskd()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            $skd = SuratSkd::orderBy('id', 'desc')->where('status', 'Ajukan')->get();
            return view('surat.skd.show', compact('skd'));
        }
    }
    public function skshowskd()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            $skd = SuratSkd::orderBy('id', 'desc')->where('status', '!=' , 'Ajukan')->get();
            return view('surat.skd.skshow', compact('skd'));
        }
    }
    public function skdshow(SuratSkd $id)
    {
        $data = $id;
        return view('surat.skd.data', compact('data'));
    }
    public function skdacc(SuratSkd $id)
    {
        $data = $id;
        return view('surat.skd.acc', compact('data'));
    }
    public function storeskdacc(SuratSkd $id, Request $request)
    {
        $file = $request->file('file')->store('skd');
        $id->update([
            'file' => $file,
            'status' => 'Diterima'
        ]);
        return redirect()->to(Route('surat.skd'));
    }
    public function storeskdnacc(SuratSkd $id)
    {
        $id->update([
            'file' => null,
            'status' => 'Ditolak'
        ]);
        return redirect()->to(Route('surat.skd'));
    }
    // SKPP
    public function showskpp()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            $skpp = SuratSkp::orderBy('id', 'desc')->where('status', 'Ajukan')->get();
            return view('surat.skpp.show', compact('skpp'));
        }
    }
    public function skshowskpp()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            $skpp = SuratSkp::orderBy('id', 'desc')->where('status', '!=' , 'Ajukan')->get();
            return view('surat.skpp.skshow', compact('skpp'));
        }
    }
    public function skppshow(SuratSkp $id)
    {
        $data = $id;
        return view('surat.skpp.data', compact('data'));
    }
    public function skppacc(SuratSkp $id)
    {
        $data = $id;
        return view('surat.skpp.acc', compact('data'));
    }
    public function storeskppacc(SuratSkp $id, Request $request)
    {
        $file = $request->file('file')->store('skpp');
        $id->update([
            'file' => $file,
            'status' => 'Diterima'
        ]);
        return redirect()->to(Route('surat.skpp'));
    }
    public function storeskppnacc(SuratSkp $id)
    {
        $id->update([
            'file' => null,
            'status' => 'Ditolak'
        ]);
        return redirect()->to(Route('surat.skpp'));
    }

    // Surat Keluar
    public function indexk()
    {
        if (auth()->user()->status == 'User') {
            return Redirect()->to(Route('home'));
        }else{
            return view('surat.indexk');
        }
    }
}
