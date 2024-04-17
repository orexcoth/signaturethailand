@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('pagestyle')
<style>





.checkbox-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start; /* Change justify-content */
    }

    .checkbox-item {
        flex: 0 0 calc(33.33% - 10px); /* Adjusted to fit 3 checkboxes per row */
        margin-bottom: 10px;
        position: relative;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f0f0f0;
        padding: 10px;
        text-align: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .checkbox-item:hover {
        background-color: #e0e0e0;
    }

    .styled-checkbox {
        display: inline-block;
        font-size: 16px;
    }

    .hidden-checkbox {
        position: absolute;
        opacity: 0;
    }

    .checkbox-item.checked {
        background-color: #2196F3;
        color: #fff;
    }









</style>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($preorders);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
    </div>
    <!-- <div id="fetchUserss"></div> -->
    <form method="post" action="{{route('BN_works_assign_action')}}" enctype="multipart/form-data" >
    @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">


                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-5">
                                    <label>ผู้รับมอบหมาย</label>
                                    <div class="mt-2 checkbox-container">
                                        <!-- Check All checkbox -->
                                        <div class="checkbox-item" onclick="toggleCheckAll()">
                                            <input type="checkbox" id="check_all" class="hidden-checkbox" />
                                            <label for="check_all" class="styled-checkbox">เลือกทุกคน</label>
                                        </div>
                                        <!-- Other checkboxes -->
                                        @foreach($users as $key_user => $res)
                                        <div class="checkbox-item" onclick="toggleCheckbox(this)">
                                            <input type="checkbox" name="users[]" id="users_{{$res->id}}" value="{{$res->id}}" class="hidden-checkbox" />
                                            <label for="users_{{$res->id}}" class="styled-checkbox">{{$res->name}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>





                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="" class="form-label">ประเภท</label>
                                    <select name="type" id="type-select" class="w-full">
                                        <option value="">เลือกประเภท</option>
                                        <option value="names">ชื่อที่มีในระบบ</option>
                                        <!-- <option value="combos">รายการขายที่มีการเพิ่มนามสกุล</option> -->
                                        <option value="preorders">รายการสั่งออกแบบ</option>
                                    </select>
                                </div>
                            </div>

                            <div id="names-input" class="col-span-12 xl:col-span-12" style="display: none;">
                                <div class="mt-5">
                                    <label>ชื่อที่มีในระบบ</label>
                                    <select name="names" data-placeholder="Select your favorite actors" class="tom-select w-full mt-3">
                                        @foreach($names as $key_names => $resnames)
                                        <option value="{{$resnames->id}}">{{$resnames->name_th}} - {{$resnames->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div id="preorders-input" class="col-span-12 xl:col-span-12" style="display: none;">
                                <div class="mt-5">
                                    <label>รายการสั่งออกแบบ</label>
                                    <select name="preorders" data-placeholder="Select your favorite actors" class="tom-select w-full mt-3">
                                        @foreach($preorders as $key_preorders => $respreorders)
                                        <option value="{{$respreorders->id}}">{{$respreorders->number}} - {{$respreorders->email}} - {{$respreorders->status}}</option>
                                        @endforeach
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


document.getElementById('type-select').addEventListener('change', function() {
        var selectedType = this.value;
        var namesInput = document.getElementById('names-input');
        // var combosInput = document.getElementById('combos-input');
        var preordersInput = document.getElementById('preorders-input');

        namesInput.style.display = 'none';
        // combosInput.style.display = 'none';
        preordersInput.style.display = 'none';

        if (selectedType === 'names') {
            namesInput.style.display = 'block';
        // } else if (selectedType === 'combos') {
        //     combosInput.style.display = 'block';
        } else if (selectedType === 'preorders') {
            preordersInput.style.display = 'block';
        }
    });








function toggleCheckbox(item) {
    var checkbox = item.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;
    item.classList.toggle('checked', checkbox.checked);
}

function toggleCheckAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"][name="users[]"]');
    var checkAllCheckbox = document.getElementById('check_all');
    var allChecked = true;

    checkboxes.forEach(function (checkbox) {
        if (!checkbox.checked) {
            allChecked = false;
        }
    });

    if (allChecked) {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
            checkbox.parentElement.classList.remove('checked');
        });
        checkAllCheckbox.checked = false;
        checkAllCheckbox.parentElement.classList.remove('checked');
    } else {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = true;
            checkbox.parentElement.classList.add('checked');
        });
        checkAllCheckbox.checked = true;
        checkAllCheckbox.parentElement.classList.add('checked');
    }

    var checkboxContainer = document.querySelector('.checkbox-container');
    checkboxContainer.classList.toggle('all-checked', !allChecked);
}







// function toggleCheckbox(item) {
//     var checkbox = item.querySelector('input[type="checkbox"]');
//     checkbox.checked = !checkbox.checked;
//     item.classList.toggle('checked', checkbox.checked);
// }

// var isCheckedAll = false;

// function toggleCheckAll() {
//     var checkboxes = document.querySelectorAll('input[type="checkbox"][name="users[]"]');
//     var checkAllCheckbox = document.getElementById('check_all');

//     isCheckedAll = !isCheckedAll;

//     checkboxes.forEach(function (checkbox) {
//         checkbox.checked = isCheckedAll;
//         checkbox.parentElement.classList.toggle('checked', isCheckedAll);
//     });

//     checkAllCheckbox.checked = isCheckedAll;
//     checkAllCheckbox.parentElement.classList.toggle('checked', isCheckedAll);

//     var checkboxContainer = document.querySelector('.checkbox-container');
//     checkboxContainer.classList.toggle('all-checked', isCheckedAll);
// }



</script>


@endsection