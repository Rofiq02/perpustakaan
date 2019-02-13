<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view("auth.login");
});

Route::group(['middleware' => ['isAdmin']], function() {

   



    //angota
    Route::get('anggota','AnggotaControl@index');
    Route::get('/anggota/add','AnggotaControl@add');
    Route::post('/anggota/save','AnggotaControl@save');
    Route::get('/anggota/edit/{id}','AnggotaControl@edit');
    Route::get('/anggota/hapus/{id}','AnggotaControl@hapus');
    Route::post('/anggota/update','AnggotaControl@update');
    Route::get('/anggota/print/{id}','AnggotaControl@print');

    //buku
    Route::get('buku','BukuControl@index');
    Route::get('/buku/add','BukuControl@add');
    Route::post('/buku/save','BukuControl@save');
    Route::get('/buku/edit/{id}','BukuControl@edit');
    Route::get('/buku/hapus/{id}','BukuControl@hapus');
    Route::post('/buku/update','BukuControl@update');

    //kategori
    Route::get('kategori','KategoriControl@index');
    Route::get('/kategori/add','KategoriControl@add');
    Route::post('/kategori/save','KategoriControl@save');
    Route::get('/kategori/edit/{id}','KategoriControl@edit');
    Route::get('/kategori/hapus/{id}','KategoriControl@hapus');
    Route::post('/kategori/update','KategoriControl@update');

    //penerbit
    Route::get('penerbit','PenerbitControl@index');
    Route::get('/penerbit/add','PenerbitControl@add');
    Route::post('/penerbit/save','PenerbitControl@save');
    Route::get('/penerbit/edit/{id}','PenerbitControl@edit');
    Route::get('/penerbit/hapus/{id}','PenerbitControl@hapus');
    Route::post('/penerbit/update','PenerbitControl@update');

    //koleksi
    Route::get('koleksi','KoleksiControl@index');
    Route::get('/koleksi/add','KoleksiControl@add');
    Route::post('/koleksi/save','KoleksiControl@save');
    Route::get('/koleksi/edit/{id}','KoleksiControl@edit');
    Route::get('/koleksi/hapus/{id}','KoleksiControl@hapus');
    Route::post('/koleksi/update','KoleksiControl@update');

    //Rak
    Route::get('rak','RakControl@index');
    Route::get('/rak/add','RakControl@add');
    Route::post('/rak/save','RakControl@save');
    Route::get('/rak/edit/{id}','RakControl@edit');
    Route::get('rak/hapus/{id}','RakControl@hapus');
    Route::post('/rak/update','RakControl@update');

    //Pengarang
    Route::get('pengarang','PengarangControl@index');
    Route::get('/pengarang/add','PengarangControl@add');
    Route::post('/pengarang/save','PengarangControl@save');
    Route::get('/pengarang/edit/{id}','PengarangControl@edit');
    Route::get('pengarang/hapus/{id}','PengarangControl@hapus');
    Route::post('/pengarang/update','PengarangControl@update');

    // Transaksi
    Route::post('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::get('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::get('/tampil','TransaksiControl@tampil');
    Route::post('/trans/peminjaman/save','TransaksiControl@save_peminjaman');


    Route::post('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::get('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::post('/trans/pengembalian/save','TransaksiControl@save_pengembalian');

   

    //Report
    Route::get('/report/anggota','ReportControl@rpt_anggota');
    Route::get('/report/buku','ReportControl@rpt_data_buku');
    Route::get('/report/buku/tersedia','ReportControl@rpt_data_buku_tersedia');
    Route::get('/report/qrcode_buku','ReportControl@rpt_QRCode_Buku');

    //dashboard
    Route::get('/dashboard','DashboardControl@jumlah_buku');

     // your routes
     Route::get('user','UsersControl@index');
     Route::get('user/add','UsersControl@add');
     Route::get('user/edit/{id}','UsersControl@edit');
     Route::post('user/save','UsersControl@save');
 

 

});

Route::group(['middleware' => ['isOperator']], function() {
    // Anggota
    Route::get('/anggota','AnggotaControl@index');
    // Buku
    Route::get('/buku','BukuControl@index');
    // Koleksi
    Route::get('/koleksi','KoleksiControl@index');   
    // Transaksi
    Route::get('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman/save','TransaksiControl@save');

    Route::post('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::get('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::post('/trans/pengembalian/save','TransaksiControl@save_pengembalian');

    Route::get('report/qrcode_buku','ReportControl@QR_Code_Buku');
    Route::get('report/qrcode_anggota','ReportControl@QR_Code_Anggota');

    Route::get('report/cetak','ReportControl@cetak');
    Route::get('report/cetak_anggota','ReportControl@cetak_anggota');    
});



    Auth::routes();
     //logout
     Auth::routes();
     Route::get('logout', 'Auth\LoginController@logout');

 //dashboard
   //dashboard
 Route::get('/dashboard','DashboardControl@jumlah_buku');
