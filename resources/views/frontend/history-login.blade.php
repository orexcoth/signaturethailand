@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
<?php

// echo "<pre>";
// print_r($customer);
// echo "</pre>";
?>
    <section class="SectionFill-In-Information">
        <div class="WarpCol-Fill-In-Information">
            <img class="IMG-Fill-In-Information" src="{{asset('frontend/images/fillinformation/sng-information.jpg')}}" alt="">
            <div class="ColBig-Information">
                <h1 class="TextHead-Gold text-start">
                    คลังลายเซ็นลูกค้า
                </h1>
                <p class="Text-18 Text-W400 Text-Gray-Label">
                    กรุณาใส่รหัสผ่านเพื่อดูคลังลายเซ็นของคุณ
                </p>

                <form method="POST" action="{{ route('historyloginaction') }}">
                    @csrf
                    <div class="Col-Information row">
                        <div class="col-12 Col-Margin-TopBottom">
                            <label for="email" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                อีเมล
                            </label>
                            <input type="text" id="email" name="email" class="w-100 DropdownBox-SelectPreorder" required>
                        </div>
                        <div class="col-12 Col-Margin-TopBottom">
                            <label for="phone" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                เบอร์โทรศัพท์
                            </label>
                            <input type="text" id="phone" name="phone" class="w-100 DropdownBox-SelectPreorder" required>
                        </div>
                        <div class="col-12 Col-Margin-TopBottom mt-5">
                            <button type="submit" class="btn Button-NextCart">ถัดไป</button>
                        </div>
                    </div>
                </form>

                    
            </div>
        </div>
    </section>
    
    



@endsection

@section('script')

@endsection
