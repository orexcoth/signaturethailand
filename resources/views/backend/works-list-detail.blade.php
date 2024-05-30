@extends('../backend/layout/side-menu')

@section('subhead')
<title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$warklist = array(
    'names' => 'ออกแบบลายเซ็นต์',
    'combos' => 'ออเดอร์เพิ่มนามสกุล',
    'preorders' => 'ออกเดอร์สั่งออกแบบใหม่',
);
foreach ($submitted as $keyyy =>  $submit) {
    // echo "<pre>";
    // print_r($submit->user->photo);
    // echo "</pre>";
}

?>
<div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
</div>
@if($detail)


<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-12 lg:col-span-12">
                <div class="intro-y box p-5 sm:mt-5">
                    @if($work->type == 'preorders')
                    <div class="overflow-x-auto box mt-4">
                        <table data-tw-merge class="w-full text-left">
                            <thead data-tw-merge class="">
                                <tr data-tw-merge class="">

                                    <th data-tw-merge class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap">
                                        หัวข้อ
                                    </th>
                                    <th data-tw-merge class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap">
                                        รายละเอียด
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $details = [
                                        'id' => $detail->id,
                                        'customers_id' => $detail->customers_id,
                                        'status' => $detail->status,
                                        'number' => $detail->number,
                                        'total' => $detail->total,
                                        'preorder_price' => $detail->preorder_price,
                                        'total_price' => $detail->total_price,
                                        'shipping_price' => $detail->shipping_price,
                                        'firstname' => $detail->firstname,
                                        'lastname' => $detail->lastname,
                                        'email' => $detail->email,
                                        'phone' => $detail->phone,
                                        'shipping_method' => $detail->shipping_method,
                                        'shipping_detail' => $detail->shipping_detail,
                                        'payment_method' => $detail->payment_method,
                                        'payment_status' => $detail->payment_status,
                                        'payment_date' => $detail->payment_date,
                                        'ref1' => $detail->ref1,
                                        'ref2' => $detail->ref2,
                                        'ref3' => $detail->ref3,
                                        'package' => $detail->package,
                                        'preorder_type' => $detail->preorder_type,
                                        'firstname_th' => $detail->firstname_th,
                                        'lastname_th' => $detail->lastname_th,
                                        'firstname_en' => $detail->firstname_en,
                                        'lastname_en' => $detail->lastname_en,
                                        'prominence_1' => $detail->prominence_1,
                                        'prominence_2' => $detail->prominence_2,
                                        'prominence_3' => $detail->prominence_3,
                                        'prominence_4' => $detail->prominence_4,
                                        'prominence_5' => $detail->prominence_5,
                                        'TargetPreorder' => $detail->TargetPreorder,
                                        'name' => $detail->name,
                                        'dob' => $detail->dob,
                                        'telephone' => $detail->telephone,
                                        'SelectStatus' => $detail->SelectStatus,
                                        'occupation' => $detail->occupation,
                                        'EverSignature' => $detail->EverSignature,
                                        'mysignature' => $detail->mysignature,
                                        'ProblemPreorder' => $detail->ProblemPreorder,
                                        'DeliverSignature' => $detail->DeliverSignature,
                                    ];
                                @endphp
                                @foreach ($details as $key => $value)
                                <tr data-tw-merge class="">

                                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                                        {{ $key }}
                                    </td>
                                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                                        {{ $value }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mt-5">
                        <a class="btn btn-primary w-24" href="{{route('BN_works_turn_in', ['id' => $work->id])}}">ส่งงาน</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@foreach($submitted as $send)
<div class="mt-5 grid grid-cols-12 gap-6">
    <div class="intro-y col-span-12 md:col-span-12">
        <div class="box">
            <div class="flex flex-col items-center p-5 lg:flex-row">
                <div class="image-fit h-24 w-24 lg:mr-1 lg:h-12 lg:w-12">
                    <img class="rounded-full" src="{{asset($send->user->photo)}}" alt="Midone - Tailwind Admin Dashboard Template">
                </div>
                <div class="mt-3 text-center lg:ml-2 lg:mr-auto lg:mt-0 lg:text-left">
                    <a class="font-medium" href="">
                        {{$send->user->name}}
                    </a>
                    <div class="mt-0.5 text-xs text-slate-500">
                        ส่งเมื่อ {{$send->created_at}}
                    </div>
                </div>
                <div class="image-fit h-24 w-24 lg:mr-1 lg:h-12 lg:w-12">
                    <img style="border: 1px solid #aaa;" data-action="zoom" src="{{asset($send->sign)}}" alt="">
                </div>
                <!-- <div class="mt-4 flex lg:mt-0">
                        <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 px-2 py-1">Message</button>
                        <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-secondary/20 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-100/10 px-2 py-1">Profile</button>
                    </div> -->
            </div>
        </div>
    </div>

</div>
@endforeach
@endif















@endsection

@section('script')
<script>


</script>


@endsection