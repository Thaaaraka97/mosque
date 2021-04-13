<?php
include "../include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;

$id = "";
$av_subDivision = "";
$av_address = "";
$av_monthlyIncomeFamily = "";
$av_avgInterpersonalIncome = "";
$av_noofChildren = "";
$av_unmarriedChildren = "";
$av_residentialStatus = "";
$av_prevRes_address = "";
$av_prevRes_gramasevaka = "";
$av_prevRes_police = "";
$av_prevRes_mahalla = "";
$av_newMigrant = "";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $where = array(
        'av_FamilyID'     =>     $id
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    
    foreach ($person_details as $person_details_item) {
        $av_subDivision = $person_details_item["av_subDivision"];
        $av_address = $person_details_item["av_address"];
        $av_monthlyIncomeFamily = $person_details_item["av_monthlyIncomeFamily"];
        $av_avgInterpersonalIncome = $person_details_item["av_avgInterpersonalIncome"];
        $av_noofChildren = $person_details_item["av_noofChildren"];
        $av_unmarriedChildren = $person_details_item["av_unmarriedChildren"];
        $av_residentialStatus = $person_details_item["av_residentialStatus"];
        $av_prevRes_address = $person_details_item["av_prevRes_address"];
        $av_prevRes_gramasevaka = $person_details_item["av_prevRes_gramasevaka"];
        $av_prevRes_police = $person_details_item["av_prevRes_police"];
        $av_prevRes_mahalla = $person_details_item["av_prevRes_mahalla"];
        $av_newMigrant = $person_details_item["av_newMigrant"];
    }

    if ($av_subDivision != "" && $id != "") {
        $insert_data = array(
            'id' => mysqli_real_escape_string($database->con, $id),
            'av_subDivision' => mysqli_real_escape_string($database->con, $av_subDivision),
            'av_address' => mysqli_real_escape_string($database->con, $av_address),
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome),
            'av_noofChildren' => mysqli_real_escape_string($database->con, $av_noofChildren),
            'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $av_unmarriedChildren),
            'av_residentialStatus' => mysqli_real_escape_string($database->con, $av_residentialStatus),
            'av_prevRes_address' => mysqli_real_escape_string($database->con, $av_prevRes_address),
            'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, $av_prevRes_gramasevaka),
            'av_prevRes_police' => mysqli_real_escape_string($database->con, $av_prevRes_police),
            'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, $av_prevRes_mahalla),
            'av_newMigrant' => mysqli_real_escape_string($database->con, $av_newMigrant)
        );
    
        // if ($database->insert_data('tbl_temp_allvillagers', $insert_data)) {
        //     echo $id."+".$av_subDivision."+".$av_address."+".$av_avgInterpersonalIncome."+".$av_monthlyIncomeFamily."+".$av_noofChildren."
        //         +".$av_unmarriedChildren."+".$av_residentialStatus."+".$av_prevRes_address."+".$av_prevRes_gramasevaka."
        //         +".$av_prevRes_police."+".$av_prevRes_mahalla."+".$av_newMigrant;
        // }
        echo $id."+".$av_subDivision."+".$av_address."+".$av_avgInterpersonalIncome."+".$av_monthlyIncomeFamily."+".$av_noofChildren."
                +".$av_unmarriedChildren."+".$av_residentialStatus."+".$av_prevRes_address."+".$av_prevRes_gramasevaka."
                +".$av_prevRes_police."+".$av_prevRes_mahalla."+".$av_newMigrant;
    }
    else {
        echo "No Data";
    }
    

    

}
