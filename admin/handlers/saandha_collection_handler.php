<?php
include "../include/db-connection.php";

$today = date('Y-M');
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
    $ref1 = "0";
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
        $av_telephone = $person_details_item["av_telephone"];
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

    // due upto today is added to the due amount
    $no_of_due_months = $database->calculate_months($payFor);
    $due_upto_today = 0;
    $month = $payFor;
    $month_str = strtotime($month);
    $today_str = strtotime($today);
    if ($av_specialSaandhaAmt != "0") {
        $due_upto_today = $due + ($no_of_due_months * $av_specialSaandhaAmt);
    }
    else {
        $saandha_amount_details = $database->select_data('tbl_saandhaamountfixing');
        // $tot_due = 0;
        $current_saandha_amount_for_due = 0;
        if ($due != 0) {
            $due_upto_today = $due_upto_today + $due;
        }
        
        if ($month_str < $today_str) {
            $month = date('Y-M', strtotime('+1 month', strtotime($month)));
            while ($month != $today) {
                // retrive saandha amount relevant to month
                foreach ($saandha_amount_details as $saandha_amount_item) {
                    $saandha_amount = $saandha_amount_item["saf_amount"];
                    $saf_date = $saandha_amount_item["saf_date"];
                    $saf_date = date_create($saf_date);
                    $date = date_format($saf_date, "Y-M");
                    $date_str = strtotime($date);
                    if ($month == $date) {
                        $current_saandha_amount_for_due = $saandha_amount;
                        break;
                    } else {
                        $current_saandha_amount_for_due = $saandha_amount;
                    }
                }
                $due_upto_today = $due_upto_today + $current_saandha_amount_for_due;
                $month = date('Y-M', strtotime('+1 month', strtotime($month)));
            }
        }
        

        // $due_upto_today = $due + ($no_of_due_months * $current_saandha_amount);
    }

    echo $av_name . "+" . $av_address . "+" . $payFor . "+" . $current_saandha_amount . "+" . $due . "+" . $av_specialSaandhaAmt . "+" . $due_upto_today . "+" . $av_telephone;
}
