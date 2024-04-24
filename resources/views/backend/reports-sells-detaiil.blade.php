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
    'th' => 'เฉพาะภาษาไทย',
    'en' => 'เฉพาะภาษาอังกฤษ',
    'all' => 'ทั้งภาษาไทยและภาษาอังกฤษ',
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
                                    <label for="" class="form-label">ยอดชำระ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->total}}" readonly />
                                </div>
                            </div>




                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">แพ็คเกจ</label>
                                    <input type="text" class="form-control w-full" value="{{$arr_package[$query->package]}}" readonly />
                                </div>
                            </div>
                            @if($query->package == 'all' || $query->package == 'th')
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อไทย</label>
                                    <input type="text" class="form-control w-full" value="{{$query->name_th}}" readonly />
                                </div>
                            </div>
                            @endif
                            @if($query->package == 'all' || $query->package == 'en')
                            <div class="col-span-12 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่ออังกฤษ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->name_en}}" readonly />
                                </div>
                            </div>
                            @endif


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
                            



                        </div>


                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>
    
   
    
    




@endsection

@section('script')
<script>
   

</script>


@endsection