@extends('template')

@section('judul')
Form kategori
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

<form id="frmKategori" class="form-horizontal" action="{{ url('kategori/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata kategori -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data kategori</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_kategori" class="col-sm-2 control-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_kategori" value="{{ $kategori['kd_kategori'] }}">
                            <input type="text" class="form-control" id="nama_kategori" placeholder="Nama Kategori" name="nama_kategori" value="{{ $kategori['nama_kategori'] }}">
                        </div>
                    </div>    
                </div>
                <div class="form-group">
                        <label for="singkatan" class="col-sm-2 control-label">Singkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="singkatan" placeholder="Singkatan" name="singkatan" value="{{ $kategori['singkatan'] }}">
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
