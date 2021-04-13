<?php
include "../include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;
$action = "";
if (isset($_POST["action"])) {
    $action = $_POST["action"];
}

if ($action == "find_record") {
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
}



?>
