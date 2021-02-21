<?php
include "../include/db-connection.php";
$database = new Databases;
echo "ok";

// insert into tbl_trusteeboarddetails
// submitTrusteeBoard button click

    
    $today = date("Y-m-d");
    $tb_electedYYMM = date("Y-m");

    // $insert_president_details = array(
    //     'tb_index' => mysqli_real_escape_string($database->con, $_POST['inputPresidentIndexNo']),
    //     'tb_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputPresidentSubdivision']),
    //     'tb_designation' => mysqli_real_escape_string($database->con, "President"),
    //     'tb_name' => mysqli_real_escape_string($database->con, $_POST['inputPresidentName']),
    //     'tb_address' => mysqli_real_escape_string($database->con, $_POST['inputPresidentAddress']),
    //     'tb_job' => mysqli_real_escape_string($database->con, $_POST['inputPresidentJob']),
    //     'tb_salary' => mysqli_real_escape_string($database->con, $_POST['inputName']),
    //     'tb_telephone' => mysqli_real_escape_string($database->con, $_POST['inputPresidentTP']),
    //     'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
    //     'tb_startDate' => mysqli_real_escape_string($database->con, $today),
    //     // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
    //     'tb_isActive' => mysqli_real_escape_string($database->con, 1)

    // );
    echo "inside handler";

    // $database->insert_data('tbl_trusteeboarddetails', $insert_president_details);
    // $URL = "forms.php";
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

?>