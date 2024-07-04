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

paymentcheckouttest

<form id="form1" action="https://sandbox-cdnv3.chillpay.co/Payment/" method="post">
    <input type="hidden" name="MerchantCode" value="XXXX">
    <input type="hidden" name="OrderNo" value="00001">
    <input type="hidden" name="CustomerId" value="00003">
    <input type="hidden" name="Amount" value="20000">
    <input type="hidden" name="PhoneNumber" value="0888889999">
    <input type="hidden" name="Description" value="Test Payment">
    <input type="hidden" name="ChannelCode" value="creditcard ">
    <input type="hidden" name="Currency" value="764">
    <input type="hidden" name="LangCode" value="TH">
    <input type="hidden" name="RouteNo" value="1">
    <input type="hidden" name="IPAddress" value="192.1.1.177">
    <input type="hidden" name="ApiKey" value="XXXX">
    <input type="hidden" name="TokenFlag" value="N">
    <input type="hidden" name="CreditToken" value="">
    <input type="hidden" name="CreditMonth" value="6">
    <input type="hidden" name="ShopID" value="">
    <input type="hidden" name="ProductImageUrl" value="">
    <input type="hidden" name="CustEmail" value="">
    <input type="hidden" name="CardType" value="">
    <input type="hidden" name="CheckSum" value="XXXX">
    
</form>


@endsection

@section('script')
<script async src="https://sandbox-cdnv3.chillpay.co/js/widgets.js?v=1.00" charset="utf-8"></script>
@endsection


