@extends('template')

@section('judul')
Form Anggota
@stop

@section('content')

<div class="box">
    <div class="box-body">
        <form id="frmAnggotaPrint" action="{{ url('anggota/print') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Input No Anggota -->
            <input type="hidden" name="no_anggota" value="{{ $anggota->no_anggota }}">
            <input type="hidden" name="nama" value="{{ $anggota->nama }}">            
           <div class="box-header">
                <h3 class="box-title">Kartu Anggota</h3>
                <br/> <br/>
                <strong>{{ $anggota->nama }} ( {{ $anggota->no_anggota }} )</strong><br/>
                {{ $anggota->alamat." ".$anggota->kota }}<br/>
                Email : {{ $anggota->email }}<br/>
                Telepon : {{ $anggota->telp }}
           </div>
            <!--- Footer Box -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">SAVE</button>
                <a href="{{ url('anggota') }}"><button type="button" class="btn btn-warning btn-flat">CANCEL</button></a>
            </div> 
        </form>                                 
    </div>
</div>            
@stop
