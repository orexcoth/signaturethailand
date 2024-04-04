@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto"></div>
    </div>
    <form method="post" action="{{ route('BN_settings_defaultprice_action') }}" enctype="multipart/form-data" id="settingsForm">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <div class="p-5">
                        <h1>ราคาลายเซ็นต์พื้นฐาน</h1>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">price_th</label>
                                    <input type="number" class="form-control w-full" name="price_th" value="{{$price_th}}" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">price_en</label>
                                    <input type="number" class="form-control w-full" name="price_en" value="{{$price_en}}" required />
                                </div>
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
    <form method="post" action="{{ route('BN_settings_preorderprice_action') }}" enctype="multipart/form-data"  id="preorderpriceForm" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <div class="p-5">
                        <h1>ราคาสั่งออกแบบ</h1>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">ชื่อไทย</label>
                                    <input type="number" class="form-control w-full" name="firstname_th" value="{{$firstname_th}}" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">นามสกุลไทย</label>
                                    <input type="number" class="form-control w-full" name="lastname_th" value="{{$lastname_th}}" required />
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">ชื่ออังกฤษ</label>
                                    <input type="number" class="form-control w-full" name="firstname_en" value="{{$firstname_en}}" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">นามสกุลอังกฤษ</label>
                                    <input type="number" class="form-control w-full" name="lastname_en" value="{{$lastname_en}}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-primary w-24" id="preorderpricesubmitBtn">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    document.getElementById('settingsForm').submit();
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Add an event listener to the submit button
        document.getElementById('preorderpricesubmitBtn').addEventListener('click', function () {
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
                    document.getElementById('preorderpriceForm').submit();
                }
            });
        });
    });
</script>
@endsection
