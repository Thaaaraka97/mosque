<?php
include "../include/db-connection.php";
$database = new databases();
$URL = "preview_nikkah-details.php?deleted=1";

$id=$_POST['id'];
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
}
?>