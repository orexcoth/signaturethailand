@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$workst = array(
    'assign' => 'มอบหมาย',
    'submitted' => 'ส่งแล้ว',
);
$workstclass = array(
    'assign' => 'btn-pending',
    'submitted' => 'btn-success',
);
// echo "<pre>";
// print_r($works);
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





    <div class="intro-y box mt-5 py-10 ">
        <div class="mt-2 px-5">
            <div class="text-center text-lg font-medium">
                {{$query->number}}
            </div>
            <div class="mt-2 text-center text-slate-500">
                ประเภท : {{$query->type}}
            </div>

            @if($query->type == 'preorders')
            
                @if($query->preorder->package=='thai'  ||  $query->preorder->package=='combo')
                    @if($query->preorder->preorder_type=='firstname' ||  $query->preorder->preorder_type=='duo')
                        <div class="mt-2 text-center text-slate-500">
                        ชื่อภาษาไทย : {{$query->preorder->firstname_th}}
                        </div>
                    @endif  
                    
                    @if($query->preorder->preorder_type=='lastname' ||  $query->preorder->preorder_type=='duo')
                        <div class="mt-2 text-center text-slate-500">
                        นามสกุลภาษาไทย : {{$query->preorder->lastname_th}}
                        </div>
                    @endif      
                @endif
                
                @if($query->preorder->package=='english'  ||  $query->preorder->package=='combo')
                    @if($query->preorder->preorder_type=='firstname' ||  $query->preorder->preorder_type=='duo')
                        <div class="mt-2 text-center text-slate-500">
                        ชื่อภาษาอังกฤษ : {{$query->preorder->firstname_en}}
                        </div>
                    @endif  
                    
                    @if($query->preorder->preorder_type=='lastname' ||  $query->preorder->preorder_type=='duo')
                        <div class="mt-2 text-center text-slate-500">
                        นามสกุลภาษาอังกฤษ : {{$query->preorder->lastname_en}}
                        </div>
                    @endif       
                @endif
            
            @endif
            
            @if($query->type == 'names')
            <div class="mt-2 text-center text-slate-500">
            {{$query->name->name_th}} / {{$query->name->name_en}}
            </div>
            @endif
        </div>
        
    </div>








    @if(isset($works) && count($works)>0)
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">ยูสเซอร์</th>
                    <th class="whitespace-nowrap">สเตตัส</th>
                    <!-- <th class="text-center whitespace-nowrap"></th> -->
                </tr>
            </thead>
            <tbody>
            @php
            $count = 0;
            @endphp
            @foreach($works as $keyres => $res)
                @php
                $count++;
                @endphp
                <tr class="intro-x">
                    <td class="text-center">{{$count}}</td>
                    <td>
                        <div class="font-medium whitespace-nowrap">{{$res->user->name}}</div>
                    </td>

                    <td>
                        <div class="font-medium whitespace-nowrap"><span class="btn text-white {{$workstclass[$res->status]}}">{{$workst[$res->status]}}</span></div>
                    </td>
                    <!-- <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            
                            <a class="flex items-center" href="{{route('BN_works_assign_list_detail', ['id' => $res->id])}}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ดูข้อมูล
                            </a>
                        </div>
                    </td> -->

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

    @endif


    



    
    




@endsection

@section('script')
<script>


</script>


@endsection