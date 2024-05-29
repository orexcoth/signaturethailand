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
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <!-- <a href="{{route('BN_customers_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มรายชื่อลูกค้า</a>     -->
        </div>
    </div>
    <div class="intro-y news xl:w-5/5 p-5 box mt-8">
        <div class="intro-y text-justify leading-relaxed">
            <div class="box">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="ml-5">
                            <div class=" truncate sm:whitespace-normal font-medium text-lg">{{$query->firstname." ".$query->lastname}}</div>
                            <div class="text-slate-500">{{$query->phone}}</div>
                            <div class="text-slate-500">{{$query->email}}</div>
                        </div>
                    </div>

                </div>
            </div>
                
        </div>
    </div>



    @if($query->sells()->count() > 0)
    <div class="intro-y mt-4 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">Sells</h2>
    </div>
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Number</th>
                    <th class="whitespace-nowrap">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query->sells as $key => $sell)
                <tr class="intro-x">
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $sell->number }}</td>
                    <td>{{ $sell->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if($query->preorders()->count() > 0)
    <div class="intro-y mt-4 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">Preorders</h2>
    </div>
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Number</th>
                    <th class="whitespace-nowrap">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query->preorders as $key => $preorder)
                <tr class="intro-x">
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $preorder->number }}</td>
                    <td>{{ $preorder->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    





@endsection

@section('script')
<script>

    

</script>


@endsection