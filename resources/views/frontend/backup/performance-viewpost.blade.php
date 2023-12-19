@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - performance-viewpost</title>
@endsection

@section('content')


<div class="bg-profile-performance">@include('frontend.layouts.inc_profile')</div>
<section class="row">
    <div class="col-12 page-performance">
        <div class="container">
            <div class="row">
                @include('frontend.layouts.inc-menuprofile-search')
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="desc-pageprofile">
                        <div class="wraptopic-pageprofile">
                            <div class="topic-profilepage"><i class="bi bi-circle-fill"></i> Performance</div>
                            <button class="show-menuprofile"><i class="bi bi-search"></i>ค้นหารถในบัญชี</button>
                        </div>
                        @include('frontend.layouts.inc_menu-performance')
                        <a href="car-detail.php" class="item-mycar">
                            <div class="item-mycar-cover">
                                <figure><img src="{{asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png')}}" alt=""></figure>
                            </div>
                            <div class="mycar-detail-mb">
                                <div class="mycar-name">2023 BMW X1</div>
                                <div class="mycar-type">X1 2.0 sDrive18i</div>
                                <div class="mycar-idcar">4กข 8113</div>
                            </div>
                            <div class="item-mycar-detail-check item-mycar-detail">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mycar-name">2023 BMW X1</div>
                                        <div class="mycar-type">X1 2.0 sDrive18i</div>
                                        <div class="mycar-idcar">4กข 8113</div>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <div class="score-performance">จำนวนผู้คลิกดู : 82</div>
                                        <div class="mycar-price-mb mycar-price">599,000.-</div>
                                    </div>
                                </div>
                                <div class="mycar-boxline">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="car-detail.php" class="item-mycar">
                            <div class="item-mycar-cover">
                                <figure><img src="{{asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png')}}" alt=""></figure>
                            </div>
                            <div class="mycar-detail-mb">
                                <div class="mycar-name">2023 BMW X1</div>
                                <div class="mycar-type">X1 2.0 sDrive18i</div>
                                <div class="mycar-idcar">4กข 8113</div>
                            </div>
                            <div class="item-mycar-detail-check item-mycar-detail">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mycar-name">2023 BMW X1</div>
                                        <div class="mycar-type">X1 2.0 sDrive18i</div>
                                        <div class="mycar-idcar">4กข 8113</div>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <div class="score-performance">จำนวนผู้คลิกดู : 82</div>
                                        <div class="mycar-price-mb mycar-price">599,000.-</div>
                                    </div>
                                </div>
                                <div class="mycar-boxline">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="car-detail.php" class="item-mycar">
                            <div class="item-mycar-cover">
                                <figure><img src="{{asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png')}}" alt=""></figure>
                            </div>
                            <div class="mycar-detail-mb">
                                <div class="mycar-name">2023 BMW X1</div>
                                <div class="mycar-type">X1 2.0 sDrive18i</div>
                                <div class="mycar-idcar">4กข 8113</div>
                            </div>
                            <div class="item-mycar-detail-check item-mycar-detail">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mycar-name">2023 BMW X1</div>
                                        <div class="mycar-type">X1 2.0 sDrive18i</div>
                                        <div class="mycar-idcar">4กข 8113</div>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <div class="score-performance">จำนวนผู้คลิกดู : 82</div>
                                        <div class="mycar-price-mb mycar-price">599,000.-</div>
                                    </div>
                                </div>
                                <div class="mycar-boxline">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    $( ".menu-performane.menu-mycar > ul > li:nth-child(2) > a" ).addClass( "here" );
</script>
@endsection
