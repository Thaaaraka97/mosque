<?php
include "../include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;

$where = array(
    'tb_index'     =>     $_POST["index"],
    'tb_subDivision'     =>     $_POST["subdivision"],
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
echo $person_details_item1.'+'.$person_details_item2.'+'.$person_details_item3;

?>
