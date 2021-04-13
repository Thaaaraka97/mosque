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
    $av_specialSaandhaAmt = "";
    $payFor = "0";
    $due = "0";
    $saandha_amount = "";
    $current_saandha_amount = "";
    $where = array(
        'av_index'     =>     $_POST["index"],
        'av_subDivision'     =>     $_POST["subdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    foreach ($person_details as $person_details_item) {
        $av_name = $person_details_item["av_name"];
        $av_address = $person_details_item["av_address"];
        $av_specialSaandhaAmt = $person_details_item["av_specialSaandhaAmt"];
    }

    $saandha_amount_details = $database->select_data('tbl_saandhaamountfixing');
    foreach ($saandha_amount_details as $saandha_amount_item) {
        $saandha_amount = $saandha_amount_item["saf_amount"];
        $saf_date = $saandha_amount_item["saf_date"];
        $saf_date = date_create($saf_date);
        $date = date_format($saf_date, "Y-M");
        $YYMM = date('Y-M');
        if ($YYMM == $date) {
            $current_saandha_amount = $saandha_amount;
            break;
        } else {
            $current_saandha_amount = $saandha_amount;
        }
    }

    $where2 = array(
        'collection_index'     =>     $_POST["index"],
        'collection_subdivision'     =>     $_POST["subdivision"]
    );
    if ($payment_details = $database->select_where('tbl_saandhacollection', $where2)) {
        foreach ($payment_details as $payment_details_item) {
            $payFor = $payment_details_item["collection_paidFor"];
            $due = $payment_details_item["collection_dueAmount"];
        }
    }

    echo $av_name . "+" . $av_address . "+" . $payFor . "+" . $current_saandha_amount . "+" . $due . "+" . $av_specialSaandhaAmt;
}
