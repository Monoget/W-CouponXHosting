<?php
session_start();
require_once("../include/dbController.php");
$db_handle = new DBController();

if(!isset($_SESSION["userid"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST['updateCategory'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['c_name']);
    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("update category set c_name='$name', status='$status' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Category';
                </script>";

}

if (isset($_POST['updateStore'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $category_id = $db_handle->checkValue($_POST['category_id']);

    $s_name = $db_handle->checkValue($_POST['s_name']);

    $s_domain = $db_handle->checkValue($_POST['s_domain']);

    $meta_title = $db_handle->checkValue($_POST['meta_title']);

    $meta_description = $db_handle->checkValue($_POST['meta_description']);

    $meta_keyword = $db_handle->checkValue($_POST['meta_keyword']);

    $about = $db_handle->checkValue($_POST['about']);

    $annual = $db_handle->checkValue($_POST['annual']);

    $image='';
    $query='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {

            $data = $db_handle->runQuery("select * FROM `store` WHERE id='{$id}'");
            unlink('../'.$data[0]['image']);

            move_uploaded_file($file_tmp, "../assets/images/store/" .$file_name);
            $image = "assets/images/store/" . $file_name;
            $query.=",`image`=".$image;
        }
    }

    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("UPDATE `store` SET `category_id`='$category_id',`s_domain`='$s_domain',`s_name`='$s_name',`meta_title`='$meta_title',`meta_description`='$meta_description',`meta_keyword`='$meta_keyword'".$query.",`about`='$about',`annual`='$annual',`status`='$status' WHERE `id`='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Store';
                </script>";

}

if (isset($_POST['updateTrendingDeal'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $title = $db_handle->checkValue($_POST['title']);

    $subtitle = $db_handle->checkValue($_POST['subtitle']);

    $t_link = $db_handle->checkValue($_POST['t_link']);

    $image='';
    $query='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {

            $data = $db_handle->runQuery("select * FROM `trending` WHERE id='{$id}'");
            unlink('../'.$data[0]['image']);

            move_uploaded_file($file_tmp, "../assets/images/trendingdeal/" .$file_name);
            $image = "assets/images/trendingdeal/" . $file_name;
            $query.=",`image`=".$image;
        }
    }

    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("UPDATE `trending` SET `title`='$title',`t_link`='$t_link',`subtitle`='$subtitle'".$query.",`status`='$status' WHERE `id`='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Trending-Deal';
                </script>";

}

if (isset($_POST['updateOffer'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $category_id = $db_handle->checkValue($_POST['category_id']);

    $store_id = $db_handle->checkValue($_POST['store_id']);

    $title = $db_handle->checkValue($_POST['title']);

    $subtitle = $db_handle->checkValue($_POST['subtitle']);

    $o_link = $db_handle->checkValue($_POST['o_link']);

    $offer_text = $db_handle->checkValue($_POST['offer_text']);

    $image='';
    $query='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {

            $data = $db_handle->runQuery("select * FROM `trending` WHERE id='{$id}'");
            unlink('../'.$data[0]['image']);

            move_uploaded_file($file_tmp, "../assets/images/trendingdeal/" .$file_name);
            $image = "assets/images/trendingdeal/" . $file_name;
            $query.=",`image`=".$image;
        }
    }

    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("UPDATE `offer` SET `category_id`='$category_id',`store_id`='$store_id',`title`='$title',`o_link`='$o_link',`subtitle`='$subtitle',`offer_text`='$offer_text'".$query.",`status`='$status' WHERE `id`='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Offer';
                </script>";

}