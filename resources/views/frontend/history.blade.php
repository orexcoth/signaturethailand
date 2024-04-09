@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
// $customer = session('customer');
echo "<pre>";
print_r($getsells);
echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    <section class="SectionHistory">
        <div class="container">
            <h1 class="TextHead-Gold text-center">
                คลังลายเซ็นลูกค้า
            </h1>
            <p class="Text-20 Text-W400 Text-Gray-Label text-center mt-3">
                ลายเซ็นที่สั่งซื้อเเล้ว
            </p>
            <hr class="w-100 Color-Grey-HR">
        </div>
    </section>
   
    <section class="Section-Product-history">
        <div class="container">
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาไทย
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-th.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->

            </div>
            <!-- <hr class="w-100 Color-Grey-HR"> -->
            <br>
            <div>
                <div class="row Row-Product">
                    
                </div>
            </div>

            <div class="BoxJustify-HeaderText mt-5">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาอังกฤษ
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-en.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->
            </div>
            <!-- <hr class="w-100 Color-Grey-HR"> -->
            <br>
            <div>
                <div class="row Row-Product">
                    
                </div>
            </div>
        </div>
    </section>
    
    



@endsection

@section('script')

@endsection
