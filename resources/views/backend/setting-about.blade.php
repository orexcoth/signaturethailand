@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

// echo "<pre>";
// print_r($about_index);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
    </div>
    
    <form method="post" id="about_form" action="{{route('BN_settings_about_action')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <div class="p-5">

                        <div class="sm:grid grid-cols-1 gap-1 mt-5">
                            <div class="">
                                <label for="" class="form-label">เกี่ยวกับเรา หน้าหลัก</label>
                                <textarea class="form-control" id="about_index" placeholder="about_index" rows="5" name="about_index">
                                    {{$about_index}}
                                </textarea>
                            </div>
                        </div>
                        <div class="sm:grid grid-cols-1 gap-1 mt-5">
                            <div class="">
                                <label for="" class="form-label">เกี่ยวกับเรา</label>
                                <textarea class="form-control" id="about_page" placeholder="about_page" rows="5" name="about_page">
                                    {{$about_page}}
                                </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-primary w-24" id="submitBtn">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>






    
    




@endsection

@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#about_index' ))
        .catch( error => {
        console.error( error );
    } );
    ClassicEditor
        .create( document.querySelector( '#about_page' ))
        .catch( error => {
        console.error( error );
    } );
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
                    document.getElementById('about_form').submit();
                }
            });
        });
    });
</script>


@endsection