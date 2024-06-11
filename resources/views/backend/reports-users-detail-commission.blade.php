@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// $arr_st = array(
//     'pending' => 'รอชำระ',
//     'paid' => 'ชำระเงินแล้ว',
// );
// foreach($query as $kety => $qry){
//     echo "<pre>";
//     print_r($qry->downloads);
//     echo "</pre>";
// }
// echo "<pre>";
// print_r($user);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <!-- <a href="#" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md" >
                Export
            </a>     -->
            <!-- <a href="{{ route('BN_reports_users_detail_commission', ['users_id' => $user->id, 'export' => 'excel', 'period' => request()->input('period')]) }}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md">
                Export
            </a>  -->
        </div>
    </div>

    <form id="date_select" action="#" method="get">
        <div class="intro-y col-span-12 mt-5 mb-5 flex flex-wrap items-center sm:flex-nowrap">

            

            <div class="mx-auto hidden text-slate-500 md:block"></div>
            
            <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0" id="periodInput">
                <div class="relative text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar stroke-1.5 absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                    <input name="period" type="text" value="{{ request()->input('period') }}" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker !box pl-10 sm:w-56">
                </div>
            </div>
            <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                <div class="relative text-slate-500">
                    <button id="submitBtn" type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-24">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </form>

   

    



    
    


   
        <!-- BEGIN: Data List sellsWithDownloads -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">วันที่</th>
                        <th class="whitespace-nowrap">สถานะ</th>
                        <th class="whitespace-nowrap">รายการ</th>
                        <th class="whitespace-nowrap">ยอด</th>
                        <th class="whitespace-nowrap">ค่าคอม</th>
                    </tr>
                </thead>

                <tbody>
                @if($sellsWithDownloads->count() > 0)
                    @php
                        $totalSum = 0;
                        $totalpercent = 0;
                    @endphp
                    @foreach($sellsWithDownloads as $keyquery => $res)
                    <tr class="intro-x">
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->created_at}}</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->status}}</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->number}}</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$res->total}}</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{ $res->total * ($user->rate_download / 100)}}</div></td> 
                    </tr>
                    @php
                        $totalSum += $res->total;
                        $totalpercent += ($res->total * ($user->rate_download / 100));
                    @endphp
                    @endforeach

                    <!-- Row for total -->
                    <tr class="intro-x">
                        <td colspan="3"><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 text-right font-bold">Total</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold">{{$totalSum}}</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold">{{$totalpercent}}</div></td>
                    </tr>
                    <!-- Row for percent -->
                    <tr class="intro-x">
                        <td colspan="3"><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 text-right font-bold">Percent</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold">{{$user->rate_download}} %</div></td>
                        <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold"></div></td>
                    </tr>
                @else
                    <tr>
                        <td colspan="3">No records found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List sellsWithDownloads -->


        <br>
        <br>
        <br>
        <!-- BEGIN: Data List preorders -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible ">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">วันที่ส่ง</th>
                        <th class="whitespace-nowrap">ออเดอร์</th>
                        <th class="whitespace-nowrap">แพ็คเกจ</th>
                        <th class="whitespace-nowrap">ประเภท</th>
                        <th class="whitespace-nowrap">ราคา</th>
                        <th class="whitespace-nowrap">ค่าคอม</th>
                    </tr>
                </thead>

                <tbody>
                    @if($preorders->count() > 0)
                        @php
                            $totalSum = 0;
                            $totalpercent = 0;
                        @endphp
                        @foreach($preorders as $key => $preorder)
                            <tr class="intro-x">
                                <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$preorder->created_at}}</div></td>
                                <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$preorder->number}}</div></td>
                                <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$preorder->package}}</div></td>
                                <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$preorder->preorder_type}}</div></td>
                                <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{$preorder->preorder_price}}</div></td>
                                <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5">{{ $preorder->preorder_price * ($user->rate_preorder / 100)}}</div></td>
                            </tr>
                            @php
                                $totalSum += $preorder->preorder_price;
                                $totalpercent += ($preorder->preorder_price * ($user->rate_preorder / 100));
                            @endphp
                        @endforeach

                        <!-- Row for total -->
                        <tr class="intro-x">
                            <td colspan="4"><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 text-right font-bold">Total</div></td>
                            <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold">{{$totalSum}}</div></td>
                            <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold">{{$totalpercent}}</div></td>
                        </tr>
                        <!-- Row for percent -->
                        <tr class="intro-x">
                            <td colspan="4"><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 text-right font-bold">Percent</div></td>
                            <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold">{{$user->rate_preorder}} %</div></td>
                            <td><div class="text-slate-500 text-sm whitespace-nowrap mt-0.5 font-bold"></div></td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6">No records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List preorders -->


    

    
    




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