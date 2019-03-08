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
            "name"=>$new ['nama'],
            "alamat"=>$new['alamat'],
            "telp"=>$new['telp'],
            "email"=>$new['email'],
            "password"=>Hash::make($new['password']),
            "level"=>2,
            "remember_token"=>$token
        ]);

        if($user->save()){
            echo json_encode(["type"=>"success","msg"=>"Data Success Disimpan ! ".csrf_token()]);
        }else{
            echo json_encode(["type"=>"error","msg"=>"Data Success Disimpan ! ". csrf_token()]);
        }
    }

    function login(Request $req){
        header ('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, Content-Type');

        $login = $req->json()->all();

        //cek email
        $ceklogin = DB::table('users')->where('email',$login['email'])->first();
        if($ceklogin){
            if(Hash::check($login["password"],$ceklogin->password)){
                $profile = DB::select('SELECT tb_anggota.kd_anggota,users.email,users.level,tb_anggota.no_anggota,users.name,tb_anggota.tempat,tb_anggota.tgl_lahir,tb_anggota.jk,users.alamat,tb_anggota.kota,users.telp,tb_anggota.foto,tb_anggota.`status` from users left join tb_anggota on tb_anggota.email = users.email WHERE users.email="'.$login['email'].'"');
                echo json_encode(["type"=>"success","profile"=>$ceklogin]);
            } else {
                echo json_encode(["type"=>"error","msg"=>"Password Invalid !"]);
            }
        }else{
            echo json_encode(["type"=>"error","msg"=>"Email Invalid !"]);
        }
    }

    function get_pinjam($status){
        header ('Access-Control-Allow-Origin: *');

        $pinjam = DB::select('select no_pinjam,tgl_pinjam,tgl_kembali from tb_peminjaman where status = "'.$status.'" group by no_pinjam,tgl_pinjam,tgl_kembali');

        echo json_encode($pinjam);
    }
}
