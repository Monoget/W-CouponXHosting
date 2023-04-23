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

    <title>Offer - CouponXHosting</title>
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
            <h1>Cashback</h1>
            <p>Description</p>
            <button class="btn btn-secondary">Learn More</button>
        </div>
    </div>
</section>
<!-- Savings Banner End -->

<!-- Offers Start -->
<section>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h4>Featured Cash Back Offers</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM offer,store where store.id=offer.store_id order by rand() limit 6";

            $data = $db_handle->runQuery($query);
            $row = $db_handle->numRows($query);
            for ($j = 0; $j < $row; $j++) {
                ?>
                <div class="col-lg-2">
                    <a class="text-decoration-none text-dark" href="Stores?domain=<?php echo $data[$j]["s_domain"]; ?>">
                        <div class="card mt-3">
                            <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                 alt="a snow-capped mountain range"/>
                            <div class="card-body text-center" style="height: 150px">
                                <p class="card-text"><?php echo $data[$j]["title"]; ?></p>
                            </div>
                            <p class="card-text text-center mt-2 bg-dark text-white"><?php echo $data[$j]["s_name"]; ?></p>
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

<section class="bg-light pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h6>
                    <?php
                    $row = $db_handle->numRows("SELECT * FROM offer order by id desc");
                    echo $row;
                    ?>
                    Offers Available
                </h6>
                <p class="mt-2">
                    <small>
                        When you buy through links on CouponXHosting we may earn a commission.
                    </small>
                </p>
                <hr/>
                <h6>Top Categories</h6>
                <div class="d-md-block d-none mt-3">
                    <ul class="nav flex-column">
                        <?php
                        $query = "SELECT * FROM category order by id desc";

                        $data = $db_handle->runQuery($query);
                        $row = $db_handle->numRows($query);
                        for ($j = 0; $j < $row; $j++) {
                            ?>
                            <li class="nav-item">
                                <a class="text-decoration-none text-dark"
                                   href="Category?category_id=<?php echo $data[$j]["id"]; ?>">
                                    <p class="form-check-label">
                                        <?php echo $data[$j]["c_name"]; ?>
                                    </p>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <h6 class="mt-3">Top Stores</h6>
                <div class="d-md-block d-none mt-3">
                    <ul class="nav flex-column">
                        <?php
                        $query = "SELECT * FROM store order by id desc";

                        $data = $db_handle->runQuery($query);
                        $row = $db_handle->numRows($query);
                        for ($j = 0; $j < $row; $j++) {
                            ?>
                            <li class="nav-item">
                                <a class="text-decoration-none text-dark"
                                   href="Stores?domain=<?php echo $data[$j]["s_domain"]; ?>">
                                    <p class="form-check-label">
                                        <?php echo $data[$j]["s_name"]; ?>
                                    </p>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php
                    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                    }

                    $total_records_per_page = 9;
                    $offset = ($page_no - 1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $row = $db_handle->numRows("SELECT * FROM offer order by id desc");

                    $total_no_of_pages = ceil($row / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1


                    $query = "SELECT * FROM offer,store where store.id=offer.store_id order by offer.id desc LIMIT $offset, $total_records_per_page";

                    $data = $db_handle->runQuery($query);
                    $row = $db_handle->numRows($query);
                    for ($j = 0; $j < $row; $j++) {
                        ?>
                        <div class="col-lg-4">
                            <a class="text-decoration-none text-dark"
                               href="Stores?domain=<?php echo $data[$j]["s_domain"]; ?>">
                                <div class="card mt-3">
                                    <img class="card-img" src="<?php echo $data[$j]["image"]; ?>"
                                         alt="a snow-capped mountain range"/>
                                    <div class="card-body" style="height: 250px">
                                        <h6 class="card-title"><?php echo $data[$j]["title"]; ?></h6>
                                        <p class="card-text"><?php echo $data[$j]["subtitle"]; ?></p>
                                    </div>
                                    <p class="card-text text-center mt-2 bg-dark text-white"><?php echo $data[$j]["s_name"]; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item" <?php if ($page_no <= 1) {
                                    echo "class='disabled'";
                                } ?>>
                                    <a class="page-link" <?php if ($page_no > 1) {
                                        echo "href='?page_no=$previous_page'";
                                    } ?>>
                                        Previous
                                    </a>
                                </li>
                                <?php

                                if ($total_no_of_pages <= 10) {
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                        } else {
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                } elseif ($total_no_of_pages > 10) {

                                    if ($page_no <= 4) {
                                        for ($counter = 1; $counter < 8; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                                        echo "<li class='page-item'><a class='page-link'>...</a></li>";

                                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                    }
                                }
                                ?>
                                <li class="page-item" <?php if ($page_no >= $total_no_of_pages) {
                                    echo "class='disabled'";
                                } ?>>
                                    <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
                                        echo "href='?page_no=$next_page'";
                                    } ?>>
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
