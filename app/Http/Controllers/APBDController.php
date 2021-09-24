<?php

namespace App\Http\Controllers;

use App\Models\Apbd;
use Illuminate\Http\Request;

class APBDController extends Controller
{
    public function index()
    {
        $apbd = Apbd::get('tahun');
        return view('apbd.index', compact('apbd'));
    }
    public function apbd(Request $request)
    {
        $tahun =  $request->tahun;
        $apbd = Apbd::where('tahun', $tahun)->get();
        $pendapatan = Apbd::where('tahun', $tahun)->where('jenis','Pendapatan')->get();
        $belanja = Apbd::where('tahun', $tahun)->where('jenis','Belanja')->get();

        return view('apbd.index', compact('apbd', 'tahun', 'pendapatan', 'belanja'));
    }
    public function add(Request $request)
    {
        $data = $request->validate([
            'kode_rekening_1' => 'required',
            'kode_rekening_2' => 'required',
            'uraian' => 'required|string',
            'anggaran' => 'required|numeric',
            'sumber' => 'required',
            'tahun' => 'required',
            'jenis' => 'required',
        ]);
        Apbd::create($data);
        return back()->with('status', 'Berhasil Menambah Data APBD');
    }
    public function delete(Request $request)
    {
        $apbd = Apbd::find($request->apbddel);
        $apbd->delete();
        return back()->with('status', 'Berhasil Menghapus data APBD');
    }
}
