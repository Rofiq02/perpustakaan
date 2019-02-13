@extends('template')

@section('judul')
Form Anggota
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

<form id="frmAnggota" class="form-horizontal" action="{{ url('anggota/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFoto col-md-3">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Foto</h3>
                </div>
                <div class="box-body">
                    @if($anggota['foto'])
                        <img id="avatar" src="{{ asset('img/'.$anggota['foto']) }}" style="width:100%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/0.jpg') }}" style="width:100%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" name="foto" style="display: none">
                    <input type="hidden" name="old_foto" value="{{ $anggota['foto'] }}">
                </div>
            </div>
        </div>
        <div class="fForm col-md-9">
            <div class="box">
                <!-- Bidodata Anggota -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Anggota</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_anggota" value="{{ $anggota['kd_anggota'] }}">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Anggota" name="nama" value="{{ $anggota['nama'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tempat" placeholder="Tempat Lahir" name="tempat" value="{{ $anggota['tempat'] }}">
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>          
                                <input id="datepicker" type="text" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{ $anggota['tgl_lahir'] }}">
                            </div>
                        </div>                        
                    </div> 
                    <div class="form-group">
                        <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jk" value="{{ $anggota['jk'] }}">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option {{ $anggota['jk']==1 ? 'selected' : '' }} value="1">Laki-Laki</option>
                                <option {{ $anggota['jk']==2 ? 'selected' : '' }} value="2">Perempuan</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat">{{ $anggota['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kota" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kota" placeholder="Kota" name="kota" value="{{ $anggota['kota'] }}">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" value="{{ $anggota['pekerjaan'] }}">
                        </div>
                    </div>                        
                    <div class="form-group">
                        <label for="telp" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Telepon" name="telp" value="{{ $anggota['telp'] }}"">
                            </div> 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $anggota['email'] }}">
                            </div> 
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Login</h3>
                    </div>                                                                                      
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="username" placeholder="Username" name="user_name" value="{{ $anggota['user_name'] }}">
                            </div>                         
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>             
                                <input type="password" class="form-control" id="password" placeholder="Password" name="user_password">
                                <input type="hidden" value="{{ $anggota['user_password'] }}" name="old_password">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button  onclick="return confimation_simpan(this)" type="submit" class="btn btn-primary pull-right">SAVE</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
