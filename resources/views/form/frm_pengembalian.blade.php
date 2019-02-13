@extends('template')

@section('judul')
    Form Pengembalian
@stop

@section('ac-transaksi')
active
@stop

@section('content')

<div class="box">
    <div class="box-body">
        @if($pinjam=="")
            <form id="frmKembali" action="{{ url('trans/pengembalian') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="judul" class="col-sm-12 control-label" style="text-align:center">No Pinjam</label>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_pinjam" placeholder="No Pinjam" name="no_pinjam">
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
        @else
        <form id="frmPinjam" action="{{ url('trans/pengembalian/save') }}" method="post">
            @csrf
            <!-- Input No Anggota -->
            <input type="hidden" name="no_pinjam" value="{{ $pinjam[0]->no_pinjam }}">
           <div class="box-header">
                <h3 class="box-title">#{{ $pinjam[0]->no_pinjam }}</h3>
                <br/><br/>
                No Anggota :<strong>{{ $pinjam[0]->no_anggota }} </strong><br/>
                Nama : {{ $pinjam[0]->nama }}
           </div>
           <div class="box-header">
                <h3 class="box-title">Detail Peminjaman</h3>
            </div> 
            <!-- Table List Buku yang Dipinjam -->
            <table class="table table-hover"  style="margin-top: 15px;">
                <tbody id="lsBuku">
                    <tr style="background:#ccc;">
                        <th width="15%">No Induk Buku</th>
                        <th>Judul</th>
                        <th width="5%">Telat</th>
                        <th width="5%">Denda</th>
                    </tr>
                    @foreach($pinjam as $rsPinjam)
                    <tr>
                        <th width="10%">
                        {{ $rsPinjam->no_induk_buku }}
                        <input type="hidden" name="no_induk[]" value="{{ $rsPinjam->no_induk_buku }}">
                        </th>
                        <th>{{ $rsPinjam->judul }}</th>
                        <th width="8%">
                        <!-- Menhitung Selisih Hari -->
                        @php                        
                            $start = new DateTime($rsPinjam->tgl_kembali);
                            $end = new DateTime();
                            $selisih = $end->diff($start);   
                            
                            $lamadenda = 0;
                            if($end>$start){
                                $lamadenda = $selisih->d;
                            }
                            echo $lamadenda;
                        @endphp
                        </th>
                        <th width="8%">
                        {{ $lamadenda * 2000 }}
                        <input type="hidden" name="denda" value="{{ $lamadenda * 2000 }}">
                        </th>
                    </tr>       
                    @endforeach             
                </tbody>
            </table>
            <!--- Footer Box -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">SAVE</button>
                <a href="{{ url('trans/pengembalian') }}"><button type="button" class="btn btn-warning btn-flat">CANCEL</button></a>
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
                  <th>No Pinjam</th>
                  <th>Nama Anggota</th>
                  <th>Judul Buku</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Denda</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tampil as $rsTam)
            <tr>
                  <td>{{ $rsTam->no_pinjam }}</td>
                  <td>{{ $rsTam->nama }}</td>
                  <td>{{ $rsTam->judul }}</td>
                  <td>{{ $rsTam->tgl_pinjam }}</td>
                  <td>{{ $rsTam->tgl_kembali }}</td>
                  <td>{{ $rsTam->denda }}</td>
                  <td>{{ ($rsTam->status==1 ? "Dipinjam" : "" ) }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop
