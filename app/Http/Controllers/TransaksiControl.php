<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//https://github.com/mike42/escpos-php

use Mike42\Escpos\Printer; 
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use App\MAnggota;
use App\MTampil;

class TransaksiControl extends Controller
{
    //
    function peminjaman(Request $req){
        
        $tampil = DB::select('select tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_kategori.nama_kategori,tb_rak.nama_rak,tb_koleksi_buku.status from tb_buku,tb_koleksi_buku,tb_kategori,tb_rak where tb_buku.kd_kategori=tb_kategori.kd_kategori and tb_buku.kd_buku=tb_koleksi_buku.kd_buku and tb_koleksi_buku.kd_rak=tb_rak.kd_rak and status = 0');
        // dd($tampil);
        if(count($req->all())==0){
            $anggota = "";
            $buku = "";            
        } else {            
            $anggota = MAnggota::where("no_anggota",$req->get("no_anggota"))->first();
            $buku = DB::select("select tb_koleksi_buku.kd_koleksi,tb_koleksi_buku.no_induk_buku,tb_buku.judul from tb_koleksi_buku,tb_buku WHERE tb_koleksi_buku.kd_buku=tb_buku.kd_buku AND tb_koleksi_buku.status = 0");
        }

        return view('form.frm_peminjaman',compact('anggota','buku','tampil'));
    }

    function Pinjem(){
        $tampil = MTampil::all();
        dd($tampil);
        return view('form.frm_peminjaman',compact(['tampil']));
    }

    function save_peminjaman(Request $req){
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_peminjaman"');
        $no_pinjam = "P".sprintf('%06d',$newid[0]->Auto_increment);         
        foreach($req->get('nobuku') as $no_induk){    
            // Simpan ke tabel peminjaman      
            DB::table('tb_peminjaman')->insert([
                'no_pinjam'=>$no_pinjam,
                'tgl_pinjam'=>date('Y-m-d'),
                'tgl_kembali'=>date('Y-m-d',strtotime('+3 days')),
                'no_induk_buku'=>$no_induk,
                'no_anggota'=>$req->get('no_anggota'),
                'status'=>0
            ]);
            
            // Update status buku jadi terpinjam
            DB::table('tb_koleksi_buku')->where("no_induk_buku",$no_induk)->update([
                'status'=>1
            ]);
        }

        // Proses Cetak

        // Ini adalah lokasi printer dan printer yang di gunakan
        $ip = '192.168.1.40'; // IP Komputer kita atau printer lain yang masih satu jaringan
        $printer = 'POS 5'; // Nama Printer yang di sharing
        $connector = new WindowsPrintConnector("smb://" . $ip . "/" . $printer);
        $printer = new Printer($connector);     
        
        // Header
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("PERPUSTAKAAN WEARNES \n");
        $printer -> text("Jl Thamrin 35 A Madiun \n");
        $printer -> text("============================== \n");
        // barcode 
        $printer -> setBarcodeHeight(50);
        $printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
        $printer -> barcode($no_pinjam); 
       // informasi peminjam
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text("No Anggota : ".$req->get('no_anggota')." \n");
        $printer -> text("Nama       : ".$req->get('nama')." \n");
        $printer -> text("Tanggal    : ".date('d-M-Y')." \n");
        $printer -> text("Kembali    : ".date('d-M-Y',strtotime('+3 days')) ." \n");               
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("============================== \n"); 
        // List Buku Yang di pinjaman       
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $i=1; $count = count($req->get('judul'));
        foreach($req->get('judul') as $judul){ 
            $printer -> text("#$i  ".$judul." \n");
            if($i<$count){
                $printer -> text("--------------------------- \n");
            }
            $i++;
        }
        // Footer
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("============================== \n");
        $printer -> text("Terima Kasih \n");        
        $printer -> text("Kami Tunggu Kunjungan Anda \n \n \n \n \n \n"); 
        // Perintah print
        $printer -> cut();
        $printer -> close(); 

        return redirect('trans/peminjaman');
    }

   
    function pengembalian(Request $req){
        $tampil = DB::select('select tb_peminjaman.no_pinjam,tb_anggota.nama,tb_buku.judul,tb_peminjaman.tgl_pinjam,tb_peminjaman.tgl_kembali,tb_peminjaman.denda,tb_peminjaman.status from tb_peminjaman,tb_anggota,tb_buku,tb_koleksi_buku where tb_peminjaman.no_anggota=tb_anggota.no_anggota and tb_peminjaman.no_induk_buku=tb_koleksi_buku.no_induk_buku and tb_koleksi_buku.kd_buku=tb_buku.kd_buku and tb_peminjaman.status = 1');
        if(count($req->all())==0){
            $pinjam = "";            
        } else {            
            $pinjam = DB::select("select tb_peminjaman.no_pinjam,tb_peminjaman.no_induk_buku,tb_buku.judul, tb_peminjaman.no_anggota,tb_anggota.nama,tb_peminjaman.tgl_kembali
            from tb_peminjaman,tb_buku,tb_anggota,tb_koleksi_buku            WHERE tb_peminjaman.no_anggota = tb_anggota.no_anggota 
            AND tb_peminjaman.no_induk_buku = tb_koleksi_buku.no_induk_buku
            AND tb_koleksi_buku.kd_buku=tb_buku.kd_buku AND tb_peminjaman.status=0 AND tb_peminjaman.no_pinjam='".$req->get('no_pinjam')."'");
        }        

        return view('form/frm_pengembalian',compact('pinjam','tampil'));
    }

    function save_pengembalian(Request $req){         
        foreach($req->get('no_induk') as $no_induk){    
            // Simpan ke tabel peminjaman      
            DB::table('tb_peminjaman')->where('no_pinjam',$req->get('no_pinjam'))->where('no_induk_buku',$no_induk)->update([
                'denda'=>$req->get('denda'),
                'status'=>1
            ]);
            
            // Update status buku jadi terpinjam
            DB::table('tb_koleksi_buku')->where("no_induk_buku",$no_induk)->update([
                'status'=>0
            ]);
        }

        return redirect('trans/pengembalian');
    }    


}
