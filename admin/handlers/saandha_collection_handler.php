<?php
include "../include/db-connection.php";
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
        'av_index'     =>     $_POST["index"],
        'av_subDivision'     =>     $_POST["subdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    foreach ($person_details as $person_details_item) {
        $av_name = $person_details_item["av_name"];
        $av_address = $person_details_item["av_address"];
    }
    
    $saandha_amount_details = $database->select_data('tbl_saandhaamountfixing');
    foreach ($saandha_amount_details as $saandha_amount_item) {
        $saandha_amount = $saandha_amount_item["saf_amount"];
    }

    $where2 = array(
        'collection_index'     =>     $_POST["index"],
        'collection_subdivision'     =>     $_POST["subdivision"]
    ); 
    if ($payment_details = $database->select_where('tbl_saandhacollection', $where2)) {
        foreach ($payment_details as $payment_details_item) {
            $payFor = $payment_details_item["collection_paidFor"];
        }
    }
    
    echo $av_name."+".$av_address."+".$payFor."+".$saandha_amount;

}

?>