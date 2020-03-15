<ul class="menu">

<li class="menu-category">Preview</li>

<li class="menu-item active">
  <a class="menu-link" href="{{url('/','home')}}">
    <span class="icon fa fa-home"></span>
    <span class="title">Dashboard</span>
  </a>
</li>





<li class="menu-category">Framework</li>


<li class="menu-item">
  <a class="menu-link" href="#">
    <span class="icon ti-layout"></span>
    <span class="title">Buku</span>
    <span class="arrow"></span>
  </a>

  <ul class="menu-submenu">
    <li class="menu-item ">
      <a class="menu-link" href="/buku">
        <span class="dot"></span>
        <span class="title">Buku</span>
      </a>
    </li>
  </ul>
</li>


<li class="menu-item">
  <a class="menu-link" href="#">
    <span class="icon ti-layout"></span>
    <span class="title">List User</span>
    <span class="arrow"></span>
  </a>

  <ul class="menu-submenu">
    <li class="menu-item">
      <a class="menu-link" href="{{ route('admin.users.index') }}">
        <span class="dot"></span>
        <span class="title">List User</span>
      </a>
    </li>
  </ul>
</li>

<li class="menu-item">
  <a class="menu-link" href="#">
    <span class="icon ti-layout"></span>
    <span class="title">Peminjaman</span>
    <span class="arrow"></span>
  </a>

  <ul class="menu-submenu">
    <li class="menu-item">
      <a class="menu-link" href="/peminjam">
        <span class="dot"></span>
        <span class="title">List User</span>
      </a>
    </li>
  </ul>
</li>








</ul>