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

    <form id="payment-form" action="https://sandbox-cdnv3.chillpay.co/Payment/" method="post" role="form" class="form-horizontal">
        <modernpay:widget id="modernpay-widget-container" 
            data-merchantid="M035329" 
            data-amount="10000" 
            data-orderno="00000001" 
            data-customerid="123456" 
            data-mobileno="0889999999" 
            data-clientip="182.53.98.30" 
            data-routeno="1" 
            data-currency="764" 
            data-description="Test Payment" 
            data-apikey="RJlFW2fmhMTOBWyTNffFhrBCTJPlfUuEL5IpsP7Z8kbucl4PQvPBsDTg5Hk3zlTY">
        </modernpay:widget>
        <!-- <button type="submit" id="btnSubmit" value="Submit" class="btn">Payment</button> -->
    </form>

    


@endsection

@section('script')
<script async src="https://sandbox-cdnv3.chillpay.co/js/widgets.js?v=1.00" charset="utf-8"></script>
@endsection


