<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Login
                    </span>


                    <div class="wrap-input100">
                        <input class="input100 inp_change_email" type="text" name="email" id="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100 error_email">Emai</span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100 inp_change_pw" type="password" name="password" id="pass">
                        <span class="focus-input100"></span>
                        <span class="label-input100 error_pw">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn btn-login">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="{{ route('login_social', ['provider' => 'google']) }}"
                            class="login100-form-social-item flex-c-m bg3 m-r-5">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>

                        <a href="{{ route('login_social', ['provider' => 'github']) }}"
                            class="login100-form-social-item flex-c-m bg4 m-r-5">
                            <i class="fa fa-github" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.btn-login').on('click', function() {
                var email = $('#email');
                var pass = $('#pass');
                var error = 0;

                if (email.val() == '') {
                    error = 1;
                    email.attr('placeholder', 'Please enter a email');
                    email.css({"color": "red"});
                    email.parent().css({"color": "red", "border": "2px solid red"});
                    $('.error_email').hide();
                }
                if (pass.val() == '') {
                    error = 1;
                    pass.attr('placeholder', 'Please enter a password');
                    pass.css({"color": "red"});
                    pass.parent().css({"color": "red", "border": "2px solid red"});
                    $('.error_pw').hide();
                }

                if (error == 1) {
                    return false;
                } else {
                    $('btn-login').submit();
                }
            });
            $('.inp_change_email').on('change', function () {
                $('#email').parent().css({"color": "", "border": ""});
                $('#email').css({"color": ""});
                $('.error_email').show();
            });
            $('.inp_change_pw').on('change', function () {
                $('#pass').parent().css({"color": "", "border": ""});
                $('#pass').css({"color": ""});
                $('.error_pw').show();
            })
        });
    </script>

</body>

</html>
