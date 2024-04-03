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
        <form method="post" action="{{route('cartpreorderPage')}}">
            @csrf 
            <div class="container">
                <div class="ColPreorder">
                    <h1 class="TextHead-Gold text-center">
                        สั่งออกแบบลายเซ็น
                    </h1>
                    <hr class="w-100 Color-Grey-HR">

                    <!-- Tab links -->
                    <!-- <div class="tab ColTab-SelectMenuPreorder">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder" onclick="openCity(event, 'Signature-TH')">ลายเซ็นไทย</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder" onclick="openCity(event, 'Signature-EN')">ลายเซ็นอังกฤษ</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder" onclick="openCity(event, 'Signature-All')">ลายเซ็นไทยและอังกฤษ</budivtton>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="tab ColTab-SelectMenuPreorder">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder packagebutton" data-package="thai" >ลายเซ็นไทย</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder packagebutton" data-package="english" >ลายเซ็นอังกฤษ</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder packagebutton" data-package="combo" >ลายเซ็นไทยและอังกฤษ</budivtton>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab ColTab-SelectMenuPreorder">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder packagebutton" data-package="thai">ลายเซ็นไทย</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder packagebutton" data-package="english">ลายเซ็นอังกฤษ</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="tablinks LinkTab-SelectMenuPreorder packagebutton" data-package="combo">ลายเซ็นไทยและอังกฤษ</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab content -->


                    <!-- <div id="Signature-TH" class="tabcontent TabContent-SelectMenuPreorder"> -->
                    <div class="">
                        <!-- <input type="hidden" name="package" value="thai" />
                        <div class="WarpColInput-Preorder row">
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W500 Text-Gold-Gardien" for="Select-OptionSignature">เลือกแบบลายเซ็น</label>
                                    <select name="preorder_type" id="Select-OptionSignature" class="DropdownBox-SelectPreorder">
                                        <option class="OptionSelect" value="firstname" selected >ลายเซ็นชื่อ</option>
                                        <option class="OptionSelect" value="lastname">ลายเซ็นนามสกุล</option>
                                        <option class="OptionSelect" value="duo">ลายเซ็นชื่อและลายเซ็นนามสกุล</option>
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
                                <input type="text" name="firstname_th" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    ลายเซ็นนามสกุลภาษาไทย
                                </label>
                                <input type="text" name="lastname_th" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    ลายเซ็นชื่อภาษาอังกฤษ
                                </label>
                                <input type="text" name="firstname_en" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    ลายเซ็นนามสกุลภาษาอังกฤษ
                                </label>
                                <input type="text" name="lastname_en" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                            </div>
                        </div> -->

                        <input type="hidden" name="package" id="package" value="thai" />
                        <div class="WarpColInput-Preorder row">
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label class="me-3 Text-18 Text-W500 Text-Gold-Gardien" for="Select-OptionSignature">เลือกแบบลายเซ็น</label>
                                <select name="preorder_type" id="Select-OptionSignature" class="DropdownBox-SelectPreorder">
                                    <option class="OptionSelect" value="firstname" selected>ลายเซ็นชื่อ</option>
                                    <option class="OptionSelect" value="lastname">ลายเซ็นนามสกุล</option>
                                    <option class="OptionSelect" value="duo">ลายเซ็นชื่อและลายเซ็นนามสกุล</option>
                                </select>
                            </div>
                        </div>

                        <div class="WarpColInput-Preorder row">
                            <div id="firstname_th_block" class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                <label for="firstname_th" class="me-3 Text-18 Text-W400 Text-Gray-Label">ลายเซ็นชื่อภาษาไทย</label>
                                <input type="text" name="firstname_th" class="w-100 DropdownBox-SelectPreorder" id="firstname_th">
                            </div>
                            <div id="lastname_th_block" class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                <label for="lastname_th" class="me-3 Text-18 Text-W400 Text-Gray-Label">ลายเซ็นนามสกุลภาษาไทย</label>
                                <input type="text" name="lastname_th" class="w-100 DropdownBox-SelectPreorder" id="lastname_th">
                            </div>
                            <div id="firstname_en_block" class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                <label for="firstname_en" class="me-3 Text-18 Text-W400 Text-Gray-Label">ลายเซ็นชื่อภาษาอังกฤษ</label>
                                <input type="text" name="firstname_en" class="w-100 DropdownBox-SelectPreorder" id="firstname_en">
                            </div>
                            <div id="lastname_en_block" class="col-lg-6 col-md-6 col-12 Col-Margin-TopBottom">
                                <label for="lastname_en" class="me-3 Text-18 Text-W400 Text-Gray-Label">ลายเซ็นนามสกุลภาษาอังกฤษ</label>
                                <input type="text" name="lastname_en" class="w-100 DropdownBox-SelectPreorder" id="lastname_en">
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
                                        <option class="OptionSelect" value="0">0</option>
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
                                        <option class="OptionSelect" value="0">0</option>
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
                                        <option class="OptionSelect" value="0">0</option>   
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
                                        <option class="OptionSelect" value="0">0</option>
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
                                        <option class="OptionSelect" value="0">0</option>
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
                            ข้อมูลส่วนตัว
                        </h3>
                        <hr class="w-100 Color-Grey-HR">

                        <div class="WarpColInput-Preorder row">
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    ชื่อ - นามสกุล
                                </label>
                                <input type="text" name="name" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    วัน/เดือน/ปีเกิด
                                </label>
                                <input type="date" name="dob" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom d-none d-sm-none d-md-block d-lg-block d-xl-block">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    เบอร์โทรติดต่อ
                                </label>
                                <input type="tel" name="telephone" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="SelectStatus">สถานภาพปัจจุบัน ลำดับ 1</label>
                                    <select name="SelectStatus" id="SelectStatus" class="DropdownBox-SelectPreorder">
                                        <option class="OptionSelect" value="single" selected >โสด</option>
                                        <option class="OptionSelect" value="married">สมรส</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    ธุรกิจ อาชีพ หรือการงานที่ทำในปัจจุบัน (ไม่มีให้ระบุ ไม่มี)
                                </label>
                                <input type="text" name="occupation" class="w-100 DropdownBox-SelectPreorder">
                            </div>
                        </div>

                        <h3 class="mt-4 Text-18 Text-W400 Text-Gray-Label">
                            *เขียน ชื่อ-นามสกุล (เขียน 2 ครั้ง) พร้อม ลายเซ็นเดิมที่ใช้ในปัจจุบัน เซ็น 2 ครั้ง (หากไม่มีให้ระบุว่าไม่มีลายเซ็น) แล้วถ่ายรูปส่งให้อาจารย์
                        </h3>

                        <div class="WarpColInput-Preorder row">
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="SelectEver-Signature">เคยมีลายเซ็นหรือไม่</label>
                                    <select name="EverSignature" id="SelectEver-Signature" class="DropdownBox-SelectPreorder">
                                        <option class="OptionSelect" value="ever">เคย</option>
                                        <option class="OptionSelect" value="never">ไม่เคย</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <label for="dropdown" class="me-3 Text-18 Text-W400 Text-Gray-Label">
                                    แนบไฟล์ภาพลายเซ็น
                                </label>
                                <input class="form-control DropdownBox-SelectPreorder" type="file" name="mysignature" id="formFile">
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
                                        <option class="OptionSelect" value="normal" selected >ส่งมอบปกติ</option>
                                        <option class="OptionSelect" value="express">ส่งมอบเร็ว</option>
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
                            <button class="btn ButtonSeemore mt-4" >
                                สั่งออกแบบลายเซ็น
                                <span>
                                    <img class="ms-1" src="{{asset('frontend/images/index/ic_pen.svg')}}" alt="">
                                </span>
                            </button>
                        </div>

                    </div>


                </div>
            </div>
        </form>
            
    </Section>



@endsection

@section('script')
<script>
    // Function to show/hide input blocks based on selected package and preorder_type
    function showHideInputs() {
        var package = $('#package').val();
        var preorder_type = $('#Select-OptionSignature').val();

        // Hide all input blocks first
        $('[id$="_block"]').hide();

        // Show the relevant input blocks based on package and preorder_type
        if (package === 'thai') {
            if (preorder_type === 'firstname') {
                $('#firstname_th_block').show();
            } else if (preorder_type === 'lastname') {
                $('#lastname_th_block').show();
            } else if (preorder_type === 'duo') {
                $('#firstname_th_block, #lastname_th_block').show();
            }
        } else if (package === 'english') {
            if (preorder_type === 'firstname') {
                $('#firstname_en_block').show();
            } else if (preorder_type === 'lastname') {
                $('#lastname_en_block').show();
            } else if (preorder_type === 'duo') {
                $('#firstname_en_block, #lastname_en_block').show();
            }
        } else if (package === 'combo') {
            if (preorder_type === 'firstname') {
                $('#firstname_th_block, #firstname_en_block').show();
            } else if (preorder_type === 'lastname') {
                $('#lastname_th_block, #lastname_en_block').show();
            } else if (preorder_type === 'duo') {
                $('#firstname_th_block, #lastname_th_block, #firstname_en_block, #lastname_en_block').show();
            }
        }
    }

    // Call showHideInputs on page load
    $(document).ready(function () {
        showHideInputs();
    });

    // Change package value on packagebutton click
    $('.packagebutton').click(function () {
        $('#package').val($(this).data('package'));
        showHideInputs();
    });

    // Change inputs visibility on preorder_type change
    $('#Select-OptionSignature').change(function () {
        showHideInputs();
    });
</script>
@endsection


