@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
// $customer = session('customer');
// echo "<pre>";
// print_r($getsells);
// echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    <section class="SectionHistory">
        <div class="container">
            <h1 class="TextHead-Gold text-center">
                คลังลายเซ็นลูกค้า
            </h1>
            <p class="Text-20 Text-W400 Text-Gray-Label text-center mt-3">
                ลายเซ็นที่สั่งซื้อเเล้ว
            </p>
            <hr class="w-100 Color-Grey-HR">
        </div>
    </section>
   
    <section class="Section-Product-history">
        <div class="container">
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาไทย
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-th.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->

            </div>
            <!-- <hr class="w-100 Color-Grey-HR"> -->
            <br>
            <div>
                <div class="row Row-Product">
                    
                    @foreach($getsells as $keygetsells => $sells)
                        @foreach($sells->signs as $keygetsellssigns => $signsloop)
                            @if($signsloop->lang == 'th')
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="BoxProductFree">
                                    <img class="IMG-PD" src="{{asset($signsloop->sign)}}" alt="">
                                    <div class="WarperDetail-ProductFree">
                                        <p class="TextName-PD">
                                            
                                            @if($signsloop->lang == 'th')
                                            {{$sells->name_th}}
                                            @endif
                                            @if($signsloop->lang == 'en')
                                            {{$sells->name_en}}
                                            @endif
                                        </p>
                                        <div class="Box-Maim-Star w-100">
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    งาน
                                                </p>
                                                
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->work; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->work; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                เงิน
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->finance; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->finance; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    รัก
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->love; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->love; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    สุขภาพ
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->health; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->health; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    โชคลาภ
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->fortune; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->fortune; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="TextPrice-PD">
                                            <span>
                                                <img class="mb-1" src="./images/product/ic_money.svg" alt="">
                                            </span>
                                            Free
                                        </p> -->
                                        <a class="btn ButtonSeemore-PD" href="{{route('historydetailsignatureforsellsPage', ['sells_id' => $sells->id, 'signs_id' => $signsloop->id])}}">
                                            ดูเพิ่มเติม
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endif
                            
                        @endforeach
                        
                    @endforeach
                    
                </div>
            </div>

            <div class="BoxJustify-HeaderText mt-5">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาอังกฤษ
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-en.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->
            </div>
            <!-- <hr class="w-100 Color-Grey-HR"> -->
            <br>
            <div>
                <div class="row Row-Product">
                @foreach($getsells as $keygetsells => $sells)
                        @foreach($sells->signs as $keygetsellssigns => $signsloop)
                            @if($signsloop->lang == 'en')
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="BoxProductFree">
                                    <img class="IMG-PD" src="{{asset($signsloop->sign)}}" alt="">
                                    <div class="WarperDetail-ProductFree">
                                        <p class="TextName-PD">
                                            
                                            @if($signsloop->lang == 'th')
                                            {{$sells->name_th}}
                                            @endif
                                            @if($signsloop->lang == 'en')
                                            {{$sells->name_en}}
                                            @endif
                                        </p>
                                        <div class="Box-Maim-Star w-100">
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    งาน
                                                </p>
                                                
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->work; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->work; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                เงิน
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->finance; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->finance; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    รัก
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->love; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->love; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    สุขภาพ
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->health; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->health; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="Box-Title-Star">
                                                <p class="Text-TitleStar">
                                                    โชคลาภ
                                                </p>
                                                <div>
                                                    @for ($i = 0; $i < $signsloop->fortune; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = $signsloop->fortune; $i < 5; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="TextPrice-PD">
                                            <span>
                                                <img class="mb-1" src="./images/product/ic_money.svg" alt="">
                                            </span>
                                            Free
                                        </p> -->
                                        <a class="btn ButtonSeemore-PD" href="{{route('historydetailsignatureforsellsPage', ['sells_id' => $sells->id, 'signs_id' => $signsloop->id])}}">
                                            ดูเพิ่มเติม
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endif
                            
                        @endforeach
                        
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="SectionHistory">
        <div class="container">

            <p class="Text-20 Text-W400 Text-Gray-Label text-center mt-3">
                ลายเซ็นที่สั่งออกแบบซื้อเเล้ว
            </p>
            <hr class="w-100 Color-Grey-HR">
        </div>
    </section>

    <section class="SectionHistory">
        <div class="container">
            <h1 class="TextHead-Gold text-center"></h1>
            <p class="Text-20 Text-W400 Text-Gray-Label text-center mt-3"></p>
        </div>
    </section>


    
    



@endsection

@section('script')

@endsection
