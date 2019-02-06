<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PenerbitReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MPenerbit;

class PenerbitControl extends Controller
{
    
    //
    function index(){
        $penerbit = MPenerbit::all();

        return view('data.data_penerbit',compact('penerbit'));
    }

    function add(){
        $penerbit = MGlobal::Get_Row_Empty('tb_penerbit');
        return view('form.frm_penerbit',compact('penerbit'));
    }

    function save(PenerbitReq $req){


        if($req->get('kd_penerbit')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_penerbit"');
        $nopenerbit = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $penerbit = new MPenerbit([
            'nama_penerbit' => $req->get('nama_penerbit'),
        ]);
        $penerbit->save();
        } else {
            $penerbit = MPenerbit::where("kd_penerbit",$req->get('kd_penerbit'));
            $penerbit->update([
                'nama_penerbit' => $req->get('nama_penerbit'),
                ]);
        }
        return redirect('penerbit');
    }

   function edit($id){
       $penerbit = MPenerbit::where("kd_penerbit",$id)->first();

       return view('form.frm_penerbit',compact("penerbit"));
   }

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_penerbit')->where('kd_penerbit',$id)->delete();

        return redirect('/penerbit');
    }
}
