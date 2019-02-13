@extends('template')

@section('judul')
    Form Peminjaman
@stop

@section('ac-transaksi')
active
@stop

@section('content')

<div class="box">
    <div class="box-body">
        @if($anggota=="")
            <form id="frmPinjam" action="{{ url('trans/peminjaman') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="judul" class="col-sm-12 control-label" style="text-align:center">No Anggota</label>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_anggota" placeholder="No Anggota" name="no_anggota">
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
        @else
        <form id="frmPinjam" action="{{ url('trans/peminjaman/save') }}" method="post">
            @csrf
            <!-- Input No Anggota -->
            <input type="hidden" name="no_anggota" value="{{ $anggota->no_anggota }}">
            <input type="hidden" name="nama" value="{{ $anggota->nama }}">            
           <div class="box-header">
                <h3 class="box-title">Data Peminjam</h3>
                <br/> <br/>
                <strong>{{ $anggota->nama }} ( {{ $anggota->no_anggota }} )</strong><br/>
                {{ $anggota->alamat." ".$anggota->kota }}<br/>
                Email : {{ $anggota->email }}<br/>
                Telepon : {{ $anggota->telp }}
           </div>
           <div class="box-header">
                <h3 class="box-title">Detail Peminjaman</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#m-buku">
                    ADD BUKU
                    </button>
                </div>
            </div> 
            <!-- Table List Buku yang Dipinjam -->
            <table class="table table-hover"  style="margin-top: 15px;">
                <tbody id="lsBuku">
                    <tr style="background:#ccc;">
                        <th width="2%">#</th>
                        <th width="15%">No Induk Buku</th>
                        <th>Judul</th>
                        <th width="5%">Action</th>
                    </tr>
                </tbody>
            </table>
            <!--- Footer Box -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">SAVE</button>
                <a href="{{ url('trans/peminjaman') }}"><button type="button" class="btn btn-warning btn-flat">CANCEL</button></a>
            </div> 
        </form>                                 
        @endif
    </div>
</div>

<!-- LAPORAN DATA PINJAM-->
<div class="box">
        <div class="box-header">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>no_induk_buku</th>
                  <th>Judul</th>
                  <th>Nama Kategori</th>
                  <th>Nama Rak</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tampil as $rsTam)
            <tr>
                  <td>{{ $rsTam->no_induk_buku }}</td>
                  <td>{{ $rsTam->judul }}</td>
                  <td>{{ $rsTam->nama_kategori }}</td>
                  <td>{{ $rsTam->nama_rak }}</td>
                  <td>{{ ($rsTam->status==0 ? "Tersedia" : "" ) }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

@if($buku!="")
<!-- List Data Buku -->
<div class="modal modal-default fade" id="m-buku">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Data Buku</h4>
        </div>
        <div class="modal-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="2%">#</th>
                        <th width="10%">No Induk</th>
                        <th width="86%">Judul</th>
                        <th width="2%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Menampilkan Data Anggota -->
                    @foreach($buku as $rsBuku)
                    <tr>
                        <td>{{ $rsBuku->kd_koleksi }}</td>
                        <td>{{ $rsBuku->no_induk_buku }}</td>                    
                        <td>{{ $rsBuku->judul }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs btn-flat" onclick="add_buku('{{ $rsBuku->no_induk_buku }}','{{ $rsBuku->judul }}')" data-dismiss="modal">PILIH</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



@endif
@stop
