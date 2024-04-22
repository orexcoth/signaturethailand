@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
    @include('frontend.layouts.inc_menusignature')

<?php
// echo "<pre>";
// print_r($query);
// echo "</pre>";

?>




    <section class="Section-Bigsearch">
        <div class="container">
            <div class="WarperDiv-Bigsearch">
                <h1 class="TextHead-Gold text-center">
                    ค้นหาลายเซ็น
                </h1>
                <form role="search" method="get" action="{{route('searchPage')}}">
                    <div class="search BoxSearch">
                        <input type="text" name="keyword" value="{{ Request::get('keyword') }}" class="InputSearchBG-White w-100" placeholder="พิมพ์ชื่อเพื่อค้นหาลายเซ็น">
                        <!-- <a class="btn searchButton" href="search-results.php">ค้นหาลายเซ็น</a> -->
                        <button type="submit" class="searchButton">
                            ค้นหาลายเซ็น
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    @if ($query !== null)
        @if ($query->isNotEmpty())
            <section class="Section-Bigpreorder mt-1 mb-1">
                <div class="row">
                    <div class="col-12 BoxLeftBig-Preorder">
                        <div class="WarperDiv-Bigpreorder ms-3 me-3">
                            <h1 class="TextHead-Gold">
                            ผลลัพธ์การค้นหา "{{ Request::get('keyword') }}"
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            @foreach ($query as $name)
                <!-- Display each name -->
                <!-- <section class="Section-SelectPackage"> -->
                <section class="">
                    <div class="container">
                        <div class="BoxSelectPackage" style="border:none;">
                            <!-- <div class="BoxnameSignature"> -->
                            <div class="BoxnameSignature" style="padding:0;">
                                <div class="Box-Text-Search-Left">
                                    <p class="Text-Search-TH mb-0 Text-48 Text-W600 Text-LineHeight-50">
                                    
                                    @if($language == 'th')
                                    {{ $name->name_th }}  {{ $name->name_en }}
                                    @else
                                    {{ $name->name_en }}  {{ $name->name_th }}
                                    @endif
                                    </p>
                                </div>
                                <div class="Box-Text-Search-Right">
                                    <a class="btn ButtonSeemore" href="{{route('productdetailPage', ['name' => $name->id])}}">ดูรายละเอียด</a>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </section>
            @endforeach
            <br>
            <div class="pagination justify-content-center mt-3">
                {{ $query->appends(request()->input())->links() }}
            </div>
        @else
            <!-- Display a message indicating no results -->
            <section class="Section-Bigpreorder mt-1 mb-1">
                <div class="row">
                    <div class="col-12 BoxLeftBig-Preorder">
                        <div class="WarperDiv-Bigpreorder ms-3 me-3">
                            <h1 class="TextHead-Gold">
                            ผลลัพธ์การค้นหา "{{ Request::get('keyword') }}"
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="Section-Bigpreorder mt-1 mb-1">
                <div class="row">
                    <div class="col-12 BoxLeftBig-Preorder">
                        <div class="WarperDiv-Bigpreorder ms-3 me-3">
                            <h1 class="TextHead-Gold">
                            ไม่พบผลลัพธ์การค้นหา
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @elseif (request()->filled('keyword'))
    <section class="Section-Bigpreorder mt-1 mb-1">
        <div class="row">
            <div class="col-12 BoxLeftBig-Preorder">
                <div class="WarperDiv-Bigpreorder ms-3 me-3">
                    <h1 class="TextHead-Gold">
                    ผลลัพธ์การค้นหา "{{ Request::get('keyword') }}"
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="Section-Bigpreorder mt-1 mb-1">
        <div class="row">
            <div class="col-12 BoxLeftBig-Preorder">
                <div class="WarperDiv-Bigpreorder ms-3 me-3">
                    <h1 class="TextHead-Gold">
                    ไม่พบผลลัพธ์การค้นหา
                    </h1>
                </div>
            </div>
        </div>
    </section>
    @else
        <!-- Display a message asking user to enter a keyword -->
        <section class="Section-Bigpreorder mt-1 mb-1">
            <div class="row">
                <div class="col-12 BoxLeftBig-Preorder">
                    <div class="WarperDiv-Bigpreorder ms-3 me-3">
                        <h1 class="TextHead-Gold">
                        พิมพ์ชื่อเพื่อค้นหาลายเซ็น
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    @endif









        
    


    

    <!-- <section class="Section-SelectPackage">
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
                            ธนกานต์
                        </p>
                    </div>
                    <div class="Box-Text-Search-Right">
                        <p class="Text-Search-TH mb-0 Text-48 Text-W600 Text-LineHeight-50">
                            Tanakan
                        </p>
                    </div>
                </div>

                <div class="Col-DD-SelectPackage">
                    <div class="DropdownPackage">
                        <h3 class="mb-0 Text-24 Text-W500 w-55">เลือกแพ็คเกจ</h3>
                        <select name="Select-OptionVerSignature" id="Select-OptionVerSignature" class="DropdownBox-SelectPreorder">
                            <option class="OptionSelect" value="Signature-VerTH">แพ็คเกจลายเซ็นภาษาไทย</option>
                            <option class="OptionSelect" value="Signature-VerEN">แพ็คเกจลายเซ็นภาษาอังกฤษ</option>
                            <option class="OptionSelect" value="Signature-VerAll">แพ็คเกจลายเซ็นภาษาไทยและภาษาอังกฤษ</option>
                        </select>
                    </div>
                    <div class="BoxPricePackage">
                        <p class="mb-0 Text-24 Text-W500">
                            ราคา
                            <span class="Text-W600 Text-Green-Gardien">
                                50.00
                            </span>
                        </p>
                    </div>
                </div>
                <a class="btn ButtonSeemore" href="">
                    สั่งซื้อลายเซ็นชื่อนี้
                </a>

            </div>
        </div>
    </section> -->

    <!-- <section class="Section-Product">
        <div class="container">
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาไทย
                </h1>
            </div>
            <br>
            <div>
                <div class="row Row-Product">
                    
                </div>
            </div>

            <div class="BoxJustify-HeaderText mt-5">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาอังกฤษ
                </h1>
            </div>
            <br>
            <div>
                <div class="row Row-Product">
                    
                </div>
            </div>
        </div>
    </section> -->


    @include('frontend.layouts.inc_menupreorder')
@endsection

@section('script')

@endsection
