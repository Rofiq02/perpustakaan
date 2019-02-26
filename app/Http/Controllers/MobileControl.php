<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\MBuku;
use App\User;
use Session;

class MobileControl extends Controller
{
    //
    function get_Buku(){
        header ("Access-Control-Allow-Origin: *");
        // Get Data Buku
        $buku = DB::select('SELECT tb_buku.*,tb_penerbit.nama_penerbit, tb_kategori.nama_kategori,tb_pengarang.nama_pengarang FROM  tb_buku left join tb_pengarang on tb_buku.kd_pengarang = tb_pengarang.kd_pengarang left join tb_penerbit on tb_buku.kd_penerbit = tb_penerbit.kd_penerbit left join tb_kategori on tb_buku.kd_kategori = tb_kategori.kd_kategori');

        //Mapping field cover
        foreach ($buku as $rsBuku){
            $rsBuku->cover=$rsBuku->cover==null ? asset('/img/0.jpg') : asset('/img/'.$rsBuku->cover);
            $data[]=$rsBuku; 
        }

        echo json_encode($data);
    }

    function get_koleksi($kd_buku){
        header("Access-Control-Allow-Origin: *");
        $koleksi = DB::select('select * from tb_koleksi_buku where kd_buku="'.$kd_buku.'"');

        echo json_encode($koleksi);
    }

    function registrasi(Request $req){
        header ('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, Content-Type');

        $new = $req->json()->all();
        $token = csrf_token();
        $user = new User([
            "name"=>$new ['name'],
            "alamat"=>$new['alamat'],
            "telp"=>$new['telp'],
            "email"=>$new['email'],
            "password"=>Hash::make($new['password']),
            "level"=>2,
            "remember_token"=>$token
        ]);

        if($user->save()){
            echo json_encode(["type"=>"succes","msg"=>"Data Success Disimpan ! ".csrf_token()]);
        }else{
            echo json_encode(["type"=>"error","msg"=>"Data Success Disimpan ! ". csrf_token()]);
        }
    }
}
