<?php
session_start();
require_once("../include/dbController.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content="Monoget Saha"/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CouponXHosting"/>
    <meta property="og:title" content="CouponXHosting"/>
    <meta property="og:description" content="CouponXHosting"/>
    <meta property="og:image" content="social-image.png"/>
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Add Store Offer | CouponXHosting</title>

    <?php require_once('include/css.php'); ?>

</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="waviy">
        <span style="--i:1">L</span>
        <span style="--i:2">o</span>
        <span style="--i:3">a</span>
        <span style="--i:4">d</span>
        <span style="--i:5">i</span>
        <span style="--i:6">n</span>
        <span style="--i:7">g</span>
        <span style="--i:8">.</span>
        <span style="--i:9">.</span>
        <span style="--i:10">.</span>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <?php require_once('include/header.php'); ?>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Add Store Offer
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <?php require_once('include/navbar.php'); ?>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row invoice-card-row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Store Offer</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control wide" onchange="storeFetch(this.value);" id="cat_change" name="category_id" required>
                                                <option>Choose...</option>
                                                <?php
                                                $category_data = $db_handle->runQuery("SELECT * FROM category order by id desc");
                                                $row_count = $db_handle->numRows("SELECT * FROM category order by id desc");

                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <option value="<?php echo $category_data[$i]["id"]; ?>">
                                                        <?php echo $category_data[$i]["c_name"]; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Store</label>
                                        <div class="col-sm-9">
                                            <select class="form-control wide" name="store_id" id="store_id" required>
                                                <option>Choose...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Offer Text</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="offer_text" placeholder="Offer Text" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Offer Submit Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="offer_submit_name" placeholder="Offer Submit Name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" placeholder="Title" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Details</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="details" placeholder="Details" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="code" placeholder="Code" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" class="btn btn-primary w-25" name="addStoreOffer">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <?php require_once('include/footer.php'); ?>
    <!--**********************************
        Footer end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<?php require_once('include/js.php'); ?>
<script>
    function storeFetch(value){
        $.ajax({
            type: 'get',
            url: 'Get-Store',
            data: {
                category_id: value
            },
            success: function(data) {
                $('#store_id').html(data);
                console.log(data);
            }
        });
    }
</script>
</body>
</html>