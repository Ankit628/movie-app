<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <link rel="shortcut icon" type="image/png" href="{{env('APP_URL').'favicon.png'}}"/>--}}
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} | The Caesious </title>
    <!--bootstrap for this template-->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--toastr for this template-->
    <link href="{{asset('vendor/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/owlCarousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/owlCarousel/owl.theme.green.min.css')}}" rel="stylesheet">
</head>
<body>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Header -->
@include('errors.error-lists')
@include('layouts.nav')
<!-- End Header -->
    <!-- Main Content -->
    <div id="content">
        <div id="app"></div>
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <a href="{{env('APP_URL')}}">{{env('APP_NAME')}}</a> <strong>|</strong> {{date('Y')}}</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Page Wrapper -->
<script src="{{asset('vendor/jQuery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/owlCarousel/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript">
    @if(Session::has('success'))
    toastr.success('{{Session::get('success')}}');
    @endif
    @if(Session::has('warn'))
    toastr.warning('{{Session::get('warn')}}');
    @endif
    @if(Session::has('error'))
    toastr.error('{{Session::get('error')}}');
    @endif
</script>
@stack('scripts')
</body>
</html>
