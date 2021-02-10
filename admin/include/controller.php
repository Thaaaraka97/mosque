<?php
include "include/db-connection.php";
$database = new databases();

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

    if ($database->insert_data('tbl_temp_allvillagers', $insert_data)) {
        // header("Location: form_villagers-registration-form-step2.php");
        $URL="form_villagers-registration-form-step2.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// insert data into tbl_allvillagers
// addAnother button click
if (isset($_POST["addAnother"])) {

    if (isset($_POST["inputGuardianID"])) {
        $inputGuardianID = $_POST["inputGuardianID"];
    } else {
        $inputGuardianID = "N/A";
    }
    if (isset($_POST["inputCollege"])) {
        $inputCollege = $_POST["inputCollege"];
    } else {
        $inputCollege = "N/A";
    }
    if (isset($_POST["inputScholIncome"])) {
        $inputScholIncome = $_POST["inputScholIncome"];
    } else {
        $inputScholIncome = "N/A";
    }
    if (isset($_POST["inputMadType"])) {
        $inputMadType = $_POST["inputMadType"];
    } else {
        $inputMadType = "N/A";
    }
    if (isset($_POST["inputMadName"])) {
        $inputMadName = $_POST["inputMadName"];
    } else {
        $inputMadName = "N/A";
    }
    if (isset($_POST["inputMadStart"])) {
        $inputMadStart = $_POST["inputMadStart"];
    } else {
        $inputMadStart = "N/A";
    }
    if (isset($_POST["inputMadExpense"])) {
        $inputMadExpense = $_POST["inputMadExpense"];
    } else {
        $inputMadExpense = "N/A";
    }
    if (isset($_POST["inputSpouse"])) {
        $inputSpouse = $_POST["inputSpouse"];
    } else {
        $inputSpouse = "N/A";
    }
    if (isset($_POST["inputJob"])) {
        $inputJob = $_POST["inputJob"];
    } else {
        $inputJob = "N/A";
    }
    if (isset($_POST["inputMonthlyIncomePersonal"])) {
        $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
    } else {
        $inputMonthlyIncomePersonal = "0";
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
    if ($_POST['inputSex'] == "Male") {
        $inputSex = "M";
    } else {
        $inputSex = "F";
    }
    if ($_POST['inputMedium'] == "Tamil") {
        $inputMedium = "T";
    } else if ($_POST['inputMedium'] == "Sinhala") {
        $inputMedium = "S";
    }else if ($_POST['inputMedium'] == "English"){
        $inputMedium = "E";
    }else {
        $inputMedium = "0";
    }

    $data_from_temp = $database->select_data('tbl_temp_allvillagers');
    $av_subDivision ="";
    $av_address ="";
    $av_monthlyIncomeFamily ="";
    $av_avgInterpersonalIncome ="";
    $av_noofChildren ="";
    $av_unmarriedChildren ="";
    $av_residentialStatus ="";
    $av_prevRes_address ="";
    $av_prevRes_gramasevaka ="";
    $av_prevRes_police ="";
    $av_prevRes_mahalla ="";
    $av_newMigrant ="";
    foreach ($data_from_temp as $data_from_temp_item) {
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
        'av_eduQual' => mysqli_real_escape_string($database->con, $_POST['inputEduQual']),
        'av_addQual' => mysqli_real_escape_string($database->con, $_POST['inputAddQual']),
        'av_eduPremises' => mysqli_real_escape_string($database->con, $inputCollege),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputStudent']), 
        'av_eduMedium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'av_eduGrade' => mysqli_real_escape_string($database->con, $_POST['inputGrade']),
        'av_scholStatus' => mysqli_real_escape_string($database->con, $inputSchol),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputMad']), 
        'av_madChild_type' => mysqli_real_escape_string($database->con, $inputMadType),
        'av_madChild_madrasaName' => mysqli_real_escape_string($database->con, $inputMadName),
        'av_madChild_startDate' => mysqli_real_escape_string($database->con, $inputMadStart),
        'av_madChild_avgMonthlyExpense' => mysqli_real_escape_string($database->con, $inputMadExpense),
        'av_married' => mysqli_real_escape_string($database->con, $inputMarried),
        'av_divorced' => mysqli_real_escape_string($database->con, $inputDivorsed),
        'av_widowed' => mysqli_real_escape_string($database->con, $inputWidowed),
        'av_spouseIndex' => mysqli_real_escape_string($database->con, $inputSpouse),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputjobYN']), 
        'av_job' => mysqli_real_escape_string($database->con, $inputJob),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputUnmarried'])
    );

    $database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers);
}

// insert data into tbl_allvillagers
// submitSaandha button click
if (isset($_POST["submitSaandha"])) {

    if (isset($_POST["inputGuardianID"])) {
        $inputGuardianID = $_POST["inputGuardianID"];
    } else {
        $inputGuardianID = "N/A";
    }
    if (isset($_POST["inputCollege"])) {
        $inputCollege = $_POST["inputCollege"];
    } else {
        $inputCollege = "N/A";
    }
    if (isset($_POST["inputScholIncome"])) {
        $inputScholIncome = $_POST["inputScholIncome"];
    } else {
        $inputScholIncome = "N/A";
    }
    if (isset($_POST["inputMadType"])) {
        $inputMadType = $_POST["inputMadType"];
    } else {
        $inputMadType = "N/A";
    }
    if (isset($_POST["inputMadName"])) {
        $inputMadName = $_POST["inputMadName"];
    } else {
        $inputMadName = "N/A";
    }
    if (isset($_POST["inputMadStart"])) {
        $inputMadStart = $_POST["inputMadStart"];
    } else {
        $inputMadStart = "N/A";
    }
    if (isset($_POST["inputMadExpense"])) {
        $inputMadExpense = $_POST["inputMadExpense"];
    } else {
        $inputMadExpense = "N/A";
    }
    if (isset($_POST["inputSpouse"])) {
        $inputSpouse = $_POST["inputSpouse"];
    } else {
        $inputSpouse = "N/A";
    }
    if (isset($_POST["inputJob"])) {
        $inputJob = $_POST["inputJob"];
    } else {
        $inputJob = "N/A";
    }
    if (isset($_POST["inputMonthlyIncomePersonal"])) {
        $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
    } else {
        $inputMonthlyIncomePersonal = "0";
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
    if ($_POST['inputSex'] == "Male") {
        $inputSex = "M";
    } else {
        $inputSex = "F";
    }
    if ($_POST['inputMedium'] == "Tamil") {
        $inputMedium = "T";
    } else if ($_POST['inputMedium'] == "Sinhala") {
        $inputMedium = "S";
    }else if ($_POST['inputMedium'] == "English"){
        $inputMedium = "E";
    }else {
        $inputMedium = "0";
    }

    $data_from_temp = $database->select_data('tbl_temp_allvillagers');
    $av_subDivision ="";
    $av_address ="";
    $av_monthlyIncomeFamily ="";
    $av_avgInterpersonalIncome ="";
    $av_noofChildren ="";
    $av_unmarriedChildren ="";
    $av_residentialStatus ="";
    $av_prevRes_address ="";
    $av_prevRes_gramasevaka ="";
    $av_prevRes_police ="";
    $av_prevRes_mahalla ="";
    $av_newMigrant ="";
    foreach ($data_from_temp as $data_from_temp_item) {
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
        'av_eduQual' => mysqli_real_escape_string($database->con, $_POST['inputEduQual']),
        'av_addQual' => mysqli_real_escape_string($database->con, $_POST['inputAddQual']),
        'av_eduPremises' => mysqli_real_escape_string($database->con, $inputCollege),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputStudent']), 
        'av_eduMedium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'av_eduGrade' => mysqli_real_escape_string($database->con, $_POST['inputGrade']),
        'av_scholStatus' => mysqli_real_escape_string($database->con, $inputSchol),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputMad']), 
        'av_madChild_type' => mysqli_real_escape_string($database->con, $inputMadType),
        'av_madChild_madrasaName' => mysqli_real_escape_string($database->con, $inputMadName),
        'av_madChild_startDate' => mysqli_real_escape_string($database->con, $inputMadStart),
        'av_madChild_avgMonthlyExpense	' => mysqli_real_escape_string($database->con, $inputMadExpense),
        'av_married' => mysqli_real_escape_string($database->con, $inputMarried),
        'av_divorced' => mysqli_real_escape_string($database->con, $inputDivorsed),
        'av_widowed' => mysqli_real_escape_string($database->con, $inputWidowed),
        'av_spouseIndex' => mysqli_real_escape_string($database->con, $inputSpouse),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputjobYN']), 
        'av_job' => mysqli_real_escape_string($database->con, $inputJob),
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal),
        // 'av_name' => mysqli_real_escape_string($database->con, $_POST['inputUnmarried'])
    );

    if($database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers)){
        $database->delete_all('tbl_temp_allvillagers');
        // header("Location: form_villagers-registration-form.php");
        $URL="form_villagers-registration-form.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}
