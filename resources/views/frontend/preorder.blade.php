@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
    @include('frontend.layouts.inc_menusignature')
<?php
echo "<pre>";
print_r($firstname_th);
echo "</pre>";

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
                        <input type="hidden" name="total" id="total" value="{{$firstname_th}}" />
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
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_1">ความเด่นของลายเซ็น ลำดับ 1</label>
                                    <select name="prominence_1" id="prominence_1" class="DropdownBox-SelectPreorder">
                                        <option class="OptionSelect" value="work">การงาน</option>
                                        <option class="OptionSelect" value="finance">การเงิน</option>
                                        <option class="OptionSelect" value="love">ความรัก</option>
                                        <option class="OptionSelect" value="health">สุขภาพ</option>
                                        <option class="OptionSelect" value="fortune">โชคลาภ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_2">ความเด่นของลายเซ็น ลำดับ 2</label>
                                    <select name="prominence_2" id="prominence_2" class="DropdownBox-SelectPreorder">
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_3">ความเด่นของลายเซ็น ลำดับ 3</label>
                                    <select name="prominence_3" id="prominence_3" class="DropdownBox-SelectPreorder">
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_4">ความเด่นของลายเซ็น ลำดับ 4</label>
                                    <select name="prominence_4" id="prominence_4" class="DropdownBox-SelectPreorder">
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_5">ความเด่นของลายเซ็น ลำดับ 5</label>
                                    <select name="prominence_5" id="prominence_5" class="DropdownBox-SelectPreorder">
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>
                            </div>

                        </div>



                        <!-- <div class="WarpColInput-Preorder row">
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_1">ความเด่นของลายเซ็น ลำดับ 1</label>
                                    <select name="prominence_1" id="prominence_1" class="DropdownBox-SelectPreorder">
                                        <option class="OptionSelect" value="work">การงาน</option>
                                        <option class="OptionSelect" value="finance">การเงิน</option>
                                        <option class="OptionSelect" value="love">ความรัก</option>
                                        <option class="OptionSelect" value="health">สุขภาพ</option>
                                        <option class="OptionSelect" value="fortune">โชคลาภ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_2">ความเด่นของลายเซ็น ลำดับ 2</label>
                                    <select name="prominence_2" id="prominence_2" class="DropdownBox-SelectPreorder">
        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_3">ความเด่นของลายเซ็น ลำดับ 3</label>
                                    <select name="prominence_3" id="prominence_3" class="DropdownBox-SelectPreorder">
              
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_4">ความเด่นของลายเซ็น ลำดับ 4</label>
                                    <select name="prominence_4" id="prominence_4" class="DropdownBox-SelectPreorder">
                           
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 Col-Margin-TopBottom">
                                <div class="ColSelect-Input">
                                    <label class="me-3 Text-18 Text-W400 Text-Gray-Label" for="prominence_5">ความเด่นของลายเซ็น ลำดับ 5</label>
                                    <select name="prominence_5" id="prominence_5" class="DropdownBox-SelectPreorder">

                                    </select>
                                </div>
                            </div>
                        </div> -->








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
    
    $(document).ready(function() {
        // Function to populate select options based on the selected values
        function populateOptions(selectedValues, targetSelect) {
            // Clear previous options
            $(targetSelect).empty();
            // Get all selected options from previous selects
            var selectedOptions = [];
            $('#prominence_1, #prominence_2, #prominence_3, #prominence_4').each(function() {
                selectedOptions.push($(this).val());
            });
            // Loop through options in prominence_1 select
            $('#prominence_1 option').each(function() {
                // Check if the option is not selected in previous selects
                if (!selectedOptions.includes($(this).val()) || selectedValues.includes(null) || selectedValues.includes(undefined)) {
                    // Append option to target select
                    $(targetSelect).append($(this).clone());
                }
            });
        }

        // Event listener for change in prominence_1 select
        $('#prominence_1').change(function() {
            // Reset higher prominences
            $('#prominence_2, #prominence_3, #prominence_4, #prominence_5').empty();
            // Populate options for prominence_2
            populateOptions([$(this).val()], '#prominence_2');
        });

        // Event listener for change in prominence_2 select
        $('#prominence_2').change(function() {
            // Reset higher prominences
            $('#prominence_3, #prominence_4, #prominence_5').empty();
            // Populate options for prominence_3
            populateOptions([$('#prominence_1').val(), $(this).val()], '#prominence_3');
        });

        // Event listener for change in prominence_3 select
        $('#prominence_3').change(function() {
            // Reset higher prominences
            $('#prominence_4, #prominence_5').empty();
            // Populate options for prominence_4
            populateOptions([$('#prominence_1').val(), $('#prominence_2').val(), $(this).val()], '#prominence_4');
        });

        // Event listener for change in prominence_4 select
        $('#prominence_4').change(function() {
            // Reset higher prominences
            $('#prominence_5').empty();
            // Populate options for prominence_5
            populateOptions([$('#prominence_1').val(), $('#prominence_2').val(), $('#prominence_3').val(), $(this).val()], '#prominence_5');
        });

        // Event listener for change in prominence_5 select
        $('#prominence_5').change(function() {
            // Auto select the next available option
            $('#prominence_5 option:not(:selected):first').prop('selected', true);
        });
    });





























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


