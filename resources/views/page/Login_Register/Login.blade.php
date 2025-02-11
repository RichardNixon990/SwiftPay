@include('layouts.mainLR')
@section('container')

    <div class="login-bg">

    </div>

    <div class="container">
        <div class="heading">Sign In</div>
        <form action="{{ route('siswa.signin') }}" method="POST" class="form">
            @csrf
            <input required="" class="input form-control" type="number" name="usn" id="usn" placeholder="Username">
            <input required="" class="input form-control" type="password" name="password" id="password"
                placeholder="Password">
                <select required class="form-select input form-control" name="role" id="role" aria-label="Default select example">
                    <option selected disabled>Select Role</option>
                    <option value="siswa">Siswa</option>
                    <option value="petugas">Petugas</option>
                </select>
            <span class="forgot-password">
                <a href="">Forgot Password?</a>
            </span>
            <input class="login-button btn btn-primary" type="submit" value="Sign In">
        </form>
    </div>
