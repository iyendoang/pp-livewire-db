<nav class="navbar fixed-top navbar-dark bg-primary header">
  <div class="container-fluid">
    <div class="left">
        <!-- Tombol open sidebar -->
        <a @click="navOpen = !navOpen" style="cursor: pointer" class="pe-3 text-decoration-none">
            <span class="navbar-toggler-icon"></span>
        </a>

        <a class="navbar-brand" href="#">
          <img src="{{asset('images/judul.png')}}" />
        </a>
    </div>
    <div class="right">
      <!-- Menu user -->
      <ul class="navbar-nav">
        <x-menu-dropdown label="{{Auth::guard('admin')->user()->name}}" posisi="atas">
          <x-menu-link route="admin.profil" icon="fas fa-user">Profil</x-menu-link>
          <li class="nav-item">
            <a class="nav-link" style="cursor: pointer" @click="$refs.logout.submit()">
                <i class="icon fas fa-power-off"></i> <span>Logout<span>         
            </a>
          </li>
          <form x-ref="logout" method="POST" action="{{ route('admin.logout') }}">
              @csrf
          </form>
        </x-menu-dropdown>
      </ul>
      
    </div>
  </div>
</nav>