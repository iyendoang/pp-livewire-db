<nav class="navbar fixed-top navbar-dark bg-primary header">
  <div class="container">
    <div class="left mb-2">
        <!-- Tombol open sidebar -->
        <a @click="navOpen = !navOpen" style="cursor: pointer" class="pe-3 d-md-none text-decoration-none">
            <span class="navbar-toggler-icon"></span>
        </a>
        
        <a class="navbar-brand front" href="#">
          <img src="{{asset('images/judul.png')}}"/>
        </a>
    </div>
    <div class="right">
      @guest <!-- menampilkan tombol daftar dan login jika belum login -->
        @if(!request()->is('login') & !request()->is('register')) <!-- hanya tampil jika tidak di halaman login dan register -->
          <a href="/login" class="btn btn-secondary me-1 text-white">Login</a>
          @if($periode and Carbon\Carbon::now()->isBetween($periode->tanggal_buka, $periode->tanggal_tutup))
            <a href="/register" class="btn btn-secondary active text-white">Daftar</a>
          @endif
        @else
          <ul class="navbar-nav">
          <x-menu-link route="home" icon="fas fa-home">Beranda</x-menu-link>
          </ul>
        @endif
      @else
        <!-- menampilkan menu user jika sudah login  -->
      <ul class="navbar-nav">
        <x-menu-dropdown label="{{Auth::user()->name}}" posisi="atas">
          <x-menu-link route="dashboard" icon="fas fa-tachometer-alt">Dashboard</x-menu-link>
          <x-menu-link route="profil" icon="fas fa-user">Ubah Profil</x-menu-link>
          <li class="nav-item">
            <a class="nav-link" style="cursor: pointer" @click="$refs.logout.submit()">
                <i class="icon fas fa-power-off"></i> <span>Logout<span>         
            </a>
          </li>
          <form x-ref="logout" method="POST" action="{{ route('logout') }}">
              @csrf
          </form>
        </x-menu-dropdown>
      </ul>
      @endguest
    </div>
  </div>
</nav>