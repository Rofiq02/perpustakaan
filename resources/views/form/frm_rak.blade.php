@extends('template')

@section('judul')
Form Rak Buku
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

<form id="frmRak" class="form-horizontal" action="{{ url('rak/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata rak -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data rak</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_rak" class="col-sm-2 control-label">Nama rak</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_rak" value="{{ $rak['kd_rak'] }}">
                            <input type="text" class="form-control" id="nama_rak" placeholder="Nama rak" name="nama_rak" value="{{ $rak['nama_rak'] }}">
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
