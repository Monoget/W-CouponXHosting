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

    <?php require_once('include/css.php'); ?>

    <title>Savings - CouponXHosting</title>
</head>
<body>
<!-- NAV Start -->
<?php require_once('include/menu.php'); ?>
<!-- NAV End -->

<!-- Savings Banner Start -->
<section class="bg-light">
    <div class="container d-flex justify-content-center align-items-center"
         style="background-image: url('assets/images/savings-banner/1.png');height: 195px;background-repeat: no-repeat;background-size: cover">
        <div class="text-center">
            <h1>Header</h1>
            <p>Description</p>
        </div>
    </div>
</section>
<!-- Savings Banner End -->

<!--Body Nav Start -->
<section class="bg-light">
    <div class="container pt-3 pb-2">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-dark">JUMP TO:</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
    <hr/>
</section>
<!-- Body Nav End -->

<!--Banner Start -->
<section class="mb-5">
    <div class="container">
        <p class="text-center"><small>When you buy through links on CouponXHosting <strong><u>we may earn a
                        commission.</u></strong></small>
        </p>
        <div class="card bg-dark text-white">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <div class="p-4">
                        <img src="assets/images/logo/logo-white.png" class="img-fluid" alt="">
                        <h1>Prime Early Access Sale!</h1>
                        <button type="button" class="btn btn-secondary">Get Deal</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <img src="assets/images/savings-banner/2.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner End -->

<!-- Offers Start -->
<section class="bg-light mb-5">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <h4>Top Offers</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 8";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-3">
                    <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>">
                        <div class="card mt-3">
                            <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                 alt="a snow-capped mountain range"/>
                            <div class="card-body" style="height: 250px">
                                <h6 class="card-title"><?php echo $data[$j]["title"]; ?></h6>
                                <p class="card-text"><?php echo $data[$j]["subtitle"]; ?></p>
                                <p class="card-text mt-2"><?php echo $data[$j]["s_name"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Offers End -->

<!-- Offers 2 Start -->
<section class="mb-5">
    <div class="container pt-2 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4>Top Offers</h4>
                    </div>
                    <div class="col-6 text-end">
                        <small><b>View All</b></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 4";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-3">
                    <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>">
                        <div class="card mt-3">
                            <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                 alt="a snow-capped mountain range"/>
                            <div class="card-body" style="height: 250px">
                                <h6 class="card-title"><?php echo $data[$j]["title"]; ?></h6>
                                <p class="card-text"><?php echo $data[$j]["subtitle"]; ?></p>
                                <p class="card-text mt-2"><?php echo $data[$j]["s_name"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Offers 2 End -->

<!-- Shop Alternatives Start -->
<section class="bg-light">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <h4>Top Offers</h4>
            </div>
        </div>
        <div class="row">

            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 6";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-2 col-6">
                    <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>">
                        <div class="mt-3 d-flex justify-content-center">
                            <div class="text-center">
                                <img src="<?php echo $data[$j]["image"]; ?>" class="img-fluid alternative-logo" alt=""/>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Shop Alternatives Start End -->

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

<!-- Blog Start -->
<section class="bg-light">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <h2>Shop Today's Trending Deals and Save Big</h2>
            </div>
        </div>
        <div class="row text-dark">
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                </div>
                <div class="mt-3">
                    <h6>Card title</h6>
                    <p>
                        <small>
                            October 10, 2022
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                </div>
                <div class="mt-3">
                    <h6>Card title</h6>
                    <p>
                        <small>
                            October 10, 2022
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                </div>
                <div class="mt-3">
                    <h6>Card title</h6>
                    <p>
                        <small>
                            October 10, 2022
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                </div>
                <div class="mt-3">
                    <h6>Card title</h6>
                    <p>
                        <small>
                            October 10, 2022
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                </div>
                <div class="mt-3">
                    <h6>Card title</h6>
                    <p>
                        <small>
                            October 10, 2022
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                </div>
                <div class="mt-3">
                    <h6>Card title</h6>
                    <p>
                        <small>
                            October 10, 2022
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog End -->

<!-- Offers 2 Start -->
<section class="mt-5">
    <div class="container pt-2 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4>Top Offers</h4>
                    </div>
                    <div class="col-6 text-end">
                        <small><b>View All</b></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 4";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-3">
                    <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>">
                        <div class="card mt-3">
                            <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                 alt="a snow-capped mountain range"/>
                            <div class="card-body" style="height: 250px">
                                <h6 class="card-title"><?php echo $data[$j]["title"]; ?></h6>
                                <p class="card-text"><?php echo $data[$j]["subtitle"]; ?></p>
                                <p class="card-text mt-2"><?php echo $data[$j]["s_name"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Offers 2 End -->

<!-- Offers 2 Start -->
<section class="bg-light mt-5">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4>Top Offers</h4>
                    </div>
                    <div class="col-6 text-end">
                        <small><b>View All</b></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 8";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-3">
                    <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>">
                        <div class="card mt-3">
                            <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                 alt="a snow-capped mountain range"/>
                            <div class="card-body" style="height: 250px">
                                <h6 class="card-title"><?php echo $data[$j]["title"]; ?></h6>
                                <p class="card-text"><?php echo $data[$j]["subtitle"]; ?></p>
                                <p class="card-text mt-2"><?php echo $data[$j]["s_name"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Offers 2 End -->

<!-- Offers 2 Start -->
<section class="mt-5">
    <div class="container pt-2 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4>Top Offers</h4>
                    </div>
                    <div class="col-6 text-end">
                        <small><b>View All</b></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 4";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-3">
                    <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>">
                        <div class="card mt-3">
                            <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                 alt="a snow-capped mountain range"/>
                            <div class="card-body" style="height: 250px">
                                <h6 class="card-title"><?php echo $data[$j]["title"]; ?></h6>
                                <p class="card-text"><?php echo $data[$j]["subtitle"]; ?></p>
                                <p class="card-text mt-2"><?php echo $data[$j]["s_name"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Offers 2 End -->

<!-- Footer Start -->
<?php require_once('include/footer.php'); ?>
<!-- Footer End -->

<?php require_once('include/js.php'); ?>

</body>
</html>
