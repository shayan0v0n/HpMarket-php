<?php

require_once './server/setupDB.php';
require_once './server/control.php';
require_once './server/getDatabase.php';
$setupDatabase = new SetupDB();
$getDatabase = new GetDatabase();
$control = new Control();

if (!$setupDatabase-> checkErrorExist("apache")) {
    $userInfoData = $getDatabase-> getDatabaseData("userInfo");
    if (isset($_POST['fullname']) && isset($_POST["password"]) && isset($_POST["email"])) {
        $getDatabase-> setUserInfo($_POST['fullname'], $_POST['password'], $_POST['email']);
        header("location: http://localhost:8000/");
    }

    if (isset($_POST['fullnameEdit']) && isset($_POST["passwordEdit"]) && isset($_POST["emailEdit"])) {
        $getDatabase-> setUserInfoUpdate($_POST['fullnameEdit'], $_POST['passwordEdit'], $_POST['emailEdit']);
        header("location: http://localhost:8000/");
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/globalStyles.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/account.css">
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
                        <a class="nav-link" aria-current="page" href="/">صفحه اصلی</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown" href="/shop.php">فروشگاه </a>
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
                        <a class="nav-link" href="/blog.php">مقالات</a>
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
        <?php if (!isset($userInfoData[0])) { ?>
            <div class="register-form">
                <h2 class="text-center">ایجاد حساب کاربری</h2>
                <form action="./account.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="شایان وثوقی" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">رمز عبور</label>
                        <input type="password" class="form-control" id="exampleFormControlInput2" placeholder="Shayan_021" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">ایمیل</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="shayanwqhw@gmail.com" name="email" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100" type="submit">ثبت نام</button>
                    </div>
                </form>
            </div>
            <?php }else {?>
                <div class="register-form">
                    <h2 class="text-center">ویرایش اطلاعات حساب کاربری</h2>
                    <form action="./account.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">نام و نام خانوادگی</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="fullnameEdit" value="<?= $userInfoData[0]["name"]?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">رمز عبور</label>
                            <input type="password" class="form-control" id="exampleFormControlInput2" name="passwordEdit" value="<?= $userInfoData[0]["password"]?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">ایمیل</label>
                            <input type="email" class="form-control" id="exampleFormControlInput3" name="emailEdit" value="<?= $userInfoData[0]["email"]?>" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100 m-1" type="submit">ویرایش</button>
                            <a href="./server/deleteHanlder.php">
                                <button class="btn btn-danger w-100 m-1" type="button">حذف حساب کاربری</button>
                            </a>
                        </div>
                    </form>
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
<script src="./styles.index.js"></script>
</html>