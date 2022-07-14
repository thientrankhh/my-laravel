<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('admin/login/images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/login/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('admin/login/images/img-01.png') }}" alt="IMG">
            </div>
            <form class="login100-form validate-form" method="post" action="{{ route('admin.check-login') }}">
                @csrf
                <div>
                    @if (session('failed'))
                        <div class="alert alert-danger show-message">
                            <i>{{ session('failed') }}</i>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success show-message">
                            <i>{{ session('success') }}</i>
                        </div>
                    @endif
                </div>
                <span class="login100-form-title">
                        Login
					</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div>
                    @if($errors->has('name'))
                        <div class="messages_error">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="password" placeholder="Password"
                           value="{{ old('password') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                <div>
                    @if($errors->has('password'))
                        <div class="messages_error">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                {{--                <div class="text-center p-t-136">--}}
                {{--                    <a class="txt2" href="#">--}}
                {{--                        Create your Account--}}
                {{--                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="{{ asset('admin/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('admin/login/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('admin/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('admin/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('admin/login/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{ asset('admin/login/js/main.js') }}"></script>

</body>
</html>
