<body style="padding: 0">
    <nav class="navbar navbar-expand-lg navbar-light admin-background position-sticky admin-nav">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center mx-5">
                    <img src="{{asset('Assets/Image/Swift.png')}}" alt="Admin Logo" width="50" height="50" class="d-inline-block align-text-top img-fluid">
                    <h1 class="fs-3 ms-4 mb-0 header">SwiftPay <span class="header-admin"> - Admin</span></h1>
                </a>

                <!-- Admin Menu -->
                 <!-- Admin Menu -->
                 <div class="d-flex gap-2 ms-4 admin-menu">
                    <a href="{{ route('admin.ManageSiswa') }}" class="admin-link {{ request()->routeIs('admin.ManageSiswa') ? 'active' : '' }}">Manage Siswa</a>
                    <div class="garis mx-3">|</div>
                    <a href="{{ route('admin.ManageKelas') }}" class="admin-link {{ request()->routeIs('admin.ManageKelas') ? 'active' : '' }}">Manage Kelas</a>
                    <div class="garis mx-3">|</div>
                    <a href="{{ route('admin.ManagePetugas') }}" class="admin-link {{ request()->routeIs('admin.ManagePetugas') ? 'active' : '' }}">Manage Petugas</a>
                    <div class="garis mx-3">|</div>
                    <a href="{{ route('admin.ManageSPP') }}" class="admin-link {{ request()->routeIs('admin.ManageSPP') ? 'active' : '' }}">Manage SPP</a>
                    <div class="garis mx-3">|</div>
                    <a href="{{ route('admin.BayarSPP') }}" class="admin-link {{ request()->routeIs('admin.BayarSPP') ? 'active' : '' }}">Bayar SPP</a>
                </div>
            </div>


            <!-- Dashboard & Logout -->
            <div class="ms-auto d-flex align-items-center mx-6 mb-0 LR">
                <a href="" class="nav-link">Dashboard</a>
                <div class="garis mx-3">|</div>
                <a href="{{ route('admin.logoutAdmin') }}" class="nav-link">Logout</a>
            </div>
        </div>
    </nav>
</body>
