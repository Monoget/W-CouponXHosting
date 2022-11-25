<?php
session_start();
require_once("../include/dbController.php");
$db_handle = new DBController();

if (!isset($_SESSION["userid"])) {
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_GET['catId'])) {
    $row = $db_handle->numRows("select * FROM `store` WHERE category_id='{$_GET['catId']}'");

    if ($row == 0) {
        $db_handle->insertQuery("delete from category where id=" . $_GET['catId'] . "");
        echo 'success';
    } else {
        echo 'P';
    }
}

if (isset($_GET['storeId'])) {
    $row = $db_handle->numRows("select * FROM `offer` WHERE store_id='{$_GET['storeId']}'");

    $row += $db_handle->numRows("select * FROM `rating` WHERE store_id='{$_GET['storeId']}'");

    $row += $db_handle->numRows("select * FROM `store_offer` WHERE store_id='{$_GET['storeId']}'");

    if ($row == 0) {
        $data = $db_handle->runQuery("select * FROM `store` WHERE id='{$_GET['storeId']}'");
        unlink('../'.$data[0]['image']);

        $db_handle->insertQuery("delete from store where id=" . $_GET['storeId'] . "");
        echo 'success';
    } else {
        echo 'P';
    }
}

if (isset($_GET['ratingId'])) {
    $db_handle->insertQuery("delete from rating where id=" . $_GET['ratingId'] . "");
    echo 'success';
}

