<?php
require_once("include/dbController.php");
$db_handle = new DBController();

$category_id = 0;
if (isset($_GET['category_id'])) {
    $query="SELECT * FROM category where id={$_GET['category_id']}";
    $category_data = $db_handle->runQuery($query);
    $row=$db_handle->numRows($query);
    $category_id = $category_data[0]['id'];

    if($row<=0){
        ?>
        <script>
            window.location.href = "Home";
        </script>
        <?php
    }
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

    <meta name="description" content="<?php echo $category_data[0]["c_name"]; ?>">
    <meta name="keywords" content="<?php echo $category_data[0]["c_name"]; ?>">

    <title><?php echo $category_data[0]["c_name"]; ?> - CouponXHosting</title>
</head>
<body>
<!-- NAV Start -->
<?php require_once('include/menu.php'); ?>
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
                               href="Stores?domain=<?php echo $data[$j]["s_domain"]; ?>">
                                <div class="card mt-3">
                                    <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
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
