<ul class="menu">

<li class="menu-category">Preview</li>

<li class="menu-item"{{ Request::is('admin') ? 'class=active' : '' }}>
  <a class="menu-link" href="{{ route('dashboard') }}">
    <span class="icon fa fa-home"></span>
    <span class="title">Dashboard</span>
  </a>
</li>


<li class="menu-category">Framework</li>

@if(Auth::user()->id_role == 1)
<li class="menu-item"{{ Request::is('admin/buku*') ? 'class=active' : '' }}>
  <a class="menu-link" href="{{ route('buku') }}">
    <span class="icon fa fa-book"></span>
    <span class="title">Buku</span>
  </a>
</li>
@endif

@if(Auth::user()->id_role == 1)
<li class="menu-item"{{ Request::is('admin/kategori*') ? 'class=active' : '' }}>
  <a class="menu-link" href="{{ route('kategori') }}">
    <span class="icon fa fa-book"></span>
    <span class="title">Kategori Buku</span>
  </a>
</li>
@endif

@if(Auth::user()->id_role == 1)
<li class="menu-item"{{ Request::is('admin/transaksi*') ? 'class=active' : '' }}>
  <a class="menu-link" href="{{ route('transaksi') }}">
    <span class="icon fa fa-book"></span>
    <span class="title">Transaksi</span>
  </a>
</li>
@endif

@if(Auth::user()->id_role == 1)
<li class="menu-item"{{ Request::is('admin/member*') ? 'class=active' : '' }}>
  <a class="menu-link" href="{{ route('member') }}">
    <span class="icon fa fa-book"></span>
    <span class="title">Member Perpus</span>
  </a>
</li>
@endif
</ul>