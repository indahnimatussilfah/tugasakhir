<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i> <!-- Ikon analis/petugas -->
        </div>
        <div class="sidebar-brand-text mx-3">Petugas Analis</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/petugasanalis">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <!-- Nav Item - Grafik -->
    <li class="nav-item {{ Request::is('grafikk') ? 'active' : '' }}">
        <a class="nav-link" href="/grafikk">
            <i class="fas fa-chart-line"></i> <!-- Lebih tepat untuk data grafik -->
            <span>Grafik</span>
        </a>
    </li>

    <!-- Nav Item - Monitoring Penyakit -->
    <li class="nav-item {{ Request::is('monitoringpenyakit') ? 'active' : '' }}">
        <a class="nav-link" href="/monitoringpenyakit">
            <i class="fas fa-virus"></i> <!-- Ikon yang cocok untuk penyakit -->
            <span>Monitoring Penyakit</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
