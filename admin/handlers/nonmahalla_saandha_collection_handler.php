<?php
include "../include/db-connection.php";
$database = new Databases;
$action = "";

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if ($action == "find_record_tp") {
    $where = array(
        'nmsr_telephone'     =>     $_POST["tp"]
    );
    $person_details = $database->select_where('tbl_nonmahallasaandharegistration', $where);
    $av_index = "";
    $av_subDivision = "";
    $av_name = "";
    $av_address = "";
    if ($person_details) {
        foreach ($person_details as $person_details_item) {
            $name = $person_details_item["nmsr_name"];
            $address = $person_details_item["nmsr_address"];
        }
    }
    echo $name . "," . $address;
}
