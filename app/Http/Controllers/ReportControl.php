<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\MAnggota;
use App\MBuku;
use App\MKoleksi;

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

    function rpt_QRCode_Buku(){
        $buku = MKoleksi::all();

        $content = view('report.rpt_qrcode_buku',compact('buku'));

        $pdf = new MPdf([
            'orientation'=>"P",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/laporan QR Code Buku.pdf','I');
    }
}
