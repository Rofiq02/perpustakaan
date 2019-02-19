<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use App\MAnggota;
use App\MBuku;
use App\MKoleksi;
use App\MRak;
use App\MKategori;

class ReportControl extends Controller
{
    //

    function rpt_anggota(){
        $anggota = MAnggota::all();
        $content = view('report.rpt_anggota',compact('anggota'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Anggota.pdf','I');
    }

    function rpt_kartu_anggota(){
        $anggota = MAnggota::all();
        $content = view('from.frm_anggota_print',compact('anggota'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Kartu Anggota.pdf','I');
    }

    function rpt_data_buku(){
        $buku = MBuku::all();
        $content = view('report.rpt_data_buku',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Data Buku.pdf','I');
    }

    function rpt_data_buku_tersedia(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.kd_kategori=tb_kategori.kd_kategori and tb_buku.kd_buku=tb_koleksi_buku.kd_buku and tb_koleksi_buku.kd_rak=tb_rak.kd_rak and status = 0');
        $content = view('report.rpt_data_buku_tersedia',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Tersedia.pdf','I');
    }

    function rpt_data_buku_dipinjam(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.kd_kategori=tb_kategori.kd_kategori and tb_buku.kd_buku=tb_koleksi_buku.kd_buku and tb_koleksi_buku.kd_rak=tb_rak.kd_rak and status = 1');
        $content = view('report.rpt_data_buku_tersedia',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Dipinjam.pdf','I');
    }

    function rpt_data_buku_rusak(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.kd_kategori=tb_kategori.kd_kategori and tb_buku.kd_buku=tb_koleksi_buku.kd_buku and tb_koleksi_buku.kd_rak=tb_rak.kd_rak and status = 2');
        $content = view('report.rpt_data_buku_tersedia',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Rusak.pdf','I');
    }

    function rpt_data_buku_hilang(){
        $buku = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_buku.ISBN,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.kd_kategori=tb_kategori.kd_kategori and tb_buku.kd_buku=tb_koleksi_buku.kd_buku and tb_koleksi_buku.kd_rak=tb_rak.kd_rak and status = 3');
        $content = view('report.rpt_data_buku_tersedia',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Buku Hilang.pdf','I');
    }

    function rpt_peminjaman_harian(){
        $buku = DB::select('select tb_peminjaman.no_pinjam,tb_anggota.nama,tb_buku.ISBN,tb_buku.judul,tb_peminjaman.tgl_pinjam,tb_peminjaman.tgl_kembali from tb_peminjaman,tb_anggota,tb_buku,tb_koleksi_buku where tb_peminjaman.no_anggota=tb_anggota.no_anggota and tb_peminjaman.no_induk_buku=tb_koleksi_buku.no_induk_buku and tb_koleksi_buku.kd_buku=tb_buku.kd_buku and tgl_pinjam=DATE(NOW())');
        $content = view('report.rpt_peminjaman_harian',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Peminjaman Harian.pdf','I');
    }


    function rpt_peminjaman_Bulanan(){
        $buku = DB::select('select tb_peminjaman.no_pinjam,tb_anggota.nama,tb_buku.ISBN,tb_buku.judul,tb_peminjaman.tgl_pinjam,tb_peminjaman.tgl_kembali from tb_peminjaman,tb_anggota,tb_buku,tb_koleksi_buku where tb_peminjaman.no_anggota=tb_anggota.no_anggota and tb_peminjaman.no_induk_buku=tb_koleksi_buku.no_induk_buku and tb_koleksi_buku.kd_buku=tb_buku.kd_buku and month(tgl_pinjam)=month(curdate())');
        $content = view('report.rpt_peminjaman_bulanan',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Peminjaman Harian.pdf','I');
    }

    function code(){
        $buku = MKoleksi::all();

        $content = view('report.rpt_qrcode_buku',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"P",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan QR Code Buku.pdf','I');

    }

    function printID($id){
        $anggota = MAnggota::where("kd_anggota",$id)->first();
        $content = view('form.frm_anggota_print',compact("anggota"));

        $pdf = new MPdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Kartu Anggota.pdf','I');
    }


}
