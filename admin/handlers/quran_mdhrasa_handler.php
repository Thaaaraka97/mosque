<?php
include "../include/db-connection.php";
$database = new Databases;
$URL = "preview_q_madrasa-details.php?deleted=1";

$id = $_POST['id'];
$action = $_POST['action'];

if (isset($action)) {
    if ($action == "find_record") {
        $where = array(
            // 'av_index'     =>     $_GET["index"],
            'av_index'     =>     $_POST["index"],
            'av_subDivision'     =>     $_POST["subdivision"]
            // 'av_subDivision'     =>     $_GET["subdivision"]
        );
        $person_details = $database->select_where('tbl_allvillagers', $where);
        
        foreach ($person_details as $person_details_item) {
            echo $person_details_item["av_name"] . ",";
            echo $person_details_item["av_address"] . ",";
            echo $person_details_item["av_dob"] . ",";
            echo $person_details_item["av_gender"];
        }
    }
    elseif ($action == "delete") {
        $where = array(  
            'qm_qmadrasaId'     =>     $id 
       );  
       if($database->delete_data("tbl_quranmadrasadetails", $where))  
       {  
        echo $URL;
       }
       else{
           echo "preview_q_madrasa-details.php";
       }
    }
}
