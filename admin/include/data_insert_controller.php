<?php
include "include/db-connection.php";
$database = new databases();
$URL = "forms.php?inserted_record=1";
$insert_data = "";
date_default_timezone_set("Asia/Calcutta");
$today = date('Y-m-d');
$time = date("H:i");

// insert data into tbl_temp_allvillagers
// addAVMember button click
if (isset($_POST["addAVMember"])) {

    if (isset($_POST["inputPrevAddress"])) {
        $inputPrevAddress = $_POST["inputPrevAddress"];
    } else {
        $inputPrevAddress = "N/A";
    }
    if (isset($_POST['Gramasevaka'])) {
        $Gramasevaka = 1;
    } else {
        $Gramasevaka = 0;
    }
    if (isset($_POST['Police'])) {
        $Police = 1;
    } else {
        $Police = 0;
    }
    if (isset($_POST['Mahalla'])) {
        $Mahalla = 1;
    } else {
        $Mahalla = 0;
    }
    if ($_POST['inputMigrant'] == "Yes") {
        $inputMigrant = 1;
    } else {
        $inputMigrant = 0;
    }
    if (isset($_POST['inputFamilyID']) && $_POST['inputFamilyID'] != "") {
        $insert_data = array(
            'id' => mysqli_real_escape_string($database->con, $_POST['inputFamilyID']),
            'av_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
            'av_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, 0),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, 0),
            'av_noofChildren' => mysqli_real_escape_string($database->con, $_POST['inputnoofChildren']),
            'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $_POST['inputnoofUnmarried']),
            'av_residentialStatus' => mysqli_real_escape_string($database->con, $_POST['inputResStatus']),
            'av_prevRes_address' => mysqli_real_escape_string($database->con, $inputPrevAddress),
            'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, $Gramasevaka),
            'av_prevRes_police' => mysqli_real_escape_string($database->con, $Police),
            'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, $Mahalla),
            'av_newMigrant' => mysqli_real_escape_string($database->con, $inputMigrant)
        );
    } else {
        $insert_data = array(
            'av_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
            'av_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, 0),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, 0),
            'av_noofChildren' => mysqli_real_escape_string($database->con, $_POST['inputnoofChildren']),
            'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $_POST['inputnoofUnmarried']),
            'av_residentialStatus' => mysqli_real_escape_string($database->con, $_POST['inputResStatus']),
            'av_prevRes_address' => mysqli_real_escape_string($database->con, $inputPrevAddress),
            'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, $Gramasevaka),
            'av_prevRes_police' => mysqli_real_escape_string($database->con, $Police),
            'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, $Mahalla),
            'av_newMigrant' => mysqli_real_escape_string($database->con, $inputMigrant)
        );
    }


    if ($database->insert_data('tbl_temp_allvillagers', $insert_data)) {
        $URL = "form_villagers-registration-form-step2.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert data into tbl_allvillagers
// addAnother button click
if (isset($_POST["addAnother"])) {

    $where = array(
        'id'     =>     $_POST["inputfamID"]
    );
    $data_from_temp = $database->select_where('tbl_temp_allvillagers', $where);
    $av_subDivision = "";
    $av_address = "";
    $av_monthlyIncomeFamily = "";
    $av_avgInterpersonalIncome = "";
    $av_unmarriedChildren = "";
    $av_residentialStatus = "";
    $av_prevRes_address = "";
    $av_prevRes_gramasevaka = "";
    $av_prevRes_police = "";
    $av_prevRes_mahalla = "";
    $av_newMigrant = "";
    foreach ($data_from_temp as $data_from_temp_item) {
        $family_id = $data_from_temp_item["id"];
        $av_subDivision = $data_from_temp_item["av_subDivision"];
        $av_address = $data_from_temp_item["av_address"];
        $av_monthlyIncomeFamily = $data_from_temp_item["av_monthlyIncomeFamily"];
        $av_avgInterpersonalIncome = $data_from_temp_item["av_avgInterpersonalIncome"];
        $av_unmarriedChildren = $data_from_temp_item["av_unmarriedChildren"];
        $av_residentialStatus = $data_from_temp_item["av_residentialStatus"];
        $av_prevRes_address = $data_from_temp_item["av_prevRes_address"];
        $av_prevRes_gramasevaka = $data_from_temp_item["av_prevRes_gramasevaka"];
        $av_prevRes_police = $data_from_temp_item["av_prevRes_police"];
        $av_prevRes_mahalla = $data_from_temp_item["av_prevRes_mahalla"];
        $av_newMigrant = $data_from_temp_item["av_newMigrant"];
    }
    $where2 = array(
        'av_FamilyID'     =>     $_POST["inputfamID"]
    );
    $family_members_count = $database->select_count('tbl_allvillagers', $where2);

    if ($_POST["inputGuardianID"] != "") {
        $inputGuardianID = $_POST["inputGuardianID"];
    } else {
        $inputGuardianID = 0;
    }
    if ($_POST["inputGuardRelationship"] != "") {
        $inputGuardRelationship = $_POST["inputGuardRelationship"];
    } else {
        $inputGuardRelationship = "0";
    }
    if ($_POST["inputCollege"] != "") {
        $inputCollege = $_POST["inputCollege"];
    } else {
        $inputCollege = "0";
    }
    if ($_POST["inputScholIncome"] != "") {
        $inputScholIncome = $_POST["inputScholIncome"];
    } else {
        $inputScholIncome = 0;
    }
    if ($_POST["inputMadType"] != "") {
        $inputMadType = $_POST["inputMadType"];
    } else {
        $inputMadType = "0";
    }
    if ($_POST["inputMadName"] != "") {
        $inputMadName = $_POST["inputMadName"];
    } else {
        $inputMadName = "0";
    }
    if ($_POST["inputKids"] != "") {
        $inputKids = $_POST["inputKids"];
    } else {
        $inputKids = "0";
    }
    if ($_POST["inputMadStart"] != "") {
        $inputMadStart = $_POST["inputMadStart"];
    } else {
        $inputMadStart = "0001-01-01";
    }
    if ($_POST["inputMadExpense"] != "") {
        $inputMadExpense = $_POST["inputMadExpense"];
    } else {
        $inputMadExpense = 0;
    }
    if ($_POST["inputJob"] != "") {
        $inputJob = $_POST["inputJob"];
    } else {
        $inputJob = "0";
    }
    if ($_POST["inputMonthlyIncomePersonal"] != "") {
        $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
        $av_monthlyIncomeFamily = (float)$av_monthlyIncomeFamily + (float)$inputMonthlyIncomePersonal;
        $av_avgInterpersonalIncome = $av_monthlyIncomeFamily / ((int)$family_members_count + 1);
    } else {
        $inputMonthlyIncomePersonal = 0;
    }
    if ($_POST['inputDivorsed'] == "Yes") {
        $inputDivorsed = 1;
    } else {
        $inputDivorsed = 0;
    }
    if ($_POST['inputWidowed'] == "Yes") {
        $inputWidowed = 1;
    } else {
        $inputWidowed = 0;
    }
    if ($_POST['inputMarried'] == "Yes") {
        $inputMarried = 1;
    } else {
        $inputMarried = 0;
    }
    if ($_POST['inputGuardianStatus'] == "Yes") {
        $inputGuardianStatus = 1;
    } else {
        $inputGuardianStatus = 0;
    }
    if ($_POST['inputOrphan'] == "Yes") {
        $inputOrphan = 1;
    } else {
        $inputOrphan = 0;
    }
    if ($_POST['inputSchol'] == "Yes") {
        $inputSchol = 1;
    } else {
        $inputSchol = 0;
    }
    if ($_POST['inputSaandhaStatus'] == "Yes") {
        $inputSaandhaStatus = 1;
        $saandhaStatusReason = "Saandha Registered";
    } else {
        if ($_POST['inputAge'] > 18) {
            $saandhaStatusReason = "Pending";
        } else {
            $saandhaStatusReason = "Under Age";
        }
        $inputSaandhaStatus = 0;
    }
    if ($_POST['inputMad'] == "Yes") {
        $inputMad = 1;
    } else {
        $inputMad = 0;
    }
    if ($_POST['inputDiasbleStatus'] == "Yes") {
        $inputDiasbleStatus = 1;
    } else {
        $inputDiasbleStatus = 0;
    }
    if ($_POST['inputGrade'] == "") {
        $inputGrade = 0;
    } else {
        $inputGrade = $_POST['inputGrade'];
    }
    if ($_POST['inputSpecialSaandha'] == "") {
        $inputSpecialSaandha = 0;
    } else {
        $inputSpecialSaandha = $_POST['inputSpecialSaandha'];
    }
    $index = 0;
    // check subdivision
    $where = array(
        'av_subDivision'     =>     $_POST["inputSubdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    foreach ($person_details as $person_details_item) {
        if ($person_details_item["av_index"]) {
            $index = $person_details_item["av_index"]; 
        } 
    }
    $index = $index + 1;

    $insert_to_tbl_allvillagers = array(
        'av_index' => mysqli_real_escape_string($database->con, $index),
        'av_subDivision' => mysqli_real_escape_string($database->con, $av_subDivision),
        'av_familyID' => mysqli_real_escape_string($database->con, $family_id),
        'av_address' => mysqli_real_escape_string($database->con, $av_address),
        'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
        'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome),
        'av_noofChildren' => mysqli_real_escape_string($database->con, $inputKids),
        'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $av_unmarriedChildren),
        'av_residentialStatus' => mysqli_real_escape_string($database->con, $av_residentialStatus),
        'av_prevRes_address' => mysqli_real_escape_string($database->con, $av_prevRes_address),
        'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, $av_prevRes_gramasevaka),
        'av_prevRes_police' => mysqli_real_escape_string($database->con, $av_prevRes_police),
        'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, $av_prevRes_mahalla),
        'av_newMigrant' => mysqli_real_escape_string($database->con, $av_newMigrant),
        'av_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'av_gender' => mysqli_real_escape_string($database->con, $_POST['inputSex']),
        'av_orphaned' => mysqli_real_escape_string($database->con, $inputOrphan),
        'av_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'av_dob' => mysqli_real_escape_string($database->con, $_POST['inputDOB']),
        'av_age' => mysqli_real_escape_string($database->con, $_POST['inputAge']),
        'av_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
        'av_isGuardian' => mysqli_real_escape_string($database->con, $inputGuardianStatus),
        'av_guardianIndex' => mysqli_real_escape_string($database->con, $inputGuardianID),
        'av_disabled' => mysqli_real_escape_string($database->con, $inputDiasbleStatus),
        'av_saandhaStatus' => mysqli_real_escape_string($database->con, $inputSaandhaStatus),
        'av_saandhaStatusReason' => mysqli_real_escape_string($database->con, $saandhaStatusReason),
        'av_guardianRelationship' => mysqli_real_escape_string($database->con, $inputGuardRelationship),
        'av_eduQual' => mysqli_real_escape_string($database->con, $_POST['inputEduQual']),
        'av_addQual' => mysqli_real_escape_string($database->con, $_POST['inputAddQual']),
        'av_eduPremises' => mysqli_real_escape_string($database->con, $inputCollege),
        'av_eduMedium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'av_eduGrade' => mysqli_real_escape_string($database->con, $inputGrade),
        'av_scholStatus' => mysqli_real_escape_string($database->con, $inputSchol),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
        'av_madChild_status' => mysqli_real_escape_string($database->con, $inputMad),
        'av_madChild_type' => mysqli_real_escape_string($database->con, $inputMadType),
        'av_madChild_madrasaName' => mysqli_real_escape_string($database->con, $inputMadName),
        'av_madChild_startDate' => mysqli_real_escape_string($database->con, $inputMadStart),
        'av_madChild_avgMonthlyExpense' => mysqli_real_escape_string($database->con, $inputMadExpense),
        'av_married' => mysqli_real_escape_string($database->con, $inputMarried),
        'av_divorced' => mysqli_real_escape_string($database->con, $inputDivorsed),
        'av_widowed' => mysqli_real_escape_string($database->con, $inputWidowed),
        'av_job' => mysqli_real_escape_string($database->con, $inputJob),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal),
        'av_leftVillage' => mysqli_real_escape_string($database->con, 0),
        'av_QuickForm' => mysqli_real_escape_string($database->con, 0),
        'av_specialSaandhaAmt' => mysqli_real_escape_string($database->con, $inputSpecialSaandha),
        'av_sentNotifications' => mysqli_real_escape_string($database->con, 0),
        'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 1)
    );

    if ($database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers)) {
        // updating temp_allvillagers family monthly income and avg interpersonal income
        $update_data = array(
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome)

        );
        $where_condition = array(
            'id'     =>     $family_id
        );
        $database->update("tbl_temp_allvillagers", $update_data, $where_condition);
        // updating allvillgers family monthly income and avg interpersonal income
        $update_data2 = array(
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome)

        );
        $where_condition2 = array(
            'av_FamilyID'     =>     $family_id
        );
        $database->update("tbl_allvillagers", $update_data2, $where_condition2);


        if ($inputSaandhaStatus == 1) {
            // retrieve index of the registered person
            $index = "";
            $person_details = $database->select_data('tbl_allvillagers');
            foreach ($person_details as $person_details_item) {
                if (isset($person_details_item["av_index"])) {
                    $index = $person_details_item["av_index"];
                }
            }

            $paidFor = "";
            if ($_POST['inputPaidMonth'] != "") {
                $inputPaidMonth = $_POST["inputPaidMonth"];
                $inputPaidMonth = date_create($inputPaidMonth);
                $date = date_format($inputPaidMonth, "Y-M");
                $paidFor = $date;
            }
            else {
                $paidFor = date('Y-M', strtotime($today));
            }
            // input a record into saandha collection
            $insert_to_tbl_saandhacollection = array(
                'collection_index' => mysqli_real_escape_string($database->con, $index),
                'collection_subdivision' => mysqli_real_escape_string($database->con, $av_subDivision),
                'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                'collection_address' => mysqli_real_escape_string($database->con, $av_address),
                'collection_paidAmount' => mysqli_real_escape_string($database->con, "0"),
                'collection_dueAmount' => mysqli_real_escape_string($database->con, "0"),
                'collection_username' => mysqli_real_escape_string($database->con, "user"),
                'collection_date' => mysqli_real_escape_string($database->con, $today),
                'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)

            );
            if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                $URL = "form_villagers-registration-form-step2.php?inserted_record=1";
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            $URL = "form_villagers-registration-form-step2.php?inserted_record=1";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert data into tbl_allvillagers
// submitSaandha button click
if (isset($_POST["submitSaandha"])) {
    $where = array(
        'id'     =>     $_POST["inputfamID"]
    );
    $data_from_temp = $database->select_where('tbl_temp_allvillagers', $where);
    $av_subDivision = "";
    $av_address = "";
    $av_monthlyIncomeFamily = "";
    $av_avgInterpersonalIncome = "";
    $av_unmarriedChildren = "";
    $av_residentialStatus = "";
    $av_prevRes_address = "";
    $av_prevRes_gramasevaka = "";
    $av_prevRes_police = "";
    $av_prevRes_mahalla = "";
    $av_newMigrant = "";
    foreach ($data_from_temp as $data_from_temp_item) {
        $family_id = $data_from_temp_item["id"];
        $av_subDivision = $data_from_temp_item["av_subDivision"];
        $av_address = $data_from_temp_item["av_address"];
        $av_monthlyIncomeFamily = $data_from_temp_item["av_monthlyIncomeFamily"];
        $av_avgInterpersonalIncome = $data_from_temp_item["av_avgInterpersonalIncome"];
        $av_unmarriedChildren = $data_from_temp_item["av_unmarriedChildren"];
        $av_residentialStatus = $data_from_temp_item["av_residentialStatus"];
        $av_prevRes_address = $data_from_temp_item["av_prevRes_address"];
        $av_prevRes_gramasevaka = $data_from_temp_item["av_prevRes_gramasevaka"];
        $av_prevRes_police = $data_from_temp_item["av_prevRes_police"];
        $av_prevRes_mahalla = $data_from_temp_item["av_prevRes_mahalla"];
        $av_newMigrant = $data_from_temp_item["av_newMigrant"];
    }
    $where2 = array(
        'av_FamilyID'     =>     $_POST["inputfamID"]
    );
    $family_members_count = $database->select_count('tbl_allvillagers', $where2);

    if ($_POST["inputGuardianID"] != "") {
        $inputGuardianID = $_POST["inputGuardianID"];
    } else {
        $inputGuardianID = 0;
    }
    if ($_POST["inputGuardRelationship"] != "") {
        $inputGuardRelationship = $_POST["inputGuardRelationship"];
    } else {
        $inputGuardRelationship = "0";
    }
    if ($_POST["inputCollege"] != "") {
        $inputCollege = $_POST["inputCollege"];
    } else {
        $inputCollege = "0";
    }
    if ($_POST["inputScholIncome"] != "") {
        $inputScholIncome = $_POST["inputScholIncome"];
    } else {
        $inputScholIncome = 0;
    }
    if ($_POST["inputMadType"] != "") {
        $inputMadType = $_POST["inputMadType"];
    } else {
        $inputMadType = "0";
    }
    if ($_POST["inputKids"] != "") {
        $inputKids = $_POST["inputKids"];
    } else {
        $inputKids = "0";
    }
    if ($_POST["inputMadName"] != "") {
        $inputMadName = $_POST["inputMadName"];
    } else {
        $inputMadName = "0";
    }
    if ($_POST["inputMadStart"] != "") {
        $inputMadStart = $_POST["inputMadStart"];
    } else {
        $inputMadStart = "0001-01-01";
    }
    if ($_POST["inputMadExpense"] != "") {
        $inputMadExpense = $_POST["inputMadExpense"];
    } else {
        $inputMadExpense = 0;
    }
    if ($_POST["inputJob"] != "") {
        $inputJob = $_POST["inputJob"];
    } else {
        $inputJob = "0";
    }
    if ($_POST["inputMonthlyIncomePersonal"] != "") {
        $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
        $av_monthlyIncomeFamily = (float)$av_monthlyIncomeFamily + (float)$inputMonthlyIncomePersonal;
        $av_avgInterpersonalIncome = $av_monthlyIncomeFamily / ((int)$family_members_count + 1);
    } else {
        $inputMonthlyIncomePersonal = 0;
    }
    if ($_POST['inputDivorsed'] == "Yes") {
        $inputDivorsed = 1;
    } else {
        $inputDivorsed = 0;
    }
    if ($_POST['inputWidowed'] == "Yes") {
        $inputWidowed = 1;
    } else {
        $inputWidowed = 0;
    }
    if ($_POST['inputMarried'] == "Yes") {
        $inputMarried = 1;
    } else {
        $inputMarried = 0;
    }
    if ($_POST['inputGuardianStatus'] == "Yes") {
        $inputGuardianStatus = 1;
    } else {
        $inputGuardianStatus = 0;
    }
    if ($_POST['inputOrphan'] == "Yes") {
        $inputOrphan = 1;
    } else {
        $inputOrphan = 0;
    }
    if ($_POST['inputSchol'] == "Yes") {
        $inputSchol = 1;
    } else {
        $inputSchol = 0;
    }
    if ($_POST['inputSaandhaStatus'] == "Yes") {
        $inputSaandhaStatus = 1;
        $saandhaStatusReason = "Saandha Registered";
    } else {
        if ($_POST['inputAge'] > 18) {
            $saandhaStatusReason = "Pending";
        } else {
            $saandhaStatusReason = "Under Age";
        }
        $inputSaandhaStatus = 0;
    }
    if ($_POST['inputSex'] == "Male") {
        $inputSex = "M";
    } else {
        $inputSex = "F";
    }
    if ($_POST['inputGrade'] == "") {
        $inputGrade = 0;
    } else {
        $inputGrade = $_POST['inputGrade'];
    }
    if ($_POST['inputMad'] == "Yes") {
        $inputMad = 1;
    } else {
        $inputMad = 0;
    }
    if ($_POST['inputDiasbleStatus'] == "Yes") {
        $inputDiasbleStatus = 1;
    } else {
        $inputDiasbleStatus = 0;
    }
    if ($_POST['inputSpecialSaandha'] == "") {
        $inputSpecialSaandha = 0;
    } else {
        $inputSpecialSaandha = $_POST['inputSpecialSaandha'];
    }
    $index = 0;
    // check subdivision
    $where = array(
        'av_subDivision'     =>     $_POST["inputSubdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    foreach ($person_details as $person_details_item) {
        if ($person_details_item["av_index"]) {
            $index = $person_details_item["av_index"]; 
        } 
    }
    $index = $index + 1;

    $insert_to_tbl_allvillagers = array(
        'av_index' => mysqli_real_escape_string($database->con, $index),
        'av_subDivision' => mysqli_real_escape_string($database->con, $av_subDivision),
        'av_familyID' => mysqli_real_escape_string($database->con, $family_id),
        'av_address' => mysqli_real_escape_string($database->con, $av_address),
        'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
        'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome),
        'av_noofChildren' => mysqli_real_escape_string($database->con, $inputKids),
        'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $av_unmarriedChildren),
        'av_residentialStatus' => mysqli_real_escape_string($database->con, $av_residentialStatus),
        'av_prevRes_address' => mysqli_real_escape_string($database->con, $av_prevRes_address),
        'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, $av_prevRes_gramasevaka),
        'av_prevRes_police' => mysqli_real_escape_string($database->con, $av_prevRes_police),
        'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, $av_prevRes_mahalla),
        'av_newMigrant' => mysqli_real_escape_string($database->con, $av_newMigrant),
        'av_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'av_gender' => mysqli_real_escape_string($database->con, $_POST['inputSex']),
        'av_orphaned' => mysqli_real_escape_string($database->con, $inputOrphan),
        'av_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'av_dob' => mysqli_real_escape_string($database->con, $_POST['inputDOB']),
        'av_age' => mysqli_real_escape_string($database->con, $_POST['inputAge']),
        'av_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
        'av_isGuardian' => mysqli_real_escape_string($database->con, $inputGuardianStatus),
        'av_disabled' => mysqli_real_escape_string($database->con, $inputDiasbleStatus),
        'av_guardianIndex' => mysqli_real_escape_string($database->con, $inputGuardianID),
        'av_saandhaStatus' => mysqli_real_escape_string($database->con, $inputSaandhaStatus),
        'av_saandhaStatusReason' => mysqli_real_escape_string($database->con, $saandhaStatusReason),
        'av_guardianRelationship' => mysqli_real_escape_string($database->con, $_POST['inputGuardRelationship']),
        'av_eduQual' => mysqli_real_escape_string($database->con, $_POST['inputEduQual']),
        'av_addQual' => mysqli_real_escape_string($database->con, $_POST['inputAddQual']),
        'av_eduPremises' => mysqli_real_escape_string($database->con, $inputCollege),
        'av_eduMedium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'av_eduGrade' => mysqli_real_escape_string($database->con, $inputGrade),
        'av_scholStatus' => mysqli_real_escape_string($database->con, $inputSchol),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
        'av_madChild_status' => mysqli_real_escape_string($database->con, $inputMad),
        'av_madChild_type' => mysqli_real_escape_string($database->con, $inputMadType),
        'av_madChild_madrasaName' => mysqli_real_escape_string($database->con, $inputMadName),
        'av_madChild_startDate' => mysqli_real_escape_string($database->con, $inputMadStart),
        'av_madChild_avgMonthlyExpense	' => mysqli_real_escape_string($database->con, $inputMadExpense),
        'av_married' => mysqli_real_escape_string($database->con, $inputMarried),
        'av_divorced' => mysqli_real_escape_string($database->con, $inputDivorsed),
        'av_widowed' => mysqli_real_escape_string($database->con, $inputWidowed),
        'av_job' => mysqli_real_escape_string($database->con, $inputJob),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal),
        'av_leftVillage' => mysqli_real_escape_string($database->con, 0),
        'av_QuickForm' => mysqli_real_escape_string($database->con, 0),
        'av_specialSaandhaAmt' => mysqli_real_escape_string($database->con, $inputSpecialSaandha),
        'av_sentNotifications' => mysqli_real_escape_string($database->con, 0),
        'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 1)
    );

    if ($database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers)) {
        // updating temp_allvillagers family monthly income and avg interpersonal income
        $update_data = array(
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome)

        );
        $where_condition = array(
            'id'     =>     $family_id
        );
        $database->update("tbl_temp_allvillagers", $update_data, $where_condition);
        // updating allvillgers family monthly income and avg interpersonal income
        $update_data2 = array(
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome)

        );
        $where_condition2 = array(
            'av_FamilyID'     =>     $family_id
        );
        $database->update("tbl_allvillagers", $update_data2, $where_condition2);


        if ($inputSaandhaStatus == 1) {
            // retrieve index of the registered person
            $index = "";
            $person_details = $database->select_data('tbl_allvillagers');
            foreach ($person_details as $person_details_item) {
                if (isset($person_details_item["av_index"])) {
                    $index = $person_details_item["av_index"];
                }
            }

            $paidFor = "";
            if ($_POST['inputPaidMonth'] != "") {
                $inputPaidMonth = $_POST["inputPaidMonth"];
                $inputPaidMonth = date_create($inputPaidMonth);
                $date = date_format($inputPaidMonth, "Y-M");
                $paidFor = $date;
            }
            else {
                $paidFor = date('Y-M', strtotime($today));
            }
            // input a record into saandha collection
            $insert_to_tbl_saandhacollection = array(
                'collection_index' => mysqli_real_escape_string($database->con, $index),
                'collection_subdivision' => mysqli_real_escape_string($database->con, $av_subDivision),
                'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                'collection_address' => mysqli_real_escape_string($database->con, $av_address),
                'collection_paidAmount' => mysqli_real_escape_string($database->con, "0"),
                'collection_dueAmount' => mysqli_real_escape_string($database->con, "0"),
                'collection_username' => mysqli_real_escape_string($database->con, "user"),
                'collection_date' => mysqli_real_escape_string($database->con, $today),
                'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)

            );
            if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                $URL = "form_villagers-registration-form.php?inserted_record=1";
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            $URL = "form_villagers-registration-form.php?inserted_record=1";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_nikkahdetails
// submitNikkah button click
if (isset($_POST['submitNikkah'])) {
    if ($_POST['inputMarriedStatus'] == "Yes") {
        $inputMarriedStatus = 1;
    } else {
        $inputMarriedStatus = 0;
    }
    if ($_POST["inputIndexNo"] != "") {
        $inputIndexNo = $_POST["inputIndexNo"];
    } else {
        $inputIndexNo = 0;
    }
    if ($_POST["inputBrideIndexNo"] != "") {
        $inputBrideIndexNo = $_POST["inputBrideIndexNo"];
    } else {
        $inputBrideIndexNo = 0;
    }
    if ($_POST["inputBrideSubdivision"] != "") {
        $inputBrideSubdivision = $_POST["inputBrideSubdivision"];
    } else {
        $inputBrideSubdivision = 0;
    }
    if ($_POST["inputGroomSubdivision"] != "") {
        $inputGroomSubdivision = $_POST["inputGroomSubdivision"];
    } else {
        $inputGroomSubdivision = 0;
    }
    if ($_POST["inputGroomGuardianIndex"] != "") {
        $inputGroomGuardianIndex = $_POST["inputGroomGuardianIndex"];
    } else {
        $inputGroomGuardianIndex = 0;
    }
    if ($_POST["inputBrideGuardianIndex"] != "") {
        $inputBrideGuardianIndex = $_POST["inputBrideGuardianIndex"];
    } else {
        $inputBrideGuardianIndex = 0;
    }
    if ($_POST["inputMarriageDate"] != "") {
        $inputMarriageDate = $_POST["inputMarriageDate"];
    } else {
        $inputMarriageDate = "0001-01-01";
    }

    $insert_to_tbl_nikkahdetails = array(
        'nd_groomVillage' => mysqli_real_escape_string($database->con, $_POST['inputGroomVillage']),
        'nd_groomIndex' => mysqli_real_escape_string($database->con, $inputIndexNo),
        'nd_groomSubDivision' => mysqli_real_escape_string($database->con, $inputGroomSubdivision),
        'nd_groomName' => mysqli_real_escape_string($database->con, $_POST['inputGroomName']),
        'nd_groomDOB' => mysqli_real_escape_string($database->con, $_POST['inputGroomBirthday']),
        'nd_groomNIC' => mysqli_real_escape_string($database->con, $_POST['inputGroomNIC']),
        'nd_groomAge' => mysqli_real_escape_string($database->con, $_POST['inputGroomAge']),
        'nd_groomTP' => mysqli_real_escape_string($database->con, $_POST['inputGroomTP']),
        'nd_groomPrevMarried' => mysqli_real_escape_string($database->con, $inputMarriedStatus),
        'nd_groomAddress' => mysqli_real_escape_string($database->con, $_POST['inputGroomAddress']),
        'nd_groomGuardName' => mysqli_real_escape_string($database->con, $_POST['inputGroomGuardianName']),
        'nd_groomGuardIndex' => mysqli_real_escape_string($database->con, $inputGroomGuardianIndex),
        'nd_groomMosqueName' => mysqli_real_escape_string($database->con, $_POST['inputGroomMosque']),
        'nd_groomMosqueAddress' => mysqli_real_escape_string($database->con, $_POST['inputGroomMosqueAddress']),
        'nd_brideVillage' => mysqli_real_escape_string($database->con, $_POST['inputBrideVillage']),
        'nd_brideIndex' => mysqli_real_escape_string($database->con, $inputBrideIndexNo),
        'nd_brideSubDivision' => mysqli_real_escape_string($database->con, $inputBrideSubdivision),
        'nd_brideName' => mysqli_real_escape_string($database->con, $_POST['inputBrideName']),
        'nd_brideDOB' => mysqli_real_escape_string($database->con, $_POST['inpuBridetBirthday']),
        'nd_brideNIC' => mysqli_real_escape_string($database->con, $_POST['inputBrideNIC']),
        'nd_brideAge' => mysqli_real_escape_string($database->con, $_POST['inputBrideAge']),
        'nd_brideTP' => mysqli_real_escape_string($database->con, $_POST['inputBrideTP']),
        'nd_brideAddress' => mysqli_real_escape_string($database->con, $_POST['inputBrideAddress']),
        'nd_brideGuardName' => mysqli_real_escape_string($database->con, $_POST['inputBrideGuardianName']),
        'nd_brideGuardIndex' => mysqli_real_escape_string($database->con, $inputBrideGuardianIndex),
        'nd_brideMosqueName' => mysqli_real_escape_string($database->con, $_POST['inputBrideMosque']),
        'nd_brideMosqueAddress' => mysqli_real_escape_string($database->con, $_POST['inputBrideMosqueAddress']),
        'nd_marriageVenue' => mysqli_real_escape_string($database->con, $_POST['inputVenue']),
        'nd_marriageDate' => mysqli_real_escape_string($database->con, $inputMarriageDate),
        'nd_donation' => mysqli_real_escape_string($database->con, $_POST['inputdonation'])
    );

    $database->insert_data('tbl_nikkahdetails', $insert_to_tbl_nikkahdetails);
    $URL = "forms.php?inserted_records=1";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}


// insert into tbl_janazadetails
// submitJanaza button click
if (isset($_POST['submitJanaza'])) {

    $insert_to_tbl_janazadetails = array(
        'jd_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNoDeceased']),
        'jd_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputJanazaSubdivision']),
        'jd_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'jd_gender' => mysqli_real_escape_string($database->con, $_POST['inputSex']),
        'jd_dateofDeath' => mysqli_real_escape_string($database->con, $_POST['inputDeathDate']),
        'jd_dateofFuneral' => mysqli_real_escape_string($database->con, $_POST['inputFuneralDate']),
        'jd_addressofFuneral' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'jd_relativeName' => mysqli_real_escape_string($database->con, $_POST['inputGName']),
        'jd_relativeIndex' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'jd_relativeRelationship' => mysqli_real_escape_string($database->con, $_POST['inputRelationship']),
        'jd_informedDate' => mysqli_real_escape_string($database->con, $today),
        'jd_informedTime' => mysqli_real_escape_string($database->con, $time),
        'jd_relativeSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputGSubdivision']),
        'jd_specialNotes' => mysqli_real_escape_string($database->con, $_POST['inputNotes'])

    );
    if ($database->insert_data('tbl_janazadetails', $insert_to_tbl_janazadetails)) {
        $update_data = "";
        $where = array(
            'av_index'     =>     $_POST["inputIndexNoDeceased"],
            'av_subDivision'     =>     $_POST["inputJanazaSubdivision"]
        );
        $person_details = $database->select_where("tbl_allvillagers", $where);
        foreach ($person_details as $person_details_item) {
            $is_guardian = $person_details_item["av_isGuardian"];
        }

        // update the person as a deceased
        if ($is_guardian == "1") {
            $update_data = array(
                'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 0),
                'av_isGuardian' => mysqli_real_escape_string($database->con, 0),
                'av_guardianIndex' => mysqli_real_escape_string($database->con, 0),
                'av_guardianRelationship' => mysqli_real_escape_string($database->con, "0")
            );
        } else {
            $update_data = array(
                'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 0)
            );
        }

        $where_condition = array(
            'av_index'     =>     $_POST["inputIndexNoDeceased"],
            'av_subDivision'     =>     $_POST["inputJanazaSubdivision"]
        );
        if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
            // retrieve family id
            $family_id = "";
            $where = array(
                'av_index'     =>     $_POST["inputIndexNoDeceased"],
                'av_subDivision'     =>     $_POST["inputJanazaSubdivision"]
            );
            $person_details = $database->select_where("tbl_allvillagers", $where);
            foreach ($person_details as $person_details_item) {
                $family_id = $person_details_item["av_FamilyID"];
            }
            if ($is_guardian == "1") {
                // retrieve other members according to family id
                $max_age = 0;
                $max_index = 0;
                $max_sub = "";
                $where = array(
                    'av_FamilyID'     =>     $family_id,
                    'av_gender'     =>     'M',
                    'av_aliveOrDeceased'     =>     1

                );
                $person_details = $database->select_where("tbl_allvillagers", $where);
                foreach ($person_details as $person_details_item) {
                    $dob = $person_details_item["av_dob"];
                    $index = $person_details_item["av_index"];
                    $sub = $person_details_item["av_subDivision"];
                    $age = date_diff(date_create($dob), date_create($today));
                    $age = $age->format('%y');
                    if ($age > $max_age) {
                        $max_age = $age;
                        $max_index = $index;
                        $max_sub = $sub;
                    }
                }
                // update guardian information
                if ((int)$max_age >= 18) {
                    $update_data = array(
                        'av_isGuardian' => mysqli_real_escape_string($database->con, 1),
                        'av_guardianIndex' => mysqli_real_escape_string($database->con, 0),
                        'av_guardianRelationship' => mysqli_real_escape_string($database->con, "Guardian")
                    );
                    $where_condition = array(
                        'av_index'     =>     $max_index,
                        'av_subDivision'     =>     $max_sub
                    );
                    $database->update("tbl_allvillagers", $update_data, $where_condition);
                } else {
                    $where = array(
                        'av_FamilyID'     =>     $family_id,
                        'av_gender'     =>     'F',
                        'av_aliveOrDeceased'     =>     1

                    );
                    $person_details = $database->select_where("tbl_allvillagers", $where);
                    foreach ($person_details as $person_details_item) {
                        $dob = $person_details_item["av_dob"];
                        $index = $person_details_item["av_index"];
                        $sub = $person_details_item["av_subDivision"];
                        $age = date_diff(date_create($dob), date_create($today));
                        $age = $age->format('%y');
                        if ($age > $max_age) {
                            $max_age = $age;
                            $max_index = $index;
                            $max_sub = $sub;
                        }
                    }
                    if ((int)$max_age >= 18) {
                        $update_data = array(
                            'av_isGuardian' => mysqli_real_escape_string($database->con, 1),
                            'av_guardianIndex' => mysqli_real_escape_string($database->con, 0),
                            'av_guardianRelationship' => mysqli_real_escape_string($database->con, "Guardian")
                        );
                        $where_condition = array(
                            'av_index'     =>     $max_index,
                            'av_subDivision'     =>     $max_sub
                        );
                        $database->update("tbl_allvillagers", $update_data, $where_condition);
                    }
                }
                $where = array(
                    'av_FamilyID'     =>     $family_id,
                    'av_aliveOrDeceased'     =>     1,
                    'av_isGuardian'     =>     0
                );
                $person_details = $database->select_where("tbl_allvillagers", $where);
                foreach ($person_details as $person_details_item) {
                    $index = $person_details_item["av_index"];
                    $sub = $person_details_item["av_subDivision"];
                    $update_data = array(
                        'av_guardianIndex' => mysqli_real_escape_string($database->con, $max_index),
                        'av_guardianRelationship' => mysqli_real_escape_string($database->con, "Not Announced")
                    );
                    $where_condition = array(
                        'av_index'     =>     $index,
                        'av_subDivision'     =>     $sub
                    );
                    $database->update("tbl_allvillagers", $update_data, $where_condition);
                }
            }

            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_bills
// submitBills button click
if (isset($_POST['submitBills'])) {

    $insert_to_tbl_bills = array(
        'bill_type' => mysqli_real_escape_string($database->con, $_POST['inputBillType']),
        'bill_amountPaid' => mysqli_real_escape_string($database->con, $_POST['inputPaidAmount']),
        'bill_date' => mysqli_real_escape_string($database->con, $_POST['inputBillDate']),
        'bill_outstandingAmount' => mysqli_real_escape_string($database->con, $_POST['inputOutAmount']),
        'bill_payedDate' => mysqli_real_escape_string($database->con, $_POST['inputPaidDate'])
    );
    if ($database->insert_data('tbl_bills', $insert_to_tbl_bills)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_rentalplaceregistration
// submitRentalPlace button click
if (isset($_POST['submitRentalPlace'])) {

    $insert_to_tbl_rentalplaceregistration = array(
        'rp_type' => mysqli_real_escape_string($database->con, $_POST['inputRentalType']),
        'rp_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress'])
    );
    if ($database->insert_data('tbl_rentalplaceregistration', $insert_to_tbl_rentalplaceregistration)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    // $URL = "forms.php?inserted_record=1";

}

// insert into tbl_specialbhyan
// submitBhayan button click
if (isset($_POST['submitBhayan'])) {
    $inputDateToday = date("Y-m-d");
    if ($_POST['inputDate'] != "") {
        $inputDate = $_POST['inputDate'];
    } else {
        $inputDate = $inputDateToday;
    }
    if ($_POST['inputAmountMeals'] != "") {
        $inputAmountMeals = $_POST['inputAmountMeals'];
    } else {
        $inputAmountMeals = 0;
    }
    if ($_POST['inputAmountTransport'] != "") {
        $inputAmountTransport = $_POST['inputAmountTransport'];
    } else {
        $inputAmountTransport = 0;
    }
    if ($_POST['inputAmountTea'] != "") {
        $inputAmountTea = $_POST['inputAmountTea'];
    } else {
        $inputAmountTea = 0;
    }
    if ($_POST['inputAmountOther'] != "") {
        $inputAmountOther = $_POST['inputAmountOther'];
    } else {
        $inputAmountOther = 0;
    }


    $insert_to_tbl_specialbhyan = array(
        'sb_topic' => mysqli_real_escape_string($database->con, $_POST['inputTopic']),
        'sb_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'sb_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'sb_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
        'sb_date' => mysqli_real_escape_string($database->con, $inputDateToday),
        'sb_time' => mysqli_real_escape_string($database->con, $_POST['inputTime']),
        'sb_meals' => mysqli_real_escape_string($database->con, $inputAmountMeals),
        'sb_transport' => mysqli_real_escape_string($database->con, $inputAmountTransport),
        'sb_tea' => mysqli_real_escape_string($database->con, $inputAmountTea),
        'sb_other' => mysqli_real_escape_string($database->con, $inputAmountOther)

    );

    $database->insert_data('tbl_specialbhyan', $insert_to_tbl_specialbhyan);
    // $URL = "forms.php?inserted_record=1";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_peshimaaamdetails
// submitPeshImaam button click
if (isset($_POST['submitPeshImaam'])) {

    if ($_POST['inputMarriedStatus'] == "Yes") {
        $inputMarriedStatus = 1;
    } else {
        $inputMarriedStatus = 0;
    }
    if ($_POST["inputIndexNo"] != "") {
        $inputIndexNo = $_POST["inputIndexNo"];
    } else {
        $inputIndexNo = 0;
    }
    if ($_POST["inputHomeTP"] != "") {
        $inputHomeTP = $_POST["inputHomeTP"];
    } else {
        $inputHomeTP = "0";
    }
    if (isset($_POST['Gramasevaka'])) {
        $Gramasevaka = 1;
    } else {
        $Gramasevaka = 0;
    }
    if (isset($_POST['Police'])) {
        $Police = 1;
    } else {
        $Police = 0;
    }
    if (isset($_POST['Mahalla'])) {
        $Mahalla = 1;
    } else {
        $Mahalla = 0;
    }
    if (isset($_POST['Maulavi'])) {
        $Maulavi = 1;
    } else {
        $Maulavi = 0;
    }
    if (isset($_POST['inputDistrict'])) {
        $address = $_POST['inputAddress'] . ', ' . $_POST['inputDistrict'];
    } else {
        $address = $_POST['inputAddress'];
    }



    $insert_to_tbl_peshimaaamdetails = array(
        'pi_village' => mysqli_real_escape_string($database->con, $_POST['inputVillage']),
        'pi_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
        'pi_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputImaamSubdivision']),
        'pi_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'pi_address' => mysqli_real_escape_string($database->con, $address),
        'pi_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'pi_married' => mysqli_real_escape_string($database->con, $inputMarriedStatus),
        'pi_noofkids' => mysqli_real_escape_string($database->con, $_POST['inputKids']),
        'pi_mobileTP' => mysqli_real_escape_string($database->con, $_POST['inputMobile']),
        'pi_homeTP' => mysqli_real_escape_string($database->con, $inputHomeTP),
        'pi_assignedDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'pi_salary' => mysqli_real_escape_string($database->con, $_POST['inputBasicSalary']),
        'pi_activestatus' => mysqli_real_escape_string($database->con, 1),
        'pi_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'pi_receivedLetterMahalla' => mysqli_real_escape_string($database->con, $Mahalla),
        'pi_receivedLetterGramasevaka' => mysqli_real_escape_string($database->con, $Gramasevaka),
        'pi_receivedLetterPolice' => mysqli_real_escape_string($database->con, $Police),
        'pi_receivedLetterMaulavi' => mysqli_real_escape_string($database->con, $Maulavi)
        // 'pi_resignedDate' => mysqli_real_escape_string($database->con, "0001-01-01")

    );

    $database->insert_data('tbl_peshimaaamdetails', $insert_to_tbl_peshimaaamdetails);
    // $URL = "forms.php?inserted_record=1";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_muazzindetails
// submitMuazzin button click
if (isset($_POST['submitMuazzin'])) {

    if ($_POST['inputMarriedStatus'] == "Yes") {
        $inputMarriedStatus = 1;
    } else {
        $inputMarriedStatus = 0;
    }
    if ($_POST["inputIndexNo"] != "") {
        $inputIndexNo = $_POST["inputIndexNo"];
    } else {
        $inputIndexNo = 0;
    }
    if ($_POST["inputHomeTP"] != "") {
        $inputHomeTP = $_POST["inputHomeTP"];
    } else {
        $inputHomeTP = "0";
    }
    if (isset($_POST['Gramasevaka'])) {
        $Gramasevaka = 1;
    } else {
        $Gramasevaka = 0;
    }
    if (isset($_POST['Police'])) {
        $Police = 1;
    } else {
        $Police = 0;
    }
    if (isset($_POST['Mahalla'])) {
        $Mahalla = 1;
    } else {
        $Mahalla = 0;
    }
    if (isset($_POST['inputDistrict'])) {
        $address = $_POST['inputAddress'] . ', ' . $_POST['inputDistrict'];
    } else {
        $address = $_POST['inputAddress'];
    }



    $insert_to_tbl_muazzindetails = array(
        'md_village' => mysqli_real_escape_string($database->con, $_POST['inputVillage']),
        'md_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
        'md_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputMuazzinSubdivision']),
        'md_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'md_address' => mysqli_real_escape_string($database->con, $address),
        'md_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'md_married' => mysqli_real_escape_string($database->con, $inputMarriedStatus),
        'md_noofkids' => mysqli_real_escape_string($database->con, $_POST['inputKids']),
        'md_mobileTP' => mysqli_real_escape_string($database->con, $_POST['inputMobile']),
        'md_homeTP' => mysqli_real_escape_string($database->con, $inputHomeTP),
        'md_assignedDate' => mysqli_real_escape_string($database->con, $_POST['inputAssignedDate']),
        'md_salary' => mysqli_real_escape_string($database->con, $_POST['inputBasicSalary']),
        'md_activestatus' => mysqli_real_escape_string($database->con, 1),
        'md_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'md_receivedLetterMahalla' => mysqli_real_escape_string($database->con, $Mahalla),
        'md_receivedLetterGramasevaka' => mysqli_real_escape_string($database->con, $Gramasevaka),
        'md_receivedLetterPolice' => mysqli_real_escape_string($database->con, $Police)
        // 'md_resignedDate' => mysqli_real_escape_string($database->con, "0001-01-01")

    );

    $database->insert_data('tbl_muazzindetails', $insert_to_tbl_muazzindetails);
    // $URL = "forms.php?inserted_record=1";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_rentalsregisteration
// submitNewRental button click
if (isset($_POST['submitNewRental'])) {

    if ($_POST["inputIndexNo"] != "") {
        $inputIndexNo = $_POST["inputIndexNo"];
    } else {
        $inputIndexNo = 0;
    }
    if ($_POST["inputLease"] == "Yes") {
        $inputLease = 1;
    } else {
        $inputLease = 0;
    }
    if ($_POST["inputLeaseAmount"] != "") {
        $inputLeaseAmount = $_POST["inputLeaseAmount"];
    } else {
        $inputLeaseAmount = 0;
    }
    if ($_POST["inputMonthlyAmount"] != "") {
        $inputMonthlyAmount = $_POST["inputMonthlyAmount"];
    } else {
        $inputMonthlyAmount = 0;
    }
    if ($_POST["inputRentalDuration"] == "Other") {
        (int)$inputRentalDuration = $_POST["inputRentalMonths"];
    } else {
        (int)$inputRentalDuration = $_POST["inputRentalDuration"];
    }

    $insert_to_tbl_rentalsregisteration = array(
        'rr_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
        'rr_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputnewRentalSubdivision']),
        'rr_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'rr_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'rr_rentalType' => mysqli_real_escape_string($database->con, $_POST['inputNewRentalType']),
        'rr_startDate' => mysqli_real_escape_string($database->con, $_POST['inputRentalStartDate']),
        'rr_rentalDuration' => mysqli_real_escape_string($database->con, $inputRentalDuration),
        'rr_endDate' => mysqli_real_escape_string($database->con, $_POST['inputRentalEndDate']),
        'rr_downpayment' => mysqli_real_escape_string($database->con, $_POST['inputDownPayment']),
        'rr_monthlyPayment' => mysqli_real_escape_string($database->con, $inputMonthlyAmount),
        'rr_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
        'rr_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'rr_lease' => mysqli_real_escape_string($database->con, $inputLease),
        'rr_leasePayment' => mysqli_real_escape_string($database->con, $inputLeaseAmount)

    );

    if ($database->insert_data('tbl_rentalsregisteration', $insert_to_tbl_rentalsregisteration)) {

        $data_from_tbl_rentalincome = $database->select_data('tbl_rentalsregisteration');
        $rental_id = "";
        if ($inputLease == "0") {
            $amount = $inputMonthlyAmount;
        } else {
            $amount = $inputLeaseAmount;
        }
        foreach ($data_from_tbl_rentalincome as $data_from_tbl_rentalincome_item) {
            $rental_id = $data_from_tbl_rentalincome_item['rr_id'];
        }
        $insert_to_tbl_rentalincome = array(
            'ri_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
            'ri_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputnewRentalSubdivision']),
            'ri_payment' => mysqli_real_escape_string($database->con, $_POST['inputDownPayment']),
            'ri_dueAmount' => mysqli_real_escape_string($database->con, "0"),
            'ri_type' => mysqli_real_escape_string($database->con, $_POST['inputNewRentalType']),
            'ri_notes' => mysqli_real_escape_string($database->con, "Down Payment"),
            'ri_username' => mysqli_real_escape_string($database->con, "user"),
            'ri_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
            'ri_date' => mysqli_real_escape_string($database->con, $today),
            'ri_payFor' => mysqli_real_escape_string($database->con, date('Y-M', strtotime($today))),
            'ri_rentalid' => mysqli_real_escape_string($database->con, $rental_id)

        );
        if ($database->insert_data('tbl_rentalincome', $insert_to_tbl_rentalincome)) {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_rentalincome
// submitRentalPayment button click
if (isset($_POST['submitRentalPayment'])) {
    $inputIndexNo = "";
    $due = "";
    if ($_POST["inputIndexNo"] != "") {
        $inputIndexNo = $_POST["inputIndexNo"];
    } else {
        $inputIndexNo = 0;
    }
    if ($_POST["inputDuePayment"] != "") {
        $due = $_POST["inputDuePayment"];
    } else {
        $due = 0;
    }
    $inputRentalID = $_POST["inputRentalID"];
    $payment = $_POST['inputPayment'];
    $paidFor = $_POST['payedFor'];
    $is_lease = "";
    $rr_monthlyPayment = "";
    $rr_leasePayment = "";
    $rr_rentalDuration = "";
    $monthly_payment = "";

    // retrieve monthly payment details for selected rental
    $where = array(
        'rr_id'     =>     $inputRentalID
    );
    $rental_details = $database->select_where('tbl_rentalsregisteration', $where);
    foreach ($rental_details as $rental_details_item) {
        $is_lease = $rental_details_item["rr_lease"];
        $rr_monthlyPayment = $rental_details_item["rr_monthlyPayment"];
        $rr_leasePayment = $rental_details_item["rr_leasePayment"];
    }
    if ($is_lease == "0") {
        $monthly_payment = $rr_monthlyPayment;
    } else {
        $monthly_payment = $rr_leasePayment;
    }

    // find if there is any due remaining
    $where2 = array(
        'ri_rentalid'     =>     $inputRentalID
    );
    $ri_payFor = "";
    $ri_dueAmount = "";
    $rental_income_details = $database->select_where('tbl_rentalincome', $where2);
    foreach ($rental_income_details as $rental_income_details_item) {
        $ri_payFor = $rental_income_details_item["ri_payFor"];
        $ri_dueAmount = $rental_income_details_item["ri_dueAmount"];
    }
    if ((float)$ri_dueAmount > 0) {
        $insert_to_tbl_rentalincome = array(
            'ri_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
            'ri_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentSubdivision']),
            'ri_rentalid' => mysqli_real_escape_string($database->con, $inputRentalID),
            'ri_dueAmount' => mysqli_real_escape_string($database->con, "0"),
            'ri_type' => mysqli_real_escape_string($database->con, $_POST['inputRentalType']),
            'ri_username' => mysqli_real_escape_string($database->con, "user"),
            'ri_payment' => mysqli_real_escape_string($database->con, $ri_dueAmount),
            'ri_telephone' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentTP']),
            'ri_notes' => mysqli_real_escape_string($database->con, "Previous Due Amount"),
            'ri_payFor' => mysqli_real_escape_string($database->con, $ri_payFor),
            'ri_date' => mysqli_real_escape_string($database->con, $today)

        );
        $database->insert_data('tbl_rentalincome', $insert_to_tbl_rentalincome);
        $payment = $payment - $ri_dueAmount;
    }

    // input data into table
    for ($i = 0; $i < (int)($payment / $monthly_payment); $i++) {

        $rental_details = $database->select_where('tbl_rentalsregisteration', $where);
        foreach ($rental_details as $rental_details_item) {
            $is_lease = $rental_details_item["rr_lease"];
            $rr_monthlyPayment = $rental_details_item["rr_monthlyPayment"];
            $rr_leasePayment = $rental_details_item["rr_leasePayment"];
            $rr_rentalDuration = $rental_details_item["rr_rentalDuration"];
        }
        if ($is_lease == "0") {
            $monthly_payment = $rr_monthlyPayment;
        } else {
            $monthly_payment = $rr_leasePayment;
        }

        $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));

        $insert_to_tbl_rentalincome = array(
            'ri_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
            'ri_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentSubdivision']),
            'ri_rentalid' => mysqli_real_escape_string($database->con, $inputRentalID),
            'ri_dueAmount' => mysqli_real_escape_string($database->con, "0"),
            'ri_type' => mysqli_real_escape_string($database->con, $_POST['inputRentalType']),
            'ri_username' => mysqli_real_escape_string($database->con, "user"),
            'ri_payment' => mysqli_real_escape_string($database->con, $monthly_payment),
            'ri_telephone' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentTP']),
            'ri_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
            'ri_payFor' => mysqli_real_escape_string($database->con, $paidFor),
            'ri_date' => mysqli_real_escape_string($database->con, $today)

        );
        $database->insert_data('tbl_rentalincome', $insert_to_tbl_rentalincome);
    }
    if ((int)($payment % $monthly_payment) != 0) {
        $remain = (int)($payment % $monthly_payment);
        $due = $monthly_payment - $remain;

        $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));

        $insert_to_tbl_rentalincome = array(
            'ri_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
            'ri_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentSubdivision']),
            'ri_rentalid' => mysqli_real_escape_string($database->con, $inputRentalID),
            'ri_dueAmount' => mysqli_real_escape_string($database->con, $due),
            'ri_type' => mysqli_real_escape_string($database->con, $_POST['inputRentalType']),
            'ri_username' => mysqli_real_escape_string($database->con, "user"),
            'ri_payment' => mysqli_real_escape_string($database->con, $remain),
            'ri_telephone' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentTP']),
            'ri_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
            'ri_payFor' => mysqli_real_escape_string($database->con, $paidFor),
            'ri_date' => mysqli_real_escape_string($database->con, $today)

        );
        if ($database->insert_data('tbl_rentalincome', $insert_to_tbl_rentalincome)) {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    } else {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_quranmadrasadetails
// submitQuran button click
if (isset($_POST['submitQuran'])) {
    if ($_POST['inputSex'] == "Male") {
        $inputSex = "M";
    } else {
        $inputSex = "F";
    }

    $insert_to_tbl_quranmadrasadetails = array(
        'qm_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'qm_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputQuranSubdivision']),
        'qm_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'qm_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'qm_dob' => mysqli_real_escape_string($database->con, $_POST['inputBirthday']),
        'qm_gender' => mysqli_real_escape_string($database->con, $inputSex),
        'qm_medium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'qm_grade' => mysqli_real_escape_string($database->con, $_POST['inputGrade']),
        'qm_school' => mysqli_real_escape_string($database->con, $_POST['inputSchool']),
        'qm_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'qm_startDate' => mysqli_real_escape_string($database->con, $_POST['inputAdmissionDate']),
        'qm_guardTelephone' => mysqli_real_escape_string($database->con, $_POST['inputGuardianTP']),
        'qm_guardName' => mysqli_real_escape_string($database->con, $_POST['inputGuardianName'])

    );

    $database->insert_data('tbl_quranmadrasadetails', $insert_to_tbl_quranmadrasadetails);
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_trusteeboarddonation
// submitBoardDonations button click
if (isset($_POST['submitBoardDonations'])) {

    $insert_to_tbl_trusteeboarddonation = array(
        'tbd_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'tbd_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputTrusteeSubdivision']),
        'tbd_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'tbd_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'tbd_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'tbd_designation' => mysqli_real_escape_string($database->con, $_POST['inputDesignation']),
        'tbd_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'tbd_date' => mysqli_real_escape_string($database->con, $_POST['inputDate'])

    );

    $database->insert_data('tbl_trusteeboarddonation', $insert_to_tbl_trusteeboarddonation);
    // $URL = "forms.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_donations
// submitDisasterDonation button click
if (isset($_POST['submitDisasterDonation'])) {
    if ($_POST['inputIndexNo'] != "") {
        $inputIndexNo = $_POST['inputIndexNo'];
    } else {
        $inputIndexNo = 0;
    }

    $insert_to_tbl_donations_disaster = array(
        'd_donationType' => mysqli_real_escape_string($database->con, "Disaster Relief Donation"),
        'd_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
        'd_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        'd_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'd_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'd_mahallaorNonMahalla' => mysqli_real_escape_string($database->con, $_POST['inputDonationDisaster']),
        'd_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
        'd_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'd_localorForeign' => mysqli_real_escape_string($database->con, "0"),
        'd_country' => mysqli_real_escape_string($database->con, "0"),
        'd_address' => mysqli_real_escape_string($database->con, "0")
    );

    $database->insert_data('tbl_donations', $insert_to_tbl_donations_disaster);
    // $URL = "forms.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_donations
// submitOtherDonations button click
if (isset($_POST['submitOtherDonations'])) {

    if ($_POST['inputAddress2'] != "") {
        $inputAddress2 = $_POST['inputAddress2'];
    } else {
        $inputAddress2 = 0;
    }

    $insert_to_tbl_donations_other = array(
        'd_donationType' => mysqli_real_escape_string($database->con, "Other Donation"),
        'd_index' => mysqli_real_escape_string($database->con, 0),
        'd_subdivision' => mysqli_real_escape_string($database->con, "0"),
        'd_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'd_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'd_mahallaorNonMahalla' => mysqli_real_escape_string($database->con, "0"),
        'd_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
        'd_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'd_localorForeign' => mysqli_real_escape_string($database->con, $_POST['inputDonation']),
        'd_country' => mysqli_real_escape_string($database->con, $inputAddress2),
        'd_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'd_tp' => mysqli_real_escape_string($database->con, $_POST['inputTP'])
    );

    $database->insert_data('tbl_donations', $insert_to_tbl_donations_other);
    // $URL = "forms.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_expenses
// submitExpenses button click
if (isset($_POST['submitExpenses'])) {

    $insert_to_tbl_expenses = array(
        'ex_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
        'ex_type' => mysqli_real_escape_string($database->con, $_POST['inputExpensesType']),
        'ex_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'ex_username' => mysqli_real_escape_string($database->con, "user"),
        'ex_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes'])

    );

    if ($database->insert_data('tbl_expenses', $insert_to_tbl_expenses)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_otherservantsalary
// submitServantSalary button click
if (isset($_POST['submitServantSalary'])) {

    $insert_to_tbl_otherservantsalary = array(
        'oss_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
        'oss_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'oss_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'oss_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes'])

    );

    if ($database->insert_data('tbl_otherservantsalary', $insert_to_tbl_otherservantsalary)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}


// submitFridayCollection button click
if (isset($_POST['submitFridayCollection'])) {
    // insert into tbl_fridaycollectionregular
    if ($_POST['inputFridayCollectionType'] == "Friday Special Collection") {
        $insert_to_tbl_fridaycollectionregular = array(
            'fr_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
            'fr_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputFridayColSubdivision']),
            'fr_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
            'fr_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
            'fr_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
            'fr_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
            'fr_date' => mysqli_real_escape_string($database->con, $today),
            'fr_username' => mysqli_real_escape_string($database->con, "user")

        );

        if ($database->insert_data('tbl_fridaycollectionregular', $insert_to_tbl_fridaycollectionregular)) {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
    // insert into tbl_fridaycollectiondonation
    elseif ($_POST['inputFridayCollectionType'] == "Regular Collection") {
        $insert_to_tbl_fridaycollectiondonation = array(
            'fd_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
            'fd_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
            'fd_username' => mysqli_real_escape_string($database->con, "user")

        );

        if ($database->insert_data('tbl_fridaycollectiondonation', $insert_to_tbl_fridaycollectiondonation)) {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_funds
// submitFunds button click
if (isset($_POST['submitFunds'])) {
    if (isset($_POST['inputFundsSubdivision'])) {
        $subdivision = $_POST['inputFundsSubdivision'];
    } else {
        $subdivision = "0";
    }
    $insert_to_tbl_funds = array(
        'funds_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'funds_subDivision' => mysqli_real_escape_string($database->con, $subdivision),
        'funds_name	' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'funds_address	' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'funds_telephone' => mysqli_real_escape_string($database->con, $_POST['inputFundsTP']),
        'funds_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'funds_type' => mysqli_real_escape_string($database->con, $_POST['inputFundsType']),
        'funds_festival' => mysqli_real_escape_string($database->con, $_POST['inputFestival']),
        'funds_date' => mysqli_real_escape_string($database->con, $today),
        'funds_username' => mysqli_real_escape_string($database->con, "user")

    );

    if ($database->insert_data('tbl_funds', $insert_to_tbl_funds)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_lailathulkadhrcollection
// submitLailathulKadhir button click
if (isset($_POST['submitLailathulKadhir'])) {
    if (isset($_POST['inputlailathulSubdivision'])) {
        $subdivision = $_POST['inputlailathulSubdivision'];
    } else {
        $subdivision = "0";
    }
    $insert_to_tbl_lailathulkadhrcollection = array(
        'lk_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'lk_subDivision' => mysqli_real_escape_string($database->con, $subdivision),
        'lk_name	' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'lk_address	' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'lk_telephone' => mysqli_real_escape_string($database->con, $_POST['inputlailathulTP']),
        'lk_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
        'lk_date' => mysqli_real_escape_string($database->con, $today),
        'lk_username' => mysqli_real_escape_string($database->con, "user")

    );

    if ($database->insert_data('tbl_lailathulkadhrcollection', $insert_to_tbl_lailathulkadhrcollection)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_nonmahallasaandhacollection
// submitNonmahallaCol button click
if (isset($_POST['submitNonmahallaCol'])) {

    $where = array(
        'nmsr_telephone'     =>     $_POST["inputNonmahallaColTP"]
    );
    $person_details = $database->select_where('tbl_nonmahallasaandharegistration', $where);
    $nmsr_id = "";
    $amount = $_POST['inputAmount'];

    if ($person_details) {
        foreach ($person_details as $person_details_item) {
            $nmsr_id = $person_details_item["nmsr_id"];
        }

        $insert_to_tbl_nonmahallasaandhacollection = array(
            'nms_name	' => mysqli_real_escape_string($database->con, $_POST['inputName']),
            'nms_address	' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
            'nms_telephone' => mysqli_real_escape_string($database->con, $_POST['inputNonmahallaColTP']),
            'nms_amount' => mysqli_real_escape_string($database->con, $amount),
            'nms_nmsrid' => mysqli_real_escape_string($database->con, $nmsr_id),
            'nms_date' => mysqli_real_escape_string($database->con, $today),
            'nms_username' => mysqli_real_escape_string($database->con, "user")

        );

        if ($database->insert_data('tbl_nonmahallasaandhacollection', $insert_to_tbl_nonmahallasaandhacollection)) {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_saandhacollector
// submitSaandhaCollector button click
if (isset($_POST['submitSaandhaCollector'])) {
    if (isset($_POST['saandhapage'])) {
        $saandhapage = 1;
    } else {
        $saandhapage = 0;
    }
    if (isset($_POST['nonmahallaSaandha'])) {
        $nonmahallaSaandha = 1;
    } else {
        $nonmahallaSaandha = 0;
    }
    if (isset($_POST['rentalIncome'])) {
        $rentalIncome = 1;
    } else {
        $rentalIncome = 0;
    }
    if (isset($_POST['fridayCollection'])) {
        $fridayCollection = 1;
    } else {
        $fridayCollection = 0;
    }
    if (isset($_POST['specialBhayan'])) {
        $specialBhayan = 1;
    } else {
        $specialBhayan = 0;
    }
    if (isset($_POST['LaylatalQadr'])) {
        $LaylatalQadr = 1;
    } else {
        $LaylatalQadr = 0;
    }
    if (isset($_POST['Funds'])) {
        $Funds = 1;
    } else {
        $Funds = 0;
    }
    if (isset($_POST['FridayAttendance'])) {
        $FridayAttendance = 1;
    } else {
        $FridayAttendance = 0;
    }
    if (isset($_POST['maulaviSalary'])) {
        $maulaviSalary = 1;
    } else {
        $maulaviSalary = 0;
    }
    if (isset($_POST['privateLoans'])) {
        $privateLoans = 1;
    } else {
        $privateLoans = 0;
    }

    if ($_POST["inputAdmin"] == "Yes") {
        $inputAdmin = 1;
        $saandhapage = 1;
        $nonmahallaSaandha = 1;
        $rentalIncome = 1;
        $fridayCollection = 1;
        $specialBhayan = 1;
        $LaylatalQadr = 1;
        $Funds = 1;
        $FridayAttendance = 1;
        $maulaviSalary = 1;
        $privateLoans = 1;
    } else {
        $inputAdmin = 0;
    }
    if ($_POST["inputActive"] == "Yes") {
        $inputActive = 1;
    } else {
        $inputActive = 0;
    }
    $password = $_POST['inputPassword'];
    $password = md5($password);

    $insert_to_tbl_saandhacollector = array(
        'sc_index	' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'sc_subDivision	' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        'sc_username' => mysqli_real_escape_string($database->con, $_POST['inputUsername']),
        'sc_password' => mysqli_real_escape_string($database->con, $password),
        'sc_isAdmin' => mysqli_real_escape_string($database->con, $inputAdmin),
        'sc_isActive' => mysqli_real_escape_string($database->con, $inputActive),
        'sc_sandhaPage' => mysqli_real_escape_string($database->con, $saandhapage),
        'sc_nonMahallaSandha' => mysqli_real_escape_string($database->con, $nonmahallaSaandha),
        'sc_rentalIncomes' => mysqli_real_escape_string($database->con, $rentalIncome),
        'sc_fridayCollection' => mysqli_real_escape_string($database->con, $fridayCollection),
        'sc_funds' => mysqli_real_escape_string($database->con, $Funds),
        'sc_lailathulKadhr' => mysqli_real_escape_string($database->con, $LaylatalQadr),
        'sc_fridayAttendance' => mysqli_real_escape_string($database->con, $FridayAttendance),
        'sc_specialBayan' => mysqli_real_escape_string($database->con, $specialBhayan),
        'sc_maulaviSalary' => mysqli_real_escape_string($database->con, $maulaviSalary),
        'sc_privateLoans' => mysqli_real_escape_string($database->con, $privateLoans),

    );

    if ($database->insert_data('tbl_saandhacollector', $insert_to_tbl_saandhacollector)) {
        // find records corresponding to index
        $av_name = "";
        $av_address = "";
        $where = array(
            'av_index'     =>     $_POST["inputIndexNo"],
            'av_subDivision'     =>     $_POST["inputSubdivision"]
        );
        $person_details = $database->select_where('tbl_allvillagers', $where);
        foreach ($person_details as $person_details_item) {
            $av_name = $person_details_item["av_name"];
            $av_address = $person_details_item["av_address"];
        }

        $insert_to_tbl_saandhacollectorcollection = array(
            'scc_index	' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
            'scc_subDivision	' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
            'scc_name' => mysqli_real_escape_string($database->con, $av_name),
            'scc_address' => mysqli_real_escape_string($database->con, $av_address),
            'scc_totCollectedAmount' => mysqli_real_escape_string($database->con, 0),
            'scc_settledAmount' => mysqli_real_escape_string($database->con, 0),
            'scc_username' => mysqli_real_escape_string($database->con, "user")

        );
        if ($database->insert_data('tbl_saandhacollectorcollection', $insert_to_tbl_saandhacollectorcollection)) {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_saandhacollector
// submitSalary button click
if (isset($_POST['submitSalary'])) {
    $payment = $_POST['inputBasicSalary'];
    $payment_count = $payment;
    $paidFor = $_POST['paidFor'];
    (float)$basic_salary = $_POST["BasicSalary"];
    (float)$prevPayment = $_POST["prevPayment"];
    $due = $basic_salary - $prevPayment;
    (float)$epf = (float)$basic_salary * 0.08;
    if (isset($_POST["inputIncentive"])) {
        $inputIncentive = $_POST["inputIncentive"];
    }
    else {
        $inputIncentive = 0; 
    }
    if (isset($_POST["inputMadrasaFee"])) {
        $inputMadrasaFee = $_POST["inputMadrasaFee"];
    }
    else {
        $inputMadrasaFee = 0; 
    }
    if (isset($_POST["inputBhayanFee"])) {
        $inputBhayanFee = $_POST["inputBhayanFee"];
    }
    else {
        $inputBhayanFee = 0; 
    }

    if ($paidFor == "0") {
        $paidFor = date('Y-M');
        (float)$epf = (float)$basic_salary * 0.08;

        if ((float)$payment >= (float)$basic_salary) {
            // input data into table
            for ($i = 0; $i < (int)($payment_count / $basic_salary); $i++) {
                if ($_POST["inputPost"] == "Pesh Imaam") {
                    $insert_to_tbl_peshimaamsalary = array(
                        'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                        'pSal_basicSalary' => mysqli_real_escape_string($database->con, $basic_salary),
                        'pSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                        'pSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                        // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                        'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, $inputBhayanFee),
                        'pSal_date' => mysqli_real_escape_string($database->con, $today),
                        'pSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                        'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor),
                    );
                    $query = $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
                    $payment = $payment - $basic_salary;
                    $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                } elseif ($_POST["inputPost"] == "Muazzin") {
                    $insert_to_tbl_muazzinsalary = array(
                        'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                        'mSal_basicSalary' => mysqli_real_escape_string($database->con, $basic_salary),
                        'mSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                        'mSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                        // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                        'mSal_date' => mysqli_real_escape_string($database->con, $today),
                        'mSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                        'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    $query = $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
                    $payment = $payment - $basic_salary;
                    $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                }
            }

            // if there is a remaining in payment
            if ((float)$payment > 0) {
                if ($_POST["inputPost"] == "Pesh Imaam") {
                    $insert_to_tbl_peshimaamsalary = array(
                        'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                        'pSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                        'pSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                        'pSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                        // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                        'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, $inputBhayanFee),
                        'pSal_date' => mysqli_real_escape_string($database->con, $today),
                        'pSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                        'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    $query = $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
                } elseif ($_POST["inputPost"] == "Muazzin") {
                    $insert_to_tbl_muazzinsalary = array(
                        'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                        'mSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                        'mSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                        'mSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                        // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                        'mSal_date' => mysqli_real_escape_string($database->con, $today),
                        'mSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                        'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    $query = $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
                }
                if ($query) {
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                }
            } else {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            if ($_POST["inputPost"] == "Pesh Imaam") {
                $insert_to_tbl_peshimaamsalary = array(
                    'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                    'pSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                    'pSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                    'pSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                    // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                    'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, $inputBhayanFee),
                    'pSal_date' => mysqli_real_escape_string($database->con, $today),
                    'pSal_EPFETF' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                );
                $query = $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
            } elseif ($_POST["inputPost"] == "Muazzin") {
                $insert_to_tbl_muazzinsalary = array(
                    'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                    'mSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                    'mSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                    'mSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                    // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                    'mSal_date' => mysqli_real_escape_string($database->con, $today),
                    'mSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                    'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                );
                $query = $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
            }
            if ($query) {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        }
    } else {
        if ((float)$payment <= $due) {
            if ($_POST["inputPost"] == "Pesh Imaam") {
                $insert_to_tbl_peshimaamsalary = array(
                    'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                    'pSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                    'pSal_incentive' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_madrasaFee' => mysqli_real_escape_string($database->con, "0"),
                    // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                    'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_date' => mysqli_real_escape_string($database->con, $today),
                    'pSal_EPFETF' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                );
                $query = $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
            } elseif ($_POST["inputPost"] == "Muazzin") {
                $insert_to_tbl_muazzinsalary = array(
                    'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                    'mSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                    'mSal_incentive' => mysqli_real_escape_string($database->con, "0"),
                    'mSal_madrasaFee' => mysqli_real_escape_string($database->con, "0"),
                    // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                    'mSal_date' => mysqli_real_escape_string($database->con, $today),
                    'mSal_EPFETF' => mysqli_real_escape_string($database->con, "0"),
                    'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                );
                $query = $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
            }
            if ($query) {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            if ($_POST["inputPost"] == "Pesh Imaam") {
                $insert_to_tbl_peshimaamsalary = array(
                    'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                    'pSal_basicSalary' => mysqli_real_escape_string($database->con, $due),
                    'pSal_incentive' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_madrasaFee' => mysqli_real_escape_string($database->con, "0"),
                    // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                    'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_date' => mysqli_real_escape_string($database->con, $today),
                    'pSal_EPFETF' => mysqli_real_escape_string($database->con, "0"),
                    'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                );
                $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
            } elseif ($_POST["inputPost"] == "Muazzin") {
                $insert_to_tbl_muazzinsalary = array(
                    'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                    'mSal_basicSalary' => mysqli_real_escape_string($database->con, $due),
                    'mSal_incentive' => mysqli_real_escape_string($database->con, "0"),
                    'mSal_madrasaFee' => mysqli_real_escape_string($database->con, "0"),
                    // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                    'mSal_date' => mysqli_real_escape_string($database->con, $today),
                    'mSal_EPFETF' => mysqli_real_escape_string($database->con, "0"),
                    'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                );
                $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
            }
            $payment = $payment - $due;
            $payment_count = $payment_count - $due;
            $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));

            if ((float)$payment > 0) {
                for ($i = 0; $i < (int)($payment_count / $basic_salary); $i++) {
                    if ($_POST["inputPost"] == "Pesh Imaam") {
                        $insert_to_tbl_peshimaamsalary = array(
                            'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                            'pSal_basicSalary' => mysqli_real_escape_string($database->con, $basic_salary),
                            'pSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                            'pSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                            // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                            'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, $inputBhayanFee),
                            'pSal_date' => mysqli_real_escape_string($database->con, $today),
                            'pSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                            'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                        );
                        $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
                    } elseif ($_POST["inputPost"] == "Muazzin") {
                        $insert_to_tbl_muazzinsalary = array(
                            'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                            'mSal_basicSalary' => mysqli_real_escape_string($database->con, $basic_salary),
                            'mSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                            'mSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                            // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                            'mSal_date' => mysqli_real_escape_string($database->con, $today),
                            'mSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                            'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                        );
                        $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
                    }
                    $payment = $payment - $basic_salary;
                    $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                }
            }
            if ((float)$payment > 0) {
                $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                if ($_POST["inputPost"] == "Pesh Imaam") {
                    $insert_to_tbl_peshimaamsalary = array(
                        'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                        'pSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                        'pSal_incentive' => mysqli_real_escape_string($database->con,  $inputIncentive),
                        'pSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                        // 'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                        'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, $inputBhayanFee),
                        'pSal_date' => mysqli_real_escape_string($database->con, $today),
                        'pSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                        'pSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    $query = $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
                } elseif ($_POST["inputPost"] == "Muazzin") {
                    $insert_to_tbl_muazzinsalary = array(
                        'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputPriestIndexNo"]),
                        'mSal_basicSalary' => mysqli_real_escape_string($database->con, $payment),
                        'mSal_incentive' => mysqli_real_escape_string($database->con, $inputIncentive),
                        'mSal_madrasaFee' => mysqli_real_escape_string($database->con, $inputMadrasaFee),
                        // 'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
                        'mSal_date' => mysqli_real_escape_string($database->con, $today),
                        'mSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
                        'mSal_PaidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    $query = $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
                }
                if ($query) {
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                }
            }
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_undiyalcollection
// submitUndiyal button click
if (isset($_POST['submitUndiyal'])) {

    $insert_tbl_undiyalcollection = array(
        'uc_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
        'uc_username' => mysqli_real_escape_string($database->con, "user"),
        'uc_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount'])
    );
    if ($database->insert_data('tbl_undiyalcollection', $insert_tbl_undiyalcollection)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_kanduricollection
// submitKanduri button click
if (isset($_POST['submitKanduri'])) {

    $insert_tbl_kanduricollection = array(
        'kc_date' => mysqli_real_escape_string($database->con, $_POST['inputDate']),
        'kc_username' => mysqli_real_escape_string($database->con, "user"),
        'kc_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount'])
    );
    if ($database->insert_data('tbl_kanduricollection', $insert_tbl_kanduricollection)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_rentalplaceregistration
// submitRentalPlace button click
if (isset($_POST['submitRentalPlace'])) {

    $insert_tbl_rentalplaceregistration = array(
        'rp_type' => mysqli_real_escape_string($database->con, $_POST['inputRentalType']),
        'rp_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress'])
    );
    if ($database->insert_data('tbl_rentalplaceregistration', $insert_tbl_rentalplaceregistration)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_nonmahallasaandharegistration
// submitNonMahallaSaandha button click
if (isset($_POST['submitNonMahallaSaandha'])) {

    $insert_tbl_nonmahallasaandharegistration = array(
        'nmsr_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
        'nmsr_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'nmsr_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress'])
    );
    if ($database->insert_data('tbl_nonmahallasaandharegistration', $insert_tbl_nonmahallasaandharegistration)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_saandhacollectorcollection
// submitColSettlement button click
if (isset($_POST['submitColSettlement'])) {

    $inputSettledAmount = $_POST["inputSettledAmount"];
    $inputSettlingAmount = $_POST["inputSettlingAmount"];
    $selltle_amount = (float)$inputSettledAmount +  (float)$inputSettlingAmount;

    $update_data = array(
        'scc_settledAmount' => mysqli_real_escape_string($database->con, $selltle_amount)
    );
    $where_condition = array(
        'scc_index'     =>     $_POST["inputIndexNo"],
        'scc_subDivision'     =>     $_POST["inputSettlementSubdivision"]
    );
    if ($database->update("tbl_saandhacollectorcollection", $update_data, $where_condition)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_allvillagers
// submitQuickForm button click
if (isset($_POST['submitQuickForm'])) {
    if ($_POST['inputGuardianStatus'] == "Yes") {
        $inputGuardianStatus = 1;
        $inputGuardianID = 0;
        $inputGuardRelationship = "Guardian";
        $inputnoofUnmarried = $_POST['inputnoofUnmarried'];
        $inputnoofChildren = $_POST['inputnoofChildren'];

    } else {
        $inputGuardianStatus = 0;
        $inputnoofUnmarried = 0;
        $inputnoofChildren = 0;
        $inputGuardianID = $_POST['inputGuardianID'];
        $inputGuardRelationship = $_POST['inputGuardRelationship'];
    }
    if ($_POST['inputSaandhaStatus'] == "No") {
        $inputSaandhaStatus = 0;
        $inputSpecialSaandha = 0;
        if ($_POST['inputAge'] >= 18) {
            $saandhaStatusReason = "Not Registered";
        } else {
            $saandhaStatusReason = "Under Age";
        }
    } else {
        $inputSaandhaStatus = 1;
        $inputSpecialSaandha = $_POST['inputSpecialSaandha'];
        if ($_POST['inputAge'] >= 18) {
            $saandhaStatusReason = "Pending";
        } else {
            $saandhaStatusReason = "Under Age";
        }
    }

    $index = 0;
    // check subdivision
    $where = array(
        'av_subDivision'     =>     $_POST["inputSubdivision"]
    );
    $person_details = $database->select_where('tbl_allvillagers', $where);
    foreach ($person_details as $person_details_item) {
        if ($person_details_item["av_index"]) {
            $index = $person_details_item["av_index"]; 
        } 
    }
    $index = $index + 1;

    $insert_to_tbl_allvillagers = array(
        'av_index' => mysqli_real_escape_string($database->con, $index),
        'av_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        'av_familyID' => mysqli_real_escape_string($database->con, 0),
        'av_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, 0),
        'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, 0),
        'av_noofChildren' => mysqli_real_escape_string($database->con, $inputnoofChildren),
        'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $inputnoofUnmarried),
        'av_residentialStatus' => mysqli_real_escape_string($database->con, $_POST['inputResStatus']),
        'av_prevRes_address' => mysqli_real_escape_string($database->con, 0),
        'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, 0),
        'av_prevRes_police' => mysqli_real_escape_string($database->con, 0),
        'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, 0),
        'av_newMigrant' => mysqli_real_escape_string($database->con, 0),
        'av_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'av_gender' => mysqli_real_escape_string($database->con, $_POST['inputSex']),
        'av_orphaned' => mysqli_real_escape_string($database->con, 0),
        'av_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'av_dob' => mysqli_real_escape_string($database->con, $_POST['inputDOB']),
        'av_age' => mysqli_real_escape_string($database->con, $_POST['inputAge']),
        'av_telephone' => mysqli_real_escape_string($database->con, 0),
        'av_isGuardian' => mysqli_real_escape_string($database->con, $inputGuardianStatus),
        'av_disabled' => mysqli_real_escape_string($database->con, 0),
        'av_guardianIndex' => mysqli_real_escape_string($database->con, $inputGuardianID),
        'av_saandhaStatus' => mysqli_real_escape_string($database->con, $inputSaandhaStatus),
        'av_saandhaStatusReason' => mysqli_real_escape_string($database->con, $saandhaStatusReason),
        'av_guardianRelationship' => mysqli_real_escape_string($database->con, $inputGuardRelationship),
        'av_eduQual' => mysqli_real_escape_string($database->con, "Not Set"),
        'av_addQual' => mysqli_real_escape_string($database->con, "Not Set"),
        'av_eduPremises' => mysqli_real_escape_string($database->con, "Not Set"),
        'av_eduMedium' => mysqli_real_escape_string($database->con, 0),
        'av_eduGrade' => mysqli_real_escape_string($database->con, 0),
        'av_scholStatus' => mysqli_real_escape_string($database->con, 0),
        'av_scholAmount' => mysqli_real_escape_string($database->con, 0),
        'av_scholAmount' => mysqli_real_escape_string($database->con, 0),
        'av_madChild_status' => mysqli_real_escape_string($database->con, 0),
        'av_madChild_type' => mysqli_real_escape_string($database->con, "Not Set"),
        'av_madChild_madrasaName' => mysqli_real_escape_string($database->con, "Not Set"),
        'av_madChild_startDate' => mysqli_real_escape_string($database->con, 0),
        'av_madChild_avgMonthlyExpense	' => mysqli_real_escape_string($database->con, 0),
        'av_married' => mysqli_real_escape_string($database->con, 0),
        'av_divorced' => mysqli_real_escape_string($database->con, 0),
        'av_widowed' => mysqli_real_escape_string($database->con, 0),
        'av_job' => mysqli_real_escape_string($database->con, 0),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, 0),
        'av_leftVillage' => mysqli_real_escape_string($database->con, 0),
        'av_QuickForm' => mysqli_real_escape_string($database->con, 1),
        'av_specialSaandhaAmt' => mysqli_real_escape_string($database->con, $inputSpecialSaandha),
        'av_sentNotifications' => mysqli_real_escape_string($database->con, 0),
        'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 1)
    );

    if ($database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers)) {
        $av_name = "";
        $av_address = "";
        $av_index = "";
        $av_subDivision = "";
        $person_details = $database->select_data('tbl_allvillagers');
        foreach ($person_details as $person_details_item) {
            $av_name = $person_details_item["av_name"];
            $av_address = $person_details_item["av_address"];
            $av_index = $person_details_item["av_index"];
            $av_subDivision = $person_details_item["av_subDivision"];
        }

        if ($_POST['inputPaidMonth'] != "") {
            $inputPaidMonth = $_POST["inputPaidMonth"];
            $inputPaidMonth = date_create($inputPaidMonth);
            $date = date_format($inputPaidMonth, "Y-M");
            $insert_to_tbl_saandhacollection = array(
                'collection_index' => mysqli_real_escape_string($database->con, $av_index),
                'collection_subdivision' => mysqli_real_escape_string($database->con, $av_subDivision),
                'collection_name' => mysqli_real_escape_string($database->con, $av_name),
                'collection_address' => mysqli_real_escape_string($database->con, $av_address),
                'collection_paidAmount' => mysqli_real_escape_string($database->con, 0),
                'collection_dueAmount' => mysqli_real_escape_string($database->con, 0),
                'collection_username' => mysqli_real_escape_string($database->con, "user"),
                'collection_date' => mysqli_real_escape_string($database->con, $today),
                'collection_paidFor' => mysqli_real_escape_string($database->con, $date)
            );
            if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }
    }
}

// insert into tbl_saandhacollection
// submitSandhaPayment button click
if (isset($_POST['submitSandhaPayment'])) {
    $due = "";
    if ($_POST["inputDuePayment"] != "") {
        $due = $_POST["inputDuePayment"];
    } else {
        $due = 0;
    }
    $payment = $_POST['inputPaymentSaandha'];
    $payment_count = $payment;
    $paidFor = $_POST['payedFor'];
    $saandha_amount_details = $database->select_data('tbl_saandhaamountfixing');
    $specialSaandha = $_POST['specialSaandha'];

    if ($specialSaandha == 1) {
        if ($paidFor == "0") {
            $paidFor = date('Y-M');
            $insert_to_tbl_saandhacollection = array(
                'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                'collection_dueAmount' => mysqli_real_escape_string($database->con, 0),
                'collection_username' => mysqli_real_escape_string($database->con, "user"),
                'collection_date' => mysqli_real_escape_string($database->con, $today),
                'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)
            );
            if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
            $insert_to_tbl_saandhacollection = array(
                'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                'collection_dueAmount' => mysqli_real_escape_string($database->con, 0),
                'collection_username' => mysqli_real_escape_string($database->con, "user"),
                'collection_date' => mysqli_real_escape_string($database->con, $today),
                'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)
            );
            if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        }
    } else {

        if ($paidFor == "0") {
            $paidFor = date('Y-M');
            $loop = true;
            while ($loop) {
                // retrive saandha amount relevant to month
                foreach ($saandha_amount_details as $saandha_amount_item) {
                    $saandha_amount = $saandha_amount_item["saf_amount"];
                    $saf_date = $saandha_amount_item["saf_date"];
                    $saf_date = date_create($saf_date);
                    $date = date_format($saf_date, "Y-M");
                    if ($paidFor == $date) {
                        $current_saandha_amount = $saandha_amount;
                        break;
                    } else {
                        $current_saandha_amount = $saandha_amount;
                    }
                }
                if ((float)$payment >= (float)$current_saandha_amount) {
                    $loop = true;
                    $insert_to_tbl_saandhacollection = array(
                        'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                        'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                        'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                        'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                        'collection_paidAmount' => mysqli_real_escape_string($database->con, $current_saandha_amount),
                        'collection_dueAmount' => mysqli_real_escape_string($database->con, "0"),
                        'collection_username' => mysqli_real_escape_string($database->con, "user"),
                        'collection_date' => mysqli_real_escape_string($database->con, $today),
                        'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)

                    );
                    $payment = $payment - $current_saandha_amount;
                    $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                    $database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection);
                } else {
                    $loop = false;
                }
            }
            // if there is a remaining in payment
            if ((float)$payment > 0) {
                // retrive saandha amount relevant to month
                foreach ($saandha_amount_details as $saandha_amount_item) {
                    $saandha_amount = $saandha_amount_item["saf_amount"];
                    $saf_date = $saandha_amount_item["saf_date"];
                    $saf_date = date_create($saf_date);
                    $date = date_format($saf_date, "Y-M");
                    if ($paidFor == $date) {
                        $current_saandha_amount = $saandha_amount;
                        break;
                    } else {
                        $current_saandha_amount = $saandha_amount;
                    }
                }
                if ($paidFor != date('Y-M')) {
                    $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                    $due = (float)$current_saandha_amount - (float)$payment;
                    $insert_to_tbl_saandhacollection = array(
                        'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                        'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                        'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                        'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                        'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                        'collection_dueAmount' => mysqli_real_escape_string($database->con, $due),
                        'collection_username' => mysqli_real_escape_string($database->con, "user"),
                        'collection_date' => mysqli_real_escape_string($database->con, $today),
                        'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                    }
                } else {
                    $due = (float)$current_saandha_amount - (float)$payment;
                    $insert_to_tbl_saandhacollection = array(
                        'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                        'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                        'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                        'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                        'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                        'collection_dueAmount' => mysqli_real_escape_string($database->con, $due),
                        'collection_username' => mysqli_real_escape_string($database->con, "user"),
                        'collection_date' => mysqli_real_escape_string($database->con, $today),
                        'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)
                    );
                    if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                    }
                }
            } else {
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        } else {
            if ((float)$payment <= $due) {
                $due = $due - $payment;
                $insert_to_tbl_saandhacollection = array(
                    'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                    'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                    'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                    'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                    'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                    'collection_dueAmount' => mysqli_real_escape_string($database->con, $due),
                    'collection_username' => mysqli_real_escape_string($database->con, "user"),
                    'collection_date' => mysqli_real_escape_string($database->con, $today),
                    'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)

                );
                if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                }
            } else {
                $insert_to_tbl_saandhacollection = array(
                    'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                    'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                    'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                    'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                    'collection_paidAmount' => mysqli_real_escape_string($database->con, $due),
                    'collection_dueAmount' => mysqli_real_escape_string($database->con, "0"),
                    'collection_username' => mysqli_real_escape_string($database->con, "user"),
                    'collection_date' => mysqli_real_escape_string($database->con, $today),
                    'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)

                );
                $database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection);
                $payment = $payment - $due;
                $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));

                $loop = true;
                while ($loop) {
                    // retrive saandha amount relevant to month
                    foreach ($saandha_amount_details as $saandha_amount_item) {
                        $saandha_amount = $saandha_amount_item["saf_amount"];
                        $saf_date = $saandha_amount_item["saf_date"];
                        $saf_date = date_create($saf_date);
                        $date = date_format($saf_date, "Y-M");
                        if ($paidFor == $date) {
                            $current_saandha_amount = $saandha_amount;
                            break;
                        } else {
                            $current_saandha_amount = $saandha_amount;
                        }
                    }
                    if ((float)$payment >= (float)$current_saandha_amount) {
                        $loop = true;
                        $insert_to_tbl_saandhacollection = array(
                            'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                            'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                            'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                            'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                            'collection_paidAmount' => mysqli_real_escape_string($database->con, $current_saandha_amount),
                            'collection_dueAmount' => mysqli_real_escape_string($database->con, "0"),
                            'collection_username' => mysqli_real_escape_string($database->con, "user"),
                            'collection_date' => mysqli_real_escape_string($database->con, $today),
                            'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)

                        );
                        $payment = $payment - $current_saandha_amount;
                        $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                        $database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection);
                    } else {
                        $loop = false;
                    }
                }
                // if there is a remaining in payment
                if ((float)$payment > 0) {
                    // retrive saandha amount relevant to month
                    foreach ($saandha_amount_details as $saandha_amount_item) {
                        $saandha_amount = $saandha_amount_item["saf_amount"];
                        $saf_date = $saandha_amount_item["saf_date"];
                        $saf_date = date_create($saf_date);
                        $date = date_format($saf_date, "Y-M");
                        if ($paidFor == $date) {
                            $current_saandha_amount = $saandha_amount;
                            break;
                        } else {
                            $current_saandha_amount = $saandha_amount;
                        }
                    }
                    if ($paidFor != date('Y-M')) {
                        $paidFor = date('Y-M', strtotime('+1 month', strtotime($paidFor)));
                        $due = (float)$current_saandha_amount - (float)$payment;
                        $insert_to_tbl_saandhacollection = array(
                            'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                            'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                            'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                            'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                            'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                            'collection_dueAmount' => mysqli_real_escape_string($database->con, $due),
                            'collection_username' => mysqli_real_escape_string($database->con, "user"),
                            'collection_date' => mysqli_real_escape_string($database->con, $today),
                            'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)
                        );
                        if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        }
                    } else {
                        $due = (float)$current_saandha_amount - (float)$payment;
                        $insert_to_tbl_saandhacollection = array(
                            'collection_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
                            'collection_subdivision' => mysqli_real_escape_string($database->con, $_POST['inputSaandhaSubdivision']),
                            'collection_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
                            'collection_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
                            'collection_paidAmount' => mysqli_real_escape_string($database->con, $payment),
                            'collection_dueAmount' => mysqli_real_escape_string($database->con, $due),
                            'collection_username' => mysqli_real_escape_string($database->con, "user"),
                            'collection_date' => mysqli_real_escape_string($database->con, $today),
                            'collection_paidFor' => mysqli_real_escape_string($database->con, $paidFor)
                        );
                        if ($database->insert_data('tbl_saandhacollection', $insert_to_tbl_saandhacollection)) {
                            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        }
                    }
                } else {
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                }

                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
        }
    }
}
