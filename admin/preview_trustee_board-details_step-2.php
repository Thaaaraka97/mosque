<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if (isset($_GET['designation'])) {
    $designation = $_GET['designation'];
}


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
    $job = $trustee_board_details_item['tb_job'];
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
    var designation = "<?php echo $designation; ?>";
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
                                                <td><?php echo $start_date . " - " . $end_date ?></td>
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

                                        <h4 class="center card-title"> Edit Details </h4>

                                        <div id="presidentdetails">
                                            <h4 class="card-title">President Details Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPresidentIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputPresidentIndexNo" name="inputPresidentIndexNo" placeholder="Index No" value="<?php echo $index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPresidentSubdivision"> Sub-division </label>
                                                    <select id="inputPresidentSubdivision" name="inputPresidentSubdivision" class="form-control">
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
                                                <label for="inputPresidentName">Name of the President </label>
                                                <input type="text" class="form-control" id="inputPresidentName" name="inputPresidentName" placeholder="Name" value="<?php echo $name ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPresidentTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputPresidentTP" name="inputPresidentTP" placeholder="077xxxxxxx" value="<?php echo $tp ?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPresidentJob">Job </label>
                                                    <input type="text" class="form-control" id="inputPresidentJob" name="inputPresidentJob" placeholder="Job" value="<?php echo $job ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPresidentSalary">Salary </label>
                                                    <input type="text" class="form-control" id="inputPresidentSalary" name="inputPresidentSalary" placeholder="Salary" value="<?php echo $salary ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPresidentAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputPresidentAddress" name="inputPresidentAddress" value="<?php echo $address ?>"><?php echo $address ?></textarea>
                                            </div>
                                        </div>
                                        <div id="VPdetails">
                                            <h4 class="card-title">Vice President Details Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputVPIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputVPIndexNo" name="inputVPIndexNo" placeholder="Index No" value="<?php echo $index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputVPSubdivision"> Sub-division </label>
                                                    <select id="inputVPSubdivision" name="inputVPSubdivision" class="form-control">
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
                                                <label for="inputVPName">Name of the Vice President </label>
                                                <input type="text" class="form-control" id="inputVPName" name="inputVPName" placeholder="Name" value="<?php echo $index ?>">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputVPTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputVPTP" name="inputVPTP" placeholder="077xxxxxxx" value="<?php echo $tp ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputVPJob">Job </label>
                                                    <input type="text" class="form-control" id="inputVPJob" name="inputVPJob" placeholder="Job" value="<?php echo $job ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputVPSalary">Salary </label>
                                                    <input type="text" class="form-control" id="inputVPSalary" name="inputVPSalary" placeholder="Salary" value="<?php echo $salary ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputVPAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputVPAddress" name="inputVPAddress" value="<?php echo $address ?>"><?php echo $address ?></textarea>
                                            </div>

                                        </div>
                                        <div id="secretarydetails">
                                            <h4 class="card-title">Secretary Details Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputSecretaryIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputSecretaryIndexNo" name="inputSecretaryIndexNo" placeholder="Index No" value="<?php echo $index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSecretarySubdivision"> Sub-division </label>
                                                    <select id="inputSecretarySubdivision" name="inputSecretarySubdivision" class="form-control">
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
                                                <label for="inputSecretaryName">Name of the Secretary </label>
                                                <input type="text" class="form-control" id="inputSecretaryName" name="inputSecretaryName" placeholder="Name" value="<?php echo $name ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputSecretaryTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputSecretaryTP" name="inputSecretaryTP" placeholder="077xxxxxxx" value="<?php echo $tp ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputSecretaryJob">Job </label>
                                                    <input type="text" class="form-control" id="inputSecretaryJob" name="inputSecretaryJob" placeholder="Job" value="<?php echo $job ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSecretarySalary">Salary </label>
                                                    <input type="text" class="form-control" id="inputSecretarySalary" name="inputSecretarySalary" placeholder="Salary" value="<?php echo $salary ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSecretaryAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputSecretaryAddress" name="inputSecretaryAddress" value="<?php echo $address ?>"><?php echo $address ?></textarea>
                                            </div>

                                        </div>
                                        <div id="ASdetails">
                                            <h4 class="card-title">Assistant Secretary Details Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputASIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputASIndexNo" name="inputASIndexNo" placeholder="Index No" value="<?php echo $index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputASSubdivision"> Sub-division </label>
                                                    <select id="inputASSubdivision" name="inputASSubdivision" class="form-control">
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
                                                <label for="inputASName">Name of the Assistant Secretary </label>
                                                <input type="text" class="form-control" id="inputASName" name="inputASName" placeholder="Name" value="<?php echo $name ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputASTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputASTP" name="inputASTP" placeholder="077xxxxxxx" value="<?php echo $tp ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputASJob">Job </label>
                                                    <input type="text" class="form-control" id="inputASJob" name="inputASJob" placeholder="Job" value="<?php echo $job ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputASSalary">Salary </label>
                                                    <input type="text" class="form-control" id="inputASSalary" name="inputASSalary" placeholder="Salary" value="<?php echo $salary ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputASAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputASAddress" name="inputASAddress" value="<?php echo $address ?>"><?php echo $address ?></textarea>
                                            </div>

                                        </div>
                                        <div id="treasurerdetails">
                                            <h4 class="card-title">Treasurer Details Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTreasurerIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputTreasurerIndexNo" name="inputTreasurerIndexNo" placeholder="Index No" value="<?php echo $index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputTreasurerSubdivision"> Sub-division </label>
                                                    <select id="inputTreasurerSubdivision" name="inputTreasurerSubdivision" class="form-control">
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
                                                <label for="inputTreasurerName">Name of the Treasurer </label>
                                                <input type="text" class="form-control" id="inputTreasurerName" name="inputTreasurerName" placeholder="Name" value="<?php echo $name ?>">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTreasurerTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputTreasurerTP" name="inputTreasurerTP" placeholder="077xxxxxxx" value="<?php echo $tp ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTreasurerJob">Job </label>
                                                    <input type="text" class="form-control" id="inputTreasurerJob" name="inputTreasurerJob" placeholder="Job" value="<?php echo $job ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputTreasurerSalary">Salary </label>
                                                    <input type="text" class="form-control" id="inputTreasurerSalary" name="inputTreasurerSalary" placeholder="Salary" value="<?php echo $salary ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputTreasurerAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputTreasurerAddress" name="inputTreasurerAddress" value="<?php echo $address ?>"><?php echo $address ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="inputDesignation" id="inputDesignation" value="<?php echo $designation ?>">

                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="editTrustee" name="editTrustee">Edit Details</button>
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