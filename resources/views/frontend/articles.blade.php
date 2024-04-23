@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
<?php
// echo "<pre>";
// print_r($namesfreeen);
// echo "</pre>";
// echo "<pre>";
// print_r($namesfreeth);
// echo "</pre>";
?>

    @include('frontend.layouts.inc_menusignature')
    @include('frontend.layouts.inc_searchsignature')

    @include('frontend.layouts.inc_menupreorder')
    


@endsection

@section('script')

@endsection


