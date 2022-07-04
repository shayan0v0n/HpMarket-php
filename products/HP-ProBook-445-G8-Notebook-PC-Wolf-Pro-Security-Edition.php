<?php
require_once '../server/setupDB.php';
require_once '../server/getDatabase.php';
require_once '../server/control.php';
$setupDatabase = new SetupDB();
$getDatabase = new GetDatabase();
$control = new Control();

if (!$setupDatabase-> checkErrorExist("apache")) {
    $prevURL = $_SERVER["REQUEST_URI"];
    $currentURL = $control-> getCurrentUrl($prevURL, "s");
    $currentUrlName = $control-> changeUrlToName($currentURL);
    $currentProduct =  $getDatabase-> getCustomData("products", "name", $currentUrlName);
    $getProductComments =  $getDatabase-> getCustomData("productComments", "productID", $currentProduct[0]["id"]);

    if (isset($_POST['fullname']) && isset($_POST["comment"])) {
        $getDatabase-> setProductComment($_POST['fullname'], $_POST['comment'], $currentProduct[0]["id"]);
    }
};

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/globalStyles.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/products.css">
    <title>Hp Market - <?= $currentProduct[0]["name"]?></title>
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
                        <a class="nav-link " aria-current="page" href="/">صفحه اصلی</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="dropdown" href="/shop.php">فروشگاه </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-center" href="/shop/desktop-business.php">دسکتاپ بیزنیس</a></li>
                                <li><a class="dropdown-item text-center" href="/shop/desktop.php">دسکتاپ</a></li>
                                <li><a class="dropdown-item text-center" href="/shop/laptop-business.php">لپ تاپ بیزنس</a></li>
                                <li><a class="dropdown-item text-center" href="/shop/laptop-gaming.php">لپ تاپ گیمینگ</a></li>
                                <li><a class="dropdown-item text-center" href="/shop/laptop.php">لپ تاپ</a></li>
                                <li><a class="dropdown-item text-center" href="/shop/zworkstation.php">زد ورک استیشن</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="/blog.php">مقالات</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/about-us.php">درباره ما</a>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="navbar-brand">
                    <a href="/account.php"><i class="fa-solid fa-user p-1"></i></a>
                    <a href="/cart.php"><i class="fa-solid fa-cart-shopping p-1"></i></a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php if (!$setupDatabase-> checkErrorExist("apache")) {?>
            <div class="product-banner">
                <div class="row">
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <h2><?= $currentProduct[0]["name"] ?></h2>
                        <p><?= $currentProduct[0]["description"] ?></p>
                        <div class="row">
                            <div class="col-12 col-md-6"><button class="btn btn-primary w-100">خرید</button></div>
                            <div class="col-12 col-md-6"><span>قیمت: <?= $currentProduct[0]["price"] ?></span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <img src="/assets/imgs/<?= $currentProduct[0]["imgPath"] ?>" class="w-50" />
                    </div>
                </div>
            </div>
            <div class="product-form">
                <form method="POST" action="./<?= $currentURL?>.php">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="شایان وثوقی" name="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">نظر</label>
                        <textarea class="form-control" id="exampleFormControlInput1" placeholder="نظر من اینه که..." name="comment"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="w-100 btn btn-primary">ارسال</button>
                    </div>
                </form>
            </div>
            <div class="product-comments">
                <?php foreach($getProductComments as $item) {?>
                    <div class="product-comment">
                        <h4><?= $item["name"]?></h4>
                        <p><?= $item["comment"]?></p>
                    </div>
                <?php }?>
            </div>
            <?php }else {?>
                <div class="product-banner">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <h2><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a></h2>
                        <span class="placeholder col-8 m-1"></span>
                        <span class="placeholder col-6 m-1"></span>
                            <div class="row">
                                <div class="col-6 "><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-12 m-2" aria-hidden="true"></a></div>
                                <div class="col-6 "><span class="placeholder col-12 m-2"></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center">
                            <img src="/assets/imgs/c.png" class="w-50" />
                        </div>
                    </div>
                </div>
                <div class="product-form">
                    <form method="POST" action="./HP-255-G8-Notebook-PC.php">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">نام و نام خانوادگی</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="شایان وثوقی" name="fullname" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">نظر</label>
                            <textarea class="form-control" id="exampleFormControlInput1" placeholder="نظر من اینه که..." name="comment" disabled></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="w-100 btn btn-primary" disabled>ارسال</button>
                        </div>
                    </form>
                </div>
                <div class="product-comments">
                    <div class="product-comment">
                        <h2><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a></h2>
                        <span class="placeholder col-8 m-1"></span>
                        <span class="placeholder col-6 m-1"></span>
                    </div>
                    <div class="product-comment">
                        <h2><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a></h2>
                        <span class="placeholder col-8 m-1"></span>
                        <span class="placeholder col-6 m-1"></span>
                    </div>
                    <div class="product-comment">
                        <h2><a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4 m-2" aria-hidden="true"></a></h2>
                        <span class="placeholder col-8 m-1"></span>
                        <span class="placeholder col-6 m-1"></span>
                    </div>
                </div>
        <?php }?>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>