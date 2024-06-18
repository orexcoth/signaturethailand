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
    <!-- <section class="BannerIndex">
        <div class="container">
            <div class="BoxText-Banner">
                <p class="TextHeadBanner-Green">
                    Signature
                    <span class="TextHeadBanner-Gold">
                        Thailand
                    </span>
                </p>
                <br />
                <h1 class="TextBanner">
                    ออกแบบลายเซ็น ตัวอย่างลายเซ็น
                    ดาวน์โหลดลายเซ็น คลังลายเซ็น
                    สั่งซื้อลายเซ็น
                </h1>
                <br />
                <a class="btn ButtonSeemore" href="{{route('productPage')}}">
                    คลังลายเซ็น
                    <span>
                        <img class="ms-1" src="{{asset('frontend/images/index/ic_pen.svg')}}" alt="">
                    </span>
                </a>
                <form role="search">
                    <div class="search BoxSearch">
                        <input type="text" class="InputSearchBanner" placeholder="พิมพ์ชื่อเพื่อค้นหาลายเซ็น">
                        <button type="submit" class="searchButtonBanner">
                            ค้นหาลายเซ็น
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section> -->
    <section class="SlideBanner">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="product.php">
                        <img class="Banner-IndexSlide" src="{{asset('frontend/images/index/Banner3.jpg')}}" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="about.php">
                        <img class="Banner-IndexSlide" src="{{asset('frontend/images/index/bn2.jpg')}}" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="contact.php">
                        <img class="Banner-IndexSlide" src="{{asset('frontend/images/index/bn3.jpg')}}" class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    @include('frontend.layouts.inc_menusignature')
    @include('frontend.layouts.inc_searchsignature')
    <section class="Section-AboutIndex">
        <div class="container">
            <div class="WarperAboutIndex">
                {!!$about_index!!}
                <!-- <h1 class="TextSecon-Black">
                    Signature Thailand
                </h1>
                <br>
                <p class="TextDetail-Black">
                    Signature Thailand เกิดขึ้นได้ด้วยแรงบันดาลใจ อยากให้คนไทยได้มีลายเซ็นมงคลที่ถูกต้องตามหลักของศาสตร์ลายเซ็นมงคลเสริมชีวิต จึงได้รวบรวมอาจารย์นักออกแบบลายเซ็น ที่มีแนวคิดอุดมการณ์เดียวกันเข้ามาร่วมสร้างสรรค์ผลงานการออกแบบลายเซ็นให้ทุกคนได้ประจักษ์ เพื่อให้คนที่สนใจอยากจะมีลายเซ็นมงคลเป็นของตัวเอง สามารถเข้าถึงได้ง่ายและได้ลายเซ็นมงคลที่เป็นชื่อของตนเอง ประกอบกับมีแบบลายเซ็นมงคลให้เลือกหลากหลายแบบ รวมทั้งได้มีการบอกคุณลักษณะเด่นของลายเซ็นแต่ละแบบเพื่อช่วยในการตัดสินใจเลือกใช้ลายเซ็นให้เหมาะสมกับตนเองทั้งหน้าที่การงาน การเงิน ความรัก สุขภาพ โชคลาภ ความสำเร็จฯ
                    โดยมีความเชื่อที่ว่า ลายเซ็นมงคลจะช่วยเสริมดวงชะตา เปลี่ยนชีวิตจากร้ายกลายเป็นดี เสริมดวงชะตาชีวิตให้รุ่งโรจน์ เสริมส่งด้าน การงาน การทำธุรกิจ เสริมการเงินดี มีสภาพคล่อง การเจรจาประสบผลสำเร็จดี ได้รับความเชื่อถือ ส่งเสริมภาพลักษณ์ให้มีเสน่ห์ โดดเด่นเหนือกว่าใคร จะทำการอะไรก็ได้รับการสนันสนุนเป็นอย่างดี มีบริวารดีคอยให้การช่วยเหลือ และมีผู้คอยให้การอุปถัมภ์ค้ำชู มีความรักดีครอบครัวอบอุ่น ช่วยเหลือเกื้อกูลสนับสนุนกันเป็นอย่างดี เรื่องสุขภาพดี การงานธุรกิจก้าวหน้า ส่งเสริมให้ชีวิตประสบความสำเร็จ มีโชคลาภ ได้รับโอกาสดีเข้ามาในชีวิต ทั้งหมดที่กล่าวมา
                </p>
                <br>
                <p class="TextDetail-Black">
                    จึงเป็นที่มาของ “Signature Thailand ศูนย์รวมลายเซ็นมงคลที่ใหญ่ที่สุดในประเทศไทย”
                </p>
                <br>
                <p class="TextDetail-Black">
                    สุดท้ายนี้ ทีมงานอาจารย์และนักออกแบบลายเซ็น Signature Thailand ขออวยพรให้ทุกท่าน ประสบแต่ความสุข ความเจริญ คิดหวังสิ่งใดที่เป็นเรื่องดี ของให้ทุกท่านสมปรารถนาทุกประการ ด้วยกันทุกท่านนะครับ
                </p>
                <br>
                <p class="TextDetail-Black">
                    Signature Thailand Official
                </p> -->
                <br>
                <!-- <div class="BoxIconWeb">
                    <img class="IconWeb" src="./images/index/icon-1.svg" alt="">
                    <img class="IconWeb" src="./images/index/icon-2.svg" alt="">
                    <img class="IconWeb" src="./images/index/icon-3.svg" alt="">
                    <img class="IconWeb" src="./images/index/icon-4.svg" alt="">
                </div> -->
                <a class="btn ButtonSeemore" href="{{route('aboutPage')}}">
                    ดูเพิ่มเติม
                </a>
            </div>
        </div>
        <div class="DivPen">
            <img class="IMG-Pen" src="{{asset('frontend/images/index/pen.png')}}" alt="">
        </div>
    </section>

    <section class="Section-ProductIndex">
        <div class="container">
            <!-- <h1 class="TextHead-Gold text-align-center">
                คลังลายเซ็นฟรี
            </h1>
            <form  role="search" method="get" action="{{route('searchPage')}}">
                <div class="search BoxSearch">
                    <input  type="text" name="keyword" class="InputSearchBG-grey w-100" placeholder="พิมพ์ชื่อเพื่อค้นหาลายเซ็น">
                    <button type="submit" class="searchButton">
                        ค้นหาลายเซ็น
                    </button>
                </div>
            </form>
            <br>
            <hr class="w-100 Color-Grey-HR">
            <br> -->
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    คลังลายเซ็นภาษาไทย
                </h1>               
            </div>
            <hr class="w-100 Color-Grey-HR">
            <br>
            <!-- <div>
                <div class="row Row-Product">
                    @foreach($namefree as $keyfreee => $freee)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="BoxProductFree">
                            <img class="IMG-PD" src="{{asset($freee->random_sign->sign)}}" alt="">
                            <div class="WarperDetail-ProductFree">
                                <p class="TextName-PD">
                                    {{$freee->name_th}} / {{$freee->name_en}}
                                </p>
                                <div class="Box-Maim-Star w-100">
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            งาน
                                        </p>
                                        
                                        <div>
                                            @for ($i = 0; $i < $freee->random_sign->work; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $freee->random_sign->work; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                        เงิน
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $freee->random_sign->finance; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $freee->random_sign->finance; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            รัก
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $freee->random_sign->love; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $freee->random_sign->love; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            สุขภาพ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $freee->random_sign->health; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $freee->random_sign->health; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            โชคลาภ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $freee->random_sign->fortune; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $freee->random_sign->fortune; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <p class="TextPrice-PD">
                                    <span>
                                        <img class="mb-1" src="{{asset('frontend/images/product/ic_money.svg')}}" alt="">
                                    </span>
                                    Free
                                </p>
                                <a class="btn ButtonSeemore-PD" href="{{route('productdetailPage', ['name' => $freee->id])}}">
                                    ดูเพิ่มเติม
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> -->
            <div>
                <div class="row Row-Product">
                    @foreach($namesfreeth as $keyth => $th)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="BoxProductFree">
                            <img class="IMG-PD" src="{{asset($th->random_sign->sign)}}" alt="">
                            <div class="WarperDetail-ProductFree">
                                <p class="TextName-PD">
                                    {{$th->name_th}}
                                </p>
                                <div class="Box-Maim-Star w-100">
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            งาน
                                        </p>
                                        
                                        <div>
                                            @for ($i = 0; $i < $th->random_sign->work; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->random_sign->work; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                        เงิน
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->random_sign->finance; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->random_sign->finance; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            รัก
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->random_sign->love; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->random_sign->love; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            สุขภาพ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->random_sign->health; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->random_sign->health; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            โชคลาภ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->random_sign->fortune; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->random_sign->fortune; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <p class="TextPrice-PD">
                                    <span>
                                        <img class="mb-1" src="{{asset('frontend/images/product/ic_money.svg')}}" alt="">
                                    </span>
                                    Free
                                </p>
                                <a class="btn ButtonSeemore-PD" href="{{route('productdetailPage', ['name' => $th->id])}}">
                                    ดูเพิ่มเติม
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                คลังลายเซ็นภาษาอังกฤษ
                </h1>               
            </div>
            <hr class="w-100 Color-Grey-HR">
            <br>
            <div>
                <div class="row Row-Product">
                    @foreach($namesfreeen as $keyen => $en)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="BoxProductFree">
                            <img class="IMG-PD" src="{{asset($en->random_sign->sign)}}" alt="">
                            <div class="WarperDetail-ProductFree">
                                <p class="TextName-PD">
                                    {{$en->name_en}}
                                </p>
                                <div class="Box-Maim-Star w-100">
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            งาน
                                        </p>
                                        
                                        <div>
                                            @for ($i = 0; $i < $en->random_sign->work; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->random_sign->work; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                        เงิน
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->random_sign->finance; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->random_sign->finance; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            รัก
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->random_sign->love; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->random_sign->love; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            สุขภาพ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->random_sign->health; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->random_sign->health; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            โชคลาภ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->random_sign->fortune; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->random_sign->fortune; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <p class="TextPrice-PD">
                                    <span>
                                        <img class="mb-1" src="{{asset('frontend/images/product/ic_money.svg')}}" alt="">
                                    </span>
                                    Free
                                </p>
                                <a class="btn ButtonSeemore-PD" href="{{route('productdetailPage', ['name' => $en->id])}}">
                                    ดูเพิ่มเติม
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn ButtonSeemore mt-5" href="{{route('productPage')}}">
                    คลังลายเซ็น
                    <span>
                        <img class="ms-1" src="{{asset('frontend/images/index/ic_pen.svg')}}" alt="">
                    </span>
                </a>
            </div>
        </div>
    </section>


    @include('frontend.layouts.inc_menupreorder')

    <section class="TeamIndex">
        <div class="container">
            <h1 class="TextHead-Gold text-center mb-5">
                ทีมงาน Signature Thailand
            </h1>

            <div class="SlideTeam team owl-carousel owl-theme ">

                @foreach($staffs as $keystaffs => $staff)
                <div class="items">
                    <div class="BoxTeam">
                        <img class="IMG-Team" src="{{asset($staff->photo)}}" alt="">
                        <div class="BoxDetail-Team">
                            <p class="Text-Gold-Gardien Text-24 Text-W600 text-center mb-2">
                                {{$staff->name}}
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
                @endforeach
                <div class="items">
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
                <div class="items">
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
                <div class="items">
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
                <div class="items">
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

    </section>


    


@endsection

@section('script')
<script>

    $('.team').owlCarousel({
			autoplay: true,
			loop: true,
			margin: 10,
			nav: false,
			smartSpeed: 600,
			dots: true,
			responsive: {
			  0: {
				items: 1
			  },
			  600: {
				items: 2
			  },
			  1000: {
				items: 3
			  }
			}
		});
</script>
@endsection


