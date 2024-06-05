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
                <!-- <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="ค้นหา.." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>  -->
            </div>
        </div>
        
        <div class="mx-auto hidden text-slate-500 md:block"></div>
        


    </div>


    @if(isset($query) && count($query)>0)
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <!-- <th class="text-center whitespace-nowrap">#</th> -->
                    <th class="whitespace-nowrap">วันที่มอบหมาย</th>
                    <th class="whitespace-nowrap">ผู้มอบหมาย</th>
                    <th class="whitespace-nowrap">ประเภท</th>
                    <th class="whitespace-nowrap">หมายเลขรายการ</th>
                    <th class="whitespace-nowrap">รายการ</th>
                    <th class="text-center whitespace-nowrap"></th>
                    <!-- <th class="text-center whitespace-nowrap"></th> -->
                </tr>
            </thead>
            <tbody>
            @foreach($query as $keyres => $res)
   
                <tr class="intro-x">
                    <!-- <td class="text-center">{{(($query->currentPage()-1)*24)+$keyres+1}}</td> -->

                    <td>
                        <div class="font-medium whitespace-nowrap">{{date('d/m/Y H:i:s', strtotime($res->created_at))}}</div>
                    </td>

                    <td>
                        <div class="font-medium whitespace-nowrap">{{$res->user->name}}</div>
                    </td>
                    <td>
                        <div class="font-medium whitespace-nowrap">{{$res->type}}</div>
                    </td>
                    <td>
                        <div class="font-medium whitespace-nowrap">{{$res->number}}</div>
                    </td>
                    <td>
                        <div class="font-medium whitespace-nowrap">
                        @if($res->type == 'preorders')
            
                            @if($res->preorder->package=='thai'  ||  $res->preorder->package=='combo')
                                @if($res->preorder->preorder_type=='firstname' ||  $res->preorder->preorder_type=='duo')
                                    
                                    {{$res->preorder->firstname_th}}
                                    
                                @endif  
                                
                                @if($res->preorder->preorder_type=='lastname' ||  $res->preorder->preorder_type=='duo')
                                    
                                     {{$res->preorder->lastname_th}}
                                    
                                @endif      
                            @endif
                            
                            @if($res->preorder->package=='english'  ||  $res->preorder->package=='combo')
                                @if($res->preorder->preorder_type=='firstname' ||  $res->preorder->preorder_type=='duo')
                                    
                                     {{$res->preorder->firstname_en}}

                                @endif  
                                
                                @if($res->preorder->preorder_type=='lastname' ||  $res->preorder->preorder_type=='duo')

                                     {{$res->preorder->lastname_en}}

                                @endif       
                            @endif
                        
                        @endif
                        
                        @if($res->type == 'names')
                            {{$res->name->name_th}} / {{$res->name->name_en}}
                        @endif
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            
                            <a class="flex items-center" href="{{route('BN_works_assign_list_detail', ['id' => $res->id])}}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ดูข้อมูล
                            </a>
                        </div>
                    </td>

                    <!-- <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            
                            <a class="flex items-center text-success mr-3" href="#" >
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> รับงาน
                            </a>
                            <a class="flex items-center text-danger mr-3" href="#" >
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ปฎิเสธ
                            </a>

                        </div>
                    </td> -->
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


</script>


@endsection