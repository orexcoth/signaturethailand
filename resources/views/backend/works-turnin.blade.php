@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

// echo "<pre>";
// print_r($preorder);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_users_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มยูสเซอร์</a>    
        </div> -->
    </div>
    <form method="post" action="{{route('BN_works_turn_in_action')}}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <input type="hidden" name="type" value="preorders" />
                    <input type="hidden" name="preorders_id" value="{{$preorder->id}}" />
                    <input type="hidden" name="users_id" value="{{$user->id}}" />
                    <input type="hidden" name="work_id" value="{{$work->id}}" />
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">

                        <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="lang" class="form-label">firstname_th</label>
                                    <input type="text" class="form-control w-full" value="{{$preorder->firstname_th}}" name="firstname_th" readonly>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="name" class="form-label">lastname_th</label>
                                    <input type="text" class="form-control w-full" value="{{$preorder->lastname_th}}" name="lastname_th" readonly>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="lang" class="form-label">firstname_en</label>
                                    <input type="text" class="form-control w-full" value="{{$preorder->firstname_en}}" name="firstname_en" readonly>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="name" class="form-label">lastname_en</label>
                                    <input type="text" class="form-control w-full" value="{{$preorder->lastname_en}}" name="lastname_en" readonly>
                                </div>
                            </div>

                            


                            <!-- Description Input -->
                            <!-- <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea class="form-control w-full" id="description" name="description" class="form-control w-full" rows="4"></textarea>
                                </div>
                            </div> -->

                             <!-- Sign Image Upload Input -->
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="sign" class="form-label">Sign Image:</label>
                                    <input type="file" id="sign" name="sign" accept="image/*" class="form-control">
                                </div>
                            </div>

                            <!-- Video Upload Input -->
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="video" class="form-label">Video:</label>
                                    <input type="file" id="video" name="video" accept="video/*" class="form-control">
                                </div>
                            </div>


                            
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    



    
    




@endsection

@section('script')
<script>


</script>


@endsection