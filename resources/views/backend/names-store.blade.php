@extends('../backend/layout/side-menu')

@section('subhead')
<title>Backend - {{$default_pagename}}</title>
<style>
    .highlight {
        background-color: yellow; /* Change this to your desired highlight color */
    }
</style>
@endsection

@section('subcontent')

<?php
$selectedStatus = isset($_GET['status']) ? $_GET['status'] : '';

// echo "<pre>";
// print_r($query);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}} จาก {{$alldata}} รายการ แสดงผลลัพธ์ {{$totalCount}} รายการ {{$keylang}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_names_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มชื่อ</a>    
        </div>
    </div>

    <!-- <div class="intro-y col-span-12 mt-5 mb-5 flex flex-wrap items-center sm:flex-nowrap">

        <div class="relative">
            <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="เบอร์ / ชื่อ /นามสกุล ลูกค้า..." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg> 
        </div>

        
        <select id="language" name="language" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto"  onchange="updateAlphabetOptions()">
            <option value="th" selected>อักษรไทย&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
            <option value="en">อักษรอังกฤษ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
        </select>

        <select id="alphabet" name="alphabet" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" style="width:200px;">

        </select>

    </div> -->








    <div class="intro-y col-span-12 mt-5 mb-5 flex flex-wrap items-center sm:flex-nowrap">
        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0 mr-5">
            <div class="relative text-slate-500">
                <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="ค้นหา.." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
                <!-- <button id="keyword_btn" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" onclick="applyFilters()">
                    ค้นหา    
                </button> -->
                <svg  id="keyword_btn"  onclick="applyFilters()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg> 
                  
            </div>
        </div>
        
        <div class="mx-auto hidden text-slate-500 md:block"></div>
        <!-- <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="price" name="price" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto"  onchange="applySelects()">
                    <option value="all" @if(empty(request('price')) || request('price') == 'all') selected @endif>ทุกราคา&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="free" @if(request('price') == 'free') selected @endif>เฉพาะชื่อฟรี&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="valuable" @if(request('price') == 'valuable') selected @endif>เฉพาะชื่อไม่ฟรี&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div>
        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="sign" name="sign" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto"  onchange="applySelects()">
                    <option value="all" @if(empty(request('sign')) || request('sign') == 'all') selected @endif>ทั้งหมด&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="no" @if(request('sign') == 'no') selected @endif>ยังไม่มีลายเซ็นต์&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="yes" @if(request('sign') == 'yes') selected @endif>มีลายเซ็นต์แล้ว&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div> -->
        <!-- <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="language" name="language" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="updateAlphabetOptions()">
                    <option value="th" @if(request('language', 'th') == 'th') selected @endif>อักษรไทย&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="en" @if(request('language') == 'en') selected @endif>อักษรอังกฤษ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div> -->

        <!-- <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative text-slate-500">
                <select id="alphabet" name="alphabet" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" style="width:200px;" onchange="applySelects()">
                </select>
            </div>
        </div> -->

        <!-- <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative text-slate-500">
                <select id="alphabets" name="alphabets" onchange="applySelects()" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" style="width:200px;" onchange="applySelects()">
                    <option value="">{{ __('เลือกตัวอักษร') }}</option>
                    @foreach (range(0x0E01, 0x0E2E) as $codepoint)
                        <option value="{{ mb_chr($codepoint, 'UTF-8') }}">{{ mb_chr($codepoint, 'UTF-8') }}</option>
                    @endforeach
                    @foreach (range('a', 'z') as $char)
                        <option value="{{ $char }}">{{ $char }}</option>
                    @endforeach
                </select>
            </div>
        </div> -->


        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="price" name="price" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="applySelects()">
                    <option value="all" @if(empty(request('price')) || request('price') == 'all') selected @endif>ทุกราคา&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="free" @if(request('price') == 'free') selected @endif>เฉพาะชื่อฟรี&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="valuable" @if(request('price') == 'valuable') selected @endif>เฉพาะชื่อไม่ฟรี&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div>

        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="sign" name="sign" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="applySelects()">
                    <option value="all" @if(empty(request('sign')) || request('sign') == 'all') selected @endif>ทั้งหมด&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="no" @if(request('sign') == 'no') selected @endif>ยังไม่มีลายเซ็นต์&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="yes" @if(request('sign') == 'yes') selected @endif>มีลายเซ็นต์แล้ว&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div>

        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative text-slate-500">
                <select id="alphabet" name="alphabet" onchange="applySelects()" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" style="width:200px;">
                    <option value="">{{ __('เลือกตัวอักษร') }}</option>
                    <!-- Thai alphabet options -->
                    @foreach (range(0x0E01, 0x0E2E) as $codepoint)
                        <option value="{{ mb_chr($codepoint, 'UTF-8') }}" @if(request('alphabet') == mb_chr($codepoint, 'UTF-8')) selected @endif>{{ mb_chr($codepoint, 'UTF-8') }}</option>
                    @endforeach
                    <!-- English alphabet options -->
                    @foreach (range('a', 'z') as $char)
                        <option value="{{ $char }}" @if(request('alphabet') == $char) selected @endif>{{ $char }}</option>
                    @endforeach
                </select>
            </div>
        </div>




    </div>

    










    <!-- <div id="fetchCustomerss"></div> -->

    @if(isset($query) && count($query)>0)
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">name 
                        @if(empty($keylang) || $keylang === 'th')
                            th / en
                        @elseif($keylang === 'en')
                            en / th
                        @endif
                    </th>
                    @if($userlogin->role == 'admin')
                    <th class="whitespace-nowrap">price 
                        @if(empty($keylang) || $keylang === 'th')
                            th / en
                        @elseif($keylang === 'en')
                            en / th
                        @endif
                    </th>
                    @endif
                    <th class="whitespace-nowrap">sign 
                        @if(empty($keylang) || $keylang === 'th')
                            th / en
                        @elseif($keylang === 'en')
                            en / th
                        @endif
                    </th>
                    <th class="whitespace-nowrap">my</th>
                    <th class="whitespace-nowrap">add new</th>
                    <th class="text-center whitespace-nowrap"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($query as $keyres => $res)
                @php
                $profile_img = ($res->image)?asset($res->image):asset('frontend/images/avatar.jpeg');
                @endphp
                    <tr class="intro-x">
                        <td class="text-center">{{(($query->currentPage()-1)*50)+$keyres+1}}</td>
                        <td>
                            @if(empty($keylang) || $keylang === 'th')
                                <div class="font-medium whitespace-nowrap">{{$res->name_th}} / {{$res->name_en}}</div>
                            @elseif($keylang === 'en')
                                <div class="font-medium whitespace-nowrap">{{$res->name_en}} / {{$res->name_th}}</div>
                            @endif
                        </td>
                        @if($userlogin->role == 'admin')
                        <td>
                            @if(empty($keylang) || $keylang === 'th')
                                <div class="font-medium whitespace-nowrap">{{$res->price_th}}฿ / {{$res->price_en}}฿</div>
                            @elseif($keylang === 'en')
                                <div class="font-medium whitespace-nowrap">{{$res->price_en}}฿ / {{$res->price_th}}฿</div>
                            @endif
                        </td>
                        @endif
                        <td>
                            
                            @if(empty($keylang) || $keylang === 'th')
                                <div class="font-medium whitespace-nowrap">{{($count[$res->id]['th'] ?? 0)}} / {{($count[$res->id]['en'] ?? 0)}}</div>
                            @elseif($keylang === 'en')
                                <div class="font-medium whitespace-nowrap">{{($count[$res->id]['en'] ?? 0)}} / {{($count[$res->id]['th'] ?? 0)}}</div>
                            @endif
                        </td>
                        <td>
                        <div class="font-medium whitespace-nowrap">{{$res->signs_count}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">
                            @if ($res->suggests->isNotEmpty())
                                r
                            @else
                                a
                            @endif
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @if($userlogin->role == 'admin')
                                <button class="btn button freeBtn {{ $res->free ? 'highlight' : '' }}" name-id="{{ $res->id }}" data-free="{{ $res->free }}">ฟรี</button>
                                &emsp;
                                @endif
                                <a class="flex items-center text-success mr-3" href="{{ route('BN_names_detail', ['id' => $res->id]) }}" >
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i> รายละเอียด
                                </a>
                                <!-- &emsp;
                                <a class="flex items-center text-default" href="#">
                                    <i data-lucide="Edit" class="w-4 h-4 mr-1"></i> แก้ไข
                                </a> -->
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <div class="d-flex">
    {!! $query->appends(request()->input())->links() !!}
    </div>
    @endif

    





      



@endsection

@section('script')
<script>

   
    
    function applyFilters() {
        var keyword = document.getElementById('keyword').value;
        var newUrl = `{{ route('BN_names_store') }}?keyword=${keyword}`;
        window.location.href = newUrl;
    }
    function handleEnter(event) {
        if (event.key === 'Enter') {
            applyFilters();
        }
    }



    function applySelects() {
        var price = document.getElementById('price').value;
        var sign = document.getElementById('sign').value;
        var alphabet = document.getElementById('alphabet').value;
        
        var params = new URLSearchParams();
        if (price && price !== 'all') params.set('price', price);
        if (sign && sign !== 'all') params.set('sign', sign);
        if (alphabet) params.set('alphabet', alphabet);

        var newUrl = `{{ route('BN_names_store') }}?` + params.toString();
        window.location.href = newUrl;
    }

    


    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.querySelectorAll('.freeBtn');
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var nameId = button.getAttribute('name-id');
                var currentStatus = button.getAttribute('data-free');
                var newStatus = currentStatus === '1' ? '0' : '1';

                Swal.fire({
                    title: "ยืนยันหรือไม่?",
                    text: "ที่จะเปลี่ยนสถานะฟรี",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        axios.post('{{ route("BN_names_store_updateStatus") }}', {
                            _token: '{{ csrf_token() }}',
                            nameId: nameId,
                            newStatus: newStatus
                        })
                        .then(function(response) {
                            if (response.data.success) {
                                if (newStatus === '1') {
                                    button.classList.add('highlight');
                                } else {
                                    button.classList.remove('highlight');
                                }
                                button.setAttribute('data-free', newStatus);

                                Swal.fire("Success!", "เปลี่ยนสถานะสำเร็จ!", "success");
                            } else {
                                Swal.fire("Error!", "เปลี่ยนสถานะล้มเหลว!", "error");
                            }
                        })
                        .catch(function(error) {
                            Swal.fire("Error!", "เปลี่ยนสถานะล้มเหลว!", "error");
                        });
                    }
                });
            });
        });
    });
    



    // function applySelects() {
    //     var language = document.getElementById('language').value;
    //     var alphabet = document.getElementById('alphabet').value;
    //     var alphabet = document.getElementById('alphabet').value;
    //     var price = document.getElementById('price').value;
    //     var sign = document.getElementById('sign').value;
    //     var newUrl2 = `{{ route('BN_names_store') }}?price=${price}&sign=${sign}&language=${language}&alphabet=${alphabet}`;
    //     var newUrl2 = `{{ route('BN_names_store') }}?price=${price}&sign=${sign}&alphabet=${alphabet}`;
    //     window.location.href = newUrl2;
    // }
    


    // document.addEventListener("DOMContentLoaded", function () {
    //     updateAlphabetOptions();
    // });


    // function updateAlphabetOptions() {
    // var languageDropdown = document.getElementById("language");
    // var alphabetDropdown = document.getElementById("alphabet");

    // alphabetDropdown.innerHTML = '';

    // if (languageDropdown.value === "th") {
    //     var emptyOption = document.createElement("option");
    //     emptyOption.value = "";
    //     emptyOption.text = "เลือกตัวอักษร";
    //     alphabetDropdown.add(emptyOption);

    //     for (var i = 0; i < 46; i++) {
    //         var thaiAlphabet = String.fromCharCode(0xE01 + i);
    //         var option = document.createElement("option");
    //         option.value = thaiAlphabet;
    //         option.text = thaiAlphabet;
    //         alphabetDropdown.add(option);
    //     }
    // } else if (languageDropdown.value === "en") {
    //     var emptyOption = document.createElement("option");
    //     emptyOption.value = "";
    //     emptyOption.text = "Select alphabet";
    //     alphabetDropdown.add(emptyOption);

    //     for (var i = 0; i < 26; i++) {
    //         var englishAlphabet = String.fromCharCode(97 + i);
    //         var option = document.createElement("option");
    //         option.value = englishAlphabet;
    //         option.text = englishAlphabet;
    //         alphabetDropdown.add(option);
    //     }
    // }

    // var urlParams = new URLSearchParams(window.location.search);
    // var alphabetParam = urlParams.get('alphabet');
    // if (alphabetParam) {
    //     var lowercaseAlphabetParam = alphabetParam.toLowerCase();
    //     for (var i = 0; i < alphabetDropdown.options.length; i++) {
    //         if (alphabetDropdown.options[i].value.toLowerCase() === lowercaseAlphabetParam) {
    //             alphabetDropdown.value = alphabetDropdown.options[i].value;
    //             break;
    //         }
    //     }
    // }
// }


</script>


@endsection