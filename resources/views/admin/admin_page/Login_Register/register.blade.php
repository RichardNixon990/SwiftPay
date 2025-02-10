@include('admin.admin_layouts.main')
@section('containerAdmin')

    <div class="login-bg">

    </div>

    <div class="container">
        <div class="heading">Sign Up</div>
        <form action="" method="POST" class="form">
            <input required="" class="input form-control" type="text" name="usn" id="usn" placeholder="Username">
            <input required="" class="input form-control" type="text" name="email" id="email" placeholder="Email">
            <input required="" class="input form-control" type="password" name="password" id="password"
                placeholder="Password">
            <span class="forgot-password">
                <a href="">Forgot Password?</a>
            </span>
            <input class="login-button btn btn-primary" type="submit" value="Sign Up">
        </form>
    </div>
