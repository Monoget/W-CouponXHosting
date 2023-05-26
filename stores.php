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
$store_id = 0;
$title = '';

$stores_data='';

if (!isset($title)) {
    echo "<script>
                window.location.href='../Home';
                </script>";
} else {

    $query = "SELECT * FROM store where s_name='$string'";

    $stores_data = $db_handle->runQuery($query);
    $row = $db_handle->numRows($query);
    for ($j = 0; $j < $row; $j++) {
        $title=$stores_data[$j]["s_name"];
        $image=$stores_data[$j]["image"];
        $meta_title=$stores_data[$j]["meta_title"];
        $meta_description=$stores_data[$j]["meta_description"];
        $meta_keywords=$stores_data[$j]["meta_keyword"];
        $store_id = $stores_data[0]['id'];
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

    <title><?php echo $title; ?></title>
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
                                        <a href="../Category/<?php echo str_replace(" ", "-", $category_data[$i]["c_name"]); ?>" class="dropdown-item dropdown-toggle"
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
                    <form class="d-flex" action="../Offer" method="get">
                        <input class="form-control me-2" type="search" name="offer" placeholder="Search" aria-label="Search">
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
            <div class="col-lg-3">
                <div class="card mt-3">
                    <img class="card-img" src="../<?php echo $image; ?>"
                         alt="a snow-capped mountain range"/>
                </div>
                <p>When you buy through links on CouponXHosting <u>we may earn a commission.</u></p>
                <h6>
                    <?php
                    $row = $db_handle->numRows("SELECT * FROM offer where store_id={$store_id} and status=1");
                    echo $row;
                    ?>
                    Offers Available
                </h6>
                <p class="mt-2">Sponsored</p>
                <hr/>
                <div class="d-md-block d-none">
                    <p>
                        <strong>About <?php echo $title; ?></strong>
                    </p>
                    <p>
                        <strong>
                            3.8
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            (349)
                        </strong>
                    </p>
                    <p>
                        <strong>Rate <?php echo $title; ?> Offers</strong>
                    </p>
                    <p>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                    </p>
                    <p>
                        <strong>About <?php echo $title; ?></strong>
                    </p>
                    <p>
                        <?php echo $stores_data[0]["about"]; ?>
                    </p>
                    <p>
                        <strong>Annual Sales</strong>
                    </p>
                    <p>
                        <?php echo $stores_data[0]["annual"]; ?>
                    </p>
                    <p>
                        <strong>Similar Stores</strong>
                    </p>
                    <ul class="nav flex-column">
                        <?php
                        $id = $stores_data[0]["category_id"];

                        $data = $db_handle->runQuery("SELECT * FROM store where category_id={$id} and status=1 order by RAND() asc LIMIT 5");
                        $row = $db_handle->numRows("SELECT * FROM store where category_id={$id} and status=1 order by RAND() asc LIMIT 5");
                        for ($j = 0; $j < $row; $j++) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark"
                                   href="../Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>"><?php echo $data[$j]["s_name"]; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <h1><?php echo $stores_data[0]["s_name"]; ?> Coupons & Promo Codes </h1>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link text-dark" aria-current="page" href="#"><i
                                            class="fa-solid fa-check"></i> In-Store Pickup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#"><i class="fa-solid fa-check"></i> Curbside</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#"><i class="fa-solid fa-check"></i> Delivery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#"><i class="fa-solid fa-check"></i> Free
                                    Shipping</a>
                            </li>
                        </ul>
                    </div>
                    <!--<div class="col-lg-3 mt-4">
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="fa-solid fa-tag"></i> Submit a Coupon</a>
                    </div>-->
                    <?php

                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                    }

                    $total_records_per_page = 7;
                    $offset = ($page_no-1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $row = $db_handle->numRows("SELECT * FROM offer where category_id={$id} and store_id={$store_id} and status=1 order by id desc");

                    $total_no_of_pages = ceil($row / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $id = $stores_data[0]["category_id"];

                    $query="SELECT * FROM offer where category_id={$id} and store_id={$store_id} and status=1 order by id desc LIMIT $offset, $total_records_per_page";

                    $data = $db_handle->runQuery($query);
                    $row = $db_handle->numRows($query);
                    for ($j = 0; $j < $row; $j++) {
                    ?>
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-3 text-center p-3">
                                        <h2>
                                            <?php echo $data[$j]["title"]; ?>
                                        </h2>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <div class="row pt-5">
                                            <div class="col-10">
                                                <h5><?php echo $data[$j]["subtitle"]; ?></h5>
                                                <!--<p>Added by kimeeb . 579 uses today</p>-->
                                            </div>
                                            <div class="col-lg-2 pe-2">
                                                <a href="<?php echo $data[$j]["o_link"]; ?>" target="_blank" class="btn btn-primary">Get Deal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-10">
                                        <?php echo $data[$j]["offer_text"]; ?>
                                    </div>
                                    <div class="col-2">
                                        <i class="fa-solid fa-thumbs-up me-2"></i>
                                        <i class="fa-solid fa-thumbs-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    ?>

                    <div class="col-lg-12 mt-5">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                    <a class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>
                                        Previous
                                    </a>
                                </li>
                                <?php

                                if ($total_no_of_pages <= 10){
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                        if ($counter == $page_no) {
                                            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                        }else{
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                }

                                elseif($total_no_of_pages > 10){

                                    if($page_no <= 4) {
                                        for ($counter = 1; $counter < 8; $counter++){
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            }else{
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                    }

                                    elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            }else{
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                    }

                                    else {
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";

                                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            }else{
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                    }
                                }
                                ?>
                                <li class="page-item" <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                    <a class="page-link" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>
                                        Next
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submit Coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Offer Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Offer Text</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Offer Details</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
