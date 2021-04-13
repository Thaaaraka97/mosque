<?php
include "../include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;
$today = date("Y-m-d");
$URL = "preview_rental-places.php?deleted=1";


$id = "";
$action = $_POST["action"];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['inputRentalType'])) {
    $inputRentalType = $_POST['inputRentalType'];
}
if (isset($_POST['inputAddress'])) {
    $inputAddress = $_POST['inputAddress'];
}


if ($action == "delete") {
    $where = array(
        'rp_id'     =>     $id
    );
    if ($database->delete_data("tbl_rentalplaceregistration", $where)) {
        echo $URL;
    }
} elseif ($action == "add") {

    $insert_tbl_rentalplaceregistration = array(
        'rp_type' => mysqli_real_escape_string($database->con, $inputRentalType),
        'rp_address' => mysqli_real_escape_string($database->con, $inputAddress)
    );
    if ($database->insert_data('tbl_rentalplaceregistration', $insert_tbl_rentalplaceregistration)) {
        $URL = "preview_rental-places.php?inserted=1";
        echo $URL;
    }
}
