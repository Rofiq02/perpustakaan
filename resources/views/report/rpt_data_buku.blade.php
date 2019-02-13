<style>
    table {
        position: relative; 
        border-collapse:collapse; 
        width: 100%;
    }

    table td {
        border:1px solid #000;
        padding: 5px;
    }

    h1,h2,p {
        margin: 0;
        text-align: center;
    }

    p {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 8px double #000;
    }

    .title {
        background: #ccc;
    }

</style>

<h1>PERPUSTAKAAN UMUM</h1>
<h2>WEARNES EDUCATION CENTER MADIUN</h2>
<p> Jl Thamrin 35 A Madiun, Telp : (0351) 456789 , www.wearneslib.com, perpus@wearneslib.com</p>

<table>
    <tr class="title">
        <td width=3% style=text-align:center;>#</td>
        <td width=23% style=text-align:center;>judul</td>
        <td width=17% style=text-align:center;>Pengarang</td>
        <td width=22% style=text-align:center;>Penerbit</td>
        <td width=10% style=text-align:center;>Kategori</td>
        <td width=5% style=text-align:center;>Halaman</td>
        <td width=5% style=text-align:center;>Edisi</td>
        <td width=15% style=text-align:center;>ISBN</td>
    </tr>
    @foreach($buku as $rsBuku)
    <tr>
       <td>{{ $rsBuku->kd_buku }}</td>
        <td>{{ $rsBuku->judul }}</td>
        <td>{{ App\MGlobal::Get_Pengarang($rsBuku->kd_pengarang) }}</td>
        <td>{{ App\MGlobal::Get_Penerbit($rsBuku->kd_penerbit)." / ".$rsBuku->tempat_terbit."/".$rsBuku->tahun_terbit }}</td>
        <td>{{ App\MGlobal::Get_Kategori($rsBuku->kd_kategori) }}</td>
        <td>{{ $rsBuku->halaman }}</td>
        <td>{{ $rsBuku->edisi }}</td>
        <td>{{ $rsBuku->ISBN }}</td>
    </tr>
    @endforeach
</table>