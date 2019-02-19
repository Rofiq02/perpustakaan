<style>

    .img{
        position:relative;
    }
    .qrcode{
        margin-left:830px;
        margin-top:25px;
        position:absolute;
    }
    .s{
        margin-left:580px;
        margin-top:200px;
        font-size:30px;
        position:absolute;
        color:#0e2024;
    }
    .t{
        margin-left:580px;
        margin-top:230px;
        font-size:20px;
        position:absolute;
        color:#0e2024;
    }
    .no{
        float:right;
        margin-left:695px;
        margin-top:-235px;
        position:absolute;
        color:white;
        font-size:45px;
        font-style:arial;
    }
    .tanggal{
        margin-left:670px;
        margin-top:-20px;
        color:white;
        position:absolute;
    }
    .foto{
        margin-top:-220px;
        margin-left:30px;
        position:absolute;
    }

</style>



    <!-- QR CODE -->
    <div class="qrcode">
        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(130)->generate($anggota->no_anggota)) }}">
    </div>

<div class="semua">
    <h4 class="s"><strong>{{ $anggota->nama }}</strong></h4>
    <h5 class="t"><strong>{{ $anggota->pekerjaan }}</strong></h5>
    <img src="{{asset('img/bg-card3.jpg')}}">
    <div class="no"><strong>{{ $anggota->no_anggota }}</strong></div>
    <div class="tanggal"><strong>{{ date('d / m / y',strtotime('+5 years')) }}</strong></div>
</div>


<!-- Foto -->
    <div class="foto">
        @if($anggota['foto'])
        <img id="avatar" style="width:170px;" src="{{ asset('img/'.$anggota['foto']) }}">
        @else
        <img id="avatar" style="width:170px;" src="{{ asset('img/0.jpg') }}">
        @endif
        <input id="file" type="file" name="foto" style="display: none">
        <input type="hidden" name="old_foto" value="{{ $anggota['foto'] }}">
    </div>


    


