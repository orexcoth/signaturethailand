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

    <section class="Section-ProductIndex">
        <div class="container">
            <div class="BoxJustify-HeaderText">
                <h1 class="TextHead-Gold">
                    คลังลายเซ็นภาษาไทย
                </h1>
                <!-- <a class="btn ButtonSeemore-NoBG" href="allproduct-th.php">
                    ดูลายเซ็นทั้งหมด
                    <img src="./images/icon/ic-right.svg" alt="">
                </a> -->
            </div>
            <hr class="w-100 Color-Grey-HR">
            <br>
            <div>
                <div class="row Row-Product">
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                    <?php require('inc_productfree1.php'); ?>
                </div>
            </div>
            <div class="BoxPagination d-flex justify-content-center">
                <div class="pagination PaginationProduct mt-5">
                    <a href="#">&laquo;</a>
                    <a class="active" href="#">1</a>
                    <a class="" href="#">2</a>
                    <a class="" href="#">3</a>
                    <a class="" href="#">4</a>
                    <a class="" href="#">5</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </section>



    <?php require('inc_menupreorder.php'); ?>

    <?php require('inc_footer.php'); ?>

</body>

</html>