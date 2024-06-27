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
            <a href="{{route('BN_names_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
            &emsp;&emsp;เพิ่มชื่อ&emsp;&emsp;
            </a> 
            <a href="{{route('BN_names_store')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
            &emsp;&emsp;คลังรายชื่อ&emsp;&emsp;
            </a>   
            <a href="{{route('BN_names_edit', ['id' => $name->id])}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
            &emsp;&emsp;แก้ไข&emsp;&emsp;
            </a> 
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        
        <div class="col-span-12  sm:col-span-6 xl:col-span-6 2xl:col-span-6">
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
                                    <div class="box p-5  bg-primary text-white">
    
                                        <div class="mt-6 text-3xl font-medium leading-8">เพิ่ม</div>
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

                                    <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
                                        <a href="{{route('BN_names_edit', ['id' => $name->id])}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
                                        &emsp;&emsp;แก้ไข&emsp;&emsp;
                                        </a> 
                                    </div> -->

                                    <div class="mt-5 grid grid-cols-12 gap-6">
                        
                                        <div class="col-span-12 md:col-span-12 lg:col-span-4">
                                            <div class="intro-y box">

                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>work</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $th->work; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>finance</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $th->finance; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>love</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $th->love; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>health</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $th->health; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>fortune</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $th->fortune; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($th->users_id == auth()->user()->id)
                                                <a href="{{ route('BN_names_sign_edit', ['lang' => 'th', 'sign' => $th->id]) }}" class="mt-8 transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
                                                &emsp;&emsp;แก้ไข&emsp;&emsp;
                                                </a> 
                                                @endif()
                                                

                                                
                                                

                                            </div>
                                        </div>
                    

                                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-8">
                                            <div class="text-slate-500">
                                                <b>รายละเอียด</b><br>
                                                {{$th->description}}
                                            </div>

                                            <div class="box flex-1 mt-4">
                                                <div class="text-slate-500">
                                                    <div class="mt-2 flex">

                                                        <div class=" image-fitn mr-1 h-16 w-16 mr-4">
                                                            <img src="{{asset($th->feature)}}" alt="" data-action="zoom" class=" border border-black" >
                                                        </div>
                                                        <div class=" image-fitn mr-1 h-16 w-16 mr-4">
                                                            <img src="{{asset($th->sign)}}" alt="" data-action="zoom" class=" border border-black" >
                                                        </div>
                                             

                                                    </div>
                                                </div>
                                            </div>
                                            @if($th->video)
                                            <button 
                                                data-href="{{ asset($th->video) }}" 
                                                data-filename="video-{{$name->name_th}}-{{ $th->user->name }}-{{$th->id}}"
                                                class="transition duration-200 border shadow-sm inline-flex items-center py-2 px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 relative mt-4 justify-start rounded-full" 
                                                onclick="downloadVideo(this)">
                                                Download Video
                                            </button>
                                            @endif
                                            

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
        <div class="col-span-12  sm:col-span-6 xl:col-span-6 2xl:col-span-6">
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
                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-3 ">
                            <a href="{{ route('BN_names_sign_add', ['lang' => 'en', 'id' => $name->id]) }}">
                                <div class=" relative zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                    <div class="box p-5 bg-primary text-white">
    
                                        <div class="mt-6 text-3xl font-medium leading-8">เพิ่ม</div>
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
                        
                                        <div class="col-span-12 md:col-span-12 lg:col-span-4">
                                            <div class="intro-y box">

                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>work</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $en->work; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>finance</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $en->finance; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>love</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $en->love; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>health</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $en->health; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" flex items-center">
                                                    <div class="flex items-center">
                                                        <div>fortune</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="flex items-center">
                                                            @for ($i = 0; $i < $en->fortune; $i++)
                                                                <div class="h-2 w-2 rounded-full bg-pending"></div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($en->users_id == auth()->user()->id)
                                                <a href="{{ route('BN_names_sign_edit', ['lang' => 'en', 'sign' => $en->id]) }}" class="mt-8 transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >
                                                &emsp;&emsp;แก้ไข&emsp;&emsp;
                                                </a> 
                                                @endif()
                                                
                                                

                                            </div>
                                        </div>
                    

                                        <div class="intro-y col-span-12 sm:col-span-12 xl:col-span-8">
                                            <div class="text-slate-500">
                                                <b>รายละเอียด</b><br>
                                                {{$en->description}}
                                            </div>

                                            <div class="box flex-1 mt-4">
                                                <div class="text-slate-500">
                                                    <div class="mt-2 flex">

                                                        <div class=" image-fitn mr-1 h-16 w-16 mr-4">
                                                            <img src="{{asset($en->feature)}}" alt="" data-action="zoom" class=" border border-black" >
                                                        </div>
                                                        <div class=" image-fitn mr-1 h-16 w-16 mr-4">
                                                            <img src="{{asset($en->sign)}}" alt="" data-action="zoom" class=" border border-black" >
                                                        </div>
                                             

                                                    </div>
                                                </div>
                                            </div>

                                            <button 
                                                data-href="{{ asset($en->video) }}" 
                                                data-filename="video-{{$name->name_en}}-{{ $en->user->name }}-{{$en->id}}"
                                                class="transition duration-200 border shadow-sm inline-flex items-center py-2 px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 relative mt-4 justify-start rounded-full" 
                                                onclick="downloadVideo(this)">
                                                Download Video
                                            </button>

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
function downloadVideo(button) {
    const url = button.getAttribute('data-href');
    const fileNameWithoutExtension = button.getAttribute('data-filename');
    const extension = url.split('.').pop(); // Extract extension from URL
    const fileName = fileNameWithoutExtension + '.' + extension; // Concatenate filename with extension
    const anchor = document.createElement('a');
    anchor.href = url;
    anchor.download = fileName; // Set the download attribute to the full file name
    document.body.appendChild(anchor);
    anchor.click();
    document.body.removeChild(anchor);
}
</script>


@endsection