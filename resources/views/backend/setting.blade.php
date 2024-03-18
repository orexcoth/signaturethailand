@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

// echo "<pre>";
// print_r($auto_assign->option_value);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
    </div>
    
    <form method="post" id="assign_form" action="{{route('BN_settings_action')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    
                    
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">

                            <div class="col-span-12 xl:col-span-12">

                                <div class="mt-3 ">
                                    <label for="" class="form-label">มอบหมายงานอัตโนมัติ</label>
                                    <div class="mt-2 flex flex-col sm:flex-row">
                                        <div data-tw-merge class="flex items-center mr-6">
                                            <input data-tw-merge type="radio"  id="auto_assign_yes" name="auto_assign" value="yes" <?php echo $auto_assign->option_value == 'yes' ? 'checked' : ''; ?> class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50" />
                                            <label data-tw-merge for="auto_assign_yes" class="cursor-pointer ml-2">ใช่</label>
                                        </div>
                                        <div data-tw-merge class="flex items-center mr-12 mt-2 sm:mt-0 mr-2 mt-2 sm:mt-0">
                                            <input data-tw-merge type="radio" id="auto_assign_no" name="auto_assign" value="no" <?php echo $auto_assign->option_value == 'no' ? 'checked' : ''; ?> class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50"  />
                                            <label data-tw-merge for="auto_assign_no" class="cursor-pointer ml-2">ไม่ใช่</label>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>


                    </div>


                    <div class="text-right mt-5">
                        <!-- <button type="submit" class="btn btn-primary w-24">ตกลง</button> -->
                        <button type="button" class="btn btn-primary w-24" id="submitBtn">บันทึก</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>






    
    




@endsection

@section('script')
<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Add an event listener to the submit button
        document.getElementById('submitBtn').addEventListener('click', function () {
            // Show a SweetAlert confirmation
            Swal.fire({
                title: 'ยืนยัน?',
                text: 'การอัพเดทข้อมูลหรือไม่ !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                // If the user clicks 'Yes', submit the form
                if (result.isConfirmed) {
                    document.getElementById('assign_form').submit();
                }
            });
        });
    });
</script>


@endsection