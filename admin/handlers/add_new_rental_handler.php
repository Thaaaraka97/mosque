<?php
include "../include/db-connection.php";
$database = new Databases;

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
    echo $person_details_item["av_telephone"];
}

?>
