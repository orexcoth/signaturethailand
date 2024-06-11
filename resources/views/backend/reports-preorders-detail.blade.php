@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$arr_st = array(
    'pending' => 'รอชำระ',
    'paid' => 'ชำระเงินแล้ว',
);
$arr_package = array(
    'thai' => 'ลายเซ็นไทย',
    'english' => 'ลายเซ็นอังกฤษ',
    'combo' => 'ลายเซ็นไทยและอังกฤษ',
);
$arr_type = array(
    'firstname' => 'ลายเซ็นชื่อ',
    'lastname' => 'ลายเซ็นนามสกุล',
    'duo' => 'ลายเซ็นชื่อและลายเซ็นนามสกุล',
);
$arr_sex = array(
    'single' => 'โสด',
    'married' => 'แต่งงาน',
    'divorce' => 'หย่าร้าง',
    'other' => 'ไม่ระบุ',
);
$arr_ever = array(
    'ever' => 'เคย',
    'never' => 'ไม่เคย',
);
$arr_ship = array(
    'normal' => 'ส่งปกติ',
    'express' => 'ส่งด่วน',
);
// echo "<pre>";
// print_r($query);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <!-- <a href="#" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md" >
                Export
            </a>     -->
        </div>
    </div>
       
    <form method="post" >

        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">

                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หมายเลขคำสั่งซื้อ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->number}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานะการสั่งซื้อ</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_st[$query->status]}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เวลาสั่งซื้อ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->created_at}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ราคาสั่งออกแบบ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->preorder_price}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ค่าจัดส่ง</label>
                                    <input type="text" class="form-control w-full" value="{{$query->shipping_price}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ยอดชำระ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->total_price}}" readonly />
                                </div>
                            </div>




                            


                            <div class="col-span-12 xl:col-span-12">
                                <br>
                            </div>


                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อลูกค้า</label>
                                    <input type="text" class="form-control w-full" value="{{$query->firstname}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">นามสกุลลูกค้า</label>
                                    <input type="text" class="form-control w-full" value="{{$query->lastname}}" readonly />
                                </div>
                            </div>
                            
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">อีเมลลูกค้า</label>
                                    <input type="text" class="form-control w-full" value="{{$query->email}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เบอร์ติดต่อลูกค้า</label>
                                    <input type="text" class="form-control w-full" value="{{$query->phone}}" readonly />
                                </div>
                            </div>



                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ช่องทางการชำระเงิน</label>
                                    <input type="text" class="form-control w-full" value="{{$query->payment_method}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานะการชำระเงิน</label>
                                    <input type="text" class="form-control w-full" value="{{$query->payment_status}}" readonly />
                                </div>
                            </div>


                            <div class="col-span-12 xl:col-span-12">
                                <br>
                                <br>
                            </div>


                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">แพ็คเกจ</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_package[$query->package]}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ประเภทคำสั่งซื้อ</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_type[$query->preorder_type]}}" readonly />
                                </div>
                            </div>
                            @if($query->package=='thai'  ||  $query->package=='combo')
                                @if($query->preorder_type=='firstname' ||  $query->preorder_type=='duo')
                                <div class="col-span-12 xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="" class="form-label">ชื่อภาษาไทย</label>
                                        <input type="text" class="form-control w-full" value="{{$query->firstname_th}}" readonly />
                                    </div>
                                </div>
                                @endif  
                                @if($query->preorder_type=='lastname' ||  $query->preorder_type=='duo')
                                <div class="col-span-12 xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="" class="form-label">นามสกุลภาษาไทย</label>
                                        <input type="text" class="form-control w-full" value="{{$query->lastname_th}}" readonly />
                                    </div>
                                </div>
                                @endif      
                            @endif

                            @if($query->package=='english'  ||  $query->package=='combo')
                                @if($query->preorder_type=='firstname' ||  $query->preorder_type=='duo')
                                <div class="col-span-12 xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="" class="form-label">ชื่อภาษาอังกฤษ</label>
                                        <input type="text" class="form-control w-full" value="{{$query->firstname_en}}" readonly />
                                    </div>
                                </div>
                                @endif  
                                @if($query->preorder_type=='lastname' ||  $query->preorder_type=='duo')
                                <div class="col-span-12 xl:col-span-3">
                                    <div class="mt-3 ">
                                        <label for="" class="form-label">นามสกุลภาษาอังกฤษ</label>
                                        <input type="text" class="form-control w-full" value="{{$query->lastname_en}}" readonly />
                                    </div>
                                </div>
                                @endif       
                            @endif
                            
                            
                            
                            
                            <div class="col-span-12 xl:col-span-12">
                                <br>
                            </div>
                            <div class="col-span-12 xl:col-span-4">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ความเด่นของลายเซ็น ลำดับ 1</label>
                                    <input type="text" class="form-control w-full" value="{{$query->prominence_1}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ความเด่นของลายเซ็น ลำดับ 2</label>
                                    <input type="text" class="form-control w-full" value="{{$query->prominence_2}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ความเด่นของลายเซ็น ลำดับ 3</label>
                                    <input type="text" class="form-control w-full" value="{{$query->prominence_3}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ความเด่นของลายเซ็น ลำดับ 4</label>
                                    <input type="text" class="form-control w-full" value="{{$query->prominence_4}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ความเด่นของลายเซ็น ลำดับ 5</label>
                                    <input type="text" class="form-control w-full" value="{{$query->prominence_5}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เป้าหมายเปลี่ยนชีวิต</label>
                                    <input type="text" class="form-control w-full" value="{{$query->TargetPreorder}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-4">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control w-full" value="{{$query->name}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-4">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">วัน/เดือน/ปีเกิด</label>
                                    <input type="text" class="form-control w-full" value="{{$query->dob}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-4">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เบอร์โทรติดต่อ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->telephone}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานภาพปัจจุบัน</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_sex[$query->SelectStatus]}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">อาชีพ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->occupation}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-2">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เคยมีลายเซ็นหรือไม่</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_ever[$query->EverSignature]}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ลายเซ็นเก่า</label>
                                    <input type="text" class="form-control w-full" value="{{asset($query->mysignature)}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เล่าถึงปัญหาที่พบเจอในปัจจุบัน</label>
                                    <input type="text" class="form-control w-full" value="{{$query->ProblemPreorder}}" readonly />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">การจัดส่ง</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_ship[$query->DeliverSignature]}}" readonly />
                                </div>
                            </div>

                            



                        </div>


                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            @if($query->status == 'paid')
                <a href="{{ route('generateReceipt', ['type' => 'preorders', 'order_id' => $query->id]) }}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md">
                    ใบเสร็จ
                </a>
            @endif
        </div>
    </div>
    
   
    
    




@endsection

@section('script')
<script>
   

</script>


@endsection