<?php
include "../include/db-connection.php";
$database = new Databases;
$action = "";
$output = '';

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
        echo $person_details_item["av_telephone"] . ",";
        echo $person_details_item["av_name"] . ",";
        echo $person_details_item["av_address"];
    }
} elseif ($action == "find_record_tp") {
    $where = array(
        'av_telephone'     =>     $_POST["tp"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    $av_index = "";
    $av_subDivision = "";
    $av_name = "";
    $av_address = "";
    if ($person_details) {
        foreach ($person_details as $person_details_item) {
            $av_index = $person_details_item["av_index"];
            $av_subDivision = $person_details_item["av_subDivision"];
            $av_name = $person_details_item["av_name"];
            $av_address = $person_details_item["av_address"];
        }
    }
    echo $av_index . "," . $av_subDivision . "," .$av_name . "," . $av_address;
}
