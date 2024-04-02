@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
    @include('frontend.layouts.inc_menusignature')
<?php
// echo "<pre>";
// print_r($namesth);
// echo "</pre>";

// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    <Section class="Section-Preorder">
        <div class="container">
            <div class="ColPreorder">
                <h1 class="TextHead-Gold text-center">
                    สั่งออกแบบลายเซ็น
                </h1>
                <hr class="w-100 Color-Grey-HR">

                <!-- Tab links -->
                <div class="tab ColTab-SelectMenuPreorder">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <button class="tablinks LinkTab-SelectMenuPreorder" onclick="openCity(event, 'Signature-TH')">ลายเซ็นไทย</button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <button class="tablinks LinkTab-SelectMenuPreorder" onclick="openCity(event, 'Signature-EN')">ลายเซ็นอังกฤษ</button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <button class="tablinks LinkTab-SelectMenuPreorder" onclick="openCity(event, 'Signature-All')">ลายเซ็นไทยและอังกฤษ</button>
                        </div>
                    </div>
                </div>

                <!-- Tab content -->


                <div id="Signature-TH" class="tabcontent TabContent-SelectMenuPreorder">

                    <div class="WarpColInput-Preorder row">
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W500 Text-Gold-Gardien" for="Select-OptionSignature">เลือกแบบลายเซ็น</label>
                                <select name="Select-OptionSignature" id="Select-OptionSignature" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="onlyfirst">ลายเซ็นชื่อ</option>
                                    <option class="OptionSelect" value="onlylast">ลายเซ็นนามสกุล</option>
                                    <option class="OptionSelect" value="combo">ลายเซ็นชื่อและลายเซ็นนามสกุล</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                        </div>
                    </div>

                    <div class="WarpColInput-Preorder row">
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                ลายเซ็นชื่อภาษาไทย
                            </label>
                            <input type="text" name="first_th" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                ลายเซ็นนามสกุลภาษาไทย
                            </label>
                            <input type="text" name="last_th" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                ลายเซ็นชื่อภาษาอังกฤษ
                            </label>
                            <input type="text" name="first_en" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                ลายเซ็นนามสกุลภาษาอังกฤษ
                            </label>
                            <input type="text" name="last_en" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                        </div>
                    </div>

                    <h3 class="mt-4 Text-18 Text-W500 Text-Gold-Gardien">
                        ต้องการเน้นมงคลด้านใด (เรียงลำดับความสำคัญ)
                    </h3>
                    <hr class="w-100 Color-Grey-HR">

                    <div class="WarpColInput-Preorder row">
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="work">การงาน</label>
                                <select name="work" id="work" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="1">1</option>
                                    <option class="OptionSelect" value="2">2</option>
                                    <option class="OptionSelect" value="3">3</option>
                                    <option class="OptionSelect" value="4">4</option>
                                    <option class="OptionSelect" value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="finance">การเงิน</label>
                                <select name="finance" id="finance" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="1">1</option>
                                    <option class="OptionSelect" value="2">2</option>
                                    <option class="OptionSelect" value="3">3</option>
                                    <option class="OptionSelect" value="4">4</option>
                                    <option class="OptionSelect" value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="love">ความรัก</label>
                                <select name="love" id="love" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="1">1</option>
                                    <option class="OptionSelect" value="2">2</option>
                                    <option class="OptionSelect" value="3">3</option>
                                    <option class="OptionSelect" value="4">4</option>
                                    <option class="OptionSelect" value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="health">สุขภาพ</label>
                                <select name="health" id="health" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="1">1</option>
                                    <option class="OptionSelect" value="2">2</option>
                                    <option class="OptionSelect" value="3">3</option>
                                    <option class="OptionSelect" value="4">4</option>
                                    <option class="OptionSelect" value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="fortune">โชคลาภ</label>
                                <select name="fortune" id="fortune" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="1">1</option>
                                    <option class="OptionSelect" value="2">2</option>
                                    <option class="OptionSelect" value="3">3</option>
                                    <option class="OptionSelect" value="4">4</option>
                                    <option class="OptionSelect" value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="WarpColInput-Preorder row">
                        <div class="col-12 Col-Margin-TopBottom">
                            <label class="me-3 Text-18 Text-W500 Text-Gold-Gardien" for="TargetPreorder">เลือกเป้าหมายเปลี่ยนชีวิต</label>
                            <textarea id="TargetPreorder" class="ColTargetPreorder" name="TargetPreorder" rows="4" cols="40">
                            </textarea>
                        </div>
                    </div>

                    <h3 class="mt-4 Text-18 Text-W500 Text-Gold-Gardien">
                        จัดส่งข้อมูลส่วนตัว
                    </h3>
                    <hr class="w-100 Color-Grey-HR">

                    <div class="WarpColInput-Preorder row">
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                ชื่อ - นามสกุล
                            </label>
                            <input type="text" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                วัน/เดือน/ปีเกิด
                            </label>
                            <input type="date" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                เบอร์โทรติดต่อ
                            </label>
                            <input type="tel" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="SelectStatus">สถานภาพปัจจุบัน ลำดับ 1</label>
                                <select name="SelectStatus" id="SelectStatus" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="single">โสด</option>
                                    <option class="OptionSelect" value="married">สมรส</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                ธุรกิจ อาชีพ หรือการงานที่ทำในปัจจุบัน (ไม่มีให้ระบุ ไม่มี)
                            </label>
                            <input type="text" class="w-100 DropdownBox-SelectPreorder">
                        </div>
                    </div>

                    <h3 class="mt-4 Text-18 Text-W400 Text-Gray-Label">
                        *เขียน ชื่อ-นามสกุล (เขียน 2 ครั้ง) พร้อม ลายเซ็นเดิมที่ใช้ในปัจจุบัน เซ็น 2 ครั้ง (หากไม่มีให้ระบุว่าไม่มีลายเซ็น) แล้วถ่ายรูปส่งให้อาจารย์
                    </h3>

                    <div class="WarpColInput-Preorder row">
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="SelectEver-Signature">เคยมีลายเซ็นหรือไม่</label>
                                <select name="SelectEver-Signature" id="SelectEver-Signature" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="ever">เคย</option>
                                    <option class="OptionSelect" value="never">ไม่เคย</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                แนบไฟล์ภาพลายเซ็น
                            </label>
                            <input class="form-control DropdownBox-SelectPreorder" type="file" id="formFile">
                        </div>
                    </div>

                    <div class="WarpColInput-Preorder row">
                        <div class="col-12 Col-Margin-TopBottom">
                            <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="ProblemPreorder">เล่าถึงปัญหาที่พบเจอในปัจจุบัน ติดปัญหาด้านใดบ้าง(มาพอสังเขป) จะให้ข้อมูลหรือไม่ก็ได้</label>
                            <textarea id="ProblemPreorder" class="ColTargetPreorder" name="ProblemPreorder" rows="4" cols="40">
                            </textarea>
                        </div>
                    </div>

                    <h3 class="mt-4 Text-18 Text-W500 Text-Gold-Gardien">
                        ระยะเวลาส่งมอบ
                    </h3>
                    <hr class="w-100 Color-Grey-HR">
                    <h3 class="mt-4 Text-18 Text-W400 Text-Gray-Label">
                        การออกแบบลายเซ็นใหม่ มีระยะเวลา ส่งมอบ 7-10 วัน (ตามลำดับคิวงาน)
                    </h3>

                    <div class="WarpColInput-Preorder row">
                        <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                            <div class="ColSelect-Input">
                                <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="DeliverSignature">ต้องการส่งมอบลายเซ็น ลำดับ 1</label>
                                <select name="DeliverSignature" id="DeliverSignature" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="work">ส่งมอบปกติ</option>
                                    <option class="OptionSelect" value="finance">ส่งมอบเร็ว</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 Text-20 Text-W400 Text-Gray-Label text-center">
                        หมายเหตุ : เงินส่วนหนึ่งที่ได้รับจากท่าน อ.ติณณ์ จะขอนำไปทำบุญ เพื่อความเป็นศิริมงคลให้แก่ท่าน ขอให้ท่านได้อนุโมทนาบุญร่วมกันครับ
                    </p>
                    <p class="mt-4 Text-20 Text-W400 Text-Gray-Label text-center">
                        ขอแสดงความขอบคุณ
                    </p>
                    <p class="mt-4 Text-20 Text-W500 Text-Gray-Label text-center">
                        ทีมงาน Signature Thailand
                    </p>
                    <div class="d-flex justify-content-center">
                        <a class="btn ButtonSeemore mt-4" href="product.php">
                            สั่งออกแบบลายเซ็น
                            <span>
                                <img class="ms-1" src="{{asset('frontend/images/index/ic_pen.svg')}}" alt="">
                            </span>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </Section>



@endsection

@section('script')

@endsection


