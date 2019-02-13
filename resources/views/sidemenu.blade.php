<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ Auth::user()->avatar =="" ? asset('img/avatar5.png') : asset('img/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user() !="" ? Auth::user()->name : "" }}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="@yield('ac-dash')"><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard "></i><span>Dashboard</span></a></li>
    <li class="treeview @yield('ac-buku')">
      <a href="{{ url('buku') }}"><i class="fa fa-book"></i> <span>Buku</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('buku/add') }}">Add New</a></li>
        <li><a href="{{ url('buku') }}">Data Buku</a></li>
        <li><a href="{{ url('koleksi') }}">Data Koleksi Buku</a></li>
      </ul>
    </li>   
    <li class="treeview @yield('ac-anggota')">
      <a href="{{ url('anggota') }}"><i class="fa fa-users"></i> <span>Anggota</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('anggota/add') }}">Add New</a></li>
        <li><a href="{{ url('anggota') }}">Data Anggota</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-user"></i> <span>Users</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('user/add') }}" target="blank">Add New</a></li>
        <li><a href="{{ url('user') }}">Data User</a></li>
      </ul>
    </li>    

  <li class="treeview @yield('ac-kategori')">
      <a href="{{ url('kategori') }}"><i class="fa fa-tags"></i> <span>Kategori</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      <ul class="treeview-menu">
        <li><a href="{{ url('kategori/add') }}">Add New</a></li>
        <li><a href="{{ url('kategori') }}">Data Kategori</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-penerbit')">
      <a href="{{ url('penerbit') }}"><i class="fa fa-envelope-square"></i> <span>Penerbit</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      <ul class="treeview-menu">
        <li><a href="{{ url('penerbit/add') }}">Add New</a></li>
        <li><a href="{{ url('penerbit') }}">Data Penerbit</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-pengarang')">
      <a href="{{ url('pengarang') }}"><i class="fa fa-pencil"></i> <span>Pengarang</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      <ul class="treeview-menu">
        <li><a href="{{ url('pengarang/add') }}">Add New</a></li>
        <li><a href="{{ url('pengarang') }}">Data Pengarang</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-rak')">
      <a href="{{ url('rak') }}"><i class="fa fa-tasks"></i> <span>Rak</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      <ul class="treeview-menu">
        <li><a href="{{ url('rak/add') }}">Add New</a></li>
        <li><a href="{{ url('rak') }}">Data Rak</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-transaksi')">
      <a href="#"><i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('trans/peminjaman') }}">Peminjaman</a></li>
        <li><a href="{{ url('trans/pengembalian') }}">Pengembalian</a></li>
      </ul>
    </li>      
    <li class="treeview @yield('ac-laporan')">
      <a href="#"><i class="fa fa-file-text"></i> <span>Laporan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('report/anggota') }}" target="blank">Laporan Anggota</a></li>
        <li><a href="{{ url('report/buku') }}" target="blank">Laporan Data Buku</a></li>
        <li><a href="{{ url('report/buku/tersedia') }}" target="blank">Laporan Buku Tersedia</a></li>
        <li><a href="{{ url('report/buku/dipinjam') }}" target="blank">Laporan Buku Dipinjam</a></li>
        <li><a href="{{ url('report/buku/rusak') }}" target="blank">Laporan Buku Rusak</a></li>
        <li><a href="{{ url('report/buku/hilang') }}" target="blank">Laporan Buku Hilang</a></li>
        <li><a href="{{ url('report/qrcode_buku') }}" target="blank">QR Code Buku</a></li>
      </ul>
    </li>


    </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
