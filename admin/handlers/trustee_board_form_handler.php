<?php
include "../include/db-connection.php";
$database = new Databases;
$today = date("Y-m-d");

$id = "";
$action = $_POST["action"];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if ($action == "find_record") {

    $where = array(
        'av_index'     =>     $_POST["index"],
        'av_subDivision'     =>     $_POST["subdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);

    foreach ($person_details as $person_details_item) {
        echo $person_details_item["av_name"] . ",";
        echo $person_details_item["av_telephone"] . ",";
        echo $person_details_item["av_job"] . ",";
        echo $person_details_item["av_monthlyIncomePersonal"] . ",";
        echo $person_details_item["av_address"];
    }
}

// insert into tbl_trusteeboarddetails
// submitTrusteeBoard button click
elseif ($action == "submit") {

    // president data
    $inputPresidentIndexNo = $_POST["inputPresidentIndexNo"];
    $inputPresidentSubdivision = $_POST["inputPresidentSubdivision"];
    $inputPresidentName = $_POST["inputPresidentName"];
    $inputPresidentJob = $_POST["inputPresidentJob"];
    $inputPresidentTP = $_POST["inputPresidentTP"];
    $inputPresidentAddress = $_POST["inputPresidentAddress"];
    $inputPresidentSalary = $_POST["inputPresidentSalary"];
    // vice president data
    $inputVPIndexNo = $_POST["inputVPIndexNo"];
    $inputVPSubdivision = $_POST["inputVPSubdivision"];
    $inputVPName = $_POST["inputVPName"];
    $inputVPJob = $_POST["inputVPJob"];
    $inputVPTP = $_POST["inputVPTP"];
    $inputVPAddress = $_POST["inputVPAddress"];
    $inputVPSalary = $_POST["inputVPSalary"];
    // secretary data
    $inputSecretaryIndexNo = $_POST["inputSecretaryIndexNo"];
    $inputSecretarySubdivision = $_POST["inputSecretarySubdivision"];
    $inputSecretaryName = $_POST["inputSecretaryName"];
    $inputSecretaryJob = $_POST["inputSecretaryJob"];
    $inputSecretaryTP = $_POST["inputSecretaryTP"];
    $inputSecretaryAddress = $_POST["inputSecretaryAddress"];
    $inputSecretarySalary = $_POST["inputSecretarySalary"];
    // assistant secretary data
    $inputASIndexNo = $_POST["inputASIndexNo"];
    $inputASSubdivision = $_POST["inputASSubdivision"];
    $inputASName = $_POST["inputASName"];
    $inputASJob = $_POST["inputASJob"];
    $inputASTP = $_POST["inputASTP"];
    $inputASAddress = $_POST["inputASAddress"];
    $inputASSalary = $_POST["inputASSalary"];
    // treasurer data
    $inputTreasurerIndexNo = $_POST["inputTreasurerIndexNo"];
    $inputTreasurerSubdivision = $_POST["inputTreasurerSubdivision"];
    $inputTreasurerName = $_POST["inputTreasurerName"];
    $inputTreasurerJob = $_POST["inputTreasurerJob"];
    $inputTreasurerTP = $_POST["inputTreasurerTP"];
    $inputTreasurerAddress = $_POST["inputTreasurerAddress"];
    $inputTreasurerSalary = $_POST["inputTreasurerSalary"];

    $today = date("Y-m-d");
    $tb_electedYYMM = date("Y-m");

    // collect president data into an array
    $insert_president_details = array(
        'tb_index' => mysqli_real_escape_string($database->con, $inputPresidentIndexNo),
        'tb_subDivision' => mysqli_real_escape_string($database->con, $inputPresidentSubdivision),
        'tb_designation' => mysqli_real_escape_string($database->con, "President"),
        'tb_name' => mysqli_real_escape_string($database->con, $inputPresidentName),
        'tb_address' => mysqli_real_escape_string($database->con, $inputPresidentAddress),
        'tb_job' => mysqli_real_escape_string($database->con, $inputPresidentJob),
        'tb_salary' => mysqli_real_escape_string($database->con, $inputPresidentSalary),
        'tb_telephone' => mysqli_real_escape_string($database->con, $inputPresidentTP),
        'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
        'tb_startDate' => mysqli_real_escape_string($database->con, $today),
        // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'tb_isActive' => mysqli_real_escape_string($database->con, 1)

    );

    // collect vice president data into an array
    $insert_VP_details = array(
        'tb_index' => mysqli_real_escape_string($database->con, $inputVPIndexNo),
        'tb_subDivision' => mysqli_real_escape_string($database->con, $inputVPSubdivision),
        'tb_designation' => mysqli_real_escape_string($database->con, "Vice President"),
        'tb_name' => mysqli_real_escape_string($database->con, $inputVPName),
        'tb_address' => mysqli_real_escape_string($database->con, $inputVPAddress),
        'tb_job' => mysqli_real_escape_string($database->con, $inputVPJob),
        'tb_salary' => mysqli_real_escape_string($database->con, $inputVPSalary),
        'tb_telephone' => mysqli_real_escape_string($database->con, $inputVPTP),
        'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
        'tb_startDate' => mysqli_real_escape_string($database->con, $today),
        // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'tb_isActive' => mysqli_real_escape_string($database->con, 1)

    );

    // collect secretary data into an array
    $insert_Secretary_details = array(
        'tb_index' => mysqli_real_escape_string($database->con, $inputSecretaryIndexNo),
        'tb_subDivision' => mysqli_real_escape_string($database->con, $inputSecretarySubdivision),
        'tb_designation' => mysqli_real_escape_string($database->con, "Secretary"),
        'tb_name' => mysqli_real_escape_string($database->con, $inputSecretaryName),
        'tb_address' => mysqli_real_escape_string($database->con, $inputSecretaryAddress),
        'tb_job' => mysqli_real_escape_string($database->con, $inputSecretaryJob),
        'tb_salary' => mysqli_real_escape_string($database->con, $inputSecretarySalary),
        'tb_telephone' => mysqli_real_escape_string($database->con, $inputSecretaryTP),
        'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
        'tb_startDate' => mysqli_real_escape_string($database->con, $today),
        // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'tb_isActive' => mysqli_real_escape_string($database->con, 1)

    );

    // collect assistant secretary data into an array
    $insert_AS_details = array(
        'tb_index' => mysqli_real_escape_string($database->con, $inputASIndexNo),
        'tb_subDivision' => mysqli_real_escape_string($database->con, $inputASSubdivision),
        'tb_designation' => mysqli_real_escape_string($database->con, "Assistant Secretary"),
        'tb_name' => mysqli_real_escape_string($database->con, $inputASName),
        'tb_address' => mysqli_real_escape_string($database->con, $inputASAddress),
        'tb_job' => mysqli_real_escape_string($database->con, $inputASJob),
        'tb_salary' => mysqli_real_escape_string($database->con, $inputASSalary),
        'tb_telephone' => mysqli_real_escape_string($database->con, $inputASTP),
        'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
        'tb_startDate' => mysqli_real_escape_string($database->con, $today),
        // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'tb_isActive' => mysqli_real_escape_string($database->con, 1)

    );

    // collect treasurer data into an array
    $insert_Treasurer_details = array(
        'tb_index' => mysqli_real_escape_string($database->con, $inputTreasurerIndexNo),
        'tb_subDivision' => mysqli_real_escape_string($database->con, $inputTreasurerSubdivision),
        'tb_designation' => mysqli_real_escape_string($database->con, "Treasurer"),
        'tb_name' => mysqli_real_escape_string($database->con, $inputTreasurerName),
        'tb_address' => mysqli_real_escape_string($database->con, $inputTreasurerAddress),
        'tb_job' => mysqli_real_escape_string($database->con, $inputTreasurerJob),
        'tb_salary' => mysqli_real_escape_string($database->con, $inputTreasurerSalary),
        'tb_telephone' => mysqli_real_escape_string($database->con, $inputTreasurerTP),
        'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
        'tb_startDate' => mysqli_real_escape_string($database->con, $today),
        // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'tb_isActive' => mysqli_real_escape_string($database->con, 1)

    );

    $insert1 = $database->insert_data('tbl_trusteeboarddetails', $insert_president_details);
    $insert2 = $database->insert_data('tbl_trusteeboarddetails', $insert_VP_details);
    $insert3 = $database->insert_data('tbl_trusteeboarddetails', $insert_Secretary_details);
    $insert4 = $database->insert_data('tbl_trusteeboarddetails', $insert_AS_details);
    $insert5 = $database->insert_data('tbl_trusteeboarddetails', $insert_Treasurer_details);

    if ($insert1) {
        if ($insert2) {
            if ($insert3) {
                if ($insert4) {
                    if ($insert5) {
                        $insert_to_tbHistory = array(
                            'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM)
                        );
                        $database->insert_data('tbl_trusteeboardhistory', $insert_to_tbHistory);
                        
                    }
                }
            }
        }
    }

    $advisoryMembers = count($_POST["inputMemberIndexNo"]);
    if ($advisoryMembers > 0) {
        for ($i = 0; $i < $advisoryMembers; $i++) {
            // collect treasurer data into an array
            $insert_advisory_details = array(
                'tb_index' => mysqli_real_escape_string($database->con, $_POST["inputMemberIndexNo"][$i]),
                'tb_subDivision' => mysqli_real_escape_string($database->con, $_POST["inputMemberSubdivision"][$i]),
                'tb_designation' => mysqli_real_escape_string($database->con, "Advisory Member"),
                'tb_name' => mysqli_real_escape_string($database->con, $_POST["inputMemberName"][$i]),
                'tb_address' => mysqli_real_escape_string($database->con, $_POST["inputMemberAddress"][$i]),
                'tb_job' => mysqli_real_escape_string($database->con, $_POST["inputMemberJob"][$i]),
                'tb_salary' => mysqli_real_escape_string($database->con, $_POST["inputMemberSalary"][$i]),
                'tb_telephone' => mysqli_real_escape_string($database->con, $_POST["inputMemberTP"][$i]),
                'tb_electedYYMM' => mysqli_real_escape_string($database->con, $tb_electedYYMM),
                'tb_startDate' => mysqli_real_escape_string($database->con, $today),
                // 'tb_endDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
                'tb_isActive' => mysqli_real_escape_string($database->con, 1)

            );
            $database->insert_data('tbl_trusteeboarddetails', $insert_advisory_details);
        }
    }

    $URL = "forms.php?inserted_record=1";
    echo $URL;
}

elseif ($action == "terminate") {
    $update_data = array(
        'tb_isActive' => mysqli_real_escape_string($database->con, 0),
        'tb_endDate' => mysqli_real_escape_string($database->con, $today)
    );
    $where_condition = array(
        'tb_id'     =>     $id
    );
    if ($database->update("tbl_trusteeboarddetails", $update_data, $where_condition)) {
        $URL = "preview_trustee_board-details.php?terminated=1";
        echo $URL;
    }
}
