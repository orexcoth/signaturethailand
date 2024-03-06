<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php require('inc_header.php');
    $pageName = "index"; ?>
</head>

<body>

    <?php require('inc_topmenu.php'); ?>

    <?php require('inc_menusignature.php'); ?>

    <?php require('inc_searchsignature.php'); ?>

    <section class="Section-SelectPackage">
        <div class="container">
            <div class="BoxSelectPackage">
                <p class="Text-24 Text-W500 m-0">
                    <span>
                        <img class="IC-PenLine" src="./images/icon/ic-pen-line.svg" alt="">
                    </span>
                    ลายเซ็น
                </p>

                <div class="BoxnameSignature">
                    <div class="Box-Text-Search-Left">
                        <p class="Text-Search-TH mb-0 Text-48 Text-W600 Text-LineHeight-50">
                            ธนกานต์
                        </p>
                    </div>
                    <div class="Box-Text-Search-Right">
                        <p class="Text-Search-TH mb-0 Text-48 Text-W600 Text-LineHeight-50">
                            Tanakan
                        </p>
                    </div>
                </div>

                <div class="Col-DD-SelectPackage">
                    <!-- <div class="dropdown DropdownPackage">
                        <label for="dropdown" class="me-3 Text-24 Text-W500">
                            เลือกแพ็คเกจ
                        </label>
                        <button class="btn dropdown-toggle DropdownBox-SelectPackage" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            กรุณาเลือก
                        </button>
                        <ul class="dropdown-menu DropdownBoxList">
                            <li><a class="dropdown-item ListDropDown" href="#">แพ็คเกจลายเซ็นภาษาไทย</a></li>
                            <li><a class="dropdown-item ListDropDown" href="#">แพ็คเกจลายเซ็นภาษาอังกฤษ</a></li>
                            <li><a class="dropdown-item ListDropDown" href="#">แพ็คเกจลายเซ็นภาษาไทยและภาษาอังกฤษ</a></li>
                        </ul>
                    </div> -->
                    <div class="DropdownPackage">
                        <!-- <label class="me-3 Text-24 Text-W500" for="Select-OptionVerSignature">เลือกแพ็คเกจ</label> -->
                        <h3 class="mb-0 Text-24 Text-W500 w-55">เลือกแพ็คเกจ</h3>
                        <select name="Select-OptionVerSignature" id="Select-OptionVerSignature" class="DropdownBox-SelectPreorder">
                            <option class="OptionSelect" value="Signature-VerTH">แพ็คเกจลายเซ็นภาษาไทย</option>
                            <option class="OptionSelect" value="Signature-VerEN">แพ็คเกจลายเซ็นภาษาอังกฤษ</option>
                            <option class="OptionSelect" value="Signature-VerAll">แพ็คเกจลายเซ็นภาษาไทยและภาษาอังกฤษ</option>
                        </select>
                    </div>
                    <div class="BoxPricePackage">
                        <p class="mb-0 Text-24 Text-W500">
                            ราคา
                            <span class="Text-W600 Text-Green-Gardien">
                                50.00
                            </span>
                        </p>
                    </div>
                </div>
                <a class="btn ButtonSeemore" href="">
                    สั่งซื้อลายเซ็นชื่อนี้
                </a>

            </div>
        </div>
    </section>

    <section class="Section-Product">
        <div class="container">
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาไทย
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-th.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->

            </div>
            <!-- <hr class="w-100 Color-Grey-HR"> -->
            <br>
            <div>
                <div class="row Row-Product">
                    <?php require('inc_product_search.php'); ?>
                    <?php require('inc_product_search.php'); ?>
                </div>
            </div>

            <div class="BoxJustify-HeaderText mt-5">
                <h1 class="TextHead-Gold">
                    ลายเซ็นภาษาอังกฤษ
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-en.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->
            </div>
            <!-- <hr class="w-100 Color-Grey-HR"> -->
            <br>
            <div>
                <div class="row Row-Product">
                    <?php require('inc_product_search.php'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php require('inc_menupreorder.php'); ?>

    <?php require('inc_footer.php'); ?>

</body>

</html>