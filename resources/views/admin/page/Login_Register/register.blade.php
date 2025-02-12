@include('admin.admin_layouts.main')
@section('containerAdmin')

    <div class="login-bg">

    </div>

    <div class="container">
        <div class="heading">Sign Up</div>
        <form action="{{ route('admin.signup') }}" method="POST" class="form">
            @csrf
            <input required class="input form-control" type="text" name="username" id="Username" placeholder="Username">
            <input required class="input form-control" type="text" name="email" id="email" placeholder="Email">
            {{-- Nambah ini ya  --}}
            <input required class="input form-control" type="text" name="nama_petugas" id="nama_petugas"
                placeholder="Nama Petugas">
            <input required class="input form-control" type="text" name="level" id="level" placeholder="level">
            {{-- Nambah ini ya  --}}

            <input required class="input form-control" type="password" name="password" id="password"
                placeholder="Password">

            <input required class="input form-control" type="password" name="password_confirmation"
                id="password_confirmation" placeholder="Konfirmasi Password">
            {{-- <span class="forgot-password">
                <a href="">Forgot Password?</a>
            </span> --}}
            <input class="login-button btn btn-primary" type="submit" value="Sign Up">
        </form>
    </div>
