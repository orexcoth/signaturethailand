@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

// echo "<pre>";
// print_r($watermarkedPath);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <div class="">
    <br>
        <br>
        <br>
        <img data-action="zoom"  width="200" src="{{$mosaic_url}}" />
        <br>
        <br>
        <br>
        <h1>*********************************************</h1>
        <h1>*********************************************</h1>
        <h1>*********************************************</h1>
        <h1>*********************************************</h1>
        <img data-action="zoom" width="200" src="{{$imagesource}}" />
        <?php

        // echo "<pre>";
        // print_r($role_set);
        // echo "</pre>";
        ?>
    </div>
        
@endsection

@section('script')
<script>

</script>


@endsection