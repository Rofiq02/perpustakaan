<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RakRequest;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MRak;

class RakControl extends Controller
{
    //
    function index(){
        $rak = MRak::all();

        return view('data.data_rak',compact('rak'));
    }

    function add(){
        $rak = MGlobal::Get_Row_Empty('tb_rak');
        return view('form.frm_rak',compact('rak'));
    }

    function save(RakRequest $req){


        if($req->get('kd_rak')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_rak"');
        $noanggota = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $rak = new MRak([
            'nama_rak' => $req->get('nama_rak'),
        ]);
        $rak->save();
        } else {
            $rak = MRak::where("kd_rak",$req->get('kd_rak'));
            $rak->update([
                'nama_rak' => $req->get('nama_rak'),
                ]);
        }
        \Session::flash('flash_message','data berhasil di simpan');
        return redirect('rak');
    }

   function edit($id){
       $rak = MRak::where("kd_rak",$id)->first();

       return view('form.frm_rak',compact("rak"));
   }

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_rak')->where('kd_rak',$id)->delete();

        return redirect('/rak');
    }
}
