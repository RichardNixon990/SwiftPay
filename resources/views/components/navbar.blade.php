<body style="padding: 0">

    <nav class="navbar navbar-expand-lg navbar-light background position-sticky">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center mx-5">
                <img src="{{ asset('Assets/Image/Swift.png') }}" alt="Logo" width="50" height="50"
                    class="d-inline-block align-text-top img-fluid">
                <h1 class="fs-3 ms-4 mb-0 header">SwiftPay</h1>
            </a>

            <div class="ms-auto d-flex align-items-center mx-3 fs-5 mb-0 LR">
                @if (Auth::guard('siswa')->check())
                    <a href="{{ route('siswa.profileSiswa') }}" class="nav-link">Profile</a>
                    <div class="garis mx-3">|</div>
                    <a href="{{ route('siswa.logoutSiswa') }}" class="nav-link">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                @endif
                {{-- <div class="garis mx-3">|</div> --}}
            </div>
        </div>
    </nav>
</body>
