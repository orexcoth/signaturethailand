@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($signCounts);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{ route('BN_names_detail', ['id' => $name->id]) }}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >กลับ</a>    
        </div>
    </div>
    <form method="post" action="{{route('BN_names_edit_action')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    
                    <input type="hidden" name="id" value="{{$name->id}}" />
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อ ไทย</label>
                                    <input type="text" class="form-control w-full" value="{{$name->name_th}}" name="name_th" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อ อังกฤษ</label>
                                    <input type="text" class="form-control w-full" value="{{$name->name_en}}" name="name_en" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6" id="div1">
                                <div class="mt-3">
                                    <label for="" class="form-label">ราคาชื่อ ไทย</label>
                                    <input type="number" inputmode="numeric" pattern="[0-9]*" class="form-control w-full" value="{{$name->price_th}}" name="price_th" />
                                </div>
                            </div>

                            <div class="col-span-12 xl:col-span-6" id="div2">
                                <div class="mt-3">
                                    <label for="" class="form-label">ราคาชื่อ อังกฤษ</label>
                                    <input type="number" inputmode="numeric" pattern="[0-9]*" class="form-control w-full" value="{{$name->price_en}}" name="price_en" />
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">ตกลง</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>




@endsection

@section('script')
<script>

</script>


@endsection