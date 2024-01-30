@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($Customer);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>
    <form method="post" action="{{route('BN_customers_edit_action')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <input type="hidden" name="id" value="{{$query->id}}" />


                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control w-full" value="{{$query->firstname}}" name="firstname" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control w-full" value="{{$query->lastname}}" name="lastname" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">อีเมล</label>
                                    <input type="text" class="form-control w-full" value="{{$query->email}}" name="email"  autocomplete="off" required />
                                </div>
                            </div>
                            <!-- <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">พาสเวิร์ด</label>
                                    <input type="password" class="form-control w-full" id="" value="{{$query->password}}" name="password" required />
                                </div>
                            </div> -->
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">โรล</label>
                                    <select name="role" id="role"  class=" w-full" >
                                        <option value="normal" {{($query->role == 'normal')?'selected':''}} >ลูกค้าทั่วไป</option>
                                        <option value="vip" {{($query->role == 'vip')?'selected':''}} >วีไอพี</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เบอร์โทร</label>
                                    <input type="text" class="form-control w-full" value="{{$query->phone}}" name="phone" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ไลน์ไอดี</label>
                                    <input type="text" class="form-control w-full" value="{{$query->line}}" name="line" autocomplete="off" />
                                </div>
                            </div>



                        </div>


                    </div>


                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">บันทึก</button>
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