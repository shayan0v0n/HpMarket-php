<?php

require_once './server/setupDB.php';
$setupDatabase = new SetupDB();

if (!$setupDatabase-> checkErrorExist("apache")) {
    $categoriesData = $setupDatabase-> getDatabaseData("categories");
    $categoriesPageOne = array_slice($categoriesData, 3);
    $categoriesPageTwo = array_slice($categoriesData, 3, 6);
    $blogData = $setupDatabase-> getDatabaseData("blog");
    $blogDataOne = array_slice($blogData, 0, 1);
    $blogDataTwo = array_slice($blogData, 2, 3);
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lib/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./lib/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="./styles/globalStyles.css">
    <link rel="stylesheet" href="./styles/index.css">
    <title>PHPHp Market</title>
</head>
<body dir="rtl">
    <?php if ($setupDatabase-> checkErrorExist("apache")) { ?>
        <div class="text-center py-2 error-bar">
            لطفا xampp خود را روشن کنید.
        </div>
    <?php };?>
                <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/shop.php">فروشگاه</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/blog.php">مقالات</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/about-us.php">درباره ما</a>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="navbar-brand">
                    <a href="/account"><i class="fa-solid fa-user p-1"></i></a>
                    <a href="/cart"><i class="fa-solid fa-cart-shopping p-1"></i></a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="baner-custom">
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-sm-12 col-md-6 d-none d-md-block">
                    <img class="fluid w-75" src="./assets/imgs/website.svg" />
                </div>
                <div class="col-sm-12 col-md-6">
                    <h1>بهترین فروشگاه Hp کشور</h1>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                    <a href="/shop.php">
                        <button class="btn w-100 baner-btn">همین الان خرید کن!</button>
                    </a>
                </div>
            </div>
        </section>
        <section class="container py-3">
            <h2>دسته بندی محصولات Hp</h2>
            <span>از این قسمت محصول مورد نظر خود را راحت تر پیدا کنید.</span>
            <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php if (!$setupDatabase-> checkErrorExist("apache")) { ?>
                                <?php foreach($categoriesPageOne as $item) { ?>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="card m-2 p-3 d-flex align-items-center category-card">
                                            <img src="./assets/imgs/<?= $item["imgPath"]?>" class="card-img-top fluid w-50">
                                            <div class="card-body">
                                                <h5 class="card-title text-center"><?= $item["name"] ?></h5>
                                                <p class="card-text text-right"><?= $item["description"] ?></p>
                                                <a class="btn btn-primary w-100" href="/categories/<?= $item["name"] ?>.php">اطلاعات بیشتر</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                <?php } else {?>
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a>
                                                </div>
                                                <div class="card-body">
                                                    <span class="placeholder col-8 m-1"></span>
                                                    <span class="placeholder col-6 m-1"></span>
                                                    <span class="placeholder col-4 m-1"></span>
                                                    <span class="placeholder col-8 m-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a>
                                                </div>
                                                <div class="card-body">
                                                    <span class="placeholder col-8 m-1"></span>
                                                    <span class="placeholder col-6 m-1"></span>
                                                    <span class="placeholder col-4 m-1"></span>
                                                    <span class="placeholder col-8 m-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a>
                                                </div>
                                                <div class="card-body">
                                                    <span class="placeholder col-8 m-1"></span>
                                                    <span class="placeholder col-6 m-1"></span>
                                                    <span class="placeholder col-4 m-1"></span>
                                                    <span class="placeholder col-8 m-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?php if (!$setupDatabase-> checkErrorExist("apache")) { ?>
                                <?php foreach($categoriesPageTwo as $item) { ?>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="card m-2 p-3 d-flex align-items-center category-card">
                                        <img src="./assets/imgs/<?= $item["imgPath"]?>" class="card-img-top fluid w-50">
                                        <div class="card-body">
                                            <h5 class="card-title text-center"><?= $item["name"] ?></h5>
                                            <p class="card-text text-right"><?= $item["description"] ?></p>
                                            <a class="btn btn-primary w-100" href="/categories/<?= $item["name"] ?>.php">اطلاعات بیشتر</a>
                                        </div>
                                        </div>
                                    </div>
                                <?php }?>
                                <?php } else {?>
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a>
                                                </div>
                                                <div class="card-body">
                                                    <span class="placeholder col-8 m-1"></span>
                                                    <span class="placeholder col-6 m-1"></span>
                                                    <span class="placeholder col-4 m-1"></span>
                                                    <span class="placeholder col-8 m-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a>
                                                </div>
                                                <div class="card-body">
                                                    <span class="placeholder col-8 m-1"></span>
                                                    <span class="placeholder col-6 m-1"></span>
                                                    <span class="placeholder col-4 m-1"></span>
                                                    <span class="placeholder col-8 m-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a>
                                                </div>
                                                <div class="card-body">
                                                    <span class="placeholder col-8 m-1"></span>
                                                    <span class="placeholder col-6 m-1"></span>
                                                    <span class="placeholder col-4 m-1"></span>
                                                    <span class="placeholder col-8 m-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="intoProduct mt-3">
            <div class="text-center">
                <h2>HP Spectre x360 14</h2>
                <span>قدرتی برای تغییر همه‌چیز</span>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <div class="mb-5">
                        <h3>سرعت باورنکردنی</h3>
                        <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. . 
                        </p>
                    </div>
                    <div class="mb-5">
                        <h3>زیبایی دیزاین</h3>
                        <p>
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.. 
                        </p>
                    </div>
                    <div class="mb-5">
                        <h3>امنیت بالای سیستم</h3>
                        <p>
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.. 
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img src="./assets/imgs/HP Spectre x360 14.webp" class="w-75" />
                </div>
            </div>
        </section>
        <section class="p-5 m-0">
            <?php if (!$setupDatabase-> checkErrorExist("apache")) { ?>
                <div class="row">
                    <?php foreach($blogDataTwo as $item) { ?>
                        <div class="col-12 col-md-6 d-flex justify-content-center flex-column">
                            <div>
                                <h2 class="mb-3"><?= $item["name"]?></h2>
                            <p><?= $item["body"]?></p>
                            <div class="text-center link-box">
                                    <a href="#">خرید کنید</a>
                                    <span>|</span>
                                    <a href="#">اطلاعات بیشتر</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center">
                            <img src='./assets/imgs/<?= $item["imgPath"] ?>' class="w-75 rounded border m-2" />
                        </div>
                    <?php }?>
                </div>
            <?php } else {?>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-center flex-column">
                        <div>
                            <h2 class="mb-3"><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a></h2>
                            <span class="placeholder col-8 m-1"></span>
                            <span class="placeholder col-6 m-1"></span>
                            <span class="placeholder col-4 m-1"></span>
                            <span class="placeholder col-7 m-1"></span>
                            <span class="placeholder col-4 m-1"></span>
                            <span class="placeholder col-11 m-1"></span>
                            <span class="placeholder col-6 m-1"></span>
                            <span class="placeholder col-4 m-1"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <img src='./assets/imgs/c.png' class="w-75 rounded border m-2" />
                    </div>
                </div>
            <?php }?>
        </section>
        <section class=" p-5 m-0">
            <?php if (!$setupDatabase-> checkErrorExist("apache")) { ?>
                <div class="row">
                    <?php foreach($blogDataOne as $item) { ?>
                        <div class="col-12 col-md-6 text-center">
                            <img src='./assets/imgs/<?= $item["imgPath"] ?>' class="w-75 rounded border m-2" />
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-center flex-column">
                                <div>
                                    <h2 class="mb-3"><?= $item["name"]?></h2>
                                    <p><?= $item["body"]?></p>
                                    <div class="text-center link-box">
                                        <a href="#">خرید کنید</a>
                                        <span>|</span>
                                        <a href="#">اطلاعات بیشتر</a>
                                    </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            <?php } else {?>
                <div class="row">
                    <div class="col-12 col-md-6 text-center">
                            <img src='./assets/imgs/c.png' class="w-75 rounded border m-2" />
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-center flex-column">
                            <div>
                            <h2 class="mb-3"><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a></h2>
                                <span class="placeholder col-8 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-7 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-11 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </section>
        <section class="blog-place">
            <div class="text-center">
                <h2>در مورد HP بیشتر و بشتر بدانیم</h2>
                <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                </p>
                <a href="/blog">
                    <button class="btn btn-primary">مطالب بیشتر</button>
                </a>
            </div>
            <?php if (!$setupDatabase-> checkErrorExist("apache")) { ?>
                <div class="row mt-3">
                    <?php foreach($blogData as $item) { ?>
                        <div class="col-12 col-md-4">
                            <div class="card m-3 p-2 blogCardStyle">
                                <img src="./assets/imgs/<?= $item["imgPath"] ?>" />
                                <div class="card-body">
                                    <h4 class="card-title"><?= $item["name"] ?></h4>
                                    <p class="card-text"><?= $item["body"] ?></p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <span><i class="fa fa-eye mx-1"></i><?= $item["view_count"] ?></span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span><i class="fas fa-thumbs-up mx-2"></i><?= $item["likes"] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card m-3 p-2 blogCardStyle">
                            <img src="./assets/imgs/c.png" />
                            <div class="card-body">
                                <h4 class="card-title"><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a></h4>
                                <span class="placeholder col-8 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-7 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-11 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card m-3 p-2 blogCardStyle">
                            <img src="./assets/imgs/c.png" />
                            <div class="card-body">
                                <h4 class="card-title"><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a></h4>
                                <span class="placeholder col-8 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-7 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-11 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card m-3 p-2 blogCardStyle">
                            <img src="./assets/imgs/c.png" />
                            <div class="card-body">
                                <h4 class="card-title"><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a></h4>
                                <span class="placeholder col-8 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-7 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                                <span class="placeholder col-11 m-1"></span>
                                <span class="placeholder col-6 m-1"></span>
                                <span class="placeholder col-4 m-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </section>
    </main>

                <!-- FOOTER -->
    <footer class="footer">
        <div class="row">
            <div class="col-12 col-md-2 text-center">
                <div class="row">
                    <div class="col-md-12 col-4 d-block d-md-none"><hr /></div>
                    <div class="col-md-12 col-3"><h2>PHP Hp</h2></div>
                    <div class="col-md-12 col-4 d-block d-md-none"><hr /></div>
                </div>
            </div>
            <div class="col-12 col-md-8 d-none d-md-block"><hr /></div>
            <div class="col-12 col-md-2 d-none d-md-block">
                <div class="m-0">
                    <i class="fa-brands fa-youtube mx-1"></i>
                    <i class="fa-brands fa-facebook mx-1"></i>
                    <i class="fa-brands fa-twitter mx-1"></i>
                    <i class="fa-brands fa-instagram mx-1"></i>
                    <i class="fa-brands fa-telegram mx-1"></i>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <div class="m-3">
                    <h4>داستان ما</h4>
                    <hr />
                    <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                    </p>
                    <a href="/about-us.php">مشاهده اطلاعات بیشتر</a>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="m-3">
                    <h4>صفحات دیگر</h4>
                    <hr />
                    <ul>
                        <li><a href="/">صفحه اصلی</a></li>
                        <li><a href="/shop.php">فروشگاه</a></li>
                        <li><a href="/blog.php">مقالات</a></li>
                        <li><a href="/about-us.php">درباره ما</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="m-3">
                    <h4>ارتباط با ما</h4>
                    <hr />
                    <p><i class="fa-brands fa-telegram"></i><span class="mx-5">@shayan_v_n</span></p>
                    <p><i class="fa-brands fa-instagram"></i><span class="mx-5">@shayan._vn</span></p>
                    <p><i class="fa-brands fa-github"></i><span class="mx-5">@shayan0v0n</span></p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="./lib/bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js"></script>
<script src="./lib/fontawesome-free-6.1.1-web/js/all.js"></script>
<script src="./lib/jquery.js"></script>
</html>