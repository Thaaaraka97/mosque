<?php
include "../include/db-connection.php";

$database = new databases();
$URL = "preview_private-loans.php?deleted=1";

if (isset($$id)) {
    $id=$_POST['id'];
}
$action=$_POST['action'];

if (isset($action)) {
    if ($action == "delete_record") {
        $where = array(  
            'pl_id'     =>     $id 
       );  
       if($database->delete_data("tbl_privateloans", $where))  
       {  
        echo $URL;
       }
    }
}
?>