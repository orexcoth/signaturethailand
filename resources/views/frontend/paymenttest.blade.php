@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
<?php
// echo "<pre>";
// print_r($namesfreeen);
// echo "</pre>";

?>

    <form method="post" action="{{route('paymentcallbackPage')}}">
        <input type="text" name="orderNo" value="" placeholder="orderNo" />   
        <input type="text" name="transNo" value="" placeholder="transNo" />   
        <input type="text" name="respCode" value="" placeholder="respCode" />   
        <input type="text" name="status" value="" placeholder="status" /> 
        
        <button type="submit">OK</button>
    <form>

    


@endsection

@section('script')
<script async src="https://sandbox-cdnv3.chillpay.co/js/widgets.js?v=1.00" charset="utf-8"></script>
@endsection


