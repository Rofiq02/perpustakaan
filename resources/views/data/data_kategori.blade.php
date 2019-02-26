@extends('template')

@section('judul')
Data Kategori
@stop

@section('ac-kategori')
active
@stop

<style>
  .inputfile {
	width: 200px!important;
	height: 200px!important;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

</style>
@section('content')
    <div class="box">
        <div class="box-header">
            <form action="{{ url('/kategori/import') }}" method="post" enctype="multipart/form-data">
            <a href="kategori/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
            <button class="btn btn-primary btn-sm">Upload Excel</button>
                @csrf

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="form-group">
                        <label for="">File (.xls, .xlsx)</label>
                        <input type="file" class="form-control" name="file">
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>
            <!--MULAI -->
    <!-- TUTUP -->
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Singkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $rsKat)
            <tr>
                  <td>{{ $rsKat['kd_kategori']}}</td>
                  <td>{{ $rsKat['nama_kategori']}}</td>
                  <td>{{ $rsKat['singkatan']}}</td>
                  <td>
                        <a href="/kategori/edit/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/kategori/hapus/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <script>
        var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});
    </script>
@stop




