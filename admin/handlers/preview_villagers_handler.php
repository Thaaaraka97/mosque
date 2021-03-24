<?php
include "../include/db-connection.php";
$database = new databases();
$URL = "preview_villager-details.php?action=allvillagers&left=1";
date_default_timezone_set("Asia/Calcutta");
$today = date('Y-m-d');

if (isset($_GET['action'])) {
    if ($_GET['action'] == "left_village") {
        $update_data = array(

            'av_leftVillage'          =>     mysqli_real_escape_string($database->con, 1),
            'av_saandhaStatus'          =>     mysqli_real_escape_string($database->con, 0),
            'av_saandhaStatusReason'          =>     mysqli_real_escape_string($database->con, "Left the Village")
        );
        $where_condition = array(
            'av_index'     =>     $_GET["index"]
        );
        if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
            echo $URL;
        }
    } elseif ($_GET['action'] == "saandha") {
        $update_data = array(

            'av_saandhaStatus'          =>     mysqli_real_escape_string($database->con, 1),
            'av_saandhaStatusReason'          =>     mysqli_real_escape_string($database->con, "Saandha Registered")
        );
        $where_condition = array(
            'av_index'     =>     $_GET["id"]
        );

        // retrieving details of the person
        $av_address = "";
        $av_name = "";
        $av_subDivision = "";
        $person_details = $database->select_where('tbl_allvillagers', $where_condition);
        foreach ($person_details as $person_details_item) {
            $av_name = $person_details_item["av_name"];
            $av_subDivision = $person_details_item["av_subDivision"];
            $av_address = $person_details_item["av_address"];
        }

        if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
            // input a record into saandha collection
            $insert_to_tbl_saandhacollection = array(
                'collection_index' => mysqli_real_escape_string($database->con, $_GET["id"]),
                'collection_subdivision' => mysqli_real_escape_string($database->con, $av_subDivision),
                'collection_name' => mysqli_real_escape_string($database->con, $av_name),
                'collection_address' => mysqli_real_escape_string($database->con, $av_address),
                'collection_paidAmount' => mysqli_real_escape_string($database->con, "0"),
                'collection_dueAmount' => mysqli_real_escape_string($database->con, "0"),
                'collection_username' => mysqli_real_escape_string($database->con, "user"),
                'collection_date' => mysqli_real_escape_string($database->con, $today),
                'collection_paidFor' => mysqli_real_escape_string($database->con, date('Y-M', strtotime($today)))

            );
            if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                $URL = "preview_villager-details.php?action=allvillagers&saandha=1&sort1=0";
                echo $URL;
            }
        }
    }
}
