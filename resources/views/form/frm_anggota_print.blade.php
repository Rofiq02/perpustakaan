@extends('template')

@section('judul')
Form Anggota
@stop

@section('content')
     <!--- Footer Box -->
     <div class="box-footer">
                <button type="submit" id="cetak" class="btn bg-green btn-flat" target="blank"><i class="fa fa-print"></i></button>
                <a href="{{ url('anggota') }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-close"></i></button></a>
    </div>
<div id="cetak-idcard" style="margin-top:25px;">    
  <div class="col-md-6">
  
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow" style="height:100px">
            <div class="judul">
                <h4 class="widget-user-username" style="margin-top:13px; text-align:center; padding-left: 120em color:black;"><strong>PERPUSTAKAAN UMUM</strong></h4>
                <h5 class="widget-user-desc" style=" color:white; text-align:center; line-height:4px;">WEARNES EDUCATION CENTER</h5>
              </div>
              <div class="logo">
                        <!-- User Image -->
                        <img src="{{asset('img/wearnes.jpg')}}" style="width:45px; float:right; margin-top:-60px;">
              </div>
              <div class="widget-user-image">
                @if($anggota['foto'])
                        <img id="avatar" class="img-circle" src="{{ asset('img/'.$anggota['foto']) }}" style="width:26%;border: 2px solid #ccc; margin-top:-30px;">
                    @else
                        <img id="avatar" class="img-circle" src="{{ asset('img/0.jpg') }}" style="width:26%;border: 2px solid #ccc; margin-top:-30px;">
                    @endif
                    <input id="file" type="file" class="img-circle" name="foto" style="display: none">
                    <input type="hidden" class="img-circle" name="old_foto" value="{{ $anggota['foto'] }}" alt="User Avatar"><br>
              </div>
              <!-- /.widget-user-image -->
              <div class="qrcode" style="float:right; margin-top:6px; margin-right:-20px; ">
              <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(100)->generate($anggota->no_anggota)) }}">
              </div>
              <h4 class="widget-user-username" style="margin-top:10px; color:black; margin-left:135px;"><strong>{{ $anggota->nama }}</strong></h4>
              <h5 class="widget-user-desc" style="margin-top:3px; color:#f39c12; line-height:4px; margin-left:135px;"><strong>{{ $anggota->pekerjaan }}</strong></h5>
            </div>
           <table style="margin-top:80px;">
            <thead>
                <tr>
                    <th style="padding-left: 1em ">ID No</th>
                    <th style="padding-left: 0.8em">| &ensp; Joined</th>
                    <th style="padding-left: 1em">| &ensp; Email</th>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-left: 1em ">{{ $anggota->no_anggota }}</td>
                    <td style="padding-left: 0.8em">| &ensp; {{ date('d / m / y') }}</td>
                    <td style="padding-left: 1em">| &ensp; {{ $anggota->email }}</td>
                </tr>
            </tbody>
            </table>
            <table style="margin-top:6px; margin-bottom:3px;">
            <thead>
                <tr>
                    <th style="padding-left: 1em">D.O.B</th>
                    <th style="padding-left: 1.8em">| &ensp; Expired</th>
                    <th style="padding-left: 1em">| &ensp; Phone</th>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-left: 1em">{{ $anggota->tgl_lahir }}</td>
                    <td style="padding-left: 1.8em">| &ensp; {{ date('d / m / y',strtotime('+5 years')) }}</td>
                    <td style="padding-left: 1em">| &ensp; {{ $anggota->telp }}</td>
                </tr>
            </tbody>
                <div class="v2" style="float:right; margin-top:25px; margin-right:10px;"><strong>ID CARD</strong></div>
            </table>
            <div class="widget-user-footer bg-orange" style="height:3px;">
            </div>
          </div>
          
          <!-- /.widget-user -->
        </div>
    </div>
<!--SCRIPT PRINT-->
        <script>
        (function($) {
            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {
                 
                // aksi ketika tombol cetak ditekan
                $("#cetak").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#cetak-idcard').printArea();
                });
            });
        }) (jQuery);
    </script>
@stop
