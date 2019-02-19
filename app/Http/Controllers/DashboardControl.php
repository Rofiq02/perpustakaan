<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BukuReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBuku;

class DashboardControl extends Controller
{
    //
    function jumlah_buku(){
        $buku = DB::select('select count(*) as jumlah from tb_buku');
        $jumlahbuku = $buku[0]->jumlah;
        $anggota = DB::select('select count(*) as jumlah from tb_anggota');
        $jumlahanggota = $anggota[0]->jumlah;
        $pinjam = DB::select('select COUNT(*) AS Jumlah from tb_peminjaman where tgl_pinjam=DATE(NOW())');
        $harian = $pinjam[0]->Jumlah;
        $pinjemm = DB::select('select COUNT(*) AS Jumlah from tb_peminjaman where month(tgl_pinjam)=month(curdate())');
        $bulanan = $pinjemm[0]->Jumlah;
        return view('dashboard', compact('jumlahbuku','jumlahanggota','harian','bulanan'));
    }


}
