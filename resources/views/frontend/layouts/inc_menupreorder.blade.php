
<section class="Section-Bigpreorder mt-1 mb-1">
    <div class="row">
        <div class="col-12 BoxLeftBig-Preorder">
            <div class="WarperDiv-Bigpreorder ms-3 me-3">
                <h1 class="TextHead-Gold">
                    ต้องการสั่งออกแบบลายเซ็นใหม่
                </h1>
                <p class="TextDetail-Black text-center mt-3">
                    สามารถสั่งออกแบบลายเซ็นใหม่ได้ทั้งชื่อและนามสกุล ทั้งภาษาไทยและภาษาอังกฤษ
                </p>
                <div class="ms-3 me-3">
                    <a class="btn ButtonSeemore" href="{{route('preorderPage')}}">
                        สั่งออกแบบลายเซ็น
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 BoxRightBig-Preorder">
            <div class="WarperDiv-Bigpreorder ms-3 me-3">
                <h1 class="TextHead-Gold">
                    ต้องการแนะนำรายชื่อ
                </h1>
                <p class="TextDetail-Black text-center mt-3">
                    แนะนำรายชื่อของท่านเข้าสู่ฐานข้อมูลเพื่อแนะนำชื่อให้กับทางทีมออกแบบลายเซ็น
                </p>
            </div>
            
                <div class="BoxInput-Reccom">
                    <!-- <input type="text" class="InputRecommender" placeholder="พิมพ์ชื่อเพื่อแนะนำ"> -->
                    <!-- <a class="btn searchButton" href="search-results.php">ค้นหาลายเซ็น</a> -->
                    <a data-fancybox data-src="#dialog-content" class="btn ButtonSeemore Text-Gray-Label" href="#">
                        แนะนำชื่อ
                    </a>
                    <div id="dialog-content" class="popupname" style="display:none;">
                        <form method="post" action="{{route('suggestaction')}}">
                        @csrf
                            <div class="detail-popupname">
                            
                                <p class="Text-24 Text-W500 text-center mb-4">แนะนำชื่อ</p>
                                <div class="WarpColInput-Preorder row">
                                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                        <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                            ชื่อภาษาไทย
                                        </label>
                                        <input type="text" name="name_th" class="w-100 DropdownBox-SelectPreorder">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                        <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                            ชื่อภาษาอังกฤษ
                                        </label>
                                        <input type="text" name="name_en" class="w-100 DropdownBox-SelectPreorder">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                        <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                            อีเมล
                                        </label>
                                        <input type="email" name="email" class="w-100 DropdownBox-SelectPreorder" required >
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                                        <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                            เบอร์โทรติดต่อ
                                        </label>
                                        <input type="tel" name="phone" class="w-100 DropdownBox-SelectPreorder" required >
                                    </div>
                                </div>
                                <button type="submit" class="btn ButtonSeemore mt-5" >
                                    ยืนยัน
                                </button>
                            
                            </div>
                        </form>    
                    </div>
                </div>
            
        </div>

    </div>
</section>