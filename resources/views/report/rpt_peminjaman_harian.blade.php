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
        <td width="15%" style=text-align:center;>NO PINJAM</td>
        <td width="15%" style=text-align:center;>ISBN</td>
        <td width="35%" style=text-align:center;>JUDUL</td>
        <td width="15%" style=text-align:center;>TANGGAL PINJAM</td>
        <td width="15%" style=text-align:center;>TANGGAL KEMBALI</td>
    </tr>
    @foreach($buku as $rsBuku)
    <tr>
        <td>{{ $rsBuku->no_pinjam }}</td>
        <td>{{ $rsBuku->ISBN }}</td>
        <td>{{ $rsBuku->judul }}</td>
        <td>{{ $rsBuku->tgl_pinjam }}</td>
        <td>{{ $rsBuku->tgl_kembali }}</td>
    </tr>
    @endforeach
</table>