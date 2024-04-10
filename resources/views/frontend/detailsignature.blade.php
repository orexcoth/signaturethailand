@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
echo "<pre>";
print_r($sign);
echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    
    <section class="Section-Detail-Signature">
        <div class="container">
            <div class="ColDetail-Signature">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img class="IMG-BigSignature" src="{{asset($sign->sign)}}" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center">
                        <div class="WarpColProfile-TeamSNG">
                            <div class="ColProfile-TeamSNG">
                                <p class="Text-20 Text-w500 Text-Gray-Label m-0">
                                    <span>
                                        <img class="IMG-Profile-TeamSNG" src="{{asset('frontend/images/detail-product/img-profile-t.png')}}" alt="">
                                    </span>
                                    A.Tinn Signature
                                </p>
                            </div>
                            <p class="Text-60 Text-W600 m-0">
                                ธนกานต์
                            </p>
                            <div class="Box-Maim-Star w-100">
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        งาน
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        เงิน
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        รัก
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        สุขภาพ
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        โชคลาภ
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                            </div>
                            <p class="Text-16 Text-W300 Text-Gray-Label my-2">
                                Lorem ipsum dolor sit am consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
                            </p>
                            <hr class="w-100 Color-Grey-HR my-4">
                            <div class="ColButton-Group">
                                <div class="BoxButton-Group1">
                                    <!-- Trigger/Open The Modal -->
                                    <button id="myBtnModal" class="ButtonModal me-3">ดาวน์โหลด</button>

                                    <!-- The Modal -->
                                    <div id="myModalAddSurname" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <div class="d-flex justify-content-end">
                                                <span class="close">&times;</span>
                                            </div>
                                            <p class="Text-24 Text-W500 text-center mb-4">ดาวน์โหลดตัวอย่างลายเซ็น</p>
                                            <div class="ColButton-DownloadSignature">
                                                <button id="BtnDownloadIMG" class="ButtonModal">ดาวน์โหลดภาพ</button>
                                                <button id="BtnDownloadVDO" class="ButtonModal">ดาวน์โหลดวิดีโอ</button>
                                            </div>
                                        </div>

                                    </div>

                                    <a class="btn ButtonAddSurname" href="preorder.php">
                                        เพิ่มลายเซ็นนามสกุล
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




