@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')

<?php
// echo "<pre>";
// print_r($package);
// echo "</pre>";
// echo "<pre>";
// print_r($preorder_type);
// echo "</pre>";
// echo "<pre>";
// print_r($preorder_type);
// echo "</pre>";
// echo "<pre>";
// print_r($preorder_type);
// echo "</pre>";
// echo "<pre>";
// print_r(count($namesen));
// echo "</pre>";
?>
<form method="post" action="{{route('fillininformationpreorderPage')}}">
    @csrf
    <section class="SectionCart">
        <div class="container">
            <div class="WarpRowCart">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="ColCartDetail">
                            <h1 class="Text-38 Text-W600">
                                ตะกร้าสินค้า
                            </h1>
                            <div class="BoxDetailCart">
                                <img class="IMGPen-CartPage d-none d-sm-none d-md-block d-lg-block d-xl-block" src="{{asset('frontend/images/cart/logo-cartpage.png')}}" alt="">
                                
                                
                                <div class="BoxName-DetailCart">
                                    <div class="ColDivBoxName">
                                        @if($package == 'combo' || $package == 'thai')
                                        <div class="ColBoxName-Head mb-2">
                                            <p class="Text-18 Text-W500 mb-0">
                                                <span>
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2_260)">
                                                            <path d="M15.1199 2.4C13.4999 0.9 11.3699 0 8.99988 0C6.62988 0 4.49988 0.9 2.87988 2.4H15.1199ZM2.87988 15.6C4.49988 17.1 6.62988 18 8.99988 18C11.3699 18 13.4999 17.1 15.1199 15.6H2.87988Z" fill="#ED4C5C" />
                                                            <path d="M0 9.00002C0 10.29 0.27 11.49 0.75 12.6H17.25C17.73 11.49 18 10.29 18 9.00002C18 7.71002 17.73 6.51002 17.25 5.40002H0.75C0.27 6.51002 0 7.71002 0 9.00002Z" fill="#2A5F9E" />
                                                            <path d="M2.88022 15.5999H15.0902C15.9902 14.7599 16.7402 13.7399 17.2202 12.5999H0.720215C1.26021 13.7399 1.98021 14.7599 2.88022 15.5999ZM15.1202 2.3999H2.88022C1.98021 3.2399 1.23021 4.2599 0.750215 5.3999H17.2502C16.7402 4.2599 16.0202 3.2399 15.1202 2.3999Z" fill="#F9F9F9" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2_260">
                                                                <rect width="18" height="18" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                ลายเซ็นภาษาไทย
                                            </p>
                                        </div>
                                        <div class="ColBoxName">
                                            @if($preorder_type == 'duo' || $preorder_type == 'firstname')
                                            <div class="BoxName">
                                                <p class="Text-18 Text-W500 me-lg-2 me-md-2 me-1 Margin-bt-1">
                                                    ชื่อ
                                                </p>
                                                <p class="Text-20 Text-W600 mb-0">
                                                    {{$firstname_th}}
                                                </p>
                                            </div>
                                            @endif
                                            @if($preorder_type == 'duo' || $preorder_type == 'lastname')
                                            <div class="BoxSurName">
                                                <p class="Text-18 Text-W500 me-lg-2 me-md-2 me-1 Margin-bt-1">
                                                    นามสกุล
                                                </p>
                                                <p class="Text-20 Text-W600 mb-0">
                                                    {{$lastname_th}}
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    <div class="ColDivBoxName">
                                        @if($package == 'combo' || $package == 'english')
                                        <div class="ColBoxName-Head mb-2">
                                            <p class="Text-18 Text-W500 mb-0">
                                                <span>
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2_261)">
                                                            <path d="M5.99977 17.49V13.35L2.90977 15.63C3.77977 16.44 4.82977 17.07 5.99977 17.49ZM11.9998 17.49C13.1698 17.07 14.2198 16.44 15.0898 15.63L11.9998 13.32V17.49ZM0.509766 12C0.599766 12.3 0.719766 12.57 0.869766 12.87L2.03977 12H0.509766ZM15.9598 12L17.1298 12.87C17.2498 12.6 17.3698 12.3 17.4898 12H15.9598Z" fill="#2A5F9E" />
                                                            <path d="M6.45018 10.7999H0.180176C0.270176 11.2199 0.390176 11.6099 0.510176 11.9999H2.04018L0.870176 12.8699C1.11018 13.3799 1.38018 13.8299 1.71018 14.2799L4.80018 11.9999H6.00018V12.5999L2.49018 15.1799L2.91018 15.5999L6.00018 13.3499V17.4899C6.39018 17.6399 6.78018 17.7299 7.20018 17.8199V10.7999H6.45018ZM17.8202 10.7999H10.8002V17.8199C11.2202 17.7299 11.6102 17.6099 12.0002 17.4899V13.3499L15.0902 15.5999C15.5102 15.2099 15.8702 14.7899 16.2302 14.3399L13.0202 11.9999H15.0602L16.8902 13.3499C16.9802 13.1999 17.0702 13.0199 17.1302 12.8699L15.9602 11.9999H17.4902C17.6102 11.6099 17.7302 11.2199 17.8202 10.7999Z" fill="white" />
                                                            <path d="M1.70996 14.28C1.94996 14.61 2.18996 14.91 2.45996 15.21L5.99996 12.63V12.03H4.79996L1.70996 14.28ZM13.05 12L16.26 14.34C16.38 14.19 16.47 14.04 16.59 13.89C16.62 13.86 16.62 13.83 16.65 13.83C16.74 13.68 16.86 13.5 16.95 13.35L15.06 12H13.05Z" fill="#ED4C5C" />
                                                            <path d="M11.9998 0.509888V4.64989L15.0898 2.36989C14.2198 1.55989 13.1698 0.929888 11.9998 0.509888ZM5.99977 0.509888C4.82977 0.929888 3.77977 1.55989 2.90977 2.36989L5.99977 4.67989V0.509888ZM17.4898 5.99989C17.3998 5.69989 17.2798 5.42989 17.1298 5.12989L15.9598 5.99989H17.4898ZM2.03977 5.99989L0.869766 5.12989C0.749766 5.42989 0.629766 5.69989 0.509766 5.99989H2.03977Z" fill="#2A5F9E" />
                                                            <path d="M11.5502 7.20005H17.7902C17.7002 6.78005 17.5802 6.39005 17.4602 6.00005H15.9302L17.1002 5.13005C16.8602 4.62005 16.5902 4.17005 16.2602 3.72005L13.2002 6.00005H12.0002V5.40005L15.5102 2.82005L15.0902 2.40005L12.0002 4.65005V0.510054C11.6102 0.360054 11.2202 0.270054 10.8002 0.180054V7.20005H11.5502ZM0.180176 7.20005H7.20018V0.180054C6.78018 0.270054 6.39018 0.390054 6.00018 0.510054V4.65005L2.91018 2.40005C2.49018 2.79005 2.13018 3.21005 1.77018 3.66005L4.98018 6.00005H2.94018L1.11018 4.65005C1.02018 4.80005 0.930176 4.98005 0.870176 5.13005L2.04018 6.00005H0.510176C0.390176 6.39005 0.270176 6.78005 0.180176 7.20005Z" fill="white" />
                                                            <path d="M16.2901 3.72004C16.0501 3.39004 15.8101 3.09004 15.5401 2.79004L12.0001 5.37004V5.97004H13.2001L16.2901 3.72004ZM4.95008 6.00004L1.77008 3.66004C1.65008 3.81004 1.56008 3.96004 1.44008 4.11004C1.41008 4.14004 1.41008 4.17004 1.38008 4.17004C1.29008 4.32004 1.17008 4.50004 1.08008 4.65004L2.91008 6.00004H4.95008Z" fill="#ED4C5C" />
                                                            <path d="M17.82 7.2H10.8V0.18C10.23 0.06 9.63 0 9 0C8.37 0 7.77 0.06 7.2 0.18V7.2H0.18C0.06 7.77 0 8.37 0 9C0 9.63 0.06 10.23 0.18 10.8H7.2V17.82C7.77 17.94 8.37 18 9 18C9.63 18 10.23 17.94 10.8 17.82V10.8H17.82C17.94 10.23 18 9.63 18 9C18 8.37 17.94 7.77 17.82 7.2Z" fill="#ED4C5C" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2_261">
                                                                <rect width="18" height="18" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                ลายเซ็นภาษาอังกฤษ
                                            </p>
                                        </div>
                                        <div class="ColBoxName">
                                            @if($preorder_type == 'duo' || $preorder_type == 'firstname')
                                            <div class="BoxName">
                                                <p class="Text-18 Text-W500 me-lg-2 me-md-2 me-1 Margin-bt--2">
                                                    ชื่อ
                                                </p>
                                                <p class="Text-20 Text-W600 mb-0">
                                                    {{$firstname_en}}
                                                </p>
                                            </div>
                                            @endif
                                            @if($preorder_type == 'duo' || $preorder_type == 'lastname')
                                            <div class="BoxSurName">
                                                <p class="Text-18 Text-W500 me-lg-2 me-md-2 me-1 Margin-bt--2">
                                                    นามสกุล
                                                </p>
                                                <p class="Text-20 Text-W600 mb-0">
                                                    {{$lastname_en}}
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    <div class="ColTrash-Cart">
                                        
                                        <div class="BoxName">
                                            <p class="Text-18 Text-W500 me-lg-2 me-md-2 me-1 Margin-bt--2">
                                                ราคา
                                            </p>
                                            <p class="Text-20 Text-W600 mb-0 Text-Green-Gardien">
                                                255
                                            </p>
                                        </div>
                                        <!-- <button class="ButtonTrash">
                                            <img src="{{asset('frontend/images/cart/icon_trash.svg')}}" alt="">
                                        </button> -->
                                    </div>
                                </div>
                                


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="ColBoxAns">
                            <h1 class="Text-38 Text-W600 mb-lg-5 mb-md-3 mb-3">
                                สรุปการชำระเงิน
                            </h1>
                            <div class="BoxAnsPrice mt-5 pb-lg-3">
                                <p class="mb-0 Text-20 Text-W500">
                                    จำนวน:
                                </p>
                                <p class="mb-0 Text-20 Text-W500">
                                    1
                                </p>
                            </div>
                            <div class="BoxAnsPrice BorDer-bt-Grey pb-lg-3 mb-lg-3">
                                <p class="mb-0 Text-20 Text-W500">
                                    ราคา:
                                </p>
                                <p class="mb-0 Text-20 Text-W500">
                                    255.00
                                </p>
                            </div>
                            <div class="BoxAnsPrice pb-lg-5">
                                <p class="mb-0 Text-24 Text-W500">
                                    ราคารวมทั้งหมด:
                                </p>
                                <p class="mb-0 Text-24 Text-W500">
                                    255.00
                                </p>
                            </div>

                            <input type="hidden" name="package" value="{{$package}}" />
                            <input type="hidden" name="preorder_type" value="{{$preorder_type}}" />
                            <input type="hidden" name="firstname_th" value="{{$firstname_th}}" />
                            <input type="hidden" name="lastname_th" value="{{$lastname_th}}" />
                            <input type="hidden" name="firstname_en" value="{{$firstname_en}}" />
                            <input type="hidden" name="lastname_en" value="{{$lastname_en}}" />
                            <input type="hidden" name="work" value="{{$work}}" />
                            <input type="hidden" name="finance" value="{{$finance}}" />
                            <input type="hidden" name="love" value="{{$love}}" />
                            <input type="hidden" name="health" value="{{$health}}" />
                            <input type="hidden" name="fortune" value="{{$fortune}}" />
                            <input type="hidden" name="TargetPreorder" value="{{$TargetPreorder}}" />
                            <input type="hidden" name="name" value="{{$name}}" />
                            <input type="hidden" name="dob" value="{{$dob}}" />
                            <input type="hidden" name="telephone" value="{{$telephone}}" />
                            <input type="hidden" name="SelectStatus" value="{{$SelectStatus}}" />
                            <input type="hidden" name="occupation" value="{{$occupation}}" />
                            <input type="hidden" name="EverSignature" value="{{$EverSignature}}" />
                            <input type="hidden" name="mysignature" value="{{$mysignature}}" />
                            <input type="hidden" name="ProblemPreorder" value="{{$ProblemPreorder}}" />
                            <input type="hidden" name="DeliverSignature" value="{{$DeliverSignature}}" />

                            <input type="hidden" name="preorder_price" value="255" />



                            <button type="submit" class="btn Button-NextCart" >
                                ถัดไป
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>
    



@endsection

@section('script')

@endsection










