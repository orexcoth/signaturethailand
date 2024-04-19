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
foreach($submitted as $keyyy =>  $submit){
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
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-12 lg:col-span-12">
                    <div class="intro-y box p-5 sm:mt-5">
                        <div class="mb-3 flex border-b border-dashed border-slate-200 pb-3 text-slate-500 dark:border-darkmode-300">
                            <div>หัวข้อ</div>
                            <div class="ml-auto">รายละเอียด</div>
                        </div>
                        @if($work->type == 'preorders')
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>id</div>
                            </div>
                            <div class="ml-auto">{{$detail->id}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>customers_id</div>
                            </div>
                            <div class="ml-auto">{{$detail->customers_id}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>status</div>
                            </div>
                            <div class="ml-auto">{{$detail->status}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>number</div>
                            </div>
                            <div class="ml-auto">{{$detail->number}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>total</div>
                            </div>
                            <div class="ml-auto">{{$detail->total}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>preorder_price</div>
                            </div>
                            <div class="ml-auto">{{$detail->preorder_price}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>total_price</div>
                            </div>
                            <div class="ml-auto">{{$detail->total_price}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>shipping_price</div>
                            </div>
                            <div class="ml-auto">{{$detail->shipping_price}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>firstname</div>
                            </div>
                            <div class="ml-auto">{{$detail->firstname}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>lastname</div>
                            </div>
                            <div class="ml-auto">{{$detail->lastname}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>email</div>
                            </div>
                            <div class="ml-auto">{{$detail->email}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>phone</div>
                            </div>
                            <div class="ml-auto">{{$detail->phone}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>shipping_method</div>
                            </div>
                            <div class="ml-auto">{{$detail->shipping_method}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>shipping_detail</div>
                            </div>
                            <div class="ml-auto">{{$detail->shipping_detail}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>payment_method</div>
                            </div>
                            <div class="ml-auto">{{$detail->payment_method}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>payment_status</div>
                            </div>
                            <div class="ml-auto">{{$detail->payment_status}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>payment_date</div>
                            </div>
                            <div class="ml-auto">{{$detail->payment_date}}</div>
                        </div>

                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>ref1</div>
                            </div>
                            <div class="ml-auto">{{$detail->ref1}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>ref2</div>
                            </div>
                            <div class="ml-auto">{{$detail->ref2}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>ref3</div>
                            </div>
                            <div class="ml-auto">{{$detail->ref3}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>package</div>
                            </div>
                            <div class="ml-auto">{{$detail->package}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>preorder_type</div>
                            </div>
                            <div class="ml-auto">{{$detail->preorder_type}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>firstname_th</div>
                            </div>
                            <div class="ml-auto">{{$detail->firstname_th}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>lastname_th</div>
                            </div>
                            <div class="ml-auto">{{$detail->lastname_th}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>firstname_en</div>
                            </div>
                            <div class="ml-auto">{{$detail->firstname_en}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>lastname_en</div>
                            </div>
                            <div class="ml-auto">{{$detail->lastname_en}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>prominence_1</div>
                            </div>
                            <div class="ml-auto">{{$detail->prominence_1}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>prominence_2</div>
                            </div>
                            <div class="ml-auto">{{$detail->prominence_2}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>prominence_3</div>
                            </div>
                            <div class="ml-auto">{{$detail->prominence_3}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>prominence_4</div>
                            </div>
                            <div class="ml-auto">{{$detail->prominence_4}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>prominence_5</div>
                            </div>
                            <div class="ml-auto">{{$detail->prominence_5}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>TargetPreorder</div>
                            </div>
                            <div class="ml-auto">{{$detail->TargetPreorder}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>name</div>
                            </div>
                            <div class="ml-auto">{{$detail->name}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>dob</div>
                            </div>
                            <div class="ml-auto">{{$detail->dob}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>telephone</div>
                            </div>
                            <div class="ml-auto">{{$detail->telephone}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>SelectStatus</div>
                            </div>
                            <div class="ml-auto">{{$detail->SelectStatus}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>occupation</div>
                            </div>
                            <div class="ml-auto">{{$detail->occupation}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>EverSignature</div>
                            </div>
                            <div class="ml-auto">{{$detail->EverSignature}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>mysignature</div>
                            </div>
                            <div class="ml-auto">{{$detail->mysignature}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>ProblemPreorder</div>
                            </div>
                            <div class="ml-auto">{{$detail->ProblemPreorder}}</div>
                        </div>
                        <div class="mb-5 flex items-center">
                            <div class="flex items-center">
                                <div>DeliverSignature</div>
                            </div>
                            <div class="ml-auto">{{$detail->DeliverSignature}}</div>
                        </div>
                        <br>
                        <div class="text-right mt-5">
                            <a  class="btn btn-primary w-24" href="{{route('BN_works_turn_in', ['id' => $work->id])}}">ส่งงาน</a>
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
                            ส่งเมื่อ  {{$send->created_at}}
                        </div>
                    </div>
                    <div class="image-fit h-24 w-24 lg:mr-1 lg:h-12 lg:w-12">
                        <img class="" data-action="zoom" src="{{asset($send->sign)}}"  alt="">
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

    
    
    
    



    
    




@endsection

@section('script')
<script>


</script>


@endsection