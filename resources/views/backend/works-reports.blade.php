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
$workst = array(
    'assign' => 'มอบหมาย',
    'submitted' => 'ส่งแล้ว',
);
$workstclass = array(
    'assign' => 'btn-pending',
    'submitted' => 'btn-success',
);
// echo "<pre>";
// print_r($users);
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
                <select id="user" name="user" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="applySelects()">
                    <option value="" @if(empty(request('user'))) selected @endif>เลิอกยูสเซอร์&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    @foreach($users as $keyusers => $user)
                        <option value="{{ $user->id }}" @if(request('user') == $user->id) selected @endif>{{ $user->name }} - {{ $user->id }}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    @endforeach
                </select>
            </div>
        </div>

        
        <div class="mx-auto hidden text-slate-500 md:block"></div>
        
        <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
            <div class="relative text-slate-500">
                <select id="status" name="status" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" onchange="applySelects()" >
                    <!-- <option value="" @if(empty(request('status')) || request('status') == 'all') selected @endif>งานทั้งหมด&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="assign" @if(request('sign') == 'assign') selected @endif>Assigned&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="create" @if(request('sign') == 'create') selected @endif>Creating&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    <option value="finish" @if(request('sign') == 'finish') selected @endif>Finished&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option> -->
                    <option value="all" @if(empty(request('status')) || request('status') == 'all') selected @endif>งานทั้งหมด&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    @foreach($workst as $indexfilter => $workstfilter)
                        <option value="{{ $indexfilter }}" @if(request('status') == $indexfilter) selected @endif>{{ $workstfilter }}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>


    @if(isset($query) && count($query)>0)
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">วันที่มอบหมาย</th>
                    <th class="whitespace-nowrap">ประเภทงาน</th>
                    <th class="whitespace-nowrap">รายการ</th>
                    <th class="whitespace-nowrap">รายละเอียด</th>
                    <th class="whitespace-nowrap">สถานะ</th>
                    <th class="text-center whitespace-nowrap"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($query as $keyres => $res)
   
                    <tr class="intro-x">
                        <td class="text-center">{{(($query->currentPage()-1)*24)+$keyres+1}}</td>

                        <td>
                            <div class="font-medium whitespace-nowrap">{{date('d/m/Y H:i:s', strtotime($res->created_at))}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$warklist[$res->type]}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->make}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->description}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap"><span class="btn text-white {{$workstclass[$res->status]}}">{{$workst[$res->status]}}</span></div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                
                                <a class="flex items-center" href="{{route('BN_works_list_detail', ['id' => $res->id])}}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> รายละเอียด
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
    function applySelects() {
        var user = document.getElementById('user').value;
        var status = document.getElementById('status').value;
        var newUrl2 = `{{ route('BN_works_report') }}?user=${user}&status=${status}`;
        window.location.href = newUrl2;
    }

</script>


@endsection