<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$index = $_GET['index'];
$subdivision = $_GET['subdivision'];
$action = $_GET['action'] ;
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
    }
    else {
        $av_married = "No";
    }
    if ($av_isGuardian == 1) {
        $av_isGuardian = "Yes";
    }
    else {
        $av_isGuardian = "No";
    }
    if ($av_newMigrant == 1) {
        $av_newMigrant = "Yes";
    }
    else {
        $av_newMigrant = "No";
    }
    if ($av_prevRes_gramasevaka == 1) {
        $av_prevRes_gramasevaka = "Yes";
    }
    else {
        $av_prevRes_gramasevaka = "No";
    }
    if ($av_prevRes_police == 1) {
        $av_prevRes_police = "Yes";
    }
    else {
        $av_prevRes_police = "No";
    }
    if ($av_prevRes_mahalla == 1) {
        $av_prevRes_mahalla = "Yes";
    }
    else {
        $av_prevRes_mahalla = "No";
    }
    if ($av_leftVillage == 1) {
        $av_leftVillage = "Yes";
    }
    else {
        $av_leftVillage = "No";
    }
    if ($av_aliveOrDeceased == 1) {
        $av_aliveOrDeceased = "Alive";
    }
    else {
        $av_aliveOrDeceased = "Dead";
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
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_villager-details.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title"> Details Preview Step-2 </h4>
                                    <div class="mt-5 text-dark col-auto" id="viewDetails">
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
                                            if ($av_eduGrade != 0 && $av_madChild_madrasaName != "" && $av_scholStatus != 0) {
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

                                    <div class="mt-5 text-dark" id="editDetails">

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