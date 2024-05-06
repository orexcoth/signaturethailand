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
                บทความของเรา
            </h1>
            <div class="ColArticle">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="BoxArticle">
                            <img class="IMG-Article" src="{{asset('frontend/images/article/1.jpg')}}" alt="">
                            <div class="BoxDetail-Article">
                                <p class="Text-Gold-Gardien Text-20 Text-W600 mb-2">
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <p class="Text-box-DetailTeam Text-16 Text-W400 mb-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                                <a class="btn Button-NoBG2" href="{{route('articledetailPage', ['id' => 1])}}">
                                    ดูเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="BoxArticle">
                            <img class="IMG-Article" src="{{asset('frontend/images/article/1.jpg')}}" alt="">
                            <div class="BoxDetail-Article">
                                <p class="Text-Gold-Gardien Text-20 Text-W600 mb-2">
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <p class="Text-box-DetailTeam Text-16 Text-W400 mb-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                                <a class="btn Button-NoBG2" href="{{route('articledetailPage', ['id' => 1])}}">
                                    ดูเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="BoxArticle">
                            <img class="IMG-Article" src="{{asset('frontend/images/article/1.jpg')}}" alt="">
                            <div class="BoxDetail-Article">
                                <p class="Text-Gold-Gardien Text-20 Text-W600 mb-2">
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <p class="Text-box-DetailTeam Text-16 Text-W400 mb-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                                <a class="btn Button-NoBG2" href="{{route('articledetailPage', ['id' => 1])}}">
                                    ดูเพิ่มเติม
                                </a>
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


