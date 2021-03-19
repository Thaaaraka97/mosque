<?php
include "../include/db-connection.php";
$database = new databases();
$URL = "preview_villager-details.php?action=allvillagers&left=1";

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
    } 
    elseif ($_GET['action'] == "saandha") {
        $update_data = array(

            'av_saandhaStatus'          =>     mysqli_real_escape_string($database->con, 1)
        );
        $where_condition = array(
            'av_index'     =>     $_GET["id"]
        );
        if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
            $URL = "preview_villager-details.php?action=allvillagers&saandha=1";
            echo $URL;
            
        }
    }
    
}
