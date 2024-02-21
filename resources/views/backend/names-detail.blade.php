@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($signsth);
// echo "</pre>";
// echo "<pre>";
// print_r($signsen);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_names_edit', ['id' => $name->id])}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
            &emsp;&emsp;แก้ไข&emsp;&emsp;
            </a>    
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        
        <div class="col-span-12 2xl:col-span-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        
                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-9">
                            <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        ลายเซ็นต์ภาษาไทย
                                        <div class="ml-auto">
                                            <div class=" cursor-pointer flex items-center rounded-full bg-success py-[3px] px-4 py-1 text-xs font-medium text-white">
                                            {{($count['th'] ?? 0)}}  ลายเซ็นต์
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{$name->name_th}}</div>
                                    <div class="mt-1 text-base text-slate-500">{{$name->price_th}} บาท</div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-3">
                            <a href="{{ route('BN_names_sign_add', ['lang' => 'th', 'id' => $name->id]) }}">
                                <div class="relative zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                    <div class="box p-5">
    
                                        <div class="mt-6 text-3xl font-medium leading-8">เพิม</div>
                                        <div class="mt-1 text-base text-slate-500">ภาษาไทย</div>
                                    </div>
                                </div>
                            </a>
                                
                        </div>




                        @foreach($signsth as $keysignsth => $th)
                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-12">
                            <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">

                                    <div class="mt-1 text-3xl font-medium leading-8">{{ $th->user->name }}</div>

                                    <div class="mt-5 grid grid-cols-12 gap-6">
                        
                                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-4">
                                            <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                                <div class="">
                                                    <div class="mt-1 text-base text-slate-500">work  {{$th->work}}</div>
                                                    <div class="mt-1 text-base text-slate-500">finance  {{$th->finance}}</div>
                                                    <div class="mt-1 text-base text-slate-500">love  {{$th->love}}</div>
                                                    <div class="mt-1 text-base text-slate-500">health  {{$th->health}}</div>
                                                    <div class="mt-1 text-base text-slate-500">fortune  {{$th->fortune}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-8">
                                            <a href="#">
                                                <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                                    <div class="">
                                                        <div class="mt-1 text-base text-slate-500">{{$th->description}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        



                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        


                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-9">
                            <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        ลายเซ็นต์ภาษาอังกฤษ
                                        <div class="ml-auto">
                                            <div class=" cursor-pointer flex items-center rounded-full bg-success py-[3px] px-4 py-1 text-xs font-medium text-white">
                                            {{($count['en'] ?? 0)}}  ลายเซ็นต์
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{$name->name_en}}</div>
                                    <div class="mt-1 text-base text-slate-500">{{$name->price_en??'-'}} บาท</div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-3">
                            <a href="{{ route('BN_names_sign_add', ['lang' => 'en', 'id' => $name->id]) }}">
                                <div class="relative zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                    <div class="box p-5">
    
                                        <div class="mt-6 text-3xl font-medium leading-8">เพิม</div>
                                        <div class="mt-1 text-base text-slate-500">ภาษาอังกฤษ</div>
                                    </div>
                                </div>
                            </a>
                                
                        </div>

                        @foreach($signsen as $keysignsen => $en)
                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-12">
                            <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">

                                    <div class="mt-1 text-3xl font-medium leading-8">{{ $en->user->name }}</div>

                                    <div class="mt-5 grid grid-cols-12 gap-6">
                        
                                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-4">
                                            <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                                <div class="">
                                                    <div class="mt-1 text-base text-slate-500">work  {{$en->work}}</div>
                                                    <div class="mt-1 text-base text-slate-500">finance  {{$en->finance}}</div>
                                                    <div class="mt-1 text-base text-slate-500">love  {{$en->love}}</div>
                                                    <div class="mt-1 text-base text-slate-500">health  {{$en->health}}</div>
                                                    <div class="mt-1 text-base text-slate-500">fortune  {{$en->fortune}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-8">
                                            <a href="#">
                                                <div class="relative before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                                    <div class="">
                                                        <div class="mt-1 text-base text-slate-500">{{$en->description}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

@section('script')
<script>

</script>


@endsection