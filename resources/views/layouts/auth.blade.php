<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Institute Management System</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/img/logo/favicon.png') }}">


  <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css">

  <style>
    .login-page-container {
      max-width: 440px;
    }
  </style>

  @yield('stylesheet')

</head>
<body class="fixed-left login-body">
<!-- Loader -->
<div id="preloader">
  <div id="status">
    <div class="spinner"></div>
  </div>
</div>
<!-- Begin page -->

@empty($images[0])
  <div class="login-page-container mt-5 mx-auto">
    @else
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          @foreach ($images as $item => $val)
            <div class="carousel-item {{$item == 0 ? 'active' : '' }}">
              <img height="680px" class="d-block w-100 " src="{{asset('assets/admin/images/gallery/work-1.jpg')}}" alt="First slide">
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="wrapper-page my-auto">
        @endempty
        @yield('content')
      </div>


      <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>
      <script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
      <script src="{{ asset('assets/admin/js/waves.js') }}"></script>
      <script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script>


      <!-- App js -->
      <script src="{{ asset('assets/admin/js/app.js') }}"></script>
  @yield('script')
</body>
</html>
