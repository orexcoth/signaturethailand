@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')

<div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        <a href="{{route('BN_names_import')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >กลับสู่หน้านำเข้าข้อมูล</a>    
    </div>
</div>

@if (!empty($savedData))
<!-- BEGIN: table save -->
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <h2 class="text-lg font-medium">ข้อมูลที่ถูกบันทึก</h2>
    <table class="table table-report">
        <thead>
            <tr>
                <th class="whitespace-nowrap">name_th</th>
                <th class="whitespace-nowrap">name_en</th>
                <th class="whitespace-nowrap">price_th</th>
                <th class="whitespace-nowrap">price_en</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($savedData as $data)
            <tr>
                <td>{{ $data['name_th'] }}</td>
                <td>{{ $data['name_en'] }}</td>
                <td>{{ isset($data['price_th']) ? $data['price_th'] : 'N/A' }}</td>
                <td>{{ isset($data['price_en']) ? $data['price_en'] : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- END: Data List -->
<br><br>
@endif

@if (!empty($skippedData))
<!-- BEGIN: table unsave -->
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <h2 class="text-lg font-medium">ข้อมูลที่ไม่ถูกบันทึก</h2>
    <table class="table table-report">
        <thead>
            <tr>
                <th class="whitespace-nowrap">name_th</th>
                <th class="whitespace-nowrap">name_en</th>
                <th class="whitespace-nowrap">price_th</th>
                <th class="whitespace-nowrap">price_en</th>
                <th class="whitespace-nowrap">Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skippedData as $data)
            <tr>
                <td>{{ $data['name_th'] }}</td>
                <td>{{ $data['name_en'] }}</td>
                <td>{{ isset($data['price_th']) ? $data['price_th'] : 'N/A' }}</td>
                <td>{{ isset($data['price_en']) ? $data['price_en'] : 'N/A' }}</td>
                <td>{{ $data['reason'] }}</td>
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
        // Any JavaScript code if needed
    </script>
@endsection
