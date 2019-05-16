<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bachelor-Point</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('public/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('public/assets/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="row">
        <h1 class="mx-auto mt-5 text-white">Bachelor's <span class="text-white-50">Point</span></h1>
    </div>
    @yield('content')
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('public/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('public/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
