@extends('template')

@section('judul')
Data Koleksi Buku
@stop

@section('ac-koleksi')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="koleksi/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>No Induk</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>Akses</th>
                  <th>Rak</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($koleksi as $rsKoleksi)
            <tr>
                  <td>{{ $rsKoleksi->kd_koleksi }}</td>
                  <td>{{ $rsKoleksi->no_induk_buku }}
                  </td>
                  <td>{{ $rsKoleksi->judul }}</td>
                  <td>{{ $rsKoleksi->tanggal_pengadaan }}</td>
                  <td>{{ $rsKoleksi->akses }}</td>
                  <td>{{ $rsKoleksi->nama_rak }}
                  </td>
                  <td>{{ ($rsKoleksi->status==0 ? "Tersedia" : ($rsKoleksi->status==1 ? "Dipinjam" : ($rsKoleksi->status==2 ? "Rusak" : "Hilang"))) }}</td>
                  <td>
                        <a href="/koleksi/edit/{{ $rsKoleksi->kd_koleksi }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/koleksi/hapus/{{ $rsKoleksi->kd_koleksi }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop

