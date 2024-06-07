@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

// $sessionall = session()->all();
// echo "<pre>";
// print_r($sessionall);
// echo "</pre>";

// echo "<pre>";
// print_r($imagesource);
// echo "</pre>";

?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <a href="{{ route('send.email') }}">Test Mail</a>


        
@endsection

@section('script')
<script>

</script>


@endsection