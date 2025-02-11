@include('layouts.mainLR')
@section('container')

    <div class="login-bg">

    </div>

    <div class="container">
        <div class="heading">Sign In</div>
        <form action="{{ route('siswa.signin') }}" method="POST" class="form">
            @csrf
            <input required="" class="input form-control" type="number" name="nisn" id="nisn" placeholder="NISN">
            <input required="" class="input form-control" type="password" name="password" id="password"
                placeholder="Password">
            <span class="forgot-password">
                <a href="">Forgot Password?</a>
            </span>
            <input class="login-button btn btn-primary" type="submit" value="Sign In">
        </form>
    </div>
