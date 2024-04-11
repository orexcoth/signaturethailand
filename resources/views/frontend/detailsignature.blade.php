@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
// echo "<pre>";
// print_r($sign);
// echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
    
    <section class="Section-Detail-Signature">
        <div class="container">
            <div class="ColDetail-Signature">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img class="IMG-BigSignature" src="{{asset($sign->sign)}}" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center">
                        <div class="WarpColProfile-TeamSNG">
                            <div class="ColProfile-TeamSNG">
                                <p class="Text-20 Text-w500 Text-Gray-Label m-0">
                                    <span>
                                        <img class="IMG-Profile-TeamSNG" src="{{asset($sign->user->photo)}}" alt="">
                                    </span>
                                    {{$sign->user->name}}
                                </p>
                            </div>
                            <p class="Text-60 Text-W600 m-0">
                                @if($sign->lang == 'th')
                                {{$sign->name->name_th}}
                                @endif
                                @if($sign->lang == 'en')
                                {{$sign->name->name_en}}
                                @endif
                            </p>

                            <div class="Box-Maim-Star w-100">
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        งาน
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        @for ($i = 0; $i < $sign->work; $i++)
                                        <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $sign->work; $i < 5; $i++)
                                        <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        เงิน
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        @for ($i = 0; $i < $sign->finance; $i++)
                                        <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $sign->finance; $i < 5; $i++)
                                        <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        รัก
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        @for ($i = 0; $i < $sign->love; $i++)
                                        <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $sign->love; $i < 5; $i++)
                                        <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        สุขภาพ
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        @for ($i = 0; $i < $sign->health; $i++)
                                        <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $sign->health; $i < 5; $i++)
                                        <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="Box-Title-Star-Detail">
                                    <p class="Text-18 Text-W400 m-0">
                                        โชคลาภ
                                    </p>
                                    <div class="BoxStar-Deatail">
                                        @for ($i = 0; $i < $sign->fortune; $i++)
                                        <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $sign->fortune; $i < 5; $i++)
                                        <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <p class="Text-16 Text-W300 Text-Gray-Label my-2">
                                Lorem ipsum dolor sit am consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
                            </p>
                            <hr class="w-100 Color-Grey-HR my-4">
                            <div class="ColButton-Group">
                                <div class="BoxButton-Group1">
                                    <!-- Trigger/Open The Modal -->
                                    <button id="myBtnModal" class="ButtonModal me-3">ดาวน์โหลด</button>

                                    <!-- The Modal -->
                                    <div id="myModalAddSurname" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <div class="d-flex justify-content-end">
                                                <span class="close">&times;</span>
                                            </div>
                                            <p class="Text-24 Text-W500 text-center mb-4">ดาวน์โหลดตัวอย่างลายเซ็น</p>
                                            <div class="ColButton-DownloadSignature">
                                                <button id="BtnDownloadIMG" class="ButtonModal">ดาวน์โหลดภาพ</button>
                                                <button id="BtnDownloadVDO" class="ButtonModal">ดาวน์โหลดวิดีโอ</button>
                                            </div>
                                        </div>

                                    </div>

                                    <a class="btn ButtonAddSurname" href="{{route('preorderPage')}}">
                                        เพิ่มลายเซ็นนามสกุล
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    



@endsection

@section('script')

<script>
    $(document).ready(function() {
        // Handle click event for image download button
        $("#BtnDownloadIMG").click(function() {
            var imagePath = '<?php echo rawurlencode(asset($sign->sign)); ?>';
            initiateDownload(imagePath);
        });

        // Handle click event for video download button
        $("#BtnDownloadVDO").click(function() {
            var videoPath = '<?php echo rawurlencode(asset($sign->video)); ?>';
            initiateDownload(videoPath);
        });

        // Function to initiate download
        function initiateDownload(filePath) {
            // Decode the URL
            var decodedPath = decodeURIComponent(filePath);
            var link = document.createElement('a');
            link.href = decodedPath;
            link.download = decodedPath.split('/').pop(); // Set the download attribute to the filename
            link.click();
        }
    });
</script>
@endsection




