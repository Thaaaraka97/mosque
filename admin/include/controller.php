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
        $URL = "form_villagers-registration-form-step2.php";
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
    if ($_POST['inputMedium'] == "Tamil") {
        $inputMedium = "T";
    } else if ($_POST['inputMedium'] == "Sinhala") {
        $inputMedium = "S";
    } else if ($_POST['inputMedium'] == "English") {
        $inputMedium = "E";
    } else {
        $inputMedium = "0";
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
        'av_eduMedium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'av_eduGrade' => mysqli_real_escape_string($database->con, $_POST['inputGrade']),
        'av_scholStatus' => mysqli_real_escape_string($database->con, $inputSchol),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
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
    } else if ($_POST['inputMedium'] == "English") {
        $inputMedium = "E";
    } else {
        $inputMedium = "0";
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
        'av_eduMedium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'av_eduGrade' => mysqli_real_escape_string($database->con, $_POST['inputGrade']),
        'av_scholStatus' => mysqli_real_escape_string($database->con, $inputSchol),
        'av_scholAmount' => mysqli_real_escape_string($database->con, $inputScholIncome),
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
    );

    if ($database->insert_data('tbl_allvillagers', $insert_to_tbl_allvillagers)) {
        $database->delete_all('tbl_temp_allvillagers');
        $URL = "forms.php";
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
    $URL = "forms.php";
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

    $database->insert_data('tbl_janazadetails', $insert_to_tbl_janazadetails);
    $URL = "forms.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}

// insert into tbl_specialbhyan
// submitBhayan button click
if (isset($_POST['submitBhayan'])) {
    $inputDateToday = date("Y-m-d");
    if($_POST['inputDate'] != ""){
        $inputDate = $_POST['inputDate'];
    }
    else{
        $inputDate = $inputDateToday;
    }
    if($_POST['inputAmountMeals'] != ""){
        $inputAmountMeals = $_POST['inputAmountMeals'];
    }
    else{
        $inputAmountMeals = 0;
    }
    if($_POST['inputAmountTransport'] != ""){
        $inputAmountTransport = $_POST['inputAmountTransport'];
    }
    else{
        $inputAmountTransport = 0;
    }
    if($_POST['inputAmountTea'] != ""){
        $inputAmountTea = $_POST['inputAmountTea'];
    }
    else{
        $inputAmountTea = 0;
    }
    if($_POST['inputAmountOther'] != ""){
        $inputAmountOther = $_POST['inputAmountOther'];
    }
    else{
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
    $URL = "forms.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}