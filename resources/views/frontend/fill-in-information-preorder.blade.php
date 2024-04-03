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
                            ชื่อ
                        </label>
                        <input name="firstname" type="text" class="w-100 DropdownBox-SelectPreorder">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            นามสกุล
                        </label>
                        <input name="lastname" type="text" class="w-100 DropdownBox-SelectPreorder">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            อีเมล
                        </label>
                        <input name="email" type="email" class="w-100 DropdownBox-SelectPreorder">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                        <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                            เบอร์โทร
                        </label>
                        <input name="phone" type="tel" class="w-100 DropdownBox-SelectPreorder">
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
                    <input type="hidden" name="work" value="{{$work}}" />
                    <input type="hidden" name="finance" value="{{$finance}}" />
                    <input type="hidden" name="love" value="{{$love}}" />
                    <input type="hidden" name="health" value="{{$health}}" />
                    <input type="hidden" name="fortune" value="{{$fortune}}" />
                    <input type="hidden" name="TargetPreorder" value="{{$TargetPreorder}}" />
                    <input type="hidden" name="name" value="{{$name}}" />
                    <input type="hidden" name="dob" value="{{$dob}}" />
                    <input type="hidden" name="telephone" value="{{$telephone}}" />
                    <input type="hidden" name="SelectStatus" value="{{$SelectStatus}}" />
                    <input type="hidden" name="occupation" value="{{$occupation}}" />
                    <input type="hidden" name="EverSignature" value="{{$EverSignature}}" />
                    <input type="hidden" name="mysignature" value="{{$mysignature}}" />
                    <input type="hidden" name="ProblemPreorder" value="{{$ProblemPreorder}}" />
                    <input type="hidden" name="DeliverSignature" value="{{$DeliverSignature}}" />

                    <input type="hidden" name="preorder_price" value="255" />
                    <input type="hidden" name="total" value="255" />

                    
                    
                    
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





