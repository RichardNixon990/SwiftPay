<body style="padding: 0">
    <nav class="navbar navbar-expand-lg navbar-light admin-background position-sticky admin-nav">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <button class="menu-button btn me-3" type="button" onclick="toggleSidebar()">
                    ☰
                </button>

                <a class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('Assets/Image/Swift.png') }}" alt="Admin Logo" width="50" height="50" class="d-inline-block align-text-top img-fluid">
                    <h1 class="fs-3 ms-4 mb-0 header">SwiftPay <span class="header-admin"> - Admin</span></h1>
                </a>
                <a href="" class="nav-item nav-link contact-link">Contact Us</a>
            </div>
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <ul class="nav flex-column">
            <a class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('Assets/Image/Swift.png') }}" alt="Admin Logo" width="50" height="50" class="d-inline-block align-text-top img-fluid">
                <h1 class="fs-3 ms-4 mb-0 header">SwiftPay <span class="header-admin">- Admin</span></h1>
            </a>
            @if (Auth::guard('petugas')->user()->level == 'admin')
            <div class="card-title-underline"></div>
                <li class="nav-item"><a href="{{ route('admin.ManageSiswa') }}" class="nav-link">Manage Siswa</a></li>
                <li class="nav-item"><a href="{{ route('admin.ManageKelas') }}" class="nav-link">Manage Kelas</a></li>
                <li class="nav-item"><a href="{{ route('admin.ManagePetugas') }}" class="nav-link">Manage Petugas</a></li>
                <li class="nav-item"><a href="{{ route('admin.ManageSPP') }}" class="nav-link">Manage SPP</a></li>
            @endif
            <li class="nav-item"><a href="{{ route('admin.BayarSPP') }}" class="nav-link">Bayar SPP</a></li> <br>
            <div class="card-title-underline"></div>
            <li class="nav-item"><a href="" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="{{route ('admin.dashboard')}}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.logoutAdmin') }}" class="nav-link text-danger">Logout</a></li>
        </ul>
    </div>
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            if (sidebar.classList.contains("show")) {
                sidebar.classList.remove("show");
                overlay.classList.remove("show");
            } else {
                sidebar.classList.add("show");
                overlay.classList.add("show");
            }
        }

        document.addEventListener("click", function (event) {
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");
            const button = document.querySelector(".btn");

            if (!sidebar.contains(event.target) && !button.contains(event.target) && sidebar.classList.contains("show")) {
                sidebar.classList.remove("show");
                overlay.classList.remove("show");
            }
        });
    </script>
</body>
