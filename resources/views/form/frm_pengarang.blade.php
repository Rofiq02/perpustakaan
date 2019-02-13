@extends('template')

@section('judul')
Form Pengarang Buku
@stop

@section('content')

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</em>
</div>
@endif

<form id="frmPengarang" class="form-horizontal" action="{{ url('pengarang/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata pengarang -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data pengarang</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_pengarang" class="col-sm-2 control-label">Nama pengarang</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_pengarang" value="{{ $pengarang['kd_pengarang'] }}">
                            <input type="text" class="form-control" id="nama_pengarang" placeholder="Nama pengarang" name="nama_pengarang" value="{{ $pengarang['nama_pengarang'] }}">
                        </div>
                    </div>    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button onclick="return confimation_simpan(this)" type="submit" class="btn btn-primary pull-right">SAVE</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
