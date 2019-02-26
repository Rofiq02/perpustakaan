<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\KoleksiReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBuku;
use App\MKategori;
use App\MKoleksi;
use App\MRak;
use App\MPengarang;
use App\MPenerbit;
class KoleksiControl extends Controller
{
    //
    function index(){
        $koleksi = DB::select('SELECT tb_koleksi_buku.kd_koleksi,tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_koleksi_buku.tanggal_pengadaan,tb_koleksi_buku.akses,tb_rak.nama_rak,tb_koleksi_buku.status FROM tb_koleksi_buku,tb_buku,tb_rak WHERE tb_koleksi_buku.kd_buku = tb_buku.kd_buku AND tb_koleksi_buku.kd_rak = tb_rak.kd_rak');
        
        return view('data.data_koleksi',compact('koleksi'));
    }
    function add(){
        $koleksi    = MGlobal::Get_Row_Empty('tb_koleksi_buku');
        $pengarang  = MPengarang::all();
        $penerbit   = MPenerbit::all();
        $buku       = MBuku::all();
        $rak        = MRak::all();
        return view('form.frm_koleksi',compact('buku','koleksi','rak','pengarang','penerbit'));
    }
    function edit($id){
        $koleksi    = MKoleksi::where("kd_koleksi",$id)->first();
        $buku       = MBuku::all();
        $rak        = MRak::all();
        $kategori   = MKategori::all();
        return view('form.frm_koleksi',compact("koleksi","buku","rak","kategori"));
     }
     function save(KoleksiReq $req){
        if($req->get('kd_koleksi')==""){
            $buku       = MBuku::where('kd_buku',$req->get('kd_buku'))->first();
            $kategori   = MKategori::where('kd_kategori',$buku['kd_kategori'])->first();
    
            for($i=1;$i<=$req->get('jumlah');$i++){
                // Generate no induk buku
                $newid      = DB::select('SHOW TABLE STATUS LIKE "tb_koleksi_buku"');
                $kd_buku    = sprintf('%04d',$req->get('kd_buku'));
                $no_urut    = sprintf('%06d',$newid[0]->Auto_increment);
                $no_induk_buku = "B-".$kd_buku."-".$kategori['singkatan']."-".$no_urut;
    
                // Proses SImpan
                $koleksi = new Mkoleksi([
                     'no_induk_buku'=>$no_induk_buku,
                     'kd_buku' => $req->get('kd_buku'),
                     'kd_user' => 1,
                     'tanggal_pengadaan' => date("Y-m-d",strtotime($req->get('tanggal_pengadaan'))),
                     'akses' => $req->get('akses'),
                     'kd_rak' => $req->get('kd_rak'),
                     'sumber' => $req->get('sumber'),
                     'status' => $req->get('status'),                
                ]);
                $koleksi->save();
             }
        }else{
            
            $koleksi = MKoleksi::where("kd_koleksi",$req->get('kd_koleksi'));
            $koleksi->update([
                
                'kd_user' => 1,
                'tanggal_pengadaan' => date("Y-m-d",strtotime($req->get('tanggal_pengadaan'))),
                'akses' => $req->get('akses'),
                'kd_rak' => $req->get('kd_rak'),
                'sumber' => $req->get('sumber'),
                'status' => $req->get('status'),      
           ]);
           
        }
       
         return redirect('koleksi');        
 
     }
     
     
    
}