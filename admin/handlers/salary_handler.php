<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");
$URL = "forms.php?inserted_record=1";

$post = "";
$action = "";
$output = "";

if (isset($_POST['post'])) {
    $post = $_POST['post'];
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if ($action == "find_record") {
    $paidFor = 0;
    $pi_salary = 0;
    $md_salary = 0;
    $prev_payment = 0;
    if ($post == "PeshImaam") {
        $where = array(
            'pi_peshImaamId'     =>     $_POST["id"]
        );
        $person_details = $database->select_where('tbl_peshimaaamdetails', $where);
        foreach ($person_details as $person_details_item) {
            if (isset($person_details_item["pi_salary"])) {
                $pi_salary = $person_details_item["pi_salary"];
            }
        }
        $where2 = array(
            'pSal_peshImaamId'     =>     $_POST["id"]
        );
        $person_details = $database->select_where('tbl_peshimaamsalary', $where2);
        foreach ($person_details as $person_details_item) {
            $prev_payment = 0;
            if (isset($person_details_item["pSal_PaidFor"])) {
                $paidFor = $person_details_item["pSal_PaidFor"];
                $where2 = array(
                    'pSal_peshImaamId'     =>     $_POST["id"],
                    'pSal_PaidFor'     =>     $paidFor
                );
                $person_details = $database->select_where('tbl_peshimaamsalary', $where2);
                foreach ($person_details as $person_details_item) {
                    $prev_payment = $prev_payment + $person_details_item["pSal_basicSalary"];
                }
            }
        }
        echo $pi_salary . "+" . $paidFor . "+" . $prev_payment;
    } elseif ($post == "Muazzin") {
        $where = array(
            'md_muazzinId'     =>     $_POST["id"]
        );
        $person_details = $database->select_where('tbl_muazzindetails', $where);
        foreach ($person_details as $person_details_item) {
            $md_salary = $person_details_item["md_salary"];
        }
        $where2 = array(
            'mSal_muazzinId'     =>     $_POST["id"]
        );
        $person_details = $database->select_where('tbl_muazzinsalary', $where2);
        foreach ($person_details as $person_details_item) {
            $prev_payment = 0;
            if (isset($person_details_item["mSal_PaidFor"])) {
                $paidFor = $person_details_item["mSal_PaidFor"];
                $where3 = array(
                    'mSal_muazzinId'     =>     $_POST["id"],
                    'mSal_PaidFor'     =>     $paidFor
                );
                $person_details = $database->select_where('tbl_muazzinsalary', $where3);
                foreach ($person_details as $person_details_item) {
                    $prev_payment = (float)$prev_payment + (float)$person_details_item["mSal_basicSalary"];
                }
            }
        }
        echo $md_salary . "+" . $paidFor . "+" . $prev_payment;
    }
} elseif ($action == "find_ids") {
    $output .= "<option value='0' selected>Choose...</option>";
    if ($post == "PeshImaam") {

        $person_details = $database->select_data('tbl_peshimaaamdetails');
        foreach ($person_details as $person_details_item) {
            $output .= '<option value="' . $person_details_item["pi_peshImaamId"] . '"> ID - ' . $person_details_item["pi_peshImaamId"] . ' and Name - ' . $person_details_item["pi_name"] . '</option>';
        }
    } elseif ($post == "Muazzin") {

        $person_details = $database->select_data('tbl_muazzindetails');
        foreach ($person_details as $person_details_item) {
            $output .= '<option value="' . $person_details_item["md_muazzinId"] . '"> ID - ' . $person_details_item["md_muazzinId"] . ' and Name - ' . $person_details_item["md_name"] . '</option>';
        }
    }
    echo $output;
}
