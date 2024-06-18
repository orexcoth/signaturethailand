@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
// echo "<pre>";
// print_r($namesth);
// echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
<form method="post" action="{{route('sell_checkout')}}">
    @csrf
    <section class="SectionFill-In-Information">
        <div class="WarpCol-Fill-In-Information">
            <img class="IMG-Fill-In-Information" src="{{asset('frontend/images/fillinformation/sng-information.jpg')}}" alt="">
            <div class="ColBig-Information">
                <h1 class="TextHead-Gold text-start">
                    สั่งออกแบบลายเซ็น
                </h1>
                <p class="Text-18 Text-W400 Text-Gray-Label">
                    กรุณากรอกข้อมูลให้ครบทุกช่อง
                </p>
                <div class="Col-Information row">
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            ชื่อ
                        </label>
                        <input name="firstname" type="text" class="w-100 DropdownBox-SelectPreorder" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            นามสกุล
                        </label>
                        <input name="lastname" type="text" class="w-100 DropdownBox-SelectPreorder" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            อีเมล
                        </label>
                        <input name="email" type="email" class="w-100 DropdownBox-SelectPreorder" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            เบอร์โทร
                        </label>
                        <input name="phone" type="tel" class="w-100 DropdownBox-SelectPreorder" required >
                    </div>
                    <!-- <div class="col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            รหัสผ่าน(ไว้ใช้ดาวน์โหลดลายเซ็น)
                        </label>
                        <input name="passcode" type="text" class="w-100 DropdownBox-SelectPreorder">
                    </div> -->

                    <input type="hidden" name="name_id" value="{{$name_id}}" />
                    <input type="hidden" name="signs" value="{{$signs}}" />
                    <input type="hidden" name="type" value="{{$type}}" />
                    <input type="hidden" name="package" value="{{$package}}" />
                    <input type="hidden" name="total" value="{{$total}}" />

                    <input type="hidden" name="name_th" value="{{$name_th}}" />
                    <input type="hidden" name="name_en" value="{{$name_en}}" />
                    
                    
                    <div class="col-12 Col-Margin-TopBottom mt-5">
                        <button type="submit" class="btn Button-NextCart" >
                            ชำระเงิน
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>
    
    



@endsection

@section('script')

@endsection





