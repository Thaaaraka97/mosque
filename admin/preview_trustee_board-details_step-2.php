<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

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
                        <h3 class="page-title">  </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_trustee_board-details.php">Details Preview</a></li>
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
                                                        echo "<h3 class='card-title top'> Trusteeboard Details Preview </h3>";
                                                    }
                                                    if ($action == "edit") {
                                                        echo "<h3 class='card-title top'> Trusteeboard Details (Edit) </h3>";
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
                                        <h4 class="card-title"> Person Details </h4>
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
                                                        <h6 class="preview-subject">Index  (Click on the Index Number)</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <a data-toggle='tooltip' data-placement='top' title='Click to See More Details' href='preview_villager-details_step-2.php?index=<?php echo $index; ?>&subdivision=<?php echo $subdivision; ?>&action=view' class="text-muted"><?php echo $index ?></a>
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
                                                        <h6 class="preview-subject">Designation</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $designation ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Duration</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $start_date . " - " . $end_date ?></p>
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
                                                        <h6 class="preview-subject">Job</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $job ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Salary</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $salary ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Contact Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $tp ?></p>
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
                                        <form method="post">

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