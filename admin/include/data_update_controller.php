<?php
// include "include/db-connection.php";
$database = new databases();
$URL = "forms.php?updated=1";
$today = date('Y-m-d');

// update data in tbl_janazadetails
// editJanaza button click
if (isset($_POST['editJanaza'])) {

    $update_data = array(
        'jd_dateofDeath' => mysqli_real_escape_string($database->con, $_POST['inputDeathDate']),
        'jd_dateofFuneral' => mysqli_real_escape_string($database->con, $_POST['inputFuneralDate']),
        'jd_addressofFuneral' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        'jd_relativeName' => mysqli_real_escape_string($database->con, $_POST['inputGName']),
        'jd_relativeIndex' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'jd_relativeRelationship' => mysqli_real_escape_string($database->con, $_POST['inputRelationship']),
        'jd_relativeSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputGSubdivision']),
        'jd_specialNotes' => mysqli_real_escape_string($database->con, $_POST['inputNotes'])
    );
    $where_condition = array(
        'jd_janazaId'     =>     $_POST["id"]
    );
    if ($database->update("tbl_janazadetails", $update_data, $where_condition)) {
        $URL = "preview_janaza-details.php?updated=1";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

// update data in tbl_nikkahdetails
// editNikkah button click
if (isset($_POST['editNikkah'])) {
    if ($_POST['inputMarriedStatus'] == "Yes") {
        $inputMarriedStatus = 1;
    } else {
        $inputMarriedStatus = 0;
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

    $update_data = array(
        // 'nd_groomVillage' => mysqli_real_escape_string($database->con, $_POST['inputGroomVillage']),
        // 'nd_groomIndex' => mysqli_real_escape_string($database->con, $inputIndexNo),
        // 'nd_groomSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputGroomSubdivision']),
        // 'nd_groomName' => mysqli_real_escape_string($database->con, $_POST['inputGroomName']),
        // 'nd_groomDOB' => mysqli_real_escape_string($database->con, $_POST['inputGroomBirthday']),
        // 'nd_groomNIC' => mysqli_real_escape_string($database->con, $_POST['inputGroomNIC']),
        // 'nd_groomAge' => mysqli_real_escape_string($database->con, $_POST['inputGroomAge']),
        // 'nd_groomTP' => mysqli_real_escape_string($database->con, $_POST['inputGroomTP']),
        'nd_groomPrevMarried' => mysqli_real_escape_string($database->con, $inputMarriedStatus),
        'nd_groomAddress' => mysqli_real_escape_string($database->con, $_POST['inputGroomAddress']),
        'nd_groomGuardName' => mysqli_real_escape_string($database->con, $_POST['inputGroomGuardianName']),
        'nd_groomGuardIndex' => mysqli_real_escape_string($database->con, $inputGroomGuardianIndex),
        'nd_groomMosqueName' => mysqli_real_escape_string($database->con, $_POST['inputGroomMosque']),
        'nd_groomMosqueAddress' => mysqli_real_escape_string($database->con, $_POST['inputGroomMosqueAddress']),
        // 'nd_brideVillage' => mysqli_real_escape_string($database->con, $_POST['inputBrideVillage']),
        // 'nd_brideIndex' => mysqli_real_escape_string($database->con, $inputBrideIndexNo),
        // 'nd_brideSubDivision' => mysqli_real_escape_string($database->con, $_POST['inputBrideSubdivision']),
        // 'nd_brideName' => mysqli_real_escape_string($database->con, $_POST['inputBrideName']),
        // 'nd_brideDOB' => mysqli_real_escape_string($database->con, $_POST['inpuBridetBirthday']),
        // 'nd_brideNIC' => mysqli_real_escape_string($database->con, $_POST['inputBrideNIC']),
        // 'nd_brideAge' => mysqli_real_escape_string($database->con, $_POST['inputBrideAge']),
        // 'nd_brideTP' => mysqli_real_escape_string($database->con, $_POST['inputBrideTP']),
        // 'nd_brideAddress' => mysqli_real_escape_string($database->con, $_POST['inputBrideAddress']),
        'nd_brideGuardName' => mysqli_real_escape_string($database->con, $_POST['inputBrideGuardianName']),
        'nd_brideGuardIndex' => mysqli_real_escape_string($database->con, $inputBrideGuardianIndex),
        'nd_brideMosqueName' => mysqli_real_escape_string($database->con, $_POST['inputBrideMosque']),
        'nd_brideMosqueAddress' => mysqli_real_escape_string($database->con, $_POST['inputBrideMosqueAddress']),
        'nd_marriageVenue' => mysqli_real_escape_string($database->con, $_POST['inputVenue']),
        'nd_marriageDate' => mysqli_real_escape_string($database->con, $inputMarriageDate),
        'nd_donation' => mysqli_real_escape_string($database->con, $_POST['inputdonation'])
    );
    $where_condition = array(
        'nd_nikkahId'     =>     $_POST["id"]
    );
    if ($database->update("tbl_nikkahdetails", $update_data, $where_condition)) {
        $URL = "preview_nikkah-details.php?updated=1";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

}

// update data in tbl_trusteeboarddetails
// editTrustee button click
if (isset($_POST['editTrustee'])) {
    $designation = $_POST['inputDesignation'];
    $inputIndexNo = $_POST["inputIndexNo"];
    $inputSubdivision = $_POST["inputSubdivision"];
    $inputName = $_POST["inputName"];
    $inputJob = $_POST["inputJob"];
    $inputTP = $_POST["inputTP"];
    $inputAddress = $_POST["inputAddress"];
    $inputSalary = $_POST["inputSalary"];

    $update_data = array(
        // 'tb_index' => mysqli_real_escape_string($database->con, $inputIndexNo),
        // 'tb_subDivision' => mysqli_real_escape_string($database->con, $inputSubdivision),
        // 'tb_designation' => mysqli_real_escape_string($database->con, $designation),
        // 'tb_name' => mysqli_real_escape_string($database->con, $inputName),
        // 'tb_address' => mysqli_real_escape_string($database->con, $inputAddress),
        'tb_job' => mysqli_real_escape_string($database->con, $inputJob),
        'tb_salary' => mysqli_real_escape_string($database->con, $inputSalary),
        'tb_telephone' => mysqli_real_escape_string($database->con, $inputTP)

    );
    $where_condition = array(
        'tb_id'     =>     $_POST["id"]
    );
    if ($database->update("tbl_trusteeboarddetails", $update_data, $where_condition)) {
        $URL = "preview_trustee_board-details.php?action=present&updated=1";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

}

// update data in tbl_quranmadrasadetails
// editQuran button click
if (isset($_POST['editQuran'])) {

    $update_data = array(
        // 'qm_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        // 'qm_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputQuranSubdivision']),
        // 'qm_name' => mysqli_real_escape_string($database->con, $_POST['inputName']),
        // 'qm_address' => mysqli_real_escape_string($database->con, $_POST['inputAddress']),
        // 'qm_dob' => mysqli_real_escape_string($database->con, $_POST['inputBirthday']),
        // 'qm_gender' => mysqli_real_escape_string($database->con, $inputSex),
        'qm_medium' => mysqli_real_escape_string($database->con, $_POST['inputMedium']),
        'qm_grade' => mysqli_real_escape_string($database->con, $_POST['inputGrade']),
        'qm_school' => mysqli_real_escape_string($database->con, $_POST['inputSchool']),
        'qm_notes' => mysqli_real_escape_string($database->con, $_POST['inputNotes']),
        'qm_startDate' => mysqli_real_escape_string($database->con, $_POST['inputAdmissionDate']),
        'qm_guardTelephone' => mysqli_real_escape_string($database->con, $_POST['inputGuardianTP']),
        'qm_guardName' => mysqli_real_escape_string($database->con, $_POST['inputGuardianName'])

    );
    $where_condition = array(
        'qm_qmadrasaId'     =>     $_POST["id"]
    );
    if ($database->update("tbl_quranmadrasadetails", $update_data, $where_condition)) {
        $URL = "preview_q_madrasa-details.php?updated=1";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

}

// update data in tbl_trusteeboarddetails
// editVillagers button click
if (isset($_POST['editVillagers'])) {

    if (isset($_POST["inputGuardianID"])) {
        if ($_POST["inputGuardianID"] != "") {
            $inputGuardianID = $_POST["inputGuardianID"];
        }
        else {
            $inputGuardianID = 0;
        }
    } else {
        $inputGuardianID = 0;
    }
    if (isset($_POST["inputMedium"])) {
        if ($_POST["inputMedium"] != "") {
            $inputMedium = $_POST["inputMedium"];
        }
        else {
            $inputMedium = 0;
        }
    } else {
        $inputMedium = 0;
    }
    if (isset($_POST["inputGuardRelationship"])) {
        if ($_POST["inputGuardRelationship"] != "") {
            $inputGuardRelationship = $_POST["inputGuardRelationship"];
        }
        else {
            $inputGuardRelationship = "0";
        }
    } else {
        $inputGuardRelationship = "0";
    }
    if (isset($_POST["inputCollege"])) {
        if ($_POST["inputCollege"] != "") {
            $inputCollege = $_POST["inputCollege"];
        }
        else {
            $inputCollege = "0";
        }
    } else {
        $inputCollege = "0";
    }
    if (isset($_POST["inputScholIncome"])) {
        if ($_POST["inputScholIncome"] != "") {
            $inputScholIncome = $_POST["inputScholIncome"];
        }
        else {
            $inputScholIncome = 0;
        }
    } else {
        $inputScholIncome = 0;
    }
    if (isset($_POST["inputMadType"])) {
        if ($_POST["inputMadType"] != "") {
            $inputMadType = $_POST["inputMadType"];
        }
        else {
            $inputMadType = "0";
        }
    } else {
        $inputMadType = "0";
    }
    if (isset($_POST["inputMadName"])) {
        if ($_POST["inputMadName"] != "") {
            $inputMadName = $_POST["inputMadName"];
        }
        else {
            $inputMadName = "0";
        }
    } else {
        $inputMadName = "0";
    }
    if (isset($_POST["inputMadStart"])) {
        if ($_POST["inputMadStart"] != "") {
            $inputMadStart = $_POST["inputMadStart"];
        }
        else {
            $inputMadStart = "0001-01-01";
        }
    } else {
        $inputMadStart = "0";
    }
    if (isset($_POST["inputMadExpense"])) {
        if ($_POST["inputMadExpense"] != "") {
            $inputMadExpense = $_POST["inputMadExpense"];
        }
        else {
            $inputMadExpense = 0;
        }
    } else {
        $inputMadExpense = 0;
    }
    if (isset($_POST["inputMonthlyIncomePersonal"])) {
        if ($_POST["inputMonthlyIncomePersonal"] != "") {
            $inputMonthlyIncomePersonal = $_POST["inputMonthlyIncomePersonal"];
        }
        else {
            $inputMonthlyIncomePersonal = 0;
        }
    } else {
        $inputMonthlyIncomePersonal = 0;
    }
    if (isset($_POST['inputDivorsed'])) {
        if ($_POST['inputDivorsed'] == "Yes") {
            $inputDivorsed = 1;
        } else {
            $inputDivorsed = 0;
        }
    }
    else {
        $inputDivorsed = 0;
    }
    if (isset($_POST['inputWidowed'])) {
        if ($_POST['inputWidowed'] == "Yes") {
            $inputWidowed = 1;
        } else {
            $inputWidowed = 0;
        }
    }
    else {
        $inputWidowed = 0;
    }
    if ($_POST['inputOrphan'] == "Yes") {
        $inputOrphan = 1;
    } else {
        $inputOrphan = 0;
    }
    if ($_POST['inputSaandhaStatus'] == "Yes") {
        $inputSaandhaStatus = 1;
    } else {
        $inputSaandhaStatus = 0;
    }
    if (isset($_POST['inputGrade'])) {
        if ($_POST["inputGrade"] != "") {
            $inputGrade = $_POST["inputGrade"];
        }
        else {
            $inputGrade = 0;
        }
    } else {
        $inputGrade = $_POST['inputGrade'];
    }
    if ($_POST['inputMad'] == "No") {
        $inputMad = 0;
        $inputMadStart = "0001-01-01";
        $inputMadExpense = 0;
        $inputMadType = "0";
        $inputMadName = "0";
    } else {
        $inputMad = $_POST['inputMad'];
    }
    if ($_POST['inputStudent'] == "No") {
        $inputMad = 0;
        $inputMadStart = "0001-01-01";
        $inputMadExpense = 0;
        $inputMadType = "0";
        $inputMadName = "0";
        $inputSchol = 0;
        $inputScholIncome = 0;
        $inputMedium = 0;
        $inputGrade = 0;
    }
    if ($_POST['inputEduQual'] == "None") {
        $inputCollege = "0";
    }
    if ($_POST['inputSchol'] == "Yes") {
        $inputSchol = 1;
    } else {
        $inputSchol = 0;
        $inputScholIncome = 0;
    }
    if ($_POST['inputGuardianStatus'] == "Yes") {
        $inputGuardianStatus = 1;
        $inputGuardianID = 0;
        $inputGuardRelationship = "0";
    } else {
        $inputGuardianStatus = 0;
    }
    if ($_POST['inputMarried'] == "Yes") {
        $inputMarried = 1;
    } else {
        $inputMarried = 0;
        $inputWidowed = 0;
        $inputDivorsed = 0;
    }
    if ($_POST["inputjobYN"] == "Yes") {
        if (isset($_POST["inputJob"])) {
            if ($_POST["inputJob"] != "") {
                $inputJob = $_POST["inputJob"];
            }
            else {
                $inputJob = 0;
            }
        } else {
            $inputJob = "0";
        }
    }
    else {
        $inputJob = 0;
        $inputMonthlyIncomePersonal = 0;
    }

    $update_data = array(
        'av_index' => mysqli_real_escape_string($database->con, $_POST['inputIndexNo']),
        'av_subDivision' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        // 'av_address' => mysqli_real_escape_string($database->con, $_POST['inputSubdivision']),
        // 'av_monthlyIncomeFamily' => mysqli_real_escape_string($database->con, $av_monthlyIncomeFamily),
        // 'av_avgInterpersonalIncome' => mysqli_real_escape_string($database->con, $av_avgInterpersonalIncome),
        // 'av_noofChildren' => mysqli_real_escape_string($database->con, $av_noofChildren),
        // 'av_unmarriedChildren' => mysqli_real_escape_string($database->con, $av_unmarriedChildren),
        // 'av_residentialStatus' => mysqli_real_escape_string($database->con, $av_residentialStatus),
        // 'av_prevRes_address' => mysqli_real_escape_string($database->con, $av_prevRes_address),
        // 'av_prevRes_gramasevaka' => mysqli_real_escape_string($database->con, $av_prevRes_gramasevaka),
        // 'av_prevRes_police' => mysqli_real_escape_string($database->con, $av_prevRes_police),
        // 'av_prevRes_mahalla' => mysqli_real_escape_string($database->con, $av_prevRes_mahalla),
        // 'av_newMigrant' => mysqli_real_escape_string($database->con, $av_newMigrant),
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
        'av_guardianRelationship' => mysqli_real_escape_string($database->con, $inputGuardRelationship),
        'av_eduQual' => mysqli_real_escape_string($database->con, $_POST['inputEduQual']),
        'av_addQual' => mysqli_real_escape_string($database->con, $_POST['inputAddQual']),
        'av_eduPremises' => mysqli_real_escape_string($database->con, $inputCollege),
        'av_eduMedium' => mysqli_real_escape_string($database->con, $inputMedium),
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
        'av_monthlyIncomePersonal' => mysqli_real_escape_string($database->con, $inputMonthlyIncomePersonal)

    );
    $where_condition = array(
        'av_index'     =>     $_POST["inputIndexNo"],
        'av_subDivision' => $_POST['inputSubdivision']
    );
    if ($database->update("tbl_allvillagers", $update_data, $where_condition)) {
        $URL = "preview_villager-details.php?updated=1&action=allvillagers";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

}


