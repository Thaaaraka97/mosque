<?php
include "../include/db-connection.php";

$database = new Databases;
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if ($action == "find_record_sub") {
    $where = array(
        'av_index'     =>     $_POST["index"],
        'av_subDivision'     =>     $_POST["subdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);

    foreach ($person_details as $person_details_item) {
        echo $person_details_item["av_name"] . "+";
        echo $person_details_item["av_telephone"];
    }
} elseif ($action == "find_rental_places") {
    $address= "";
    $output .= '<option value="0" selected>Choose...</option>';
    $where = array(
        'rp_type'     =>     $_POST["inputRentalType"]
    );
    $rental_place_details = $database->select_where('tbl_rentalplaceregistration', $where);
    foreach ($rental_place_details as $rental_place_details_item) {
        $output .= '<option value="' . $rental_place_details_item["rp_id"] . '">Address - ' . $rental_place_details_item["rp_address"] . '</option>';
    }
    echo $output;
}
elseif ($action == "find_record_rental_id") {
    $where = array(
        'rp_id'     =>     $_POST["rental_place_id"]
    );
    $rental_place_details = $database->select_where('tbl_rentalplaceregistration', $where);

    foreach ($rental_place_details as $rental_place_details_item) {
        echo $rental_place_details_item["rp_address"];
    }
}
