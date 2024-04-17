@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($query);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
    </div>
    
    <div class="intro-y col-span-12 mt-5 mb-5 flex flex-wrap items-center sm:flex-nowrap">
        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0 mr-5">
            <div class="relative text-slate-500">
                <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="ค้นหา.." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg> 
            </div>
        </div>
        
        <div class="mx-auto hidden text-slate-500 md:block"></div>
        
        <!-- <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="language" name="language" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" >
                    <option value="th" @if(request('language', 'th') == 'th') selected @endif>ท&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="th" @if(request('language', 'th') == 'th') selected @endif>อักษรไทย&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="en" @if(request('language') == 'en') selected @endif>อักษรอังกฤษ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div> -->
        <!-- <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0 mr-5">
            <div class="relative  text-slate-500">
                <select id="combo" name="combo" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="applySelects()" >
                    <option value="all" @if(empty(request('combo')) || request('combo') == 'all') selected @endif>รายการทั้งหมด&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="yes" @if(request('combo') == 'yes') selected @endif>เฉพาะรายการที่เพิ่มนามสกุล&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="no" @if(request('combo') == 'no') selected @endif>เฉพาะรายการที่ไม่มีการเพิ่มนามสกุล&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div> -->
        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative w-56 text-slate-500">
                <select id="status" name="status" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="applySelects()" >
                    <option value="all" @if(empty(request('status')) || request('status') == 'all') selected @endif>สถานะทั้งหมด&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="paid" @if(request('status') == 'paid') selected @endif>paid&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="pending" @if(request('status') == 'pending') selected @endif>pending&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                </select>
            </div>
        </div>

    </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">วันที่</th>
                    <th class="whitespace-nowrap">รายการ</th>
                    <th class="whitespace-nowrap">ลูกค้า</th>
                    <th class="whitespace-nowrap">ชื่อที่สั่ง</th>
                    <th class="whitespace-nowrap">ยอดเงิน</th>
                    <th class="whitespace-nowrap">สถานะ</th>

                    <th class="text-center whitespace-nowrap">แอคชั่น</th>
                </tr>
            </thead>

            <tbody>
            @if($query->count() > 0)
                @foreach($query as $keyres => $res)
                    <tr class="intro-x">
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{date('d/m/Y H:i:s', strtotime($res->created_at))}}</div></td>
                        <td>
                            <div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->number}}</div>
                        </td>
                        <td>
                            <div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->customers->firstname}} {{$res->customers->lastname}}</div>
                            <div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->email}}</div>
                        </td>
                        <td>
                            <div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">
                                @if ($res->package === 'th')
                                    {{ $res->name_th }}
                                @elseif ($res->package === 'en')
                                    {{ $res->name_en }}
                                @else
                                    {{ $res->name_th }} / {{ $res->name_en }}
                                @endif
                            </div>
                        </td>

                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->total}}</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->status}}</div></td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <!-- <a class="flex items-center mr-3" href="#">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> แก้ไข
                                </a> -->
                                <a class="flex items-center mr-3" href="#">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ดูโพสท์
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2">No records found</td>
                </tr>
            @endif
            </tbody>

            <!-- <tbody id="fetchPosts">
                
            </tbody> -->
        </table>
    </div>
    <!-- END: Data List -->

    
    




@endsection

@section('script')
<script>
    function applyFilters() {
        var keyword = document.getElementById('keyword').value;
        var newUrl = `{{ route('BN_reports_sells') }}?keyword=${keyword}`;
        window.location.href = newUrl;
    }
    function handleEnter(event) {
        if (event.key === 'Enter') {
            applyFilters();
        }
    }

    function applySelects() {
        var status = document.getElementById('status').value;
        // var combo = document.getElementById('combo').value;
        var newUrl2 = `{{ route('BN_reports_sells') }}?status=${status}`;
        window.location.href = newUrl2;
    }

</script>


@endsection