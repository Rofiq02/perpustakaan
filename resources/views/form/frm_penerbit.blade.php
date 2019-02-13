@extends('template')

@section('judul')
Form penerbit
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

<form id="frmPenerbit" class="form-horizontal" action="{{ url('penerbit/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata penerbit -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data penerbit</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_penerbit" class="col-sm-2 control-label">Nama penerbit</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_penerbit" value="{{ $penerbit['kd_penerbit'] }}">
                            <input type="text" class="form-control" id="nama_penerbit" placeholder="Nama penerbit" name="nama_penerbit" value="{{ $penerbit['nama_penerbit'] }}">
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
