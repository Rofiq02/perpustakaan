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
           <div class="row">
              <div class="bagian_kiri col-md-8">
                <h2 class="judul" style="text-align:center;">PERPUSTAKAAN UMUM</h2>
                    <h4 class="subjudul" style="text-align:center;" >Wearnes Education Center Madiun</h4>
                <br/> <br/>
                <strong>{{ $anggota->nama }}</strong><br/>
                <td width="20%"><img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(150)->generate($anggota->no_anggota)) }}">
                    <p>{{ $anggota->no_anggota }}</p>
                </td>
              </div>
                <div class="bagian_kanan col-md-4">
                <strong>{{ $anggota->pekerjaan }}</strong><br/>
                @if($anggota['foto'])
                        <img id="avatar" src="{{ asset('img/'.$anggota['foto']) }}" style="width:50%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/0.jpg') }}" style="width:50%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" name="foto" style="display: none">
                    <input type="hidden" name="old_foto" value="{{ $anggota['foto'] }}"><br>

                <div class="masa">
                    <h4>Masa Berlaku Kartu</h4>
                    @php                        
                        echo date('d / M / Y',strtotime('+5 years'));
                    @endphp
                            
                        
                    </div>
                </div>
            </div>
           </div>
            <!--- Footer Box -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">SAVE</button>
                <a href="{{ url('anggota') }}"><button type="button" class="btn btn-warning btn-flat">CANCEL</button></a>
            </div> 
        </form>                                 
    </div>
</div>         

<div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                @if($anggota['foto'])
                        <img id="avatar" class="img-circle" src="{{ asset('img/'.$anggota['foto']) }}" style="width:30%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" class="img-circle" src="{{ asset('img/0.jpg') }}" style="width:30%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" class="img-circle" name="foto" style="display: none">
                    <input type="hidden" class="img-circle" name="old_foto" value="{{ $anggota['foto'] }}" alt="User Avatar"><br>
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Nadia Carmichael</h3>
              <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
            <br>
            <br>
            <br>
            <table>
                <tr class="title">
                    <td width=18% style=text-align:center;>No Anggota</td>
                    <td width=36% style=text-align:center;>Joind Date</td>
                    <td width=18% style=text-align:center;>Email</td>
                </tr>
                @foreach($anggota as $rsAngg)
                <tr>
                    <td>{{ $rsAngg->no_anggota }}</td>
                    <td>{{ $rsAngg->date('d / M / Y') }}</td>
                    <td>{{ $rsAngg->email }}</td>
                </tr>
    @endforeach
</table>
          </div>
          <!-- /.widget-user -->
        </div>
@stop
