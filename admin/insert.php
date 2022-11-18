<?php
session_start();
require_once("../include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");

if(!isset($_SESSION["userid"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST["addCategory"])) {
    $name = $db_handle->checkValue($_POST['c_name']);

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `category`(`c_name`,  `inserted_at`) VALUES ('$name','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Category';
                </script>";
}