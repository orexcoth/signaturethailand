@extends('../frontend/layouts/layout')

@section('subhead')
    <!-- <title>Signature Thailand - หน้าหลัก</title> -->
@endsection

@section('content')
<?php
// echo "<pre>";
// print_r($slide);
// echo "</pre>";
?>

    <section class="Section-AboutIndex">
        <div class="container">
            <div class="WarperAboutIndex">
                <h1 class="TextSecon-Black">
                    Signature Thailand
                </h1>
                <br>
                <p class="TextDetail-Black">
                    Signature Thailand เกิดขึ้นได้ด้วยแรงบันดาลใจ อยากให้คนไทยได้มีลายเซ็นมงคลที่ถูกต้องตามหลักของศาสตร์ลายเซ็นมงคลเสริมชีวิต จึงได้รวบรวมอาจารย์นักออกแบบลายเซ็น ที่มีแนวคิดอุดมการณ์เดียวกันเข้ามาร่วมสร้างสรรค์ผลงานการออกแบบลายเซ็นให้ทุกคนได้ประจักษ์ เพื่อให้คนที่สนใจอยากจะมีลายเซ็นมงคลเป็นของตัวเอง สามารถเข้าถึงได้ง่ายและได้ลายเซ็นมงคลที่เป็นชื่อของตนเอง ประกอบกับมีแบบลายเซ็นมงคลให้เลือกหลากหลายแบบ รวมทั้งได้มีการบอกคุณลักษณะเด่นของลายเซ็นแต่ละแบบเพื่อช่วยในการตัดสินใจเลือกใช้ลายเซ็นให้เหมาะสมกับตนเองทั้งหน้าที่การงาน การเงิน ความรัก สุขภาพ โชคลาภ ความสำเร็จฯ
                    โดยมีความเชื่อที่ว่า ลายเซ็นมงคลจะช่วยเสริมดวงชะตา เปลี่ยนชีวิตจากร้ายกลายเป็นดี เสริมดวงชะตาชีวิตให้รุ่งโรจน์ เสริมส่งด้าน การงาน การทำธุรกิจ เสริมการเงินดี มีสภาพคล่อง การเจรจาประสบผลสำเร็จดี ได้รับความเชื่อถือ ส่งเสริมภาพลักษณ์ให้มีเสน่ห์ โดดเด่นเหนือกว่าใคร จะทำการอะไรก็ได้รับการสนันสนุนเป็นอย่างดี มีบริวารดีคอยให้การช่วยเหลือ และมีผู้คอยให้การอุปถัมภ์ค้ำชู มีความรักดีครอบครัวอบอุ่น ช่วยเหลือเกื้อกูลสนับสนุนกันเป็นอย่างดี เรื่องสุขภาพดี การงานธุรกิจก้าวหน้า ส่งเสริมให้ชีวิตประสบความสำเร็จ มีโชคลาภ ได้รับโอกาสดีเข้ามาในชีวิต ทั้งหมดที่กล่าวมา
                </p>
                <br>
                <p class="TextDetail-Black">
                    จึงเป็นที่มาของ “Signature Thailand ศูนย์รวมลายเซ็นมงคลที่ใหญ่ที่สุดในประเทศไทย”
                </p>
                <br>
                <p class="TextDetail-Black">
                    สุดท้ายนี้ ทีมงานอาจารย์และนักออกแบบลายเซ็น Signature Thailand ขออวยพรให้ทุกท่าน ประสบแต่ความสุข ความเจริญ คิดหวังสิ่งใดที่เป็นเรื่องดี ของให้ทุกท่านสมปรารถนาทุกประการ ด้วยกันทุกท่านนะครับ
                </p>
                <br>
                <p class="TextDetail-Black">
                    Signature Thailand Official
                </p>
                <br>
                <!-- <div class="BoxIconWeb">
                    <img class="IconWeb" src="./images/index/icon-1.svg" alt="">
                    <img class="IconWeb" src="./images/index/icon-2.svg" alt="">
                    <img class="IconWeb" src="./images/index/icon-3.svg" alt="">
                    <img class="IconWeb" src="./images/index/icon-4.svg" alt="">
                </div> -->
                <a class="btn ButtonSeemore" href="">
                    ดูเพิ่มเติม
                </a>
            </div>
        </div>
        <div class="DivPen">
            <img class="IMG-Pen" src="./images/index/pen.png" alt="">
        </div>
    </section>

    <section class="Section-ProductIndex">
        <div class="container">
            <h1 class="TextHead-Gold text-align-center">
                คลังลายเซ็นฟรี
            </h1>
            <form role="search">
                <div class="search BoxSearch">
                    <input type="text" class="InputSearchBG-grey w-100" placeholder="พิมพ์ชื่อเพื่อค้นหาลายเซ็น">
                    <!-- <a class="btn searchButton" href="search-results.php">ค้นหาลายเซ็น</a> -->
                    <button type="submit" class="searchButton">
                        ค้นหาลายเซ็น
                    </button>
                </div>
            </form>
            <br>
            <hr class="w-100 Color-Grey-HR">
            <br>
            <div>
                <div class="row Row-Product">
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                    @include('frontend.layouts.inc_productfree1')
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn ButtonSeemore mt-5" href="product.php">
                    คลังลายเซ็น
                    <span>
                        <img class="ms-1" src="./images/index/ic_pen.svg" alt="">
                    </span>
                </a>
            </div>
        </div>
    </section>


<script>

</script>
@endsection

@section('script')

@endsection


