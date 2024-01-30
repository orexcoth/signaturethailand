@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
<?php

// echo "<pre>";
// print_r($query);
// echo "</pre>";
?>

    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_articles_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มบทความ</a>    
        </div>
    </div>

    <div class="lg:flex intro-y mt-5 mb-5">

        <div class="relative">
            <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="ค้นหา..." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg> 
        </div>

    </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap"></th>
                    <th class="whitespace-nowrap">บทความ</th>
                    <th class="text-center whitespace-nowrap"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($query as $keyres => $res)
                @php
                $feature_img = ($res->feature)?asset($res->feature):asset('uploads/default-car.jpg');
                @endphp
                    <tr class="intro-x">
                        <td class="text-center">{{(($query->currentPage()-1)*12)+$keyres+1}}</td>
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                    <img alt="{{$res->article_name}}" class="tooltip " src="{{$feature_img}}" >
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->article_name}}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                
                                <a class="flex items-center text-success mr-3" target="_blank" href="#" >
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ดูข้อมูล
                                </a>
                                <a class="flex items-center" href="{{route('BN_articles_edit', ['id' => $res->id])}}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> แก้ไข
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <div class="d-flex">
    {!! $query->appends(request()->input())->links() !!}
    </div>


    
    

@endsection

@section('script')
<script>
    function applyFilters() {
        var keyword = document.getElementById('keyword').value;
        var newUrl = `{{ route('BN_articles') }}?keyword=${keyword}`;
        window.location.href = newUrl;
    }
    function handleEnter(event) {
        if (event.key === 'Enter') {
            applyFilters();
        }
    }
    //new DataTable('#example', {
        //ajax: 'scripts/server_processing.php',
        //processing: true,
        //serverSide: true
    //});
</script>
@endsection