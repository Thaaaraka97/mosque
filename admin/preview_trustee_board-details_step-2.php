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
                                    <form method="post">
                                        <div class="text-dark" id="editDetails">
                                            <h4 class="center card-title"> Edit Details </h4>
                                            <div>
                                                <?php
                                                if ($designation == "President") {
                                                    echo "<h4 class='card-title'>President Details Form</h4>";
                                                } elseif ($designation == "Vice President") {
                                                    echo "<h4 class='card-title'>Vice President Details Form</h4>";
                                                } elseif ($designation == "Secretary") {
                                                    echo "<h4 class='card-title'>Secretary Details Form</h4>";
                                                } elseif ($designation == "Assistant Secretary") {
                                                    echo "<h4 class='card-title'>Assistant Secretary Details Form</h4>";
                                                } elseif ($designation == "Treasurer") {
                                                    echo "<h4 class='card-title'>Treasurer Details Form</h4>";
                                                } elseif ($designation == "Advisory Member") {
                                                    echo "<h4 class='card-title'>Advisory Member Details Form</h4>";
                                                }
                                                ?>
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
                                                    <label for="inputName">Name </label>
                                                    <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $name ?>" readonly>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTP">Telephone Number </label>
                                                        <input type="text" class="form-control" id="inputTP" name="inputTP" value="<?php echo $tp ?>">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputJob">Job </label>
                                                        <input type="text" class="form-control" id="inputJob" name="inputJob" value="<?php echo $job ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputSalary">Salary </label>
                                                        <input type="text" class="form-control" id="inputSalary" name="inputSalary" value="<?php echo $salary ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress"> Address </label>
                                                    <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $address ?>" readonly><?php echo $address ?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="inputDesignation" id="inputDesignation" value="<?php echo $designation ?>">
                                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

                                            <div class="text-center">
                                                <button class="btn btn-primary btn-lg" id="editTrustee" name="editTrustee">Edit Details</button>
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