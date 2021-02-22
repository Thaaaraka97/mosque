<?php
include "../include/db-connection.php";
$database = new Databases;

$where = array(
    // 'av_index'     =>     $_GET["index"],
    'tb_index'     =>     $_POST["index"],
    'tb_subDivision'     =>     $_POST["subdivision"],
    // 'av_subDivision'     =>     $_GET["subdivision"]
);
$person_details = $database->select_where('tbl_trusteeboarddetails', $where);
$person_details_item1="";
$person_details_item2="";
$person_details_item3="";
foreach ($person_details as $person_details_item) {
    $person_details_item1 = $person_details_item["tb_name"];
    $person_details_item2 =  $person_details_item["tb_designation"];
    $person_details_item3 =  $person_details_item["tb_address"];
}
echo $person_details_item1.','.$person_details_item2.','.$person_details_item3;

?>
