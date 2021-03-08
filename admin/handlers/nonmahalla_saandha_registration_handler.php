<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");
$URL = "preview_non-mahalla-saandha-registration.php?edited=1";


$tp = "";
$address = "";
$name = "";
$action = $_POST["action"];
if (isset($_POST['tp'])) {
    $tp = $_POST['tp'];
}
if (isset($_POST['address'])) {
    $address = $_POST['address'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}


if ($action == "update") {
    $update_data = array(
        'nmsr_telephone' => mysqli_real_escape_string($database->con, $tp),
        'nmsr_name' => mysqli_real_escape_string($database->con, $name),
        'nmsr_address' => mysqli_real_escape_string($database->con, $address)
    );
    $where_condition = array(
        'nmsr_id'     =>     $id
    );
    if ($database->update("tbl_nonmahallasaandharegistration", $update_data, $where_condition)) {
        echo $URL;
    }
} elseif ($action == "add") {

    $insert_tbl_nonmahallasaandharegistration = array(
        'nmsr_telephone' => mysqli_real_escape_string($database->con, $tp),
        'nmsr_name' => mysqli_real_escape_string($database->con, $name),
        'nmsr_address' => mysqli_real_escape_string($database->con, $address)
    );
    if ($database->insert_data('tbl_nonmahallasaandharegistration', $insert_tbl_nonmahallasaandharegistration)) {
        $URL = "preview_non-mahalla-saandha-registration.php?inserted=1";
        echo $URL;
    }
}
elseif ($action == "find_record") {

    $where = array(
        'nmsr_id'     =>     $id
    );
    $person_details = $database->select_where('tbl_nonmahallasaandharegistration', $where);
    $tp = "";
    $name = "";
    $address = "";
    if ($person_details) {
        foreach ($person_details as $person_details_item) {
            $name = $person_details_item["nmsr_name"];
            $address = $person_details_item["nmsr_address"];
            $tp = $person_details_item["nmsr_telephone"];
        }
    }
    echo $name . "," . $address . "," . $tp;
}
