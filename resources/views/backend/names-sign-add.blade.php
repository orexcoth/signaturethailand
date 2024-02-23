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
    </div>
    <form method="post" action="{{route('BN_names_sign_add_action')}}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box p-5">
                    <input type="hidden" name="names_id" value="{{$name->id}}" />
                    <input type="hidden" name="users_id" value="{{ auth()->id() }}" />
                    <input type="hidden" name="lang" value="{{ $lang }}">
                    <input type="hidden" name="field" value="{{ $lang == 'th' ? 'name_th' : 'name_en' }}">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">


                            <!-- Language Input -->
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="lang" class="form-label">ภาษา</label>
                                    <input type="text" class="form-control w-full" value="{{ $lang == 'th' ? 'ภาษาไทย' : 'ภาษาอังกฤษ' }}" name="language" readonly>
                                </div>
                            </div>

                            <!-- Name Input -->
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="name" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control w-full" value="{{ $lang == 'th' ? $name->name_th : $name->name_en }}" name="name" readonly>
                                </div>
                            </div>

                            <!-- Work Input -->
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="work">Work:</label>
                                    <input type="range" id="work" name="work" min="0" max="5" class="w-full" value="0" required>
                                    <output for="work" id="work-output">0</output>
                                </div>
                            </div>

                            <!-- Finance Input -->
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="finance">Finance:</label>
                                    <input type="range" id="finance" name="finance" min="0" max="5" class="w-full" value="0" required>
                                    <output for="finance" id="finance-output">0</output>
                                </div>
                            </div>

                            <!-- Love Input -->
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="love">Love:</label>
                                    <input type="range" id="love" name="love" min="0" max="5" class="w-full" value="0" required>
                                    <output for="love" id="love-output">0</output>
                                </div>
                            </div>

                            <!-- Health Input -->
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="health">Health:</label>
                                    <input type="range" id="health" name="health" min="0" max="5" class="w-full" value="0" required>
                                    <output for="health" id="health-output">0</output>
                                </div>
                            </div>

                            <!-- Fortune Input -->
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="fortune">Fortune:</label>
                                    <input type="range" id="fortune" name="fortune" min="0" max="5" class="w-full" value="0" required>
                                    <output for="fortune" id="fortune-output">0</output>
                                </div>
                            </div>


                            <!-- Description Input -->
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea class="form-control w-full" id="description" name="description" class="form-control w-full" rows="4"></textarea>
                                </div>
                            </div>

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
        // Get all range inputs
        const rangeInputs = document.querySelectorAll('input[type="range"]');

        // Loop through each range input
        rangeInputs.forEach(function(input) {
            // Get the associated output element
            const output = document.getElementById(input.id + '-output');

            // Set the initial value of the output element
            output.textContent = input.value;

            // Add event listener to update the output value as the range input changes
            input.addEventListener('input', function() {
                output.textContent = input.value;
            });

            // Set the initial value of the range input to 0
            input.value = 0;
        });
    </script>
@endsection
