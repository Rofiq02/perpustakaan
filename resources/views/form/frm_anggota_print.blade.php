@extends('template')

@section('judul')
Kartu Anggota
@stop

<style>

    .img{
        position:relative;
    }

</style>

@section('content')



<div id="ukuran">
    <!-- QR CODE -->
    <div class="qrcode">
        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(56)->generate($anggota->no_anggota)) }}" style="margin-left:235px; margin-top:10px; position:absolute;">
    </div>

<div class="semua">
    <h4 class="s" style="margin-left:160px; margin-top:55px; font-size:12px; position:absolute; color:#0e2024;"><strong>{{ $anggota->nama }}</strong></h4>
    <h5 class="t" style=" margin-left:160px; margin-top:67px; font-size:10px; position:absolute; color:#0e2024;"><strong>{{ $anggota->pekerjaan }}</strong></h5>
    <img src="{{ asset('img/bg-card3.jpg') }}" style="width:80mm; height:53mm;"/>
    <div class="no" style=" margin-left:205px; margin-top:-75px; position:absolute; font-size:14px; font-style:arial;"><strong style="color:white !important;">{{ $anggota->no_anggota }}</strong></div>
    <div class="tanggal" style="margin-left:200px; margin-top:-8; position:absolute;
        font-size:6px;"><strong style="color:white !important;">{{ date('d / m / y',strtotime('+5 years')) }}</strong></div>
</div>


<!-- Foto -->
   <div class="foto" style="margin-top:-65px; margin-left:14px; position:absolute; border:green;">
        @if($anggota['foto'])
        <img id="avatar" style="width:50px;" src="{{ asset('img/'.$anggota['foto']) }}">
        @else
        <img id="avatar" style="width:50px;" src="{{ asset('img/0.jpg') }}">
        @endif
        <input id="file" type="file" name="foto" style="display: none">
        <input type="hidden" name="old_foto" value="{{ $anggota['foto'] }}">
    </div>

</div>

<button id="cetak" class="btn pull-right">Cetak</button>

<script>
        (function($) {
            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {
                 
                // aksi ketika tombol cetak ditekan
                $("#cetak").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#ukuran').printArea();
                });
            });
        }) (jQuery);
    </script>

@stop   


