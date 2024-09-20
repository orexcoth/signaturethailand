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

    <!-- <h1>testest</h1> -->
    <form id="payment-form" action="https://sandbox-cdnv3.chillpay.co/Payment/" method="post" role="form" class="form-horizontal">
        <modernpay:widget id="modernpay-widget-container" 
            data-merchantid="{{$data->merchantid}}" 
            data-amount="{{$data->amount*100}}" 
            data-orderno="{{$data->orderno}}" 
            data-customerid="{{$data->customerid}}" 
            data-mobileno="{{$data->mobileno}}" 
            data-clientip="{{$data->clientip}}" 
            data-routeno="{{$data->routeno}}" 
            data-currency="{{$data->currency}}" 
            data-description="{{$data->description}}" 
            data-apikey="{{$data->apikey}}"
            >
        </modernpay:widget>
        <!-- <button type="submit" id="btnSubmit" value="Submit" class="btn">Payment</button> -->
    </form>

    


@endsection

@section('script')
<script async src="https://sandbox-cdnv3.chillpay.co/js/widgets.js?v=1.00" charset="utf-8"></script>
@endsection


