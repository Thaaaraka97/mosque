<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();

$sort5 = 0;
$sort6 = 0;
if (isset($_GET['sort5'])) {
    $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
    $sort6 = $_GET['sort6'];
}

$index = $_GET['index'];
$subdivision = $_GET['subdivision'];
$action = $_GET['action'];
if (isset($_GET["updated"])) {
    $success_message = 'Record is updated successfully..!';
}
$income = 0.00;
$expense = 0.00;

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
$av_disabled = "";
$is_student = 1;
$av_specialSaandhaAmt = 1;
$av_QuickForm = "";
$av_FamilyID = "";


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
    $av_madChild_status = $person_details_item['av_madChild_status'];
    $av_madChild_type = $person_details_item['av_madChild_type'];
    $av_madChild_startDate = $person_details_item['av_madChild_startDate'];
    $av_madChild_avgMonthlyExpense = $person_details_item['av_madChild_avgMonthlyExpense'];
    $av_saandhaStatus = $person_details_item['av_saandhaStatus'];
    $av_saandhaStatusReason = $person_details_item['av_saandhaStatusReason'];
    $av_leftVillage = $person_details_item['av_leftVillage'];
    $av_aliveOrDeceased = $person_details_item['av_aliveOrDeceased'];
    $av_disabled = $person_details_item['av_disabled'];
    $av_specialSaandhaAmt = $person_details_item['av_specialSaandhaAmt'];
    $av_QuickForm = $person_details_item['av_QuickForm'];
    $av_FamilyID = $person_details_item['av_FamilyID'];

    if ($av_eduGrade == "0" && $av_madChild_status == "0") {
        $is_student = 0;
    }
    if ($av_married == 1) {
        $av_married = "Married";
    } else {
        $av_married = "Not Married";
    }
    if ($av_saandhaStatus == 1) {
        $av_saandhaStatus = "Yes";
    } else {
        $av_saandhaStatus = "No";
    }
    if ($av_disabled == 1) {
        $av_disabled = "Yes";
    } else {
        $av_disabled = "No";
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
    var av_isGuardian = "<?php echo $av_isGuardian; ?>";
    var av_eduQual = "<?php echo $av_eduQual; ?>";
    var is_student = "<?php echo $is_student; ?>";
    var av_scholStatus = "<?php echo $av_scholStatus; ?>";
    var av_madChild_status = "<?php echo $av_madChild_status; ?>";
    var av_married = "<?php echo $av_married; ?>";
    var av_job = "<?php echo $av_job; ?>";
    var sort5 = "<?php echo $sort5; ?>";
    var sort6 = "<?php echo $sort6; ?>";
    var index = "<?php echo $index; ?>";
    var sub = "<?php echo $subdivision; ?>";
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
                    <?php
                    if (isset($_GET["updated"])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $success_message . "
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_villager-details.php?action=allvillagers">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php
                                                    if ($action == "view_saandha") {
                                                        echo "<h3 class='card-title top'> All Villagers Details Preview </h3>";
                                                    }
                                                    if ($action == "edit") {
                                                        echo "<h3 class='card-title top'> All Villagers Details (Edit) </h3>";
                                                    }
                                                    ?>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark col-auto" id="viewDetails">
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Personal Details </h4>
                                        <?php
                                        if ($av_QuickForm == 1) {
                                            echo "<h6 class='text-danger'>*Details are entered using the Quick Form. Some of the Fields are Not Set.</h6>";
                                        }
                                        else {
                                            echo "<h6 class='text-success'>*All the details are filled.</h6>";
                                        }
                                        ?>
                                        <div class="preview-list mt-3">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Index Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $index ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Sub Division</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $subdivision ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Age</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $age ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Telephone Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $telephone ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Gender</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_gender ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Address</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_address ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">NIC</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_nic ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Job</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_job ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Monthly Income (Personal)</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_monthlyIncomePersonal ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Monthly Income (Family)</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_monthlyIncomeFamily ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Average Interpersonal Income</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_avgInterpersonalIncome ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Marital Status</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_married ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Orphan Child</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_orphaned ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Disabled Status</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_disabled ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Residential Status</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_residentialStatus ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Family ID</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_FamilyID ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Left the Village</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_leftVillage ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Alive/Dead</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_aliveOrDeceased ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($av_married == "Married") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>No of Children</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_noofChildren</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>No of Unmarried Children (in the Family)</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_unmarriedChildren</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Divorsed</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_divorced</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Widowed</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_widowed</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Educational Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Educational Qualifications</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_eduQual ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($av_eduQual != "None") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>School</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_eduPremises</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Additional Qualifications</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_addQual ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        if ($av_eduGrade != 0) {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Medium</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_eduMedium</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Grade</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_eduGrade</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               ";
                                        }
                                        if ($av_scholStatus != "No") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Scholarship Status</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_scholStatus</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Scholarship Amount</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_scholAmount</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        if ($av_madChild_madrasaName != "") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Madhrasa Name</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_madChild_madrasaName</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Madhrasa Child Type</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_madChild_type</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Start Date</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_madChild_startDate</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Average Monthly Expenses</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_madChild_avgMonthlyExpense</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Guardian Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Guardian</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_isGuardian ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($av_isGuardian == "Yes") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Guardian Index</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_guardianIndex</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Relationship to the Guardian</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_guardianRelationship</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Saandha Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Saandha Status</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_saandhaStatus ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($av_saandhaStatus == "No") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Saandha Status Reason</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_saandhaStatusReason</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> New Migrant Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">New Migrant</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $av_newMigrant ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($av_newMigrant == "Yes") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Previous Address</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$av_prevRes_address</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="payment_history">
                        <?php
                        $where = array(
                            'collection_index' => $index,
                            'collection_subdivision' => $subdivision
                        );
                        $sanndha_collection = $database->select_where('tbl_saandhacollection', $where);
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Saandha Payment History </h4>
                                        <div class="text-center">
                                            <div class="table-responsive table-responsive-data2">
                                                <div class="sorting">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="sortVillagerSaandhaFrom">From</label>
                                                            <input class="form-control" type="date" name="sortVillagerSaandhaFrom" id="sortVillagerSaandhaFrom" value="<?php echo $sort5 ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortVillagerSaandhaTo">To</label>
                                                            <input class="form-control" type="date" name="sortVillagerSaandhaTo" id="sortVillagerSaandhaTo" value="<?php echo $sort6 ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                            <th>Date</th>
                                                            <th>Paid Amount</th>
                                                            <th>Paid For</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($sanndha_collection as $sanndha_collection_item) {
                                                            if (date($sanndha_collection_item['collection_date']) >= $sort5 && date($sanndha_collection_item['collection_date']) <= $sort6) {
                                                                echo "
                                                                <tr>
                                                                    <td> " . $sanndha_collection_item['collection_date'] . "</td>
                                                                    <td> " . $sanndha_collection_item['collection_paidAmount'] . " </td>
                                                                    <td>" . $sanndha_collection_item['collection_paidFor'] . "</td>
                                                                </tr>
                                                                ";
                                                            }
                                                        }


                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post">
                        <div class="text-dark" id="editDetails">
                            <div class="row justify-content-center">
                                <div class="col-md-8 grid-margin stretch-card">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div id="saandhaStep1">
                                                <h4 class="card-title">Personal Details</h4>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputIndexNo"> Index Number </label>
                                                        <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" value="<?php echo $index ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputSubdivision"> Sub-division </label>
                                                        <input type="text" class="form-control" id="inputSubdivision" name="inputSubdivision" value="<?php echo $subdivision ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName"> Name </label>
                                                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $name ?>">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-4 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Gender </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="M" <?php echo ($av_gender == 'Male') ? 'checked' : '' ?>> Male </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="F" <?php echo ($av_gender == 'Female') ? 'checked' : '' ?>> Female </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-4 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Is an Orphan Child ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputOrphan" id="inputOrphanY" value="Yes" <?php echo ($av_orphaned == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputOrphan" id="inputOrphanN" value="No" <?php echo ($av_orphaned == 'No') ? 'checked' : '' ?>> No </label>
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
                                                            <div class="col-md-4 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Is a Guardian ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianY" value="Yes" <?php echo ($av_isGuardian == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianN" value="No" <?php echo ($av_isGuardian == 'No') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="saandhaGuardianEdit">
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
                                                                <option value="Brother" <?php echo ($av_guardianRelationship == 'Brother') ? 'selected' : '' ?>>Brother</option>
                                                                <option value="Uncle" <?php echo ($av_guardianRelationship == 'Uncle') ? 'selected' : '' ?>>Uncle</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-4 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Saandha registered ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSaandhaStatus" id="inputSaandhaStatusY" value="Yes" <?php echo ($av_saandhaStatus == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSaandhaStatus" id="inputSaandhaStatusN" value="No" <?php echo ($av_saandhaStatus == 'No') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-4 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Disabled ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputDiasbleStatus" id="inputDiasbleStatusY" value="Yes" <?php echo ($av_disabled == 'No') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputDiasbleStatus" id="inputDiasbleStatusN" value="No" <?php echo ($av_disabled == 'No') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="saandhaAmountPrev">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputSpecialSaandha"> Saandha - Special Amount </label>
                                                            <input type="text" class="form-control" id="inputSpecialSaandha" name="inputSpecialSaandha" placeholder="Amount (Rs)" value="<?php echo $av_specialSaandhaAmt ?>">
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
                                                            <option value="None" <?php echo ($av_addQual == 'None') ? 'selected' : '' ?>>None</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="collegeEdit">
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
                                                            <div class="col-md-3 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Is Student ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputStudent" id="inputStudentY" value="Yes" <?php echo ($is_student == 1) ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputStudent" id="inputStudentN" value="No" <?php echo ($is_student == 0) ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="avStudentEdit">
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
                                                                <div class="col-md-3 pt-2 d-flex align-items-center">
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
                                                        <div class="form-group col-md-6" id="inputScholIncomeEdit">
                                                            <label for="inputScholIncome"> Scholarship Income </label>
                                                            <input type="text" class="form-control" id="inputScholIncome" name="inputScholIncome" placeholder="Scholarship Income" value="<?php echo $av_scholAmount ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center">
                                                                    <label class="form-label"> Is a Madhrasa Student ? </label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputMad" id="inputMadY" value="Yes" <?php echo ($av_madChild_status == '1') ? 'checked' : '' ?>> Yes </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputMad" id="inputMadN" value="No" <?php echo ($av_madChild_status == '0') ? 'checked' : '' ?>> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="madhrasaEdit">
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
                                                            <div class="col-md-3 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Is Married ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMarried" id="inputMarriedY" value="Yes" <?php echo ($av_married == 'Married') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMarried" id="inputMarriedN" value="No" <?php echo ($av_married == 'Not Married') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="marriedEdit">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center">
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
                                                                            <input type="radio" class="form-check-input" name="inputDivorsed" id="inputDivorsedN" value="No" <?php echo ($av_divorced == 'No') ? 'checked' : '' ?>> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center">
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
                                                            <div class="col-md-3 pt-2 d-flex align-items-center">
                                                                <label class="form-label"> Has a job ? </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputjobYN" id="inputjobYN1" value="Yes" <?php echo ($av_job != '0') ? 'checked' : '' ?>> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputjobYN" id="inputjobYN2" value="No" <?php echo ($av_job == '0') ? 'checked' : '' ?>> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="familyIncomeEdit">
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
                    </form>

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