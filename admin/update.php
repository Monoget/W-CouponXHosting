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