@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($page_name);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
    </div>
    <!-- <div id="fetchUserss"></div> -->
    <form method="post" action="#" enctype="multipart/form-data" >
    @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">


                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="" class="form-label">ประเภท</label>
                                    <select name="" id=""  class=" w-full" >
                                        <option value="" >ลายเซ็นต์ที่มี</option>
                                        <option value="" >รายการขายที่มีการเพิ่มนามสกุล</option>
                                        <option value="" >รายการสั่งออกแบบ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-5">
                                    <label>ผู้รับมอบหมาย</label>
                                    <div class="mt-2 flex flex-col sm:flex-row">
                                        <div data-tw-merge class="flex items-center mr-2 mr-2"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-777" value="" />
                                            <label data-tw-merge for="checkbox-switch-777" class="cursor-pointer ml-2">ทุกคน</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mr-2"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-4" value="" />
                                            <label data-tw-merge for="checkbox-switch-4" class="cursor-pointer ml-2">Chris Evans</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-5" value="" />
                                            <label data-tw-merge for="checkbox-switch-5" class="cursor-pointer ml-2">Liam Neeson</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-6" value="" />
                                            <label data-tw-merge for="checkbox-switch-6" class="cursor-pointer ml-2">Daniel Craig</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mr-2"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-4" value="" />
                                            <label data-tw-merge for="checkbox-switch-4" class="cursor-pointer ml-2">Chris Evans</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-5" value="" />
                                            <label data-tw-merge for="checkbox-switch-5" class="cursor-pointer ml-2">Liam Neeson</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-6" value="" />
                                            <label data-tw-merge for="checkbox-switch-6" class="cursor-pointer ml-2">Daniel Craig</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mr-2"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-4" value="" />
                                            <label data-tw-merge for="checkbox-switch-4" class="cursor-pointer ml-2">Chris Evans</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-5" value="" />
                                            <label data-tw-merge for="checkbox-switch-5" class="cursor-pointer ml-2">Liam Neeson</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-2 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0"><input data-tw-merge type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" id="checkbox-switch-6" value="" />
                                            <label data-tw-merge for="checkbox-switch-6" class="cursor-pointer ml-2">Daniel Craig</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-5">
                                    <label>ลายเซ็นต์ที่มี</label>
                                    <select data-placeholder="Select your favorite actors" class="tom-select w-full mt-3">
                                        <option value="1">ลายเซ็นต์ 1</option>
                                        <option value="2">ลายเซ็นต์ 2</option>
                                        <option value="3">ลายเซ็นต์ 3</option>
                                        <option value="4">ลายเซ็นต์ 4</option>
                                        <option value="5">ลายเซ็นต์ 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-5">
                                    <label>รายการขายที่มีการเพิ่มนามสกุล</label>
                                    <select data-placeholder="Select your favorite actors" class="tom-select w-full mt-3">
                                        <option value="1">Sell 1</option>
                                        <option value="2">Sell 2</option>
                                        <option value="3">Sell 3</option>
                                        <option value="4">Sell 4</option>
                                        <option value="5">Sell 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-5">
                                    <label>รายการสั่งออกแบบ</label>
                                    <select data-placeholder="Select your favorite actors" class="tom-select w-full mt-3">
                                        <option value="1">Order 1</option>
                                        <option value="2">Order 2</option>
                                        <option value="3">Order 3</option>
                                        <option value="4">Order 4</option>
                                        <option value="5">Order 5</option>
                                    </select>
                                </div>
                            </div>

                            
                                

                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">สร้าง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    
    




@endsection

@section('script')
<script>


</script>


@endsection