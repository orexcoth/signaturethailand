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
<form method="post" action="{{route('preorder_checkout')}}">
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
                        <span style="color:red;">*</span> ชื่อ
                        </label>
                        <input name="firstname" type="text" class="w-100 DropdownBox-SelectPreorder" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            นามสกุล
                        </label>
                        <input name="lastname" type="text" class="w-100 DropdownBox-SelectPreorder"  >
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                        <span style="color:red;">*</span> อีเมล
                        </label>
                        <input name="email" type="email" class="w-100 DropdownBox-SelectPreorder" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                        <span style="color:red;">*</span> เบอร์โทร
                        </label>
                        <input name="phone" type="tel" class="w-100 DropdownBox-SelectPreorder" value="{{$telephone}}" required >
                    </div>
                    <!-- <div class="col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            รหัสผ่าน(ไว้ใช้ดาวน์โหลดลายเซ็น)
                        </label>
                        <input name="passcode" type="text" class="w-100 DropdownBox-SelectPreorder">
                    </div> -->

                    <input type="hidden" name="package" value="{{$package}}" />
                    <input type="hidden" name="preorder_type" value="{{$preorder_type}}" />
                    <input type="hidden" name="firstname_th" value="{{$firstname_th}}" />
                    <input type="hidden" name="lastname_th" value="{{$lastname_th}}" />
                    <input type="hidden" name="firstname_en" value="{{$firstname_en}}" />
                    <input type="hidden" name="lastname_en" value="{{$lastname_en}}" />
                    <input type="hidden" name="prominence_1" value="{{$prominence_1}}" />
                    <input type="hidden" name="prominence_2" value="{{$prominence_2}}" />
                    <input type="hidden" name="prominence_3" value="{{$prominence_3}}" />
                    <input type="hidden" name="prominence_4" value="{{$prominence_4}}" />
                    <input type="hidden" name="prominence_5" value="{{$prominence_5}}" />
                    <input type="hidden" name="TargetPreorder" value="{{$TargetPreorder}}" />
                    <input type="hidden" name="name" value="{{$name}}" />
                    <input type="hidden" name="dob" value="{{$dob}}" />
                    <input type="hidden" name="telephone" value="{{$telephone}}" />
                    <input type="hidden" name="SelectStatus" value="{{$SelectStatus}}" />
                    <input type="hidden" name="occupation" value="{{$occupation}}" />
                    <input type="hidden" name="EverSignature" value="{{$EverSignature}}" />
                    <input type="hidden" name="ProblemPreorder" value="{{$ProblemPreorder}}" />
                    <input type="hidden" name="DeliverSignature" value="{{$DeliverSignature}}" />
                    <input type="hidden" name="agree" value="{{$agree}}" />
                    <input type="hidden" name="mysignaturePath" value="{{ $mysignaturePath }}">

                    <input type="hidden" name="preorder_price" value="{{$preorder_price}}" />
                    <input type="hidden" name="total_price" value="{{$total_price}}" />
                    <input type="hidden" name="shipping_price" value="{{$shipping_price}}" />

                    
                    
                    
                    <div class="col-12 Col-Margin-TopBottom mt-5">
                        <button type="submit" class="btn Button-NextCart" href="qr-code.php">
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





