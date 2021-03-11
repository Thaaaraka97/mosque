<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");
$URL = "preview_saandha-amount-fixing-history.php?edited=1";


$id = "";
if (isset($_POST['newAmount'])) {
    $newAmount = $_POST['newAmount'];
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
if (isset($_POST['edited_amount'])) {
    $edited_amount = $_POST['edited_amount'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if ($action == "insert") {
    $insert_to_tbl_saandhaamountfixing = array(
        'saf_date' => mysqli_real_escape_string($database->con, $today),
        'saf_amount' => mysqli_real_escape_string($database->con, $newAmount),
    );
    if ($database->insert_data('tbl_saandhaamountfixing', $insert_to_tbl_saandhaamountfixing)) {
        $URL = "preview_saandha-amount-fixing-history.php?inserted=1";
        echo $URL;
    }
}
elseif ($action == "find_record") {
    $where = array(
        'saf_id'     =>     $id
    );
    $saandhaamountfixing_details = $database->select_where('tbl_saandhaamountfixing', $where);
    foreach ($saandhaamountfixing_details as $saandhaamountfixing_details_item) {
        echo $saandhaamountfixing_details_item["saf_amount"];
    }
}
elseif ($action == "update") {
    $update_data = array(
        'saf_amount' => mysqli_real_escape_string($database->con, $edited_amount)
    );
    $where_condition = array(
        'saf_id'     =>     $id
    );
    if ($database->update("tbl_saandhaamountfixing", $update_data, $where_condition)) {
        $URL = "preview_saandha-amount-fixing-history.php?edited=1";
        echo $URL;
    }

}
elseif ($action == "delete") {
    $where = array(
        'saf_id'     =>     $id
    );
    if ($database->delete_data("tbl_saandhaamountfixing", $where)) {
        $URL = "preview_saandha-amount-fixing-history.php?deleted=1";
        echo $URL;
    }

}




?>