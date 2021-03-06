<?php
include "../include/db-connection.php";

$database = new Databases;
$today = date("Y-m-d");

$id = "";
$action = $_POST["action"];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['reason'])) {
    $reason = $_POST['reason'];
}

if ($action == "terminate") {
    $update_data = array(
        'pi_activestatus' => mysqli_real_escape_string($database->con, 0),
        'pi_resignedReason' => mysqli_real_escape_string($database->con, $reason),
        'pi_resignedDate' => mysqli_real_escape_string($database->con, $today),

    );
    $where_condition = array(
        'pi_peshImaamId'     =>     $id
    );
    if ($database->update("tbl_peshimaaamdetails", $update_data, $where_condition)) {
        $URL = "preview_pesh_imaam-details.php?terminated=1&id=".$id;
        echo $URL;
    }
}
elseif ($action == "find_records") {
    $where = array(
        'av_index'     =>     $_POST["index"],
        'av_subDivision'     =>     $_POST["subdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    
    foreach ($person_details as $person_details_item) {
        echo $person_details_item["av_name"] . "+";
        echo $person_details_item["av_address"] . "+";
        echo $person_details_item["av_noofChildren"] . "+";
        echo $person_details_item["av_telephone"] . "+";
        echo $person_details_item["av_married"] . "+";
        echo $person_details_item["av_nic"];
    }
}
