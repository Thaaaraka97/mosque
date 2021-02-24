<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$index = $_GET['index'];
$subdivision = $_GET['subdivision'];
$action = $_GET['action'];
$where = array(
    'av_index' => $index,
    'av_subDivision' => $subdivision
);

$name = "";
$dob = "";
$telephone = "";
$av_gender = "";
$av_address = "";
$av_nic = "";
$av_age = "";
$av_job = "";
$av_monthlyIncomePersonal = "";
$av_monthlyIncomeFamily = "";
$av_avgInterpersonalIncome = "";
$av_married = "";
$av_spouseIndex = "";
$av_divorced = "";
$av_widowed = "";
$av_noofChildren = "";
$av_unmarriedChildren = "";
$av_orphaned = "";
$av_eduQual = "";
$av_eduMedium = "";
$av_eduPremises = "";
$av_addQual = "";
$av_eduGrade = "";
$av_scholStatus = "";
$av_scholAmount = "";
$av_residentialStatus = "";
$av_isGuardian = "";
$av_guardianIndex = "";
$av_guardianRelationship = "";
$av_newMigrant = "";
$av_prevRes_address = "";
$av_prevRes_gramasevaka = "";
$av_prevRes_police = "";
$av_prevRes_mahalla = "";
$av_madChild_madrasaName = "";
$av_madChild_type = "";
$av_madChild_startDate = "";
$av_madChild_avgMonthlyExpense = "";
$av_saandhaStatus = "";
$av_saandhaStatusReason = "";
$av_leftVillage = "";
$av_aliveOrDeceased = "";

$person_details = $database->select_where('tbl_allvillagers', $where);
foreach ($person_details as $person_details_item) {
    $name = $person_details_item['av_name'];
    $dob = $person_details_item['av_dob'];
    $telephone = $person_details_item['av_telephone'];

    $av_gender = $person_details_item['av_gender'];
    $av_address = $person_details_item['av_address'];
    $av_nic = $person_details_item['av_nic'];
    $av_age = $person_details_item['av_age'];
    $av_job = $person_details_item['av_job'];
    $av_monthlyIncomePersonal = $person_details_item['av_monthlyIncomePersonal'];
    $av_monthlyIncomeFamily = $person_details_item['av_monthlyIncomeFamily'];
    $av_avgInterpersonalIncome = $person_details_item['av_avgInterpersonalIncome'];
    $av_married = $person_details_item['av_married'];
    $av_spouseIndex = $person_details_item['av_spouseIndex'];
    $av_divorced = $person_details_item['av_divorced'];
    $av_widowed = $person_details_item['av_widowed'];
    $av_noofChildren = $person_details_item['av_noofChildren'];
    $av_unmarriedChildren = $person_details_item['av_unmarriedChildren'];
    $av_orphaned = $person_details_item['av_orphaned'];
    $av_eduQual = $person_details_item['av_eduQual'];
    $av_eduMedium = $person_details_item['av_eduMedium'];
    $av_eduPremises = $person_details_item['av_eduPremises'];
    $av_addQual = $person_details_item['av_addQual'];
    $av_eduGrade = $person_details_item['av_eduGrade'];
    $av_scholStatus = $person_details_item['av_scholStatus'];
    $av_scholAmount = $person_details_item['av_scholAmount'];
    $av_residentialStatus = $person_details_item['av_residentialStatus'];
    $av_isGuardian = $person_details_item['av_isGuardian'];
    $av_guardianIndex = $person_details_item['av_guardianIndex'];
    $av_guardianRelationship = $person_details_item['av_guardianRelationship'];
    $av_newMigrant = $person_details_item['av_newMigrant'];
    $av_prevRes_address = $person_details_item['av_prevRes_address'];
    $av_prevRes_gramasevaka = $person_details_item['av_prevRes_gramasevaka'];
    $av_prevRes_police = $person_details_item['av_prevRes_police'];
    $av_prevRes_mahalla = $person_details_item['av_prevRes_mahalla'];
    $av_madChild_madrasaName = $person_details_item['av_madChild_madrasaName'];
    $av_madChild_type = $person_details_item['av_madChild_type'];
    $av_madChild_startDate = $person_details_item['av_madChild_startDate'];
    $av_madChild_avgMonthlyExpense = $person_details_item['av_madChild_avgMonthlyExpense'];
    $av_saandhaStatus = $person_details_item['av_saandhaStatus'];
    $av_saandhaStatusReason = $person_details_item['av_saandhaStatusReason'];
    $av_leftVillage = $person_details_item['av_leftVillage'];
    $av_aliveOrDeceased = $person_details_item['av_aliveOrDeceased'];

    if ($av_married == 1) {
        $av_married = "Yes";
    } else {
        $av_married = "No";
    }
    if ($av_orphaned == 1) {
        $av_orphaned = "Yes";
    } else {
        $av_orphaned = "No";
    }
    if ($av_divorced == 1) {
        $av_divorced = "Yes";
    } else {
        $av_divorced = "No";
    }
    if ($av_widowed == 1) {
        $av_widowed = "Yes";
    } else {
        $av_widowed = "No";
    }
    if ($av_scholStatus == 1) {
        $av_scholStatus = "Yes";
    } else {
        $av_scholStatus = "No";
    }
    if ($av_isGuardian == 1) {
        $av_isGuardian = "Yes";
    } else {
        $av_isGuardian = "No";
    }
    if ($av_newMigrant == 1) {
        $av_newMigrant = "Yes";
    } else {
        $av_newMigrant = "No";
    }
    if ($av_prevRes_gramasevaka == 1) {
        $av_prevRes_gramasevaka = "Yes";
    } else {
        $av_prevRes_gramasevaka = "No";
    }
    if ($av_prevRes_police == 1) {
        $av_prevRes_police = "Yes";
    } else {
        $av_prevRes_police = "No";
    }
    if ($av_prevRes_mahalla == 1) {
        $av_prevRes_mahalla = "Yes";
    } else {
        $av_prevRes_mahalla = "No";
    }
    if ($av_leftVillage == 1) {
        $av_leftVillage = "Yes";
    } else {
        $av_leftVillage = "No";
    }
    if ($av_aliveOrDeceased == 1) {
        $av_aliveOrDeceased = "Alive";
    } else {
        $av_aliveOrDeceased = "Dead";
    }
    if ($av_gender == "F") {
        $av_gender = "Female";
    } else {
        $av_gender = "Male";
    }
    if ($av_eduMedium == "S") {
        $av_eduMedium = "Sinhala";
    } else if ($av_eduMedium == "E") {
        $av_eduMedium = "English";
    } else if ($av_eduMedium == "T") {
        $av_eduMedium = "Tamil";
    } else {
        $av_eduMedium = "0";
    }
}

$age = $database->calculate_age($dob);

?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
</script>

<body>
    <div class="container-scroller">
        <!-- navigation bar -->
        <?php

        include "template_parts/navbar.php";
        ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- top bar -->
            <?php

            include "template_parts/topbar.php";
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> All Villagers Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_villager-details.php?action=allvillagers">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-dark col-auto" id="viewDetails">
                                        <h4 class="card-title"> Details Preview Step-2 </h4>
                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Name</th>
                                                <td> : </td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Index Number</th>
                                                <td> : </td>
                                                <td><?php echo $index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td> : </td>
                                                <td><?php echo $age ?></td>
                                            </tr>
                                            <tr>
                                                <th>Telephone Number</th>
                                                <td> : </td>
                                                <td><?php echo $telephone ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td> : </td>
                                                <td><?php echo $av_gender ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $av_address ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIC</th>
                                                <td> : </td>
                                                <td><?php echo $av_nic ?></td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td> : </td>
                                                <td><?php echo $av_age ?></td>
                                            </tr>
                                            <tr>
                                                <th>Job</th>
                                                <td> : </td>
                                                <td><?php echo $av_job ?></td>
                                            </tr>
                                            <tr>
                                                <th>Monthly Income (Personal)</th>
                                                <td> : </td>
                                                <td><?php echo $av_monthlyIncomePersonal ?></td>
                                            </tr>
                                            <tr>
                                                <th>Monthly Income (Family)</th>
                                                <td> : </td>
                                                <td><?php echo $av_monthlyIncomeFamily ?></td>
                                            </tr>
                                            <tr>
                                                <th>Average INterpersonal Income</th>
                                                <td> : </td>
                                                <td><?php echo $av_avgInterpersonalIncome ?></td>
                                            </tr>
                                            <tr>
                                                <th>is Married</th>
                                                <td> : </td>
                                                <td><?php echo $av_married ?></td>
                                            </tr>
                                            <?php
                                            if ($av_married == "Yes") {
                                                echo "
                                                <tr>
                                                    <th>Spouse Index</th>
                                                    <td> : </td>
                                                    <td>$av_spouseIndex</td>
                                                </tr>
                                                <tr>
                                                    <th>is Divorsed</th>
                                                    <td> : </td>
                                                    <td>$av_divorced</td>
                                                </tr>
                                                <tr>
                                                    <th>is Widowed</th>
                                                    <td> : </td>
                                                    <td>$av_widowed</td>
                                                </tr>
                                                ";
                                            }
                                            ?>
                                            <tr>
                                                <th>No of Children</th>
                                                <td> : </td>
                                                <td><?php echo $av_noofChildren ?></td>
                                            </tr>
                                            <tr>
                                                <th>No of Unmarried Children</th>
                                                <td> : </td>
                                                <td><?php echo $av_unmarriedChildren ?></td>
                                            </tr>
                                            <tr>
                                                <th>is Orphaned</th>
                                                <td> : </td>
                                                <td><?php echo $av_orphaned ?></td>
                                            </tr>
                                            <tr>
                                                <th>Educational Qualifications</th>
                                                <td> : </td>
                                                <td><?php echo $av_eduQual ?></td>
                                            </tr>
                                            <tr>
                                                <th>School</th>
                                                <td> : </td>
                                                <td><?php echo $av_eduPremises ?></td>
                                            </tr>

                                            <?php
                                            if ($av_eduGrade != 0 && $av_madChild_madrasaName != "" && $av_scholStatus != "No") {
                                                echo "
                                                <tr>
                                                    <th colspan='3' class='align-items-center'>Educational Details</th>
                                                </tr>
                                                <tr>
                                                    <th>Medium</th>
                                                    <td> : </td>
                                                    <td>$av_eduMedium</td>
                                                </tr>
                                                <tr>
                                                    <th>Additional Qualifications</th>
                                                    <td> : </td>
                                                    <td>$av_addQual</td>
                                                </tr>
                                                <tr>
                                                    <th>Grade</th>
                                                    <td> : </td>
                                                    <td>$av_eduGrade</td>
                                                </tr>
                                                <tr>
                                                    <th>Scholarship Status</th>
                                                <td> : </td>
                                                    <td>$av_scholStatus</td>
                                                </tr>

                                                <tr>
                                                    <th>Scholarship Amount</th>
                                                    <td> : </td>
                                                    <td>$av_scholAmount</td>
                                                </tr>
                                                <tr>
                                                <th colspan='3' class='align-items-center'>Madrasa Child Details</th>
                                            </tr>
                                            <tr>
                                                <th>Madhrasa Name</th>
                                                <td> : </td>
                                                <td>$av_madChild_madrasaName</td>
                                            </tr>
                                            <tr>
                                                <th>Madhrasa Child Type</th>
                                                <td> : </td>
                                                <td>$av_madChild_type</td>
                                            </tr>
                                            <tr>
                                                <th>Start Date</th>
                                                <td> : </td>
                                                <td>$av_madChild_startDate</td>
                                            </tr>
                                            <tr>
                                                <th>Average Monthly Expenses</th>
                                                <td> : </td>
                                                <td>$av_madChild_avgMonthlyExpense</td>
                                            </tr>
                                                ";
                                            }
                                            ?>
                                            <tr>
                                                <th>Residential Status</th>
                                                <td> : </td>
                                                <td><?php echo $av_residentialStatus ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="align-items-center">Guardian Details</th>
                                            </tr>
                                            <tr>
                                                <th>is Guardian</th>
                                                <td> : </td>
                                                <td><?php echo $av_isGuardian ?></td>
                                            </tr>
                                            <?php
                                            if ($av_isGuardian == "Yes") {
                                                echo "
                                                <tr>
                                                    <th>Guardian Index</th>
                                                    <td> : </td>
                                                    <td><?php echo $av_guardianIndex ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Relationship to the Guardian</th>
                                                    <td> : </td>
                                                    <td><?php echo $av_guardianRelationship ?></td>
                                                </tr>
                                                ";
                                            }
                                            ?>
                                            <tr>
                                                <th colspan="3" class="align-items-center">New Migrant Details</th>
                                            </tr>
                                            <tr>
                                                <th>New Migrant</th>
                                                <td> : </td>
                                                <td><?php echo $av_newMigrant ?></td>
                                            </tr>
                                            <?php
                                            if ($av_newMigrant == "Yes") {
                                                echo "
                                                <tr>
                                                    <th>Previous Address</th>
                                                    <td> : </td>
                                                    <td><?php echo $av_prevRes_address ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Gramasevaka Certificate</th>
                                                    <td> : </td>
                                                    <td><?php echo $av_prevRes_gramasevaka ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Police Certificate</th>
                                                    <td> : </td>
                                                    <td><?php echo $av_prevRes_police ?></td>
                                                </tr>
                                                ";
                                            }
                                            ?>
                                            <tr>
                                                <th colspan="3" class="align-items-center">Saandha Details</th>
                                            </tr>
                                            <tr>
                                                <th>Saandha Status</th>
                                                <td> : </td>
                                                <td><?php echo $av_saandhaStatus ?></td>
                                            </tr>
                                            <tr>
                                                <th>Reason</th>
                                                <td> : </td>
                                                <td><?php echo $av_saandhaStatusReason ?></td>
                                            </tr>
                                            <tr>
                                                <th>Left the Village</th>
                                                <td> : </td>
                                                <td><?php echo $av_leftVillage ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alive/Dead</th>
                                                <td> : </td>
                                                <td><?php echo $av_aliveOrDeceased ?></td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="text-dark" id="editDetails">
                                    <h4 class="center card-title"> Edit Details </h4>
                                        <div id="saandhaStep1">
                                            <h4 class="card-title">Personal Details</h4>
                                            <div class="form-group">
                                                <label for="inputName"> Name </label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $name ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> Gender </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="M" <?php echo ($av_gender == 'Male') ? 'checked' : '' ?>> Male </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="F" <?php echo ($av_gender == 'Female') ? 'checked' : '' ?>> Female </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> Is an Orphan Child </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputOrphan" id="inputOrphanY" value="Yes" <?php echo ($av_orphaned == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputOrphan" id="inputOrphanN" value="No"  <?php echo ($av_orphaned == 'No') ? 'checked' : '' ?>> No </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputNIC">National Identity Card </label>
                                                    <input type="text" class="form-control" id="inputNIC" name="inputNIC" placeholder="NIC" value="<?php echo $av_nic ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputDOB">Date of Birth </label>
                                                    <input type="date" class="form-control" name="inputDOB" value="<?php echo $dob ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAge">Age </label>
                                                    <input type="text" class="form-control" name="inputAge" placeholder="Age" value="<?php echo $av_age ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="077xxxxxxx" value="<?php echo $telephone ?>">
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> Is a Guardian </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianY" value="Yes" <?php echo ($av_isGuardian == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianN" value="No" <?php echo ($av_isGuardian == 'No') ? 'checked' : '' ?>> No </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div id="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputGuardianID"> Guardian Index Number </label>
                                                        <input type="text" class="form-control" id="inputGuardianID" name="inputGuardianID" placeholder="Index No" value="<?php echo $av_guardianIndex ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputGuardRelationship">Relationship to the Guardian</label>
                                                        <select id="inputGuardRelationship" name="inputGuardRelationship" class="form-control">
                                                            <option value="0" <?php echo ($av_guardianRelationship == '0') ? 'selected' : '' ?>>Choose...</option>
                                                            <option value="Father" <?php echo ($av_guardianRelationship == 'Father') ? 'selected' : '' ?>>Father</option>
                                                            <option value="Mother" <?php echo ($av_guardianRelationship == 'Mother') ? 'selected' : '' ?>>Mother</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEduQual">Educational Qualifications</label>
                                                    <select id="inputEduQual" name="inputEduQual" class="form-control">
                                                        <option value="0" <?php echo ($av_eduQual == '0') ? 'selected' : '' ?>>Choose...</option>
                                                        <option value="O/L" <?php echo ($av_eduQual == 'O/L') ? 'selected' : '' ?>>O/L</option>
                                                        <option value="A/L" <?php echo ($av_eduQual == 'A/L') ? 'selected' : '' ?>>A/L</option>
                                                        <option value="University" <?php echo ($av_eduQual == 'University') ? 'selected' : '' ?>>University</option>
                                                        <option value="Technical College" <?php echo ($av_eduQual == 'Technical College') ? 'selected' : '' ?>>Technical College</option>
                                                        <option value="Teaching College" <?php echo ($av_eduQual == 'Teaching College') ? 'selected' : '' ?>>Teaching College</option>
                                                        <option value="Foreign Education" <?php echo ($av_eduQual == 'Foreign Education') ? 'selected' : '' ?>>Foreign Education</option>
                                                        <option value="None" <?php echo ($av_eduQual == 'None') ? 'selected' : '' ?>>None</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddQual">Additional Qualifications</label>
                                                    <select id="inputAddQual" name="inputAddQual" class="form-control">
                                                        <option value="0" <?php echo ($av_addQual == '0') ? 'selected' : '' ?>>Choose...</option>
                                                        <option value="Tailoring" <?php echo ($av_addQual == 'Tailoring') ? 'selected' : '' ?>>Tailoring</option>
                                                        <option value="Automobile Mechanic" <?php echo ($av_addQual == 'Automobile Mechanic') ? 'selected' : '' ?>>Automobile Mechanic</option>
                                                        <option value="A/C Mechanic" <?php echo ($av_addQual == 'A/C Mechanic') ? 'selected' : '' ?>>A/C Mechanic</option>
                                                        <option value="Carpenter" <?php echo ($av_addQual == 'Carpenter') ? 'selected' : '' ?>>Carpenter</option>
                                                        <option value="Gem Cutting" <?php echo ($av_addQual == 'Gem Cutting') ? 'selected' : '' ?>>Gem Cutting</option>
                                                        <option value="Mason" <?php echo ($av_addQual == 'Mason') ? 'selected' : '' ?>>Mason</option>
                                                        <option value="Electrician" <?php echo ($av_addQual == 'Electrician') ? 'selected' : '' ?>>Electrician</option>
                                                        <option value="Plumbing" <?php echo ($av_addQual == 'Plumbing') ? 'selected' : '' ?>>Plumbing</option>
                                                        <option value="Farming" <?php echo ($av_addQual == 'Farming') ? 'selected' : '' ?>>Farming</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="college">
                                                <label for="inputCollege">College </label>
                                                <input type="text" class="form-control" id="inputCollege" name="inputCollege" placeholder="College" value="<?php echo $av_eduPremises ?>">
                                            </div>
                                            <div class="w-100 text-right">
                                                <button class="btn btn-primary btn-lg" id="avNext1">Next</button>
                                            </div>
                                        </div>
                                        <div id="saandhaStep2">
                                            <h4 class="card-title">Education</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> Is Student </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputStudent" id="inputStudentY" value="Yes" <?php echo ($av_eduGrade != '') ? 'checked' : '' ?>> Yes </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputStudent" id="inputStudentN" value="No" <?php echo ($av_eduGrade == '') ? 'checked' : '' ?>> No </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputMedium">Medium</label>
                                                        <select id="inputMedium" name="inputMedium" class="form-control">
                                                            <option value="0" <?php echo ($av_eduMedium == '0') ? 'selected' : '' ?>>Choose...</option>
                                                            <option value="T" <?php echo ($av_eduMedium == 'Tamil') ? 'selected' : '' ?>>Tamil</option>
                                                            <option value="E" <?php echo ($av_eduMedium == 'English') ? 'selected' : '' ?>>English</option>
                                                            <option value="S" <?php echo ($av_eduMedium == 'Sinhala') ? 'selected' : '' ?>>Sinhala</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputGrade"> Grade </label>
                                                        <input type="text" class="form-control" name="inputGrade" id="inputGrade" placeholder="Grade" value="<?php echo $av_eduGrade ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Scholarship Status </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSchol" id="inputScholY" value="Yes" <?php echo ($av_scholStatus == 'Yes') ? 'checked' : '' ?>> Receiving </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSchol" id="inputScholN" value="No" <?php echo ($av_scholStatus == 'No') ? 'checked' : '' ?>> Not Receiving </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6" id="">
                                                        <label for="inputScholIncome"> Scholarship Income </label>
                                                        <input type="text" class="form-control" id="inputScholIncome" name="inputScholIncome" placeholder="Scholarship Income" value="<?php echo $av_scholAmount ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Is a Madhrasa Student </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMad" id="inputMadY" value="Yes" <?php echo ($av_widowed == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMad" id="inputMadN" value="No" <?php echo ($av_widowed == 'No') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="">
                                                    <div class="form-group form-row">
                                                        <div class="form-group col-md-6" id="">
                                                            <label for="inputMadType"> Madhrasa Type </label>
                                                            <select id="inputMadType" name="inputMadType" class="form-control">
                                                                <option value="0" <?php echo ($av_madChild_type == '0') ? 'selected' : '' ?>>Choose...</option>
                                                                <option value="Kithah" <?php echo ($av_madChild_type == 'Kithah') ? 'selected' : '' ?>>Kithah</option>
                                                                <option value="Hiful" <?php echo ($av_madChild_type == 'Hiful') ? 'selected' : '' ?>>Hiful</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputMadName"> Madhrasa Name </label>
                                                            <input type="text" class="form-control" id="inputMadName" name="inputMadName" placeholder="Madhrasa Name" value="<?php echo $av_madChild_madrasaName ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputMadStart"> Madhrasa Start Date </label>
                                                            <input type="date" class="form-control" id="inputMadStart" name="inputMadStart" value="<?php echo $av_madChild_startDate ?>">
                                                        </div>
                                                        <div class="form-group col-md-6" id="inputMadExpense">
                                                            <label for="inputMadExpense"> Average monthly Expenses </label>
                                                            <input type="text" class="form-control" id="inputMadExpense" name="inputMadExpense" placeholder="Average monthly Expenses" value="<?php echo $av_madChild_avgMonthlyExpense ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 text-right">
                                                <button class="btn btn-success btn-lg" id="avPrev2">Previous</button>
                                                <button class="btn btn-primary btn-lg" id="avNext2">Next</button>
                                            </div>
                                        </div>
                                        <div id="saandhaStep3">
                                            <h4 class="card-title"> Marital Details </h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> Is Married </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputMarried" id="inputMarriedY" value="Yes" <?php echo ($av_married == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputMarried" id="inputMarriedN" value="No"  <?php echo ($av_married == 'No') ? 'checked' : '' ?>> No </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Divorsed </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputDivorsed" id="inputDivorsedY" value="Yes" <?php echo ($av_divorced == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputDivorsed" id="inputDivorsedN" value="No"  <?php echo ($av_divorced == 'No') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Widowed </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputWidowed" id="inputWidowedY" value="Yes" <?php echo ($av_widowed == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputWidowed" id="inputWidowedN" value="No" <?php echo ($av_widowed == 'No') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputSpouse"> Spouse Index </label>
                                                        <input type="text" class="form-control" id="inputSpouse" name="inputSpouse" placeholder="Spouse Index" value="<?php echo $av_spouseIndex ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 text-right">
                                                <button class="btn btn-success btn-lg" id="avPrev3">Previous</button>
                                                <button class="btn btn-primary btn-lg" id="avNext3">Next</button>
                                            </div>
                                        </div>
                                        <div id="saandhaStep4">
                                            <h4 class="card-title"> Job Details </h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> Has a job </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputjobYN" id="inputjobYN1" value="Yes" <?php echo ($av_job != '') ? 'checked' : '' ?>> Yes </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputjobYN" id="inputjobYN2" value="No" <?php echo ($av_job == '') ? 'checked' : '' ?>> No </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJob"> Job </label>
                                                        <input type="text" class="form-control" id="inputJob" name="inputJob" placeholder="Job" value="<?php echo $av_job ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputMonthlyIncomePersonal"> Monthly Income (Personal) </label>
                                                        <input type="text" class="form-control" id="inputMonthlyIncomePersonal" name="inputMonthlyIncomePersonal" placeholder="Personal Income" value="<?php echo $av_monthlyIncomePersonal ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 text-center">
                                                <button class="btn btn-success btn-lg" id="avPrev4">Previous</button>
                                                <button class="btn btn-primary btn-lg" id="editVillagers" name="editVillagers">Edit Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- footer -->
    <?php
    include "template_parts/footer.php";
    ?>
    <!-- End custom js for this page -->
</body>

</html>