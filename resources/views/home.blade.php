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
    <div class="wrapper wrapper--w960">
        <div class="card card-4">
            <div class="card-body justify-content-center">
                <h2 class="title text-center">Create NFT</h2>
                <div class="d-flex justify-content-center">
                    <input class="form-control-file form-control" type="text" />
                    <a type="button" class="btn btn-success text-white ml-3" href="">Mint</a>
                </div>
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

