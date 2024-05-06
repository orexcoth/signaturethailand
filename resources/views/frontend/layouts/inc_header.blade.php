<?php
// if (empty($_title))             $_title = '';
if (empty($_keywords))         $_keywords = '';
if (empty($_description))     $_description = '';
?>

<meta name="keywords" content="<?php echo $_keywords; ?>" />
<meta name="description" content="<?php echo $_description; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robot" content="index, follow" />
<meta name='copyright' content='Orange Technology Solution co.,ltd.'>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/layout.css')}}" />
<link type="image/ico" rel="shortcut icon" href="images/favicon.ico">

<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.css')}}">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css" integrity="sha512-WIWddQW7bHfs1gwICYIoXuifLb8gCPkE7Z/gq7QHk3pKuxjNs0E68Rn5c7Ig4cWguZW5CIvRroTj2GrSxsvUZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/flexslider-rtl.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/flexslider-rtl-min.css')}}">


<script src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/js/modernizr.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css" rel="stylesheet">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>