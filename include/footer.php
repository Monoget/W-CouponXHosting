<footer class="bg-light">
    <hr/>
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-lg-3 mt-3 d-flex  align-items-center">
                <div>
                    <img src="assets/images/logo/logo-black.png" class="img-fluid" alt=""/>
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
                            <a class="text-decoration-none text-dark" href="Category/<?php echo str_replace(" ", "-", $data[$j]["c_name"]); ?>"><p><small><?php echo $data[$j]["c_name"]; ?></small></p></a>
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
                        <a class="nav-link active" aria-current="page" href="Terms-and-Condition">Terms and Condition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Privacy-Policy">Privacy Policy</a>
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