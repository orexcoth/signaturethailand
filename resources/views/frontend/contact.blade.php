@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
<?php
// echo "<pre>";
// print_r($namesfreeen);
// echo "</pre>";
// echo "<pre>";
// print_r($namesfreeth);
// echo "</pre>";
?>

<section class="SectionContact-Page">
        <div class="container">
            <h1 class="TextHead-Gold text-center ">
                ติดต่อเรา
            </h1>
            <div class="Warper-DivDetail-Contact">
                <div class="row">
                    <div class="Col-lg-6 col-md-6 col-12">
                        <div class="d-flex flex-column">
                            <h2 class="TextHead-Contact">
                                Signature Thailand
                            </h2>
                            <iframe class="MapContact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248057.203755313!2d100.46830143193776!3d13.724878466566409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d6032280d61f3%3A0x10100b25de24820!2z4LiB4Lij4Li44LiH4LmA4LiX4Lie4Lih4Lir4Liy4LiZ4LiE4Lij!5e0!3m2!1sth!2sth!4v1714718975195!5m2!1sth!2sth" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <a class="Text-Social-CTPage" href="Tel:0897893649">
                                <span>
                                    <img src="{{asset('frontend/images/footer/ic_phone.svg')}}" alt="">
                                </span>
                                089 789 3649
                            </a>
                            <a class="Text-Social-CTPage" href="mail:atinn.signature56@gmail.com">
                                <span>
                                    <img src="{{asset('frontend/images/footer/ic_mail.svg')}}" alt="">
                                </span>
                                signature.thai@gmail.com
                            </a>
                            <h2 class="TextHead-Contact mt-5">
                                Social
                            </h2>
                            <div class="BoxSocial-CTPage">
                                <a class="Text-SocialCTP2 me-4" href="">
                                    <img src="{{asset('frontend/images/footer/ic_facebook.svg')}}" alt="">
                                </a>
                                <a class="Text-SocialCTP2 me-4" href="">
                                    <img src="{{asset('frontend/images/footer/ic_line2.svg')}}" alt="">
                                </a>
                                <a class="Text-SocialCTP2 me-4" href="">
                                    <img src="{{asset('frontend/images/footer/ic_ig.svg')}}" alt="">
                                </a>
                                <a class="Text-SocialCTP2 me-4" href="">
                                    <img src="{{asset('frontend/images/footer/ic_tt.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="Col-lg-6 col-md-6 col-12">
                        <div>
                            <h2 class="TextHead-Contact">
                                ฟอร์มติดต่อเรา
                            </h2>
                            <div class="WarpColInput-Preorder row">
                                <div class="col-lg-6 col-md-12 col-12 Col-Margin-TopBottom">
                                    <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                        ชื่อ
                                    </label>
                                    <input type="text" class="w-100 DropdownBox-SelectPreorder">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 Col-Margin-TopBottom">
                                    <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                        นามสกุล
                                    </label>
                                    <input type="text" class="w-100 DropdownBox-SelectPreorder">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 Col-Margin-TopBottom">
                                    <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                        อีเมล
                                    </label>
                                    <input type="email" class="w-100 DropdownBox-SelectPreorder">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                                    <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                        เบอร์โทรติดต่อ
                                    </label>
                                    <input type="tel" class="w-100 DropdownBox-SelectPreorder">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 Col-Margin-TopBottom">
                                    <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                        เรื่อง
                                    </label>
                                    <input type="text" class="w-100 DropdownBox-SelectPreorder">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 Col-Margin-TopBottom">
                                    <label for="" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                        รายละเอียด
                                    </label>
                                    <textarea class="form-control w-100 FormTextArea" id="TextareaContact" rows="4"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 Col-Margin-TopBottom mt-lg-4 mt-md-3 mt-2">
                                    <a class="btn Button-NextCart" href="fill-in-information.php">
                                        ส่ง
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    


@endsection

@section('script')

@endsection


