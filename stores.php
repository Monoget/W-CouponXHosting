<?php
require_once("include/dbController.php");
$db_handle = new DBController();

$store_id=0;
if (isset($_GET['domain'])) {
    $page_store_data = $db_handle->runQuery("SELECT * FROM store where s_domain='{$_GET['domain']}'");
    $store_id=$page_store_data[0]['id'];
} else {
    ?>
    <script>
        window.location.href = "Home";
    </script>
    <?php
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once('include/css.php'); ?>

    <meta name="description" content="><?php echo $page_store_data[0]["meta_description"]; ?>">
    <meta name="keywords" content="<?php echo $page_store_data[0]["meta_keyword"]; ?>">

    <title><?php echo $page_store_data[0]["meta_title"]; ?></title>
</head>
<body>
<!-- NAV Start -->
<?php require_once('include/menu.php'); ?>
<!-- NAV End -->

<section class="bg-light pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-3">
                    <img class="card-img" src="<?php echo $page_store_data[0]["image"]; ?>"
                         alt="a snow-capped mountain range"/>
                </div>
                <p>When you buy through links on CouponXHosting <u>we may earn a commission.</u></p>
                <h6>50 Offers Available</h6>
                <p class="mt-2">Sponsored</p>
                <hr/>
                <div class="d-md-block d-none">
                    <p>
                        <strong>About <?php echo $page_store_data[0]["s_name"]; ?></strong>
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
                        <strong>Rate <?php echo $page_store_data[0]["s_name"]; ?> Offers</strong>
                    </p>
                    <p>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                        <span class="fa fa-star fa-2x"></span>
                    </p>
                    <p>
                        <strong>About <?php echo $page_store_data[0]["s_name"]; ?></strong>
                    </p>
                    <p>
                        <?php echo $page_store_data[0]["about"]; ?>
                    </p>
                    <p>
                        <strong>Annual Sales</strong>
                    </p>
                    <p>
                        <?php echo $page_store_data[0]["annual"]; ?>
                    </p>
                    <p>
                        <strong>Similar Stores</strong>
                    </p>
                    <ul class="nav flex-column">
                        <?php
                        $id = $page_store_data[0]["category_id"];

                        $data = $db_handle->runQuery("SELECT * FROM store where category_id={$id} and status=1 order by RAND() asc LIMIT 5");
                        $row = $db_handle->numRows("SELECT * FROM store where category_id={$id} and status=1 order by RAND() asc LIMIT 5");
                        for ($j = 0; $j < $row; $j++) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-dark"
                                   href="Stores?domain=<?php echo $data[$j]["s_domain"]; ?>"><?php echo $data[$j]["s_name"]; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-9 mt-2">
                        <h1><?php echo $page_store_data[0]["s_name"]; ?> Coupons & Promo Codes </h1>
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
                    <div class="col-lg-3 mt-4">
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="fa-solid fa-tag"></i> Submit a Coupon</a>
                    </div>
                    <?php
                    $id = $page_store_data[0]["category_id"];

                    $data = $db_handle->runQuery("SELECT * FROM offer where category_id={$id} and store_id={$store_id} and status=1 order by id desc");
                    $row = $db_handle->numRows("SELECT * FROM offer where category_id={$id} and store_id={$store_id} and status=1 order by id desc");
                    for ($j = 0; $j < $row; $j++) {
                    ?>
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-3 text-center p-3">
                                        <h2>
                                            <?php echo $data[$j]["title"]; ?>
                                        </h2>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <div class="row pt-5">
                                            <div class="col-10">
                                                <h5><?php echo $data[$j]["subtitle"]; ?></h5>
                                                <p>Added by kimeeb . 579 uses today</p>
                                            </div>
                                            <div class="col-lg-2 pe-2">
                                                <a href="<?php echo $data[$j]["o_link"]; ?>" class="btn btn-primary">Get Deal</a>
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
                    <?php } ?>

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
                        <img src="assets/images/savings-banner/3.webp" class="img-fluid" alt=""/>
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
<?php require_once('include/footer.php'); ?>
<!-- Footer End -->

<?php require_once('include/js.php'); ?>

</body>
</html>
