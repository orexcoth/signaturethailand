@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
    @include('frontend.layouts.inc_menusignature')
    @include('frontend.layouts.inc_searchsignature')
<?php
// echo "<pre>";
// print_r($nth);
// echo "</pre>";

// echo "<pre>";
// print_r(count($nen));
// echo "</pre>";
?>
    <section class="Section-SelectPackage">
        <div class="container">
            <div class="BoxSelectPackage">
                <p class="Text-24 Text-W500 m-0">
                    <span>
                        <img class="IC-PenLine" src="{{asset('frontend/images/icon/ic-pen-line.svg')}}" alt="">
                    </span>
                    ลายเซ็น
                </p>

                <div class="BoxnameSignature">
                    <div class="Box-Text-Search-Left">
                        <p class="Text-Search-TH mb-0 Text-48 Text-W600 Text-LineHeight-50">
                        {{$name->name_th}}
                        </p>
                        <div class="BoxPricePackage">
                            <p class="mb-0 Text-24 Text-W500">
                                ราคา
                                <span class="Text-W600 Text-Green-Gardien">
                                {{$name->price_th}}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="Box-Text-Search-Right">
                        <p class="Text-Search-TH mb-0 Text-48 Text-W600 Text-LineHeight-50">
                        {{$name->name_en}}
                        </p>
                        <div class="BoxPricePackage">
                            <p class="mb-0 Text-24 Text-W500">
                                ราคา
                                <span class="Text-W600 Text-Green-Gardien">
                                {{$name->price_en}}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                @if(count($nth) > 0 && count($nen) > 0)
                <form action="{{route('cartPage')}}" method="post" >
                    @csrf
                    <div class="Col-DD-SelectPackage">
                        <div class="DropdownPackage">
                            <!-- <label class="me-3 Text-24 Text-W500" for="Select-OptionVerSignature">เลือกแพ็คเกจ</label> -->
                            <h3 class="mb-0 Text-24 Text-W500 w-55">เลือกแพ็คเกจ</h3>
                            <input type="hidden" name="name_id" value="{{$name->id}}" />
                            <input type="hidden" name="signsth" value="{{$signarrayTH}}" />
                            <input type="hidden" name="signsen" value="{{$signarrayEN}}" />
                            <input type="hidden" name="signsall" value="{{$signarrayALL}}" />
                            <input type="hidden" name="type" value="sell" />
                            <select name="package" id="Select-OptionVerSignature" class="DropdownBox-SelectPreorder">
                                <option class="OptionSelect" value="th">แพ็คเกจลายเซ็นภาษาไทย</option>
                                <option class="OptionSelect" value="en">แพ็คเกจลายเซ็นภาษาอังกฤษ</option>
                                <option class="OptionSelect" value="all">แพ็คเกจลายเซ็นภาษาไทยและภาษาอังกฤษ</option>
                            </select>
                        </div>
                        <button type="submit" class="btn ButtonSeemore ms-lg-4" >
                            สั่งซื้อลายเซ็นชื่อนี้
                        </button> 
                    </div>
                </form>
                @else
                    <div class="Col-DD-SelectPackage">
                        <div class="DropdownPackage">
                            <!-- <label class="me-3 Text-24 Text-W500" for="Select-OptionVerSignature">เลือกแพ็คเกจ</label> -->
                            <h3 class="mb-0 Text-24">อยู่ระหว่างการเพิ่มลายเซ็นต์</h3>

                        </div>
   
                    </div>
                @endif
                
            </div>
        </div>
    </section>

    <section class="Section-Product">
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
                    @foreach($nth as $keyth => $th)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="BoxProductFree">
                            <img class="IMG-PD" src="{{asset($th->feature)}}" alt="">
                            <div class="WarperDetail-ProductFree">
                                <p class="TextName-PD">
                                {{$name->name_th}}
                                </p>
                                <div class="Box-Maim-Star w-100">
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            งาน
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->work; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->work; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                        เงิน
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->finance; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->finance; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            รัก
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->love; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->love; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            สุขภาพ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->health; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->health; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            โชคลาภ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $th->fortune; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $th->fortune; $i < 5; $i++)
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
                                <a class="btn ButtonSeemore-PD" href="detailsignature.php">
                                    ดูเพิ่มเติม
                                </a>

                            </div>
                        </div>
                    </div>
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
                @foreach($nen as $keyen => $en)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="BoxProductFree">
                            <img class="IMG-PD" src="{{asset($en->feature)}}" alt="">
                            <div class="WarperDetail-ProductFree">
                                <p class="TextName-PD">
                                    {{$name->name_en}}
                                </p>
                                <div class="Box-Maim-Star w-100">
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            งาน
                                        </p>
                                        
                                        <div>
                                            @for ($i = 0; $i < $en->work; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->work; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                        เงิน
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->finance; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->finance; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            รัก
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->love; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->love; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            สุขภาพ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->health; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->health; $i < 5; $i++)
                                                <span class="fa fa-star"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="Box-Title-Star">
                                        <p class="Text-TitleStar">
                                            โชคลาภ
                                        </p>
                                        <div>
                                            @for ($i = 0; $i < $en->fortune; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i = $en->fortune; $i < 5; $i++)
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
                                <a class="btn ButtonSeemore-PD" href="{{route('productdetailPage', ['name' => $en->names_id])}}">
                                    ดูเพิ่มเติม
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



@endsection

@section('script')

@endsection








