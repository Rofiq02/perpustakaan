@extends('template')

@section('judul')
Data Anggota
@stop

@section('ac-anggota')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="anggota/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>No Anggota</th>
                  <th>Nama</th>
                  <th>Lahir</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggota as $rsAngg)
            <tr>
                  <td>{{ $rsAngg['kd_anggota']}}</td>
                  <td>{{ $rsAngg['no_anggota']}}
                  </td>
                  <td>{{ $rsAngg['nama']}}</td>
                  <td>{{ $rsAngg['tempat'].",".$rsAngg['tgl_lahir']}}</td>
                  <td>{{ $rsAngg['alamat'].",".$rsAngg['kota']}}</td>
                  <td>{{ $rsAngg['email']}}
                  </td>
                  <td>
                        <a href="/anggota/edit/{{ $rsAngg->kd_anggota }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/anggota/hapus/{{ $rsAngg->kd_anggota }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                        <a href="/anggota/print/{{ $rsAngg->kd_anggota }}"><button type="button" class="btn bg-green btn-flat"><i class="fa fa-print"></i></button></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop

