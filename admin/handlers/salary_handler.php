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
    if ($post == "PeshImaam") {
        $where = array(
            'pi_peshImaamId'     =>     $_POST["id"]
        );
        $person_details = $database->select_where('tbl_peshimaaamdetails', $where);
        foreach ($person_details as $person_details_item) {
            echo $person_details_item["pi_salary"];
        }
    }
    elseif ($post == "Muazzin") {
        $where = array(
            'md_muazzinId'     =>     $_POST["id"]
        );
        $person_details = $database->select_where('tbl_muazzindetails', $where);
        foreach ($person_details as $person_details_item) {
            echo $person_details_item["md_salary"];
        }
    }  
}
elseif ($action == "find_ids") {
    $output .= "<option value='0' selected>Choose...</option>";
    if ($post == "PeshImaam") {
        
        $person_details = $database->select_data('tbl_peshimaaamdetails');
        foreach ($person_details as $person_details_item) {
            $output .= '<option value="'.$person_details_item["pi_peshImaamId"].'"> ID - '.$person_details_item["pi_peshImaamId"].' and Name - '. $person_details_item["pi_name"] .'</option>';
        }
    }
    elseif ($post == "Muazzin") {
        
        $person_details = $database->select_data('tbl_muazzindetails');
        foreach ($person_details as $person_details_item) {
            $output .= '<option value="'.$person_details_item["md_muazzinId"].'"> ID - '.$person_details_item["md_muazzinId"].' and Name - '. $person_details_item["md_name"] .'</option>';
        }
    }
    echo $output;
}



?>