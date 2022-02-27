<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta content="" name="keywords">
  <meta content="" name="description">



  <!-- Favicons -->
  
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/favicon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('assets/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/venobox/venobox.css') }}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('assets/css/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->


    <title>@yield('title') | Edusec-Education</title>
    @section('ogtags')
</head>
<body>
    <!-- Google Auto Ads -->
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2820834451459954"
          crossorigin="anonymous"></script>
     <!-- Google Auto Ads -->

  <!-- Facebook Comment -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0&appId=346816959465122&autoLogAppEvents=1" nonce="4HZ6RAR8"></script>
  <!-- Facebook Comment -->
<div id="app">


<div class="preloader">
    <div class="spinner-border text-dark" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

{{--Header--}}
    @include('layouts.header')

    @yield('content')

    {{--Footer--}}
    @include('layouts.footer')
</div>
<!-- Footer -->


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/lib/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('assets/lib/knob/jquery.knob.js') }}"></script>
<script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/lib/parallax/parallax.js') }}"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/appear/jquery.appear.js') }}"></script>
<script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ asset('assets/contactform/contactform.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@yield('footer_script')

</body>
</html>