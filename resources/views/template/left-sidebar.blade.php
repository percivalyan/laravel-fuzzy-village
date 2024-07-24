<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-leaf"></i> <!-- Change this icon if you have a specific logo -->
        </div>
        <div class="sidebar-brand-text mx-3">Agris Invest</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Lahan
    </div>

    <!-- Nav Item - Data Lahan Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseDataLahan"
            aria-expanded="true" aria-controls="collapseDataLahan">
            <i class="fas fa-fw fa-file-alt"></i> <!-- Icon for Data Lahan -->
            <span>Informasi Lahan</span>
        </a>
        <div id="collapseDataLahan" class="collapse" aria-labelledby="headingDataLahan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Lahan:</h6>
                <a class="collapse-item" href="{{ route('lahan.index') }}">Informasi</a>
                <a class="collapse-item" href="{{ route('foto.index') }}">Foto</a>
                <a class="collapse-item" href="{{ route('periode.index') }}">Periode</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Perhitungan
    </div>

    <!-- Nav Item - Perhitungan Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePerhitungan" aria-expanded="true"
            aria-controls="collapsePerhitungan">
            <i class="fas fa-fw fa-calculator"></i> <!-- Icon for Perhitungan -->
            <span>Metode Hitung</span>
        </a>
        <div id="collapsePerhitungan" class="collapse" aria-labelledby="headingPerhitungan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fuzzy Tsukamoto:</h6>
                <a class="collapse-item" href="{{ route('harga.index') }}">Harga Lahan</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Fuzzy Sugeno:</h6>
                <a class="collapse-item" href="{{ route('kesuburan.index') }}">Ukur Kesuburan</a>
            </div>
        </div>
    </li>
</ul>
