<?php
include "../include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;
$today = date("Y-m-d");


$id = "";
$action = $_POST["action"];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['inputDate'])) {
    $inputDate = $_POST['inputDate'];
}
if (isset($_POST['inputAmount'])) {
    $inputAmount = $_POST['inputAmount'];
}
if (isset($_POST['inputUser'])) {
    $inputUser = $_POST['inputUser'];
}


if ($action == "add_undiyal") {

    $insert_tbl_undiyalcollection = array(
        'uc_date' => mysqli_real_escape_string($database->con, $inputDate),
        'uc_username' => mysqli_real_escape_string($database->con, $inputUser),
        'uc_amount' => mysqli_real_escape_string($database->con, $inputAmount)
    );
    if ($database->insert_data('tbl_undiyalcollection', $insert_tbl_undiyalcollection)) {
        $URL = "preview_undiyal-collection.php?inserted=1";
        echo $URL;
    }
}
elseif ($action == "add_kanduri") {

    $insert_tbl_kanduricollection = array(
        'kc_date' => mysqli_real_escape_string($database->con, $inputDate),
        'kc_username' => mysqli_real_escape_string($database->con, $inputUser),
        'kc_amount' => mysqli_real_escape_string($database->con, $inputAmount)
    );
    if ($database->insert_data('tbl_kanduricollection', $insert_tbl_kanduricollection)) {
        $URL = "preview_kanduri-collection.php?inserted=1";
        echo $URL;
    }
}
elseif ($action == "delete_record") {
    $where = array(  
        'scc_id'     =>     $id 
   );  
   if($database->delete_data("tbl_saandhacollectorcollection", $where))  
   {  
    $URL = "preview_collector-collection.php?deleted=1";
    echo $URL;
   }
}
