@extends('template')

@section('judul')
Data Penerbit
@stop

@section('ac-penerbit')
active
@stop

<style>
  .inputfile {
	width: 200px!important;
	height: 200px!important;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

</style>
@section('content')
    <div class="box">
        <div class="box-header">
        <form action="{{ url('/penerbit/import') }}" method="post" enctype="multipart/form-data">
            <a href="rak/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
            <button class="btn btn-primary btn-sm">Upload Excel</button>
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
                        <input type="file" class="form-control" name="file">
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>
                </form>
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

