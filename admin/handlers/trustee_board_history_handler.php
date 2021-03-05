<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");

$id = "";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['inputDetails'])) {
    $inputDetails = $_POST['inputDetails'];
}

// find the record
$where = array(
    'th_id'     =>     $id
);
$trustee_board_history = $database->select_where('tbl_trusteeboardhistory', $where);
$record="";
foreach ($trustee_board_history as $trustee_board_history_item) {
    $record = $trustee_board_history_item['th_record'];
}

$details = $record." \n".$inputDetails;

$URL = "preview_trustee_board-history_step-2.php?action=editable&edited=1&id=".$id;
// update record
$update_data = array(
    'th_record' => mysqli_real_escape_string($database->con, $details)
);
$where_condition = array(
    'th_id'     =>     $id
);
if ($database->update("tbl_trusteeboardhistory", $update_data, $where_condition)) {
    echo $URL;
}

?>