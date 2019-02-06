@extends('template')

@section('judul')
Data Pengarang Buku
@stop

@section('ac-pengarang')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="pengarang/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengarang as $rsPeng)
            <tr>
                  <td>{{ $rsPeng['kd_pengarang']}}</td>
                  <td>{{ $rsPeng['nama_pengarang']}}</td>
                  <td>
                        <a href="/pengarang/edit/{{ $rsPeng->kd_pengarang}}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/pengarang/hapus/{{ $rsPeng->kd_pengarang }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop

