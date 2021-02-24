<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'];
$where = array(
    'tb_id' => $id
);

$end_date = "";
$index = "";
$name = "";
$designation = "";
$subdivision = "";
$job = "";
$address = "";
$salary = "";
$tp = "";
$is_active = "";
$elected = "";
$start_date = "";

$trustee_board_details = $database->select_where('tbl_trusteeboarddetails', $where);
foreach ($trustee_board_details as $trustee_board_details_item) {
    $name = $trustee_board_details_item['tb_name'];
    $index = $trustee_board_details_item['tb_index'];
    $end_date = $trustee_board_details_item['tb_endDate'];
    $designation = $trustee_board_details_item['tb_designation'];
    $subdivision = $trustee_board_details_item['tb_subDivision'];
    $job = $trustee_board_details_item['tb_job	'];
    $address = $trustee_board_details_item['tb_address'];
    $salary = $trustee_board_details_item['tb_salary'];
    $tp = $trustee_board_details_item['tb_telephone'];
    $is_active = $trustee_board_details_item['tb_isActive'];
    $elected = $trustee_board_details_item['tb_electedYYMM'];
    $start_date = $trustee_board_details_item['tb_startDate'];
    if ($end_date == "") {
        $end_date = "Present";
    }
    if ($is_active == "0") {
        $is_active = "No";
    } else {
        $is_active = "Yes";
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
                        <h3 class="page-title"> Trustee Board Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_trustee_board-details.php">Details Preview</a></li>
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
                                                <th>Designation</th>
                                                <td> : </td>
                                                <td><?php echo $designation ?></td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th>
                                                <td> : </td>
                                                <td><?php echo $start_date ." - ". $end_date?></td>
                                            </tr>
                                            <tr>
                                                <th>is Active ?</th>
                                                <td> : </td>
                                                <td><?php echo $is_active ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
                                            </tr>
                                            <tr>
                                                <th>Job</th>
                                                <td> : </td>
                                                <td><?php echo $job ?></td>
                                            </tr>
                                            <tr>
                                                <th>Salary</th>
                                                <td> : </td>
                                                <td><?php echo $salary ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact Number</th>
                                                <td> : </td>
                                                <td><?php echo $tp ?></td>
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