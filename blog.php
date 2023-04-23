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

    <title>Blog - CouponXHosting</title>
</head>
<body>
<!-- NAV Start -->
<?php require_once('include/menu.php'); ?>
<!-- NAV End -->

<div class="container nav-scroller py-1 mb-2">
    <nav class="nav d-flex">
        <?php
        $query="SELECT * FROM blog_category";

        $data = $db_handle->runQuery($query);
        $row = $db_handle->numRows($query);
        for ($j = 0; $j < $row; $j++) {
            ?>
            <a class="p-2 link-secondary" href="Blog?category_id=<?php echo $data[$j]["id"]; ?>"><?php echo $data[$j]["bc_name"]; ?></a>
            <?php
        }
        ?>
    </nav>
</div>

<main class="container">
    <?php
    $query="SELECT * FROM blog order by id desc limit 1";

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
            <p class="lead mb-0"><a href="Blog-Details?blog_id=<?php echo $data[$j]["id"]; ?>" class="text-white fw-bold">Continue reading...</a></p>
        </div>
        <div class="col-md-6">
            <img src="<?php echo $data[$j]["image"]; ?>" class="img-fluid" alt=""/>
        </div>
    </div>
        <?php
    }
    ?>
    <div class="row">
        <?php
        $query="SELECT * FROM blog,blog_category where blog.blog_cate_id=blog_category.id order by rand() desc limit 8";

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
                    <a href="Blog-Details?blog_id=<?php echo $data[$j]["id"]; ?>" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-5 d-flex justify-content-center align-items-center">
                    <img src="<?php echo $data[$j]["image"]; ?>" class="img-fluid" alt=""/>
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

<!-- Footer Start -->
<?php require_once('include/footer.php'); ?>
<!-- Footer End -->

<?php require_once('include/js.php'); ?>

</body>
</html>
