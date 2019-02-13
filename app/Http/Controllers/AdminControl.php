<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\MGlobal;
use App\MAdmin;

class AdminControl extends Controller
{
    //
    function index(){
        $users = DB::select('select * from users where status=1');
        
        return view('data.data_admin',compact('users'));
    }

    function add(){
        $users = MGlobal::Get_Row_Empty('users');
        return view('form.frm_admin',compact('users'));
    }

    use RegistersUsers;
function validator(){
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
}

    function save(Request $req){
        //Proses Simpan Ke Dalam Tabel
        if($req->get('id')==""){
            //menciptakan kode anggota
            $newid = DB::select('SHOW TABLE STATUS LIKE "users"');
            $nousers = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');
    
            //Proses Simpan Ke Dalam Tabel
            $users = new MAdmin([
                'name' => $req->get('name'),
                'email' => $req->get('email'),
                'email_verified_at' => $req->get('email_verified_at'),
                'password' =>$req->get->attributes('password'),
                'status' =>1,
                'remember_token' => $req->get('remember_token'),
                'created_at' => $req->get('created_at'),
                'updated_at' => $req->get('updated_at'),
                'level' =>('admin')
            ]);
            $users->save();
        } else {
            $users = MAdmin::where("id",$req->get('id'));
            $users->update([
                'name' => $req->get('name'),
                'email' => $req->get('email'),
                'email_verified_at' => $req->get('email_verified_at'),
                'password' =>$req->get->attributes('password'),
                'status' => 1,
                'remember_token' => $req->get('remember_token'),
                'created_at' => $req->get('created_at'),
                'updated_at' => $req->get('updated_at'),
                'level' => ('admin')
                ]);
            }
            return redirect('admin');
        }

        function edit($id){
            $users = MAdmin::where("id",$id)->first();
     
            return view('form.frm_admin',compact("users"));
        }
     
         function hapus($id){
             //menghapus data berdasarkan id yang dipilih
             DB::table('users')->where('id',$id)->delete();
     
             return redirect('/admin');
         }
        

    }

