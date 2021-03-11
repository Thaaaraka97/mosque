<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");
$URL = "forms.php?inserted_record=1";


$post = "";
if (isset($_POST['post'])) {
    $post = $_POST['post'];
}

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



?>