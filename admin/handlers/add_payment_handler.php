<?php
include "../include/db-connection.php";

$today = date('Y-M');
$database = new Databases;
$action = "";
$output = '';
$due_upto_today = 0;

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
        echo $person_details_item["av_telephone"] . "+";
        echo $person_details_item["av_name"] . "+";
        echo $person_details_item["av_address"];
    }
} elseif ($action == "find_record_tp") {
    $where = array(
        'av_telephone'     =>     $_POST["inputRentalPaymentTP"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    foreach ($person_details as $person_details_item) {
        echo $person_details_item["av_name"] . "+";
        echo $person_details_item["av_address"];
    }
} elseif ($action == "find_rental_records") {
    $output .= '<option value="0" selected>Choose...</option>';
    $where = array(
        'rr_rentalType'     =>     $_POST["inputRentalType"],
        'rr_telephone'     =>     $_POST["inputRentalPaymentTP"]
    );
    $rental_details = $database->select_where('tbl_rentalsregisteration', $where);
    foreach ($rental_details as $rental_details_item) {
        $output .= '<option value="' . $rental_details_item["rr_id"] . '">Rental ID - ' . $rental_details_item["rr_id"] . ' and Rental Start - ' . $rental_details_item["rr_startDate"] . '</option>';
    }
    echo $output;
} elseif ($action == "find_rental_records_with_id") {
    $inputRentalID = $_POST["inputRentalID"];
    $where = array(
        'rr_id'     =>     $inputRentalID
    );
    $is_lease = "";
    $rr_monthlyPayment = "";
    $rr_leasePayment = "";
    $rental_details = $database->select_where('tbl_rentalsregisteration', $where);
    foreach ($rental_details as $rental_details_item) {
        $is_lease = $rental_details_item["rr_lease"];
        $rr_monthlyPayment = $rental_details_item["rr_monthlyPayment"];
        $rr_leasePayment = $rental_details_item["rr_leasePayment"];
    }

    $where2 = array(
        'ri_rentalid'     =>     $inputRentalID
    );
    $ri_payFor = "";
    $ri_dueAmount = "";
    $rental_income_details = $database->select_where('tbl_rentalincome', $where2);
    foreach ($rental_income_details as $rental_income_details_item) {
        $ri_payFor = $rental_income_details_item["ri_payFor"];
        $ri_dueAmount = $rental_income_details_item["ri_dueAmount"];
    }

    // due upto today is added to the due amount
    $date_now = time(); //current timestamp
    $date_convert = strtotime($ri_payFor);
    if ($date_now > $date_convert) {
        $no_of_due_months = $database->calculate_months($ri_payFor);
        if ($is_lease == "0") {
            $due_upto_today = $ri_dueAmount + ($no_of_due_months * $rr_monthlyPayment);
        } else {
            $due_upto_today = $ri_dueAmount + ($no_of_due_months * $rr_leasePayment);
        }
    }
    else {
        $due_upto_today = 0;
    }


    echo $is_lease . "+" . $rr_monthlyPayment . "+" . $rr_leasePayment . "+" . $ri_payFor . "+" . $ri_dueAmount . "+" . $due_upto_today;
}
