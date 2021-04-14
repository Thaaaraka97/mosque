<?php
include "../include/db-connection.php";

$database = new databases();
$URL = "preview_nikkah-details.php?deleted=1";

if (isset($$id)) {
    $id=$_POST['id'];
}
$action=$_POST['action'];

if (isset($action)) {
    if ($action == "delete") {
        $where = array(  
            'nd_nikkahId'     =>     $id 
       );  
       if($database->delete_data("tbl_nikkahdetails", $where))  
       {  
        echo $URL;
       }
    }
    elseif ($action == "find_details") {
        $where = array(
            'av_index'     =>     $_POST["index"],
            'av_subDivision'     =>     $_POST["subdivision"]
        );
        $person_details = $database->select_where('tbl_allvillagers', $where);
        foreach ($person_details as $person_details_item) {
            echo $person_details_item["av_telephone"] . "+";
            echo $person_details_item["av_name"] . "+";
            echo $person_details_item["av_dob"] . "+";
            echo $person_details_item["av_nic"] . "+";
            echo $person_details_item["av_guardianIndex"] . "+";
            echo $person_details_item["av_address"];
        }
        
    }
}
?>