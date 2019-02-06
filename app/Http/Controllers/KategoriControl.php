<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KategoriReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MKategori;

class KategoriControl extends Controller
{
    //
    function index(){
        $kategori = MKategori::all();

        return view('data.data_kategori',compact('kategori'));
    }

    function add(){
        $kategori = MGlobal::Get_Row_Empty('tb_kategori');
        return view('form.frm_kategori',compact('kategori'));
    }

    function save(KategoriReq $req){


        if($req->get('kd_kategori')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_anggota"');
        $noanggota = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $kategori = new MKategori([
            'nama_kategori' => $req->get('nama_kategori'),
            'singkatan' => $req->get('singkatan'),
        ]);
        $kategori->save();
        } else {
            $kategori = MKategori::where("kd_kategori",$req->get('kd_kategori'));
            $kategori->update([
                'nama_kategori' => $req->get('nama_kategori'),
                'singkatan' => $req->get('singkatan'),
                ]);
        }
        return redirect('kategori');
    }

   function edit($id){
       $kategori = MKategori::where("kd_kategori",$id)->first();

       return view('form.frm_kategori',compact("kategori"));
   }

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_kategori')->where('kd_kategori',$id)->delete();

        return redirect('/kategori');
    }
}
