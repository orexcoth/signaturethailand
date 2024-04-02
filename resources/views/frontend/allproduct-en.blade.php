@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
    @include('frontend.layouts.inc_menusignature')
    @include('frontend.layouts.inc_searchsignature')
<?php
// echo "<pre>";
// print_r($namesth);
// echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    <section class="Section-ProductIndex">
        <div class="container">
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    คลังลายเซ็นภาษาอังกฤษ
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-th.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->
            </div>
            <hr class="w-100 Color-Grey-HR">
            <br>
            <div>
                <div class="row Row-Product">
                @foreach($namesen as $keyen => $en)
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
            <div class="BoxPagination d-flex justify-content-center">
                <div class="pagination PaginationProduct mt-5">
                    <a href="#">&laquo;</a>
                    <a class="active" href="#">1</a>
                    <a class="" href="#">2</a>
                    <a class="" href="#">3</a>
                    <a class="" href="#">4</a>
                    <a class="" href="#">5</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </section>



    @include('frontend.layouts.inc_menupreorder')
@endsection

@section('script')

@endsection

