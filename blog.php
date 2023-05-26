<?php
require_once("include/dbController.php");
$db_handle = new DBController();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php
    $url=$_SERVER['REQUEST_URI'];
    $title=substr($url, strrpos($url, '/') + 1);

    $string = str_replace("-", " ", $title);

    $extension='../';
    $bcName='';
    $meta_title='';
    $meta_description='';
    if ($title=='Blog') {
        $extension='';
    } else {

        $query = "SELECT * FROM blog_category where bc_name='$string'";

        $data = $db_handle->runQuery($query);
        $row = $db_handle->numRows($query);
        for ($j = 0; $j < $row; $j++) {
            $bcName=$data[$j]["bc_name"];
            $meta_title=$data[$j]["meta_title"];
            $meta_description=$data[$j]["meta_description"];
        }

        if($row==0){
            echo "<script>
                window.location.href='../Blog';
                </script>";
        }
    }
    ?>


    <!-- Bootstrap CSS -->
    <link href="<?php echo $extension; ?>assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo $extension; ?>assets/vendors/font-awesome/css/all.min.css"/>

    <!-- Swiper CSS -->
    <link rel='stylesheet' href='<?php echo $extension; ?>assets/vendors/swiper/css/swiper.min.css'>

    <!-- Style CSS -->
    <link rel='stylesheet' href='<?php echo $extension; ?>assets/css/style.css'>

    <link rel="icon" type="image/x-icon" href="<?php echo $extension; ?>assets/images/logo/favicon.png">

    <title><?php echo $meta_title; ?> Blog - CouponXHosting</title>

    <meta name="description" content="<?php echo substr($meta_description, 0, 155); ?>"/>
    <meta property="og:title" content="<?php echo $meta_title; ?>"/>
    <meta property="og:description" content="<?php echo substr($meta_description, 0, 155); ?>" />
    <meta name="keywords" content="CouponXHosting">
    <meta name="author" content="CouponXHosting">
    <meta content="https://couponxhosting.com/" property="og:url"/>
    <meta content="website" property="og:type"/>
</head>
<body>
<!-- NAV Start -->
<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Home"><img src="<?php echo $extension; ?>assets/images/logo/logo.png" class="img-fluid"
                                                         alt="" style="max-height:80px"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="<?php echo $extension; ?>Savings">Savings</a>
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
                                        <a href="<?php echo $extension; ?>Category/<?php echo str_replace(" ", "-", $category_data[$i]["c_name"]); ?>" class="dropdown-item dropdown-toggle"
                                           data-toggle="dropdown"><?php echo $category_data[$i]["c_name"]; ?></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $id=$category_data[$i]["id"];

                                            $store_data = $db_handle->runQuery("SELECT * FROM store where category_id={$id} and status=1 order by id asc");
                                            $row = $db_handle->numRows("SELECT * FROM store where category_id={$id} and status=1 order by id asc");

                                            for ($j = 0; $j < $row; $j++) {
                                                ?>
                                                <li><a href="<?php echo $extension; ?>Stores/<?php echo str_replace(" ", "-", $store_data[$j]["s_name"]); ?>" class="dropdown-item"><?php echo $store_data[$j]["s_name"]; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo $extension; ?>Offer">Offer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo $extension; ?>Blog">Blog</a>
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

<div class="container nav-scroller py-1 mb-2">
    <nav class="nav d-flex">
        <?php
        $query="SELECT * FROM blog_category";

        $data = $db_handle->runQuery($query);
        $row = $db_handle->numRows($query);
        for ($j = 0; $j < $row; $j++) {
            ?>
            <a class="p-2 link-secondary" href="<?php echo $extension; ?>Blog/<?php echo str_replace(" ", "-", $data[$j]["bc_name"]); ?>"><?php echo $data[$j]["bc_name"]; ?></a>
            <?php
        }
        ?>
    </nav>
</div>

<main class="container">
    <?php
    $category='';

    $query="SELECT * FROM blog order by id desc limit 1";

    if($bcName!=''){
        $category=",blog_category where blog_category.id=blog.blog_cate_id and blog_category.bc_name='".$bcName."'";
        $query="SELECT * FROM blog".$category." order by blog.id desc limit 1";
    }

    $data = $db_handle->runQuery($query);
    $row = $db_handle->numRows($query);
    for ($j = 0; $j < $row; $j++) {
    ?>
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark row">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"><?php echo $data[$j]["title"]; ?></h1>
            <p class="lead my-3">
                <?php echo substr($data[$j]["description"],0,142).'...'; ?>
            </p>
            <p class="lead mb-0"><a href="<?php echo $extension; ?>Blog-Details/<?php
                $string = str_replace(" ", "-", $data[$j]["title"]);
                echo $string;
                ?>" class="text-white fw-bold">Continue reading...</a></p>
        </div>
        <div class="col-md-6">
            <img src="<?php echo $extension; ?><?php echo $data[$j]["image"]; ?>" class="img-fluid" alt=""/>
        </div>
    </div>
        <?php
    }
    ?>
    <div class="row">
        <?php
        if($bcName!=''){
            $category=" and blog_category.bc_name='".$bcName."'";
        }


        $query="SELECT * FROM blog,blog_category where blog.blog_cate_id=blog_category.id".$category." order by rand() limit 8";

        $data = $db_handle->runQuery($query);
        $row = $db_handle->numRows($query);
        for ($j = 0; $j < $row; $j++) {
        ?>
        <div class="col-md-6 mb-2">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-7 p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary"><?php echo $data[$j]["bc_name"]; ?></strong>
                    <h3 class="mb-0"><?php echo $data[$j]["title"]; ?></h3>
                    <div class="mb-1 text-muted">
                        <?php

                        $datetime = new DateTime($data[$j]["updated_at"]);
                        $la_time = new DateTimeZone('Asia/Dhaka');
                        $datetime->setTimezone($la_time);

                        echo $datetime->format('M d'); ?>
                    </div>
                    <p class="card-text mb-auto">
                        <?php echo substr($data[$j]["description"],0,142).'...'; ?>
                    </p>
                    <a href="<?php echo $extension; ?>Blog-Details/<?php
                    $string = str_replace(" ", "-", $data[$j]["title"]);
                    echo $string;
                    ?>" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-5 d-flex justify-content-center align-items-center">
                    <img src="<?php echo $extension; ?><?php echo $data[$j]["image"]; ?>" class="img-fluid" alt=""/>
                </div>
            </div>
        </div>
            <?php
        }
        ?>
    </div>
</main>
<!-- Newsletter Start -->
<section>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="d-flex align-items-center">
                    <div class="text-end">
                        <img src="<?php echo $extension; ?>assets/images/savings-banner/3.webp" class="img-fluid" alt=""/>
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
<?php require_once('include/footer.php'); ?>
<!-- Footer End -->

<!-- Bootstrap JS -->
<script src="<?php echo $extension; ?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Swiper JS -->
<script src="<?php echo $extension; ?>assets/vendors/swiper/js/swiper.min.js"></script>

<!-- JQuery JS -->
<script src="<?php echo $extension; ?>assets/vendors/jquery/jquery.min.js"></script>

<!-- Main JS -->
<script src="<?php echo $extension; ?>assets/js/main.js"></script>

</body>
</html>
