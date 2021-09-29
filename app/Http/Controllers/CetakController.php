<?php

namespace App\Http\Controllers;

use App\Models\SuratSkd;
use App\Models\SuratSkp;
use App\Models\SuratSktm;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function sktm(SuratSktm $id)
    {
        return view('surat.sktm.cetak', compact('id'));
    }
    public function skd(SuratSkd $id)
    {
        return view('surat.skd.cetak', compact('id'));
    }
    public function skpp(SuratSkp $id)
    {
        return view('surat.skpp.cetak', compact('id'));
    }
}
