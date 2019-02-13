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
    <td width=18% style=text-align:center;>No Induk Buku</td>
    <td width=36% style=text-align:center;>judul</td>
    <td width=18% style=text-align:center;>Kategori</td>
    <td width=10% style=text-align:center;>Rak</td>
    <td width=18% style=text-align:center;>ISBN</td>
    </tr>
    @foreach($buku as $rsBuku)
    <tr>
    <td>{{ $rsBuku->no_induk_buku }}</td>
    <td>{{ $rsBuku->judul }}</td>
    <td>{{ $rsBuku->nama_kategori }}</td>
    <td>{{ $rsBuku->nama_rak }}</td>
    <td>{{ $rsBuku->ISBN }}</td>
    </tr>
    @endforeach
</table>