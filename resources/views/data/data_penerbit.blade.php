@extends('template')

@section('judul')
Data Penerbit
@stop

@section('ac-penerbit')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="penerbit/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerbit as $rsPen)
            <tr>
                  <td>{{ $rsPen['kd_penerbit']}}</td>
                  <td>{{ $rsPen['nama_penerbit']}}</td>
                  <td>
                        <a href="/penerbit/edit/{{ $rsPen->kd_penerbit }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/penerbit/hapus/{{ $rsPen->kd_penerbit }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop

