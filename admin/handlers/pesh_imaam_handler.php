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
        $URL = "preview_pesh_imaam-details.php?terminated=1";
        echo $URL;
    }
}
