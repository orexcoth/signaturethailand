<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('frontend.layouts.inc_header')
    <?php 
    // $pageName = "index";
    ?>
    <title>{{$default_pagename}}</title>
</head>

<body>

@include('frontend.layouts.inc_topmenu')


@yield('content')


@include('frontend.layouts.inc_footer')
@include('frontend.layouts.inc_script')

@yield('script')


{{-- Display SweetAlert on session success --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

{{-- Display SweetAlert on session error --}}
@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
</body>

</html>
