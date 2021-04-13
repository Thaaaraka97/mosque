<?php
include "../include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;
$action = "";
$output = '';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if ($action == "find_record_sub") { 
    $av_name = "";
    $av_address = "";
    $payFor = "0";
    $saandha_amount = "";
    $where = array(
        'scc_index'     =>     $_POST["index"],
        'scc_subDivision'     =>     $_POST["subdivision"]
    );
    $person_details = $database->select_where('tbl_saandhacollectorcollection', $where);
    foreach ($person_details as $person_details_item) {
        echo $person_details_item["scc_totCollectedAmount"] . "+";
        echo $person_details_item["scc_settledAmount"];
    }
    

}

?>