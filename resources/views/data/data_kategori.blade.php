@extends('template')

@section('judul')
Data Kategori
@stop

@section('ac-kategori')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="kategori/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
            <!--MULAI -->
            <div class="container">
        <div class="row" style="padding-top: 30px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/kategori/import') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">File (.xls, .xlsx)</label>
                                <button type="button" class="btn bg-green btn-flat"><i class="fa fa-print"></i></button>
                                <input type="file" class="form-control" name="file">
                                <p class="text-danger">{{ $errors->first('file') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
    <!-- TUTUP -->
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Singkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $rsKat)
            <tr>
                  <td>{{ $rsKat['kd_kategori']}}</td>
                  <td>{{ $rsKat['nama_kategori']}}</td>
                  <td>{{ $rsKat['singkatan']}}</td>
                  <td>
                        <a href="/kategori/edit/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/kategori/hapus/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




