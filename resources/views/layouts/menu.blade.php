<nav id="sidebar">


<div class="navbar-nav theme-brand flex-row  text-center">
    <div class="nav-logo">
        <div class="nav-item theme-logo">
            <a href="{{ url('/dashboard') }}">
                <img src="{{ asset('') }}assets/logo/mobil.png"  alt="logo Sewa Mobil" style="width: 25px;height: 25px; ">
            </a>
        </div>
        <div class="nav-item theme-text">
            <a href="{{ url('/dashboard') }}" class="nav-link"> Sewa Mobil </a>
        </div>
    </div>
    <div class="nav-item sidebar-toggle">
        <div class="btn-toggle sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
        </div>
    </div>
</div>
<div class="profile-info">
    <div class="user-info">
        <div class="profile-img">
            <img src="{{ asset('') }}assets/logo/mobil.png" alt="avatar">
        </div>
        <div class="profile-content">
            <h6 class=""><font color="#e7515a">{{ Auth::user()->name }}</font></h6>
            <p class="">{{ Auth::user()->email }}</p>
        </div>
    </div>
</div>
                
<div class="shadow-bottom"></div>
<ul class="list-unstyled menu-categories" id="accordionExample">
    
    @can ('menu admin')
    <li class="menu  {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ url('/dashboard') }}" :active="request()->routeIs('dashboard')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-gauge"></i>&nbsp;
            <span><i>Dashboard</i></span>
            </div>
        </a>
    </li>

    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>MASTER DATA</span></div>
    </li>



    <li class="menu  {{ Request::is('mobil') ? 'active' : '' }}">
        <a href="{{ url('/mobil') }}" :active="request()->routeIs('mobil')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-car"></i>&nbsp;
            <span>Data Mobil</span>
            </div>
        </a>
    </li>



    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TRANSAKSI</span></div>
    </li>



    <li class="menu  {{ Request::is('pinjam-mobil-admin') ? 'active' : '' }}">
        <a href="{{ url('/pinjam-mobil-admin') }}" :active="request()->routeIs('pinjam-mobil-admin')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-hospital-user"></i>&nbsp;
            <span>Peminjaman</span>
            </div>
        </a>
    </li>






    @endcan




    @can ('menu member')
    <li class="menu  {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ url('/dashboard') }}" :active="request()->routeIs('dashboard')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-gauge"></i>&nbsp;
            <span><i>Dashboard</i></span>
            </div>
        </a>
    </li>

    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>MASTER DATA</span></div>
    </li>


   
    <li class="menu  {{ Request::is('mobil-member') ? 'active' : '' }}">
        <a href="{{ url('/mobil-member') }}" :active="request()->routeIs('mobil-member')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-car"></i>&nbsp;
            <span>Data Mobil</span>
            </div>
        </a>
    </li>

    <li class="menu  {{ Request::is('pinjam-mobil-riwayat') ? 'active' : '' }}">
        <a href="{{ url('/pinjam-mobil-riwayat') }}" :active="request()->routeIs('pinjam-mobil-riwayat')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-history"></i>&nbsp;
            <span>Riwayat Pinjam</span>
            </div>
        </a>
    </li>



    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TRANSAKSI</span></div>
    </li>



    <li class="menu  {{ Request::is('pinjam-mobil') ? 'active' : '' }}">
        <a href="{{ url('/pinjam-mobil') }}" :active="request()->routeIs('pinjam-mobil')" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="fa-solid fa-hospital-user"></i>&nbsp;
            <span>Peminjaman</span>
            </div>
        </a>
    </li>



    @endcan



    




    <br>
    <li class="menu">
        <a href="route('logout')" aria-expanded="false" class="dropdown-toggle" data-bs-toggle="modal" data-bs-target="#rotateleftModal">
            <div class="">
            <i class="fa-solid fa-right-from-bracket"></i>&nbsp;
                <span><i>Logout</i></span>
            </div>
        </a>
    </li>

    
    
</ul>

</nav>




