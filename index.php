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

    <title>Home - CouponXHosting</title>
</head>
<body>
<!-- NAV Start -->
<?php require_once('include/menu.php'); ?>
<!-- NAV End -->

<!-- Trending Deal Start -->
<section class="bg-light">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Shop Today's Trending Deals and Save Big</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                    <div class="card-body" style="margin-top: -83px;background: rgba(0,0,0,0.71)">
                        <h6 class="card-title text-white">Card title</h6>
                        <p class="card-text text-white">Some quick example text to</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                    <div class="card-body" style="margin-top: -83px;background: rgba(0,0,0,0.71)">
                        <h6 class="card-title text-white">Card title</h6>
                        <p class="card-text text-white">Some quick example text to</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img class="card-img" src="https://assets.codepen.io/6093409/mountains-3.jpg"
                         alt="a snow-capped mountain range"/>
                    <div class="card-body" style="margin-top: -83px;background: rgba(0,0,0,0.71)">
                        <h6 class="card-title text-white">Card title</h6>
                        <p class="card-text text-white">Some quick example text to</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trending Deal End -->

<!-- Offers Start -->
<section>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <h4>Top Offers</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $query="SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 8";

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

<!-- Stores Start -->
<section class="bg-light">
    <hr/>
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Popular Stores</h4>
            </div>
        </div>
        <div class="row mt-3">
            <?php
            $query="SELECT * FROM store order by rand() limit 18";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
            ?>
            <div class="col-lg-2">
                <a class="text-decoration-none text-dark" href="Stores/<?php echo str_replace(" ", "-", $data[$j]["s_name"]); ?>"><p><small><?php echo $data[$j]["s_name"]; ?></small></p></a>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
    <hr/>
</section>
<!-- Stores End -->

<!-- Category Start -->
<section>
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Popular Category</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $query="SELECT * FROM category order by rand() limit 18";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-2">
                    <a class="text-decoration-none text-dark" href="Category/<?php echo str_replace(" ", "-", $data[$j]["c_name"]); ?>"><p><small><?php echo $data[$j]["c_name"]; ?></small></p></a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Category End -->

<!-- Footer Start -->
<?php require_once('include/footer.php'); ?>
<!-- Footer End -->

<?php require_once('include/js.php'); ?>

</body>
</html>
