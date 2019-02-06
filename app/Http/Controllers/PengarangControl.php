<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PengarangReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MPengarang;

class PengarangControl extends Controller
{
    //
    function index(){
        $pengarang = MPengarang::all();

        return view('data.data_pengarang',compact('pengarang'));
    }

    function add(){
        $pengarang = MGlobal::Get_Row_Empty('tb_pengarang');
        return view('form.frm_pengarang',compact('pengarang'));
    }

    function save(PengarangReq $req){


        if($req->get('kd_pengarang')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_anggota"');
        $noanggota = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $pengarang = new MPengarang([
            'nama_pengarang' => $req->get('nama_pengarang'),
        ]);
        $pengarang->save();
        } else {
            $pengarang = MPengarang::where("kd_pengarang",$req->get('kd_pengarang'));
            $pengarang->update([
                'nama_pengarang' => $req->get('nama_pengarang'),
                ]);
        }
        return redirect('pengarang');
    }

   function edit($id){
       $pengarang = MPengarang::where("kd_pengarang",$id)->first();

       return view('form.frm_pengarang',compact("pengarang"));
   }

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_pengarang')->where('kd_pengarang',$id)->delete();

        return redirect('/pengarang');
    }
}
