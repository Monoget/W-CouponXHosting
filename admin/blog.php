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
    <title>Blog | CouponXHosting</title>

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
                            Blog
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
                <?php if (isset($_GET['blogId'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Blog</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM blog where id={$_GET['blogId']}"); ?>

                                        <input type="hidden" value="<?php echo $data[0]["id"]; ?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Blog Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control wide" name="blog_cate_id" required>
                                                    <option>Choose...</option>
                                                    <?php
                                                    $category_data = $db_handle->runQuery("SELECT * FROM blog_category order by id desc");
                                                    $row_count = $db_handle->numRows("SELECT * FROM blog_category order by id desc");

                                                    for ($i = 0; $i < $row_count; $i++) {
                                                        ?>
                                                        <option value="<?php echo $category_data[$i]["id"]; ?>" <?php
                                                        if($category_data[$i]["id"]==$data[0]["blog_cate_id"])
                                                            echo 'selected'
                                                        ?>>
                                                            <?php echo $category_data[$i]["bc_name"]; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $data[0]["title"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Meta Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?php echo $data[0]["meta_title"]; ?>" name="meta_title" placeholder="Meta Title" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Meta Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="meta_description" style="height: 100px" placeholder="Type your meta description..." required><?php echo $data[0]["meta_description"]; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="comment" name="description" style="height: 100px" placeholder="Type your description..." required><?php echo $data[0]["description"]; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Image</label>
                                            <div class="col-sm-6">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" name="image"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <img src="../<?php echo $data[0]["image"]; ?>" class="img-fluid" alt=""/>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="default-select  form-control wide" name="status" required>
                                                    <option value="1" <?php echo ($data[0]["status"] == 1) ? "selected" : ""; ?>>
                                                        Show
                                                    </option>
                                                    <option value="0" <?php echo ($data[0]["status"] == 0) ? "selected" : ""; ?>>
                                                        Hide
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateBlog">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Blog</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Blog Category</th>
                                            <th>Title</th>
                                            <th>Meta Title</th>
                                            <th>Meta Description</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $data = $db_handle->runQuery("SELECT * FROM blog order by id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM blog order by id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td>
                                                    <?php
                                                    $category = $db_handle->runQuery("SELECT * FROM blog_category WHERE id={$data[$i]['blog_cate_id']}");
                                                    echo $category[0]["bc_name"];
                                                    ?>
                                                </td>
                                                <td><?php echo $data[$i]["title"]; ?></td>
                                                <td><?php echo $data[$i]["meta_title"]; ?></td>
                                                <td><?php echo $data[$i]["meta_description"]; ?></td>
                                                <td><?php echo $data[$i]["description"]; ?></td>
                                                <td>
                                                    <a href="../<?php echo $data[$i]["image"]; ?>" target="_blank">
                                                        image
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data[$i]["status"] == 0) {
                                                        ?>
                                                        <span class="badge light badge-danger">Hide</span>
                                                        <?php
                                                    } else if ($data[$i]["status"] == 1) {
                                                        ?>
                                                        <span class="badge light badge-success">Show</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown mx-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                                 version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                            r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                            r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                            r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                               href="Blog?blogId=<?php echo $data[$i]["id"]; ?>">Edit</a>
                                                            <a class="dropdown-item"
                                                               onclick="blogDelete(<?php echo $data[$i]["id"]; ?>);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    function blogDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'Delete',
                    data: {
                        blogId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have offer in this store.',
                                'error'
                            ).then((result) => {
                                window.location = 'Blog';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your blog has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Blog';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Blog is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Blog';
                });
            }
        })
    }
</script>
<script src='https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js'></script>
<script>
    ClassicEditor.create(document.querySelector("#comment"));
</script>
</body>
</html>