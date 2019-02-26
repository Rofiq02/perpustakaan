@extends('template')

@section('judul')
Data Pengarang Buku
@stop

@section('ac-pengarang')
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
        <form action="{{ url('/pengarang/import') }}" method="post" enctype="multipart/form-data">
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

