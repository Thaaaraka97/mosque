<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");
$URL = "preview_saandha-amount-fixing-history.php?edited=1";


$id = "";
if (isset($_POST['newAmount'])) {
    $newAmount = $_POST['newAmount'];
}

$insert_to_tbl_saandhaamountfixing = array(
    'saf_date' => mysqli_real_escape_string($database->con, $today),
    'saf_amount' => mysqli_real_escape_string($database->con, $newAmount),
);
if ($database->insert_data('tbl_saandhaamountfixing', $insert_to_tbl_saandhaamountfixing)) {
    echo $URL;
}


?>