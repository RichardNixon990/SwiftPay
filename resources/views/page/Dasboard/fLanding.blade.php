@include('layouts.main')
@section('containerDashboard')

<body>
    <div class="landing-bg"></div>

    <div class="container-fluid">
        <div class="header md-5">
            <h1 class="Welcome fs-12">Welcome to</h1>
            <div class="content-fluid">
                <h1 class="brandName">SwiftPay</h1>
                <div class="blockquote-container">
                    <blockquote class="colums">Pay, Learn, Deal</blockquote>
                </div>
            </div>
        </div>

        <!-- Add promotional content -->
        <div class="intro">
            <h2 class="promo-title">Mudah <span class="garis-span-dash">|</span> Cepat <span class="garis-span-dash">|</span> Aman</h2>
            <p class="promo-description">Bayar SPP sekolah dengan sistem pembayaran online yang cepat, aman, dan terpercaya. Hemat waktu Anda dan pastikan pembayaran Anda tercatat dengan mudah melalui <span class="why">SwiftPay</span>.</p>
            <a href="/payment" class="btn btn-warning payment">Mulai Bayar Sekarang</a>
        </div>

        <div class="hr-container">

        </div>

        <!-- Features Section -->
        <div class="features mt-5 mx-5">
            <h2 class="features-title">Kenapa Memilih <span class="why">SwiftPay?</span></h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <h3>Proses Pembayaran Cepat</h3>
                        <p>Bayar dalam hitungan detik tanpa perlu mengantri.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <h3>Keamanan Terjamin</h3>
                        <p>Transaksi aman dengan sistem enkripsi dan proteksi terbaik.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <h3>Dapat Diakses Kapan Saja</h3>
                        <p>Bayar SPP secara fleksibel, di mana saja dan kapan saja, hanya dengan perangkat Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

