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

<section class="SectionTeam">
        <div class="container">
            <h1 class="TextHead-Gold text-center">
                ทีมงาน Signature Thailand
            </h1>
            <div class="ColTeam">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="BoxTeam">
                            <img class="IMG-Team" src="{{asset('frontend/images/team/pfpd.png')}}" alt="">
                            <div class="BoxDetail-Team">
                                <p class="Text-Gold-Gardien Text-24 Text-W600 text-center mb-2">
                                    A.Tinn Signature
                                </p>
                                <p class="Text-box-DetailTeam Text-18 Text-W400 text-center mb-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                                <a class="btn Button-NoBG" href="detail-team.php">
                                    ดูเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="BoxTeam">
                            <img class="IMG-Team" src="{{asset('frontend/images/team/pfpd2.png')}}" alt="">
                            <div class="BoxDetail-Team">
                                <p class="Text-Gold-Gardien Text-24 Text-W600 text-center mb-2">
                                    A.Amy Signature
                                </p>
                                <p class="Text-box-DetailTeam Text-18 Text-W400 text-center mb-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                                <a class="btn Button-NoBG" href="detail-team.php">
                                    ดูเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="BoxTeam">
                            <img class="IMG-Team" src="{{asset('frontend/images/team/pfpd3.png')}}" alt="">
                            <div class="BoxDetail-Team">
                                <p class="Text-Gold-Gardien Text-24 Text-W600 text-center mb-2">
                                    A.Ohm Signature
                                </p>
                                <p class="Text-box-DetailTeam Text-18 Text-W400 text-center mb-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                                <a class="btn Button-NoBG" href="detail-team.php">
                                    ดูเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="BoxLeftBig-Preorder">
            <div class="WarperDiv-Bigpreorder ms-3 me-3">
                <h1 class="TextHead-Gold">
                    สนใจเข้าร่วมทีมงาน Signature Thailand
                </h1>
                <!-- <p class="TextDetail-Black text-center mt-3">
                    สามารถสั่งออกแบบลายเซ็นใหม่ได้ทั้งชื่อและนามสกุล ทั้งภาษาไทยและภาษาอังกฤษ
                </p> -->
                <div class="ms-3 me-3 mt-4">
                    <a class="btn ButtonSeemore" href="#">
                        ติดต่อ
                    </a>
                </div>
            </div>
        </div>
    </section>

    


@endsection

@section('script')

@endsection


