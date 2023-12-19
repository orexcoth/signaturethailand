@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

// echo "<pre>";
// print_r($image_blur);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <form method="post" action="{{route('bn_mosaic_upload')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    
                    
                    <div class="p-5">
                        

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รูป</label>
                                    <input type="file" class="form-control w-full" id="" name="path" accept="image/*" />
                                </div>

                            </div>


                        </div>

                    </div>


                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">บันทึก</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
           
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ปกติ</th>
                        <!-- <th class="whitespace-nowrap">blur10</th> -->
                        <!-- <th class="whitespace-nowrap">ซ้อน</th> -->
                        <th class="whitespace-nowrap">mosaic</th>
                        <!-- <th class="whitespace-nowrap">blur60</th>
                        <th class="whitespace-nowrap">blur90</th> -->
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($image_mosaic as $keyres => $res)

                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                        <img class="tooltip" data-action="zoom" src="{{asset($res->path)}}" >
                                    </div>
                                </div>
                            </td>


                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                        <img class="tooltip" data-action="zoom" src="{{asset($res->result)}}" >
                                    </div>
                                </div>
                            </td>

                            <!-- <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                        <img class="tooltip" data-action="zoom" src="{{asset($res->blur40)}}" >
                                    </div>
                                </div>
                            </td> -->

                            <!-- <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                        <img class="tooltip" data-action="zoom" src="{{asset($res->blur60)}}" >
                                    </div>
                                </div>
                            </td>

                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                        <img class="tooltip" data-action="zoom" src="{{asset($res->blur80)}}" >
                                    </div>
                                </div>
                            </td> -->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <div class="d-flex">
            {!! $image_mosaic->links() !!}
        </div>

        
@endsection

@section('script')
<script>

</script>


@endsection