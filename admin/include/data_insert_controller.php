<?php
include "include/db-connection.php";
$database = new databases();
$URL = "forms.php?inserted_record=1";
$insert_data = "";
$today = date('Y-m-d');

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
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $_POST['inputMonthlyIncomeFamily']),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $_POST['inputavgInterPersonal']),
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
            'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $_POST['inputMonthlyIncomeFamily']),
            'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $_POST['inputavgInterPersonal']),
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
    if ($_POST["inputMadStart"] != "") {
        $inputMadStart = $_POST["inputMadStart"];
    } else {
        $inputMadStart = "0";
    }
    if ($_POST["inputMadExpense"] != "") {
        $inputMadExpense = $_POST["inputMadExpense"];
    } else {
        $inputMadExpense = 0;
    }
    if ($_POST["inputSpouse"] != "") {
        $inputSpouse = $_POST["inputSpouse"];
    } else {
        $inputSpouse = 0;
    }
    if ($_POST["inputJob"] != "") {
        $inputJob = $_POST["inputJob"];
    } else {
        $inputJob = "0";
    }
    if ($_POST["inputMonthlyIncomePersonal"] != "") {
        $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
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
    } else {
        $inputSaandhaStatus = 0;
    }
    if ($_POST['inputMad'] == "Yes") {
        $inputMad = 1;
    } else {
        $inputMad = 0;
    }
    if ($_POST['inputGrade'] == "") {
        $inputGrade = 0;
    } else {
        $inputGrade = $_POST['inputGrade'];
    }

    $data_from_temp = $database->select_data('tbl_temp_allvillagers');
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
    foreach ($data_from_temp as $data_from_temp_item) {
        $family_id = $data_from_temp_item["id"];
        $av_subDivision = $data_from_temp_item["av_subDivision"];
        $av_address = $data_from_temp_item["av_address"];
        $av_monthlyIncomeFamily = $data_from_temp_item["av_monthlyIncomeFamily"];
        $av_avgInterpersonalIncome = $data_from_temp_item["av_avgInterpersonalIncome"];
        $av_noofChildren = $data_from_temp_item["av_noofChildren"];
        $av_unmarriedChildren = $data_from_temp_item["av_unmarriedChildren"];
        $av_residentialStatus = $data_from_temp_item["av_residentialStatus"];
        $av_prevRes_address = $data_from_temp_item["av_prevRes_address"];
        $av_prevRes_gramasevaka = $data_from_temp_item["av_prevRes_gramasevaka"];
        $av_prevRes_police = $data_from_temp_item["av_prevRes_police"];
        $av_prevRes_mahalla = $data_from_temp_item["av_prevRes_mahalla"];
        $av_newMigrant = $data_from_temp_item["av_newMigrant"];
    }

    $insert_to_tbl_allvillagers = array(
        'av_subDivision' => mysqli_real_escape_string($database->con, $av_subDivision),
        'av_familyID' => mysqli_real_escape_string($database->con, $family_id),
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
        'av_saandhaStatus' => mysqli_real_escape_string($database->con, $inputSaandhaStatus),
        'av_guardianRelationship' => mysqli_real_escape_string($database->con, $_POST['inputGuardRelationship']),
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
        'av_spouseIndex' => mysqli_real_escape_string($database->con, $inputSpouse),
        'av_job' => mysqli_real_escape_string($database->con, $inputJob),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal),
        'av_leftVillage' => mysqli_real_escape_string($database->con, 0),
        'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 1)
    );

    $database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers);
}

// insert data into tbl_allvillagers
// submitSaandha button click
if (isset($_POST["submitSaandha"])) {

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
    if ($_POST["inputSpouse"] != "") {
        $inputSpouse = $_POST["inputSpouse"];
    } else {
        $inputSpouse = 0;
    }
    if ($_POST["inputJob"] != "") {
        $inputJob = $_POST["inputJob"];
    } else {
        $inputJob = "0";
    }
    if ($_POST["inputMonthlyIncomePersonal"] != "") {
        $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
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
    } else {
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

    $data_from_temp = $database->select_data('tbl_temp_allvillagers');
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
    foreach ($data_from_temp as $data_from_temp_item) {
        $family_id = $data_from_temp_item["id"];
        $av_subDivision = $data_from_temp_item["av_subDivision"];
        $av_address = $data_from_temp_item["av_address"];
        $av_monthlyIncomeFamily = $data_from_temp_item["av_monthlyIncomeFamily"];
        $av_avgInterpersonalIncome = $data_from_temp_item["av_avgInterpersonalIncome"];
        $av_noofChildren = $data_from_temp_item["av_noofChildren"];
        $av_unmarriedChildren = $data_from_temp_item["av_unmarriedChildren"];
        $av_residentialStatus = $data_from_temp_item["av_residentialStatus"];
        $av_prevRes_address = $data_from_temp_item["av_prevRes_address"];
        $av_prevRes_gramasevaka = $data_from_temp_item["av_prevRes_gramasevaka"];
        $av_prevRes_police = $data_from_temp_item["av_prevRes_police"];
        $av_prevRes_mahalla = $data_from_temp_item["av_prevRes_mahalla"];
        $av_newMigrant = $data_from_temp_item["av_newMigrant"];
    }

    $insert_to_tbl_allvillagers = array(
        'av_subDivision' => mysqli_real_escape_string($database->con, $av_subDivision),
        'av_familyID' => mysqli_real_escape_string($database->con, $family_id),
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
        'av_saandhaStatus' => mysqli_real_escape_string($database->con, $inputSaandhaStatus),
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
        'av_spouseIndex' => mysqli_real_escape_string($database->con, $inputSpouse),
        'av_job' => mysqli_real_escape_string($database->con, $inputJob),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal),
        'av_leftVillage' => mysqli_real_escape_string($database->con, 0),
        'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 1)
    );

    if ($database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers)) {
        $database->delete_all('tbl_temp_allvillagers');
        $URL = "forms.php?inserted_records=1";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
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
        'nd_groomSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
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
        'nd_brideSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
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
    $inputDateToday = date("Y-m-d");

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
        'jd_informedDate' => mysqli_real_escape_string($database->con, $inputDateToday),
        'jd_relativeSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputGSubdivision']),
        'jd_specialNotes' => mysqli_real_escape_string($database->con, $_POST['inputNotes'])

    );
    if ($database->insert_data('tbl_janazadetails', $insert_to_tbl_janazadetails)) {
        $update_data = array(
            'av_aliveOrDeceased' => mysqli_real_escape_string($database->con, 0)
        );
        $where_condition = array(
            'av_index'     =>     $_POST["inputIndexNoDeceased"],
            'av_subDivision'     =>     $_POST["inputJanazaSubdivision"]
        );
        if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
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
        $inputIndexNo = $_POST["inputHomeTP"];
    } else {
        $inputIndexNo = "0";
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
        'pi_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        'pi_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'pi_address' => mysqli_real_escape_string($database->con, $address),
        'pi_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'pi_married' => mysqli_real_escape_string($database->con, $inputMarriedStatus),
        'pi_noofkids' => mysqli_real_escape_string($database->con, $_POST['inputKids']),
        'pi_mobileTP' => mysqli_real_escape_string($database->con, $_POST['inputMobile']),
        'pi_homeTP' => mysqli_real_escape_string($database->con, $_POST['inputHomeTP']),
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
        $inputIndexNo = $_POST["inputHomeTP"];
    } else {
        $inputIndexNo = "0";
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
        'md_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        'md_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        'md_address' => mysqli_real_escape_string($database->con, $address),
        'md_nic' => mysqli_real_escape_string($database->con, $_POST['inputNIC']),
        'md_married' => mysqli_real_escape_string($database->con, $inputMarriedStatus),
        'md_noofkids' => mysqli_real_escape_string($database->con, $_POST['inputKids']),
        'md_mobileTP' => mysqli_real_escape_string($database->con, $_POST['inputMobile']),
        'md_homeTP' => mysqli_real_escape_string($database->con, $_POST['inputHomeTP']),
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
        (float)$due = (float)$amount * (int)$inputRentalDuration;
        foreach ($data_from_tbl_rentalincome as $data_from_tbl_rentalincome_item) {
            $rental_id = $data_from_tbl_rentalincome_item['rr_id'];
        }
        $insert_to_tbl_rentalincome = array(
            'ri_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
            'ri_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputnewRentalSubdivision']),
            'ri_payment' => mysqli_real_escape_string($database->con, $_POST['inputDownPayment']),
            'ri_dueAmount' => mysqli_real_escape_string($database->con, $due),
            'ri_type' => mysqli_real_escape_string($database->con, $_POST['inputNewRentalType']),
            'ri_notes' => mysqli_real_escape_string($database->con, "Downpayment"),
            'ri_username' => mysqli_real_escape_string($database->con, "user"),
            'ri_telephone' => mysqli_real_escape_string($database->con, $_POST['inputTP']),
            'ri_date' => mysqli_real_escape_string($database->con, $today),
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

    if ($_POST["inputIndexNo"] != "") {
        $inputIndexNo = $_POST["inputIndexNo"];
    } else {
        $inputIndexNo = 0;
    }
    $due = $_POST['inputDuePayment'];
    $payment = $_POST['inputPayment'];
    (float)$due = (float)$due - (float)$payment;

    $insert_to_tbl_rentalincome = array(
        'ri_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
        'ri_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentSubdivision']),
        'ri_rentalid' => mysqli_real_escape_string($database->con, $_POST['inputRentalID']),
        'ri_dueAmount' => mysqli_real_escape_string($database->con, $due),
        'ri_type' => mysqli_real_escape_string($database->con, $_POST['inputRentalType']),
        'ri_username' => mysqli_real_escape_string($database->con, "user"),
        'ri_payment' => mysqli_real_escape_string($database->con, $_POST['inputPayment']),
        'ri_telephone' => mysqli_real_escape_string($database->con, $_POST['inputRentalPaymentTP']),
        'ri_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'ri_date' => mysqli_real_escape_string($database->con, $today)

    );

    if ($database->insert_data('tbl_rentalincome', $insert_to_tbl_rentalincome)) {
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
        'qm_guardName' => mysqli_real_escape_string($database->con, $_POST['inputGuardianName'])

    );

    $database->insert_data('tbl_quranmadrasadetails', $insert_to_tbl_quranmadrasadetails);
    // $URL = "forms.php";
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
    if ($_POST['inputFridayCollectionType'] == "Regular Donation") {
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
    elseif ($_POST['inputFridayCollectionType'] == "Collection") {
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
        'funds_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
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
    if ($person_details) {
        foreach ($person_details as $person_details_item) {
            $nmsr_id = $person_details_item["nmsr_id"];
        }

        $insert_to_tbl_nonmahallasaandhacollection = array(
            'nms_name	' => mysqli_real_escape_string($database->con, $_POST['inputName']),
            'nms_address	' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
            'nms_telephone' => mysqli_real_escape_string($database->con, $_POST['inputNonmahallaColTP']),
            'nms_amount' => mysqli_real_escape_string($database->con, $_POST['inputAmount']),
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
    if (isset($_POST['otherFunds'])) {
        $otherFunds = 1;
    } else {
        $otherFunds = 0;
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
        $otherFunds = 1;
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
        'sc_otherFunds' => mysqli_real_escape_string($database->con, $otherFunds),
        'sc_specialBayan' => mysqli_real_escape_string($database->con, $specialBhayan),
        'sc_maulaviSalary' => mysqli_real_escape_string($database->con, $maulaviSalary),
        'sc_privateLoans' => mysqli_real_escape_string($database->con, $privateLoans),

    );

    if ($database->insert_data('tbl_saandhacollector', $insert_to_tbl_saandhacollector)) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert into tbl_saandhacollector
// submitSaandhaCollector button click
if (isset($_POST['submitSalary'])) {
    (float)$basic_salary = $_POST["inputBasicSalary"];
    (float)$epf = (float)$basic_salary * 0.08;

    if ($_POST["inputPost"] == "Pesh Imaam") {
        $insert_to_tbl_peshimaamsalary = array(
            'pSal_peshImaamId' => mysqli_real_escape_string($database->con, $_POST["inputIndexNo"]),
            'pSal_basicSalary' => mysqli_real_escape_string($database->con, $basic_salary),
            'pSal_incentive' => mysqli_real_escape_string($database->con, $_POST["inputIncentive"]),
            'pSal_madrasaFee' => mysqli_real_escape_string($database->con, $_POST["inputMadrasaFee"]),
            'pSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
            'pSal_specialBhayanFee' => mysqli_real_escape_string($database->con, $_POST["inputBhayanFee"]),
            'pSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
            'pSal_loanDeduction' => mysqli_real_escape_string($database->con, $_POST["inputLoan"])
        );
        $query = $database->insert_data('tbl_peshimaamsalary', $insert_to_tbl_peshimaamsalary);
        
    } elseif ($_POST["inputPost"] == "Muazzin") {
        $insert_to_tbl_muazzinsalary = array(
            'mSal_muazzinId' => mysqli_real_escape_string($database->con, $_POST["inputIndexNo"]),
            'mSal_basicSalary' => mysqli_real_escape_string($database->con, $basic_salary),
            'mSal_incentive' => mysqli_real_escape_string($database->con, $_POST["inputIncentive"]),
            'mSal_madrasaFee' => mysqli_real_escape_string($database->con, $_POST["inputMadrasaFee"]),
            'mSal_advance' => mysqli_real_escape_string($database->con, $_POST["inputAdvance"]),
            'mSal_EPFETF' => mysqli_real_escape_string($database->con, $epf),
            'mSal_loanDeduction	' => mysqli_real_escape_string($database->con, $_POST["inputLoan"])
        );
        $query = $database->insert_data('tbl_muazzinsalary', $insert_to_tbl_muazzinsalary);
        
    }
    if ($query) {
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}
