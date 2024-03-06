@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

echo "<pre>";
print_r($imagesource);
echo "</pre>";
echo "<pre>";
print_r($watermarksource);
echo "</pre>";
echo "<pre>";
print_r($imagePath);
echo "</pre>";
echo "<pre>";
print_r($watermarkPath);
echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <div class="">
    <br>
        <br>
        <br>
    <img width="500" src="{{$watermarked}}" style="border:1px solid red;" />
        <br>
        <br>
        <br>
        <h1>*********************************************</h1>
        <h1>*********************************************</h1>
        <h1>*********************************************</h1>
        <h1>*********************************************</h1>
        <img width="200" src="{{$imagesource}}" />
        <img width="200" src="{{$watermarksource}}" />
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