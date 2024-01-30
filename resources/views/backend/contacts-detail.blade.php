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
                                <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap text-left">
                                    Product
                                </th>
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
                                <td class="px-5 py-3 border-b dark:border-darkmode-300 !py-4">
                                    <div class="flex items-center">
                                        <a class="ml-4 whitespace-nowrap font-medium" href="">
                                            Dell XPS 13
                                        </a>
                                    </div>
                                </td>
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




@endsection

@section('script')

@endsection