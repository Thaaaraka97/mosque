<?php
include "../include/db-connection.php";
$database = new databases();
$URL = "../preview_villager-details.php";

if (isset($_GET['action'])) {
    if ($_GET['action'] == "left_village") {
        $update_data = array(

            'av_leftVillage'          =>     mysqli_real_escape_string($database->con, 1)
        );
        $where_condition = array(
            'av_index'     =>     $_GET["index"],
            'av_subDivision'     =>     $_GET["subdivision"],
        );
        if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
            header("location:$URL");
        }
    } 
    
}
