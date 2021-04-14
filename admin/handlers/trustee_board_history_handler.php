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
$th_electedYYMM="";
foreach ($trustee_board_history as $trustee_board_history_item) {
    $th_electedYYMM = $trustee_board_history_item['th_electedYYMM'];
}

$insert_tbl_trusteeboardhistory = array(
    'th_electedYYMM' => mysqli_real_escape_string($database->con, $th_electedYYMM),
    'th_record' => mysqli_real_escape_string($database->con, $inputDetails)
);
if ($database->insert_data('tbl_trusteeboardhistory', $insert_tbl_trusteeboardhistory)) {
    $URL = "preview_trustee_board-history_step-2.php?action=editable&edited=1&id=".$id;
    echo $URL;
}

?>