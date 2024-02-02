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
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <div class="intro-y mt-5 grid grid-cols-11 gap-5">
                    
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box rounded-md p-5">
                <div class="mb-5 flex items-center border-b border-slate-200/60 pb-5 dark:border-darkmode-400">
                    <div class="truncate text-base font-medium">
                        
                    </div>
                </div>
                <div class="-mt-3 overflow-auto lg:overflow-visible">
                    <table class="w-full text-left">
                        <thead class="">
                            <tr class="[&amp;:nth-of-type(odd)_td]:bg-slate-100 [&amp;:nth-of-type(odd)_td]:dark:bg-darkmode-300 [&amp;:nth-of-type(odd)_td]:dark:bg-opacity-50">
                                <!-- <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap text-left">
                                    Product
                                </th> -->
                                <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap text-right">
                                    Unit Price
                                </th>
                                <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap text-right">
                                    Qty
                                </th>
                                <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap text-right">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="[&amp;:nth-of-type(odd)_td]:bg-slate-100 [&amp;:nth-of-type(odd)_td]:dark:bg-darkmode-300 [&amp;:nth-of-type(odd)_td]:dark:bg-opacity-50">
                                <!-- <td class="px-5 py-3 border-b dark:border-darkmode-300 !py-4">
                                    <div class="flex items-center">
                                        <a class="ml-4 whitespace-nowrap font-medium" href="">
                                            Dell XPS 13
                                        </a>
                                    </div>
                                </td> -->
                                <td class="px-5 py-3 border-b dark:border-darkmode-300 text-right">
                                    $56,000.00
                                </td>
                                <td class="px-5 py-3 border-b dark:border-darkmode-300 text-right">
                                    2
                                </td>
                                <td class="px-5 py-3 border-b dark:border-darkmode-300 text-right">
                                    $112,000.00
                                </td>
                            </tr>
     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="intro-y box col-span-12 lg:col-span-6">
        <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-0">
            <h2 class="mr-auto text-base font-medium">
                Work In Progress
            </h2>
            <div data-tw-placement="bottom-end" class="dropdown relative ml-auto sm:hidden"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer block h-5 w-5" tag="a"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal" class="lucide lucide-more-horizontal stroke-1.5 w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </button>
                <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden invisible opacity-0 translate-y-1" data-state="leave" style="display: none;">
                    <div class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                        <a data-tw-target="#work-in-progress-new" role="tab" id="work-in-progress-mobile-new-tab" selected="selected" class="active cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item w-full">New</a>
                        <a data-tw-target="#work-in-progress-last-week" role="tab" id="work-in-progress-mobile-last-week-tab" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item w-full">Last Week</a>
                    </div>
                </div>
            </div>
            <ul role="tablist" class="ml-auto hidden w-auto sm:flex">
                <li id="work-in-progress-new-tab" role="presentation" class="focus-visible:outline-none">
                    <a data-tw-target="#work-in-progress-new" role="tab" class="cursor-pointer block appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&amp;.active]:text-slate-800 [&amp;.active]:dark:text-white border-b-2 dark:border-transparent [&amp;.active]:border-b-primary [&amp;.active]:font-medium [&amp;.active]:dark:border-b-primary py-5" aria-selected="false">New</a>
                </li>
                <li id="work-in-progress-last-week-tab" role="presentation" class="focus-visible:outline-none">
                    <a data-tw-target="#work-in-progress-last-week" role="tab" class="cursor-pointer block appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&amp;.active]:text-slate-800 [&amp;.active]:dark:text-white border-b-2 dark:border-transparent [&amp;.active]:border-b-primary [&amp;.active]:font-medium [&amp;.active]:dark:border-b-primary py-5 active" aria-selected="true">Last Week</a>
                </li>
            </ul>
        </div>
        <div class="p-5">
            <div class="tab-content">
                <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="work-in-progress-new" role="tabpanel" aria-labelledby="work-in-progress-new-tab" class="tab-pane active visible opacity-100" data-state="enter" style="width: 526px;">
                    <div>
                        <div class="flex">
                            <div class="mr-auto">Pending Tasks</div>
                            <div>20%</div>
                        </div>
                        <div class="w-full bg-slate-200 rounded dark:bg-black/20 mt-2 h-1">
                            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-primary h-full rounded text-xs text-white flex justify-center items-center w-1/2">
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="flex">
                            <div class="mr-auto">Completed Tasks</div>
                            <div>2 / 20</div>
                        </div>
                        <div class="w-full bg-slate-200 rounded dark:bg-black/20 mt-2 h-1">
                            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-primary h-full rounded text-xs text-white flex justify-center items-center w-1/4">
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="flex">
                            <div class="mr-auto">Tasks In Progress</div>
                            <div>42</div>
                        </div>
                        <div class="w-full bg-slate-200 rounded dark:bg-black/20 mt-2 h-1">
                            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-primary h-full rounded text-xs text-white flex justify-center items-center w-3/4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')

@endsection