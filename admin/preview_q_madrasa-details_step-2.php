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
                        <h3 class="page-title"> Quran Madrasa Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_q_madrasa-details.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Quran Madhrasa Registration Form</h4>

                                    <div class="mt-5 text-dark col-auto" id="viewDetails">
                                        <h4 class="card-title"> Details Preview Step-2 </h4>

                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Name</th>
                                                <td> : </td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Index</th>
                                                <td> : </td>
                                                <td><?php echo $index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td> : </td>
                                                <td><?php echo $gender ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Bith</th>
                                                <td> : </td>
                                                <td><?php echo $dob ?></td>
                                            </tr>
                                            <tr>
                                                <th>Current School</th>
                                                <td> : </td>
                                                <td><?php echo $school ?></td>
                                            </tr>
                                            <tr>
                                                <th>Medium</th>
                                                <td> : </td>
                                                <td><?php echo $medium ?></td>
                                            </tr>
                                            <tr>
                                                <th>Grade</th>
                                                <td> : </td>
                                                <td><?php echo $grade ?></td>
                                            </tr>
                                            <tr>
                                                <th>Enrolled Date</th>
                                                <td> : </td>
                                                <td><?php echo $start_date ?></td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Guardian</th>
                                                <td> : </td>
                                                <td><?php echo $guard_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Notes</th>
                                                <td> : </td>
                                                <td><?php echo $notes ?></td>
                                            </tr>

                                        </table>

                                    </div>

                                    <div class="text-dark" id="editDetails">
                                        <h4 class="card-title">Edit Details</h4>
                                        <form class="pt-3" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No" value="<?php echo $index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuranSubdivision"> Sub-division </label>
                                                    <select id="inputQuranSubdivision" name="inputQuranSubdivision" class="form-control">
                                                        <option value="0" <?php echo ($subdivision == '0') ? 'selected' : '' ?>>Choose...</option>
                                                        <?php
                                                        $sub_division = $database->select_data('tbl_subdivision');
                                                        foreach ($sub_division as $sub_division_item) {
                                                            $selected = "";
                                                            if ($sub_division_item["sb_name"] == $subdivision) {
                                                        ?>
                                                                <option value=' <?php echo $sub_division_item["sb_name"]; ?>' selected> <?php echo $sub_division_item["sb_name"]; ?> </option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value=' <?php echo $sub_division_item["sb_name"]; ?>'> <?php echo $sub_division_item["sb_name"]; ?> </option>

                                                            <?php
                                                            }
                                                            ?>

                                                        <?php
                                                        }

                                                        ?>

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Name of the Child </label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $name ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputBirthday">Birthday </label>
                                                    <input type="date" class="form-control" id="inputBirthday" name="inputBirthday" value="<?php echo $dob ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">

                                                        <div class="col-md-2 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label">Gender</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="Male"  <?php echo ($gender == 'Male') ? 'checked' : '' ?>> Male </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="Female" <?php echo ($gender == 'Female') ? 'checked' : '' ?>> Female </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputMedium">Medium</label>
                                                    <select id="inputMedium" name="inputMedium" class="form-control">
                                                        <option value="0"  <?php echo ($medium == '0') ? 'selected' : '' ?>>Choose...</option>
                                                        <option value="T" <?php echo ($medium == 'Tamil') ? 'selected' : '' ?>>Tamil</option>
                                                        <option value="S" <?php echo ($medium == 'Sinhala') ? 'selected' : '' ?>>Sinhala</option>
                                                        <option value="E" <?php echo ($medium == 'English') ? 'selected' : '' ?>>English</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputGrade">Grade </label>
                                                    <input type="text" class="form-control" id="inputGrade" name="inputGrade" placeholder="Grade" value="<?php echo $grade ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSchool">Current School </label>
                                                    <input type="text" class="form-control" id="inputSchool" name="inputSchool" placeholder="School" value="<?php echo $school ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputGuardianName">Name of the Guardian </label>
                                                <input type="text" class="form-control" id="inputGuardianName" name="inputGuardianName" placeholder="Name of the Guardian" value="<?php echo $guard_name ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $index ?>"><?php echo $address ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAdmissionDate">Date of Admission </label>
                                                <input type="date" class="form-control" id="inputAdmissionDate" name="inputAdmissionDate" value="<?php echo $start_date ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label for="inputNotes">Notes </label>
                                                <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4" value="<?php echo $notes ?>"><?php echo $notes ?></textarea>
                                            </div>
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