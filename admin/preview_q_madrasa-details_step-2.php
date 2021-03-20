<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'];

$where = array(
    'qm_qmadrasaId' => $id
);

$dob = "";
$index = "";
$name = "";
$gender = "";
$subdivision = "";
$medium = "";
$address = "";
$school = "";
$guard_name = "";
$grade = "";
$notes = "";
$start_date = "";
$guard_tp = "";

$q_madrasa_details = $database->select_where('tbl_quranmadrasadetails', $where);
foreach ($q_madrasa_details as $q_madrasa_details_item) {
    $name = $q_madrasa_details_item['qm_name'];
    $index = $q_madrasa_details_item['qm_index'];
    $subdivision = $q_madrasa_details_item['qm_subDivision'];
    $dob = $q_madrasa_details_item['qm_dob'];
    $gender = $q_madrasa_details_item['qm_gender'];
    $medium = $q_madrasa_details_item['qm_medium'];
    $address = $q_madrasa_details_item['qm_address'];
    $school = $q_madrasa_details_item['qm_school'];
    $guard_name = $q_madrasa_details_item['qm_guardName'];
    $grade = $q_madrasa_details_item['qm_grade'];
    $notes = $q_madrasa_details_item['qm_notes'];
    $start_date = $q_madrasa_details_item['qm_startDate'];
    $guard_tp = $q_madrasa_details_item['qm_guardTelephone'];
    if ($gender == "M") {
        $gender = "Male";
    } else {
        $gender = "Female";
    }
    if ($medium == "S") {
        $medium = "Sinhala";
    } elseif ($medium == "E") {
        $medium = "English";
    } elseif ($medium == "T") {
        $medium = "Tamil";
    }
}

?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    var villageraction = "";
    var donationaction = "";
    var fridaycollectionaction = "";
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
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_q_madrasa-details.php">Details Preview</a></li>
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
                                                    if ($action == "view") {
                                                        echo "<h3 class='card-title top'> Quran Madrasa Details Preview </h3>";
                                                    }
                                                    if ($action == "edit") {
                                                        echo "<h3 class='card-title top'> Quran Madrasa Details (Edit) </h3>";
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
                                        <h4 class="card-title"> Child Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Index</h6>
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
                                                        <h6 class="preview-subject">Sub-Division</h6>
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
                                                        <h6 class="preview-subject">Address</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $address ?></p>
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
                                                        <p class="text-muted"><?php echo $gender ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Date of Bith</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $dob ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Current School</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $school ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name of the Guardian</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $guard_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Madrasa Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Medium</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $medium ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Grade</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $grade ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Enrolled Date</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $start_date ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Notes</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $notes ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark" id="editDetails">
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form class="pt-3" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" value="<?php echo $index ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuranSubdivision"> Sub-division </label>
                                                    <input type="text" class="form-control" id="inputQuranSubdivision" name="inputQuranSubdivision" value="<?php echo $subdivision ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Name of the Child </label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $name ?>" readonly>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputBirthday">Birthday </label>
                                                    <input type="text" class="form-control" id="inputBirthday" name="inputBirthday" value="<?php echo $dob ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSex"> Gender </label>
                                                    <input type="text" class="form-control" id="inputSex" name="inputSex" value="<?php echo $gender ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $index ?>" readonly><?php echo $address ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputGuardianName">Name of the Guardian </label>
                                                <input type="text" class="form-control" id="inputGuardianName" name="inputGuardianName" placeholder="Name of the Guardian" value="<?php echo $guard_name ?>" readonly>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputGuardianTP">Guardian - Contact Number </label>
                                                    <input type="text" class="form-control" id="inputGuardianTP" name="inputGuardianTP" value="<?php echo $guard_tp ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSchool">Current School </label>
                                                    <input type="text" class="form-control" id="inputSchool" name="inputSchool" placeholder="School" value="<?php echo $school ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputMedium">Medium</label>
                                                    <select id="inputMedium" name="inputMedium" class="form-control">
                                                        <option value="0" <?php echo ($medium == '0') ? 'selected' : '' ?>>Choose...</option>
                                                        <option value="T" <?php echo ($medium == 'Tamil') ? 'selected' : '' ?>>Tamil</option>
                                                        <option value="S" <?php echo ($medium == 'Sinhala') ? 'selected' : '' ?>>Sinhala</option>
                                                        <option value="E" <?php echo ($medium == 'English') ? 'selected' : '' ?>>English</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputGrade">Grade </label>
                                                    <input type="text" class="form-control" id="inputGrade" name="inputGrade" placeholder="Grade" value="<?php echo $grade ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAdmissionDate">Date of Admission </label>
                                                    <input type="date" class="form-control" id="inputAdmissionDate" name="inputAdmissionDate" value="<?php echo $start_date ?>" readonly>
                                                </div>
                                            </div>
                                            <div class=" form-group">
                                                <label for="inputNotes">Notes </label>
                                                <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4" value="<?php echo $notes ?>"><?php echo $notes ?></textarea>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-lg" id="editQuran" name="editQuran">Edit Details</button>
                                            </div>
                                        </form>
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