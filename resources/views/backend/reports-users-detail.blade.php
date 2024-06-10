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

    <div class="intro-y box mt-5 px-5 pt-5">
        <div class="-mx-5 flex flex-col border-b border-slate-200/60 pb-5 dark:border-darkmode-400 lg:flex-row">
            <div class="flex flex-1 items-center justify-center px-5 lg:justify-start">
                <div class="image-fit relative h-20 w-20 flex-none sm:h-24 sm:w-24 lg:h-32 lg:w-32">
                    <img class="rounded-full" src="{{asset($user->photo)}}" alt="">

                </div>
                <div class="ml-5">
                    <div class="w-24 truncate text-lg font-medium sm:w-40 sm:whitespace-normal">
                        {{$user->name}}
                    </div>
                    <!-- <div class="text-slate-500">{{$user->email}}</div> -->
                </div>
            </div>
            <div class="mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-t-0 lg:pt-0">
                <div class="text-center font-medium lg:mt-3 lg:text-left">
                    Details
                </div>
                <div class="mt-4 flex flex-col items-center justify-center lg:items-start">
                    <div class="flex items-center truncate sm:whitespace-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="user" class="lucide lucide-instagram stroke-1.5 mr-2 h-4 w-4"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
                        {{$user->role}}
                    </div>
                    <div class="mt-3 flex items-center truncate sm:whitespace-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="mail" class="lucide lucide-mail stroke-1.5 mr-2 h-4 w-4"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                        {{$user->email}}
                    </div>
                    
                </div>
            </div>

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


    <div class="mt-5 grid grid-cols-12 gap-6">

    
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <a href="{{ route('BN_reports_users_detail_sign', ['users_id' => $user->id]) }}@if(request()->has('period'))?period={{ request()->query('period') }}@endif">
                <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                    <div class="box p-5">
                        <div class="mt-6 text-3xl font-medium leading-8">{{$query->signs_count}} ลายเซ็นต์</div>
                        <div class="mt-1 text-base text-slate-500">ลายเซ็นต์</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <a href="{{ route('BN_reports_users_detail_turnin', ['users_id' => $user->id]) }}@if(request()->has('period'))?period={{ request()->query('period') }}@endif">
                <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                    <div class="box p-5">
                        <div class="mt-6 text-3xl font-medium leading-8">{{$query->preorders_turn_ins_count}} ครั้ง</div>
                        <div class="mt-1 text-base text-slate-500">ส่งงาน</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <a href="{{ route('BN_reports_users_detail_download', ['users_id' => $user->id]) }}@if(request()->has('period'))?period={{ request()->query('period') }}@endif">
                <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                    <div class="box p-5">
                        <div class="mt-6 text-3xl font-medium leading-8">{{$query->downloads_count}} ครั้ง</div>
                        <div class="mt-1 text-base text-slate-500">ยอดดาวน์โหลด</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
            <a href="{{ route('BN_reports_users_detail_commission', ['users_id' => $user->id]) }}@if(request()->has('period'))?period={{ request()->query('period') }}@endif">
                <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                    <div class="box p-5">
                        <div class="mt-6 text-3xl font-medium leading-8">ภาพรวม</div>
                        <div class="mt-1 text-base text-slate-500">คอมมิชชั่น</div>
                    </div>
                </div>
            </a>
        </div>



    </div>





    <!-- <div class="tab-content intro-y mt-5">
        <div class="grid grid-cols-12 gap-6">
            
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">
                        ลายเซ็น
                    </h2>
                </div>

                <div class="p-5">

                    <div class="flex flex-col sm:flex-row">
                        <div class="mr-auto">
                            <a class="font-medium" href="">
                                Wordpress Template
                            </a>
                            <div class="mt-1 text-slate-500">
                                HTML, PHP, Mysql
                            </div>
                        </div>
                        <div class="flex">
                            <div class="-ml-2 mr-auto mt-5 w-32 sm:ml-0 sm:mr-5">
                                <div class="w-auto h-[30px]">
                                    <canvas class="chart simple-line-chart" width="128" height="30" style="display: block; box-sizing: border-box; height: 30px; width: 128px;"></canvas>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="font-medium">6.5k</div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">
                        ส่งงาน
                    </h2>

                </div>

            </div>



        </div>
    </div>
        -->
    
   
    
    




@endsection

@section('script')
<script>
   

</script>


@endsection