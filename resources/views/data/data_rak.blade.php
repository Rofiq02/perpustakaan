@extends('template')

@section('judul')
Data Rak Buku
@stop

@section('ac-rak')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="rak/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rak as $rsRak)
            <tr>
                  <td>{{ $rsRak['kd_rak']}}</td>
                  <td>{{ $rsRak['nama_rak']}}</td>
                  <td>
                        <a href="/rak/edit/{{ $rsRak->kd_rak}}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/rak/hapus/{{ $rsRak->kd_rak }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop

