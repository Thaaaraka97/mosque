<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'];
$where = array(
    'jd_janazaId' => $id
);

$date_of_death = "";
$index = "";
$name = "";
$gender = "";
$subdivision = "";
$date_of_funeral = "";
$address = "";
$relative = "";
$relative_index = "";
$relative_subdivision = "";
$relative_relationship = "";
$sp_notes = "";
$informed_date = "";

$janaza_details = $database->select_where('tbl_janazadetails', $where);
foreach ($janaza_details as $janaza_details_item) {
    $name = $janaza_details_item['jd_name'];
    $index = $janaza_details_item['jd_index'];
    $date_of_death = $janaza_details_item['jd_dateofDeath'];
    $gender = $janaza_details_item['jd_gender'];
    $subdivision = $janaza_details_item['jd_subDivision'];
    $date_of_funeral = $janaza_details_item['jd_dateofFuneral'];
    $address = $janaza_details_item['jd_addressofFuneral'];
    $relative = $janaza_details_item['jd_relativeName'];
    $relative_index = $janaza_details_item['jd_relativeIndex'];
    $relative_subdivision = $janaza_details_item['jd_relativeSubDivision'];
    $relative_relationship = $janaza_details_item['jd_relativeRelationship'];
    $sp_notes = $janaza_details_item['jd_specialNotes'];
    $informed_date = $janaza_details_item['jd_informedDate'];
    if ($gender == "M") {
        $gender = "Male";
    } else {
        $gender = "Female";
    }
}

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
                        <h3 class="page-title"> Janaza Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_nikkah-details.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="mt-5 text-dark col-auto" id="viewDetails">
                                        <h4 class="card-title"> Details Preview Step-2 </h4>

                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Name</th>
                                                <td> : </td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Death</th>
                                                <td> : </td>
                                                <td><?php echo $date_of_death ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td> : </td>
                                                <td><?php echo $gender ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Funeral</th>
                                                <td> : </td>
                                                <td><?php echo $date_of_funeral ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address of the Funeral</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informer Name</th>
                                                <td> : </td>
                                                <td><?php echo $relative ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informer Index</th>
                                                <td> : </td>
                                                <td><?php echo $relative_index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informer Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $relative_subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Relationship to the Informer</th>
                                                <td> : </td>
                                                <td><?php echo $relative_relationship ?></td>
                                            </tr>
                                            <tr>
                                                <th>Special Notes</th>
                                                <td> : </td>
                                                <td><?php echo $sp_notes ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informed Date</th>
                                                <td> : </td>
                                                <td><?php echo $informed_date ?></td>
                                            </tr>

                                        </table>

                                    </div>

                                    <div class="text-dark" id="editDetails">
                                        <h4 class="card-title">Edit Details</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNoDeceased"> Index Number of the Deceased </label>
                                                <input type="text" class="form-control" id="inputIndexNoDeceased" name="inputIndexNoDeceased" placeholder="Index No" value="<?php echo $index ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputJanazaSubdivision"> Sub-division </label>
                                                <select id="inputJanazaSubdivision" name="inputJanazaSubdivision" class="form-control">
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Name of the Deceased </label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $name ?>" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-2 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label">Gender</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="M" <?php echo ($gender == 'Male') ? 'checked' : '' ?>> Male </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="F" <?php echo ($gender == 'Female') ? 'checked' : '' ?>> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDeathDate">Date of Death </label>
                                                <input type="date" class="form-control" id="inputDeathDate" name="inputDeathDate" value="<?php echo $date_of_death ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputFuneralDate">Date of the Funeral </label>
                                                <input type="date" class="form-control" id="inputFuneralDate" name="inputFuneralDate" value="<?php echo $date_of_funeral ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress"> Place of the Funeral </label>
                                            <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $address ?>" required></textarea>
                                        </div>
                                        <p class="card-description"> Details of person who give details </p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputGName">Name </label>
                                                <input type="text" class="form-control" id="inputGName" name="inputGName" placeholder="Name" value="<?php echo $relative ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputRelationship"> Relationship to the Deceased </label>
                                                <input type="text" class="form-control" id="inputRelationship" name="inputRelationship" placeholder="Relationship" value="<?php echo $relative_relationship ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No" value="<?php echo $relative_index ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision"> Sub-division </label>
                                                <select id="inputGSubdivision" name="inputGSubdivision" class="form-control">
                                                <option value="0" <?php echo ($subdivision == '0') ? 'selected' : '' ?>>Choose...</option>
                                                    <?php
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" class="form-control" id="inputDateToday" name="inputDateToday">
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes">Special Notes </label>
                                            <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4" value="<?php echo $sp_notes ?>" required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submitJanaza" class="btn btn-primary btn-lg">Enter Details</button>
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