<?php
    use \App\Constants\UserConstant;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Register theme">

    <!-- Title Page-->
    <title>Register theme</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Main CSS-->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration</h2>
                <form class="needs-validation" novalidate method="POST" action="{{route('register_post')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Name</label>
                            <input type="text"
                                   class="form-control @error(UserConstant::INPUT_NAME) is-invalid @enderror"
                                   id="{{ UserConstant::INPUT_NAME }}"
                                   value="{{ old(UserConstant::INPUT_NAME) }}"
                                   placeholder="Your Name"
                                   name="{{ UserConstant::INPUT_NAME }}">
                            <div class="invalid-feedback">
                                @if($errors->all())
                                    {{ $errors->first(UserConstant::INPUT_NAME) }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Email</label>
                            <input type="text"
                                   class="form-control @error(UserConstant::INPUT_EMAIL) is-invalid @enderror"
                                   id="{{ UserConstant::INPUT_EMAIL }}"
                                   value="{{ old(UserConstant::INPUT_EMAIL) }}"
                                   placeholder="example@example.com"
                                   name="{{ UserConstant::INPUT_EMAIL }}">
                            <div class="invalid-feedback">
                                @if($errors->all())
                                    {{ $errors->first(UserConstant::INPUT_EMAIL) }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Phone</label>
                            <input type="text"
                                   class="form-control @error(UserConstant::INPUT_PHONE) is-invalid @enderror"
                                   id="{{ old(UserConstant::INPUT_PHONE) }}"
                                   value="{{ old(UserConstant::INPUT_PHONE) }}"
                                   placeholder="Your Phone"
                                   name="{{ UserConstant::INPUT_PHONE }}">
                            <div class="invalid-feedback">
                                @if($errors->all())
                                    {{ $errors->first(UserConstant::INPUT_PHONE) }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Gender</label>
                            <div class="p-t-10">
                                <label class="radio-container m-r-45">Male
                                    <input type="radio"
                                           value="{{ UserConstant::MAlE_GENDER }}"
                                           {{ old(UserConstant::INPUT_GENDER) == UserConstant::MAlE_GENDER ? 'checked' : '' }}
                                           name="{{ UserConstant::INPUT_GENDER }}">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Female
                                    <input type="radio"
                                           value="{{ UserConstant::FEMAlE_GENDER }}"
                                           {{ old(UserConstant::INPUT_GENDER) == UserConstant::FEMAlE_GENDER ? 'checked' : '' }}
                                           name="{{ UserConstant::INPUT_GENDER }}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Password</label>
                            <input type="password"
                                   class="form-control @error(UserConstant::INPUT_PASSWORD) is-invalid @enderror"
                                   placeholder="Password"
                                   name="{{ UserConstant::INPUT_PASSWORD }}">
                            <div class="invalid-feedback">
                                @if($errors->all())
                                    {{ $errors->first(UserConstant::INPUT_PASSWORD) }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Password Confirm</label>
                            <input type="password"
                                   class="form-control @error(UserConstant::INPUT_PASSWORD) is-invalid @enderror"
                                   placeholder="Repeat your password"
                                   name="{{ UserConstant::INPUT_PASSWORD_CONFIRM }}">
                            <div class="invalid-feedback">
                                @if($errors->all())
                                    {{ $errors->first(UserConstant::INPUT_PASSWORD_CONFIRM) }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                    </div>
                    <div class="text-left p-t-20">
                        <p>Already have an account?<a href="{{ route('login') }}" style="color: #0062cc">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!-- Vendor JS-->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('js/global.js') }}"></script>

</body>

</html>

