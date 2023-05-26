<?php
require_once("include/dbController.php");
$db_handle = new DBController();


$url=$_SERVER['REQUEST_URI'];
$title=substr($url, strrpos($url, '/') + 1);

$string = str_replace("-", " ", $title);

$description='';
$image='';
$meta_title='';
$meta_description='';
$meta_keywords='';
$category_id = 0;
$title = '';

if (!isset($title)) {
    echo "<script>
                window.location.href='../Home';
                </script>";
} else {

    $query = "SELECT * FROM category where c_name='$string'";

    $category_data = $db_handle->runQuery($query);
    $row = $db_handle->numRows($query);
    for ($j = 0; $j < $row; $j++) {
        $title=$category_data[$j]["c_name"];
        $image=$category_data[$j]["meta_image"];
        $meta_title=$category_data[$j]["meta_title"];
        $meta_description=$category_data[$j]["meta_description"];
        $meta_keywords=$category_data[$j]["meta_keywords"];
        $category_id = $category_data[0]['id'];
    }

    if($row==0){
        echo "<script>
                window.location.href='../Home';
                </script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/all.min.css"/>

    <!-- Swiper CSS -->
    <link rel='stylesheet' href='../assets/vendors/swiper/css/swiper.min.css'>

    <!-- Style CSS -->
    <link rel='stylesheet' href='../assets/css/style.css'>

    <link rel="icon" type="image/x-icon" href="../assets/images/logo/favicon.png">


    <meta name="description" content="<?php echo substr($meta_description, 0, 155); ?>">
    <meta name="keywords" content="<?php echo substr($meta_keywords, 0, 155); ?>">
    <meta name="author" content="CouponXHosting">

    <meta property="og:title" content="<?php echo $meta_title; ?>"/>
    <meta property="og:description" content="<?php echo substr($meta_description, 0, 155); ?>" />
    <meta content="http://couponxhosting.com/<?php echo $image; ?>" property="og:image"/>
    <meta content="<?php echo $meta_title; ?>" property="og:image:alt"/>
    <meta content="https://couponxhosting.com/" property="og:url"/>
    <meta content="website" property="og:type"/>


    <title><?php echo $title; ?> - CouponXHosting</title>
</head>
<body>
<!-- NAV Start -->
<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Home"><img src="../assets/images/logo/logo.png" class="img-fluid"
                                                            alt="" style="max-height:80px"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="../Savings">Savings</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Store
                            </a>
                            <ul class="dropdown-menu multi-level">
                                <?php
                                $category_data = $db_handle->runQuery("SELECT * FROM category where status=1 order by id asc");
                                $row_count = $db_handle->numRows("SELECT * FROM category where status=1 order by id asc");

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <li class="dropdown-submenu">
                                        <a href="../Category?category_id=<?php echo $category_data[$i]["id"]; ?>" class="dropdown-item dropdown-toggle"
                                           data-toggle="dropdown"><?php echo $category_data[$i]["c_name"]; ?></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $id=$category_data[$i]["id"];

                                            $store_data = $db_handle->runQuery("SELECT * FROM store where category_id={$id} and status=1 order by id asc");
                                            $row = $db_handle->numRows("SELECT * FROM store where category_id={$id} and status=1 order by id asc");

                                            for ($j = 0; $j < $row; $j++) {
                                                ?>
                                                <li><a href="../Stores/<?php echo str_replace(" ", "-", $store_data[$j]["s_name"]); ?>" class="dropdown-item"><?php echo $store_data[$j]["s_name"]; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Offer">Offer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Blog">Blog</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- NAV End -->

<section class="bg-light pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php

                    $query = "SELECT * FROM store where category_id={$category_id}";

                    $data = $db_handle->runQuery($query);
                    $row = $db_handle->numRows($query);
                    for ($j = 0; $j < $row; $j++) {
                        ?>
                        <div class="col-lg-3">
                            <a class="text-decoration-none text-dark"
                               href="../Stores/<?php echo $data[$j]["s_name"]; ?>">
                                <div class="card mt-3">
                                    <img class="card-img" src="../<?php echo $data[$j]["image"]; ?>"
                                         alt="a snow-capped mountain range"/>
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $data[$j]["s_name"]; ?></h6>
                                        <p class="card-text"><?php echo substr($data[$j]["about"], 0, 50).'...'; ?></p>
                                    </div>
                                    <p class="card-text text-center mt-2 bg-dark text-white">See Offer</p>
                                </div>
                            </a>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Start -->
<section>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="d-flex align-items-center">
                    <div class="text-end">
                        <img src="../assets/images/savings-banner/3.webp" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
                <div>
                    <h2>Let the Deals Come to You</h2>
                    <p>Sign up for emails to get personalized savings sent right to your inbox.</p>
                    <input type="email" class="form-control" placeholder="Email Address"/>
                    <button type="button" class="btn btn-dark mt-3">Subscribe</button>
                    <button type="button" class="btn btn-outline-dark mt-3">Privacy Policy</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter End -->


<!-- Footer Start -->
<footer class="bg-light">
    <hr/>
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-lg-3 mt-3 d-flex  align-items-center">
                <div>
                    <img src="../assets/images/logo/logo-black.png" class="img-fluid" alt=""/>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="row">
                    <?php
                    $query="SELECT * FROM category order by rand() limit 18";

                    $data = $db_handle->runQuery($query);
                    $row = $db_handle->numRows($query);
                    for ($j = 0; $j < $row; $j++) {
                        ?>
                        <div class="col-lg-3">
                            <a class="text-decoration-none text-dark" href="Category/<?php echo $data[$j]["c_name"]; ?>"><p><small><?php echo $data[$j]["c_name"]; ?></small></p></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Terms-and-Condition">Terms and Condition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Privacy-Policy">Privacy Policy</a>
                    </li>
                </ul>
                <p class="text-center">
                    <small>
                        CouponXHosting and RMN are registered trademarks of CouponXHosting, Inc. Third-party
                        trademarks are
                        the
                        property of their respective third-party owners. Presence of a third-party trademark does
                        not
                        mean that
                        CouponXHosting has any relationship with that third-party or that the third-party endorses
                        CouponXHosting or
                        its services.
                    </small>
                </p>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Bootstrap JS -->
<script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Swiper JS -->
<script src="../assets/vendors/swiper/js/swiper.min.js"></script>

<!-- JQuery JS -->
<script src="../assets/vendors/jquery/jquery.min.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

</body>
</html>
