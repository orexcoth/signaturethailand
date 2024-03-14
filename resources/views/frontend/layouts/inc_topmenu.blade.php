<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">

    <nav class="nav navbar-main navbar-fixed-top">
        <div class="container">
            <div class="row d-flex align-items-lg-center">
                <div class="col-2">
                    <a class="nav-link text-nav" aria-current="page" href="index.php">
                        <img class="LogoNav" src="./images/icon/Icon-Logo.svg" alt="">
                    </a>
                </div>
                <div class="col-10">
                    <ul class="nav d-flex justify-content-end align-items-center">
                        <li class="nav-item">
                            <a class="nav-link text-nav active" href="index.php">
                                <span>
                                    <img class="IC-Home" src="./images/navbar/ic_home.svg" alt="">
                                </span>
                                หน้าหลัก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="about.php">เกี่ยวกับเรา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="product.php">คลังลายเซ็น</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="article.php">บทความ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="contact.php">ทีมงานของเรา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nav" href="contact.php">ติดต่อเรา</a>
                        </li>
                        <li class="nav-item BoxNav-TextEnd">
                            <a class="nav-link text-nav text-nav-end" href="history.php">ประวัติการสั่งซื้อ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</div>


<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
    <nav class="navbar nav-main-md d-flex navbar-fixed-top">
        <div class="container">
            <a class="nav-link text-nav" aria-current="page" href="index.php">
                <img class="LogoNav" src="./images/icon/Icon-Logo.svg" alt="">
            </a>
            <button class="btn btn-menu-mobile" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-menu" aria-controls="offcanvasRight">
                <img class="ICMenu" src="./images/navbar/ic-menu.svg" alt="">
            </button>
            <div class="offcanvas offcanvas-end offcanvasMenu" tabindex="-1" id="offcanvasRight-menu" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <a class="nav-link text-nav" aria-current="page" href="index.php">
                        <img class="LogoNav" src="./images/navbar/Logo-Black2.svg" alt="">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="col-box-menu-mobile">
                        <a class="nav-link text-nav active" href="index.php">
                            <span>
                                <img class="mb-1" src="./images/navbar/IC-rightNav.svg" alt="">
                            </span>
                            หน้าหลัก</a>
                    </div>
                    <div class="col-box-menu-mobile">
                        <a class="nav-link text-nav" href="about.php">
                            <span>
                                <img class="mb-1" src="./images/navbar/IC-rightNav.svg" alt="">
                            </span>
                            เกี่ยวกับเรา</a>
                    </div>
                    <div class="col-box-menu-mobile">
                        <a class="nav-link text-nav" href="courses.php">
                            <span>
                                <img class="mb-1" src="./images/navbar/IC-rightNav.svg" alt="">
                            </span>
                            คลังลายเซ็น</a>
                    </div>
                    <div class="col-box-menu-mobile">
                        <a class="nav-link text-nav" href="news.php">
                            <span>
                                <img class="mb-1" src="./images/navbar/IC-rightNav.svg" alt="">
                            </span>
                            บทความ</a>
                    </div>
                    <div class="col-box-menu-mobile">
                        <a class="nav-link text-nav" href="faq.php">
                            <span>
                                <img class="mb-1" src="./images/navbar/IC-rightNav.svg" alt="">
                            </span>
                            ติดต่อเรา</a>
                    </div>
                    <div class="col-box-menu-mobile">
                        <a class="nav-link text-nav" href="faq.php">
                            <span>
                                <img class="mb-1" src="./images/navbar/IC-rightNav.svg" alt="">
                            </span>
                           ประวัติการสั่งซื้อ</a>
                    </div>
                    <!-- <div class="col-box-menu-mobile-login">
                        <div class="BoxLanguage">
                            <span>
                                <button class="text-language"><img src="./images/nav/TH.svg" alt="">TH</button>
                            </span>
                            /
                            <span>
                                <button class="text-language"><img src="./images/nav/EN.svg" alt="">EN</button>
                            </span>
                        </div>
                    </div> -->
                </div>
            </div>

    </nav>
</div>


<script>
    $(function() {
        $(document).scroll(function() {
            var $nav = $(".navbar-fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
</script>