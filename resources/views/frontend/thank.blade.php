@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
// echo "<pre>";
// print_r($sell);
// echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    <section class="Section-Thank">
        <div class="container">
            <div class="WarpCol-Thank">
                <div class="mb-5">
                    <span class="Text-Thank mb-0 Text-Gold-Gardien">
                        THANK
                    </span>
                    <span class="Text-Thank mb-0 ms-4 Text-Black">
                        YOU
                    </span>
                </div>
                <div>
                    <p class="Text-24 Text-W400 Text-Gray-Label text-center mb-2">
                        คุณสามารถใช้อีเมลและเบอร์โทรศัพท์เพื่อเข้าไปดาวน์โหลดลายเซ็นต์ของคุณ
                    </p>
                    <!-- <p class="Text-38 Text-W500 text-center mb-2">
                        passcode
                    </p>
                    <p class="Text-24 Text-W400 Text-Gray-Label text-center mb-2">
                        กรุณาคัดลอกรหัสผ่านเก็บไว้
                    </p> -->
                </div>
                <div class="BoxBTN-Thank">
                    <a class="btn Button-NextCart mt-5 me-2" href="{{route('historyPage')}}">
                        ไปยังหน้าลายเซ็นที่สั่งซื้อ
                    </a>
                    <a class="btn Button-NextCart2 mt-5 ms-2" href="{{route('indexPage')}}">
                        กลับสู่หน้าหลัก
                    </a>
                </div>
            </div>
        </div>
        <img class="IMG-PenThank" src="{{asset('frontend/images/cart/penthank.png')}}" alt="">
    </section>
    
    



@endsection

@section('script')

@endsection


