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
if (isset($_GET['record_id'])) {
    $record_id = $_GET['record_id'];
}


$where = array(
    'pi_peshImaamId' => $id
);

$village = "";
$index = "";
$subdivision = "";
$name = "";
$address = "";
$nic = "";
$married = "";
$salary = "";
$mobile_tp = "";
$home_tp = "";
$is_active = "";
$noofkids = "";
$start = "";
$end = "";
$notes = "";
$mahalla = "";
$gramasevaka = "";
$police = "";
$maulavi = "";

$pesh_imaam_details = $database->select_where('tbl_peshimaaamdetails', $where);
foreach ($pesh_imaam_details as $pesh_imaam_details_item) {
    $village = $pesh_imaam_details_item['pi_village'];
    $index = $pesh_imaam_details_item['pi_index'];
    $subdivision = $pesh_imaam_details_item['pi_subDivision'];
    $name = $pesh_imaam_details_item['pi_name'];
    $address = $pesh_imaam_details_item['pi_address'];
    $nic = $pesh_imaam_details_item['pi_nic'];
    $married = $pesh_imaam_details_item['pi_married'];
    $noofkids = $pesh_imaam_details_item['pi_noofkids'];
    $mobile_tp = $pesh_imaam_details_item['pi_mobileTP'];
    $home_tp = $pesh_imaam_details_item['pi_homeTP'];
    $start = $pesh_imaam_details_item['pi_assignedDate'];
    $end = $pesh_imaam_details_item['pi_resignedDate'];
    $salary = $pesh_imaam_details_item['pi_salary'];
    $notes = $pesh_imaam_details_item['pi_notes'];
    $is_active = $pesh_imaam_details_item['pi_activestatus'];
    $mahalla = $pesh_imaam_details_item['pi_receivedLetterMahalla'];
    $gramasevaka = $pesh_imaam_details_item['pi_receivedLetterGramasevaka'];
    $police = $pesh_imaam_details_item['pi_receivedLetterPolice'];
    $maulavi = $pesh_imaam_details_item['pi_receivedLetterMaulavi'];
    if ($end == "") {
        $end = "Present";
    }
    if ($is_active == "0") {
        $is_active = "Not Active";
    } else {
        $is_active = "Active";
    }
    if ($married == "0") {
        $married = "Not Married";
    } else {
        $married = "Married";
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
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_pesh_imaam-details.php">Details Preview</a></li>
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
                                                    <h3 class="card-title top"> Pesh Imaam Details Preview </h3>
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
                                                        <h6 class="preview-subject">Village</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $village ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($village == "Home Village") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Index (Click on the Index Number)</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <a data-toggle='tooltip' data-placement='top' title='Click to See More Details' href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='text-muted'>$index</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Sub-Division</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$subdivision</p>
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
                                                        <h6 class="preview-subject">Duration</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo "From " . $start . " To " . $end . "" ?></p>
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
                                                        <h6 class="preview-subject">NIC</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $nic ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($home_tp != "") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Contact Number :Home</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$home_tp</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                        } elseif ($mobile_tp != "") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Contact Number :Mobile</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$mobile_tp</p>
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
                                                        <h6 class="preview-subject">Marital Status</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $married ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($married == "Married") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>No. of Kids</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$noofkids</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                        }
                                        if ($notes != "") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Notes</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$notes</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                        }
                                        ?>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Received Letters</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted">
                                                            <?php
                                                            if ($mahalla == "1") {
                                                                echo "Mahalla Letter<br>";
                                                            }
                                                            if ($gramasevaka == "1") {
                                                                echo "Gramasevaka Letter<br>";
                                                            }
                                                            if ($police == "1") {
                                                                echo "Police Certification<br>";
                                                            }
                                                            if ($maulavi == "1") {
                                                                echo "Maulavi Letter<br>";
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark col-auto" id="viewPayments">
                        <div class="row justify-content-center">
                            <div class="col-md-10 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body text-center">
                                        <h4 class="card-title"> Payment History </h4>
                                        <div class="table-responsive table-responsive-data2">
                                            <table class="table table-data2">
                                                <thead>
                                                    <tr>
                                                        <th>Basic Salary</th>
                                                        <th>Incentive</th>
                                                        <th>Madrasa Fee</th>
                                                        <th>Advance</th>
                                                        <th>Special Bhayan Fee</th>
                                                        <th>EPF/ETF</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // displaying pesh imaam details
                                                    $where = array(
                                                        'pSal_peshImaamId'     =>     $id
                                                    );
                                                    $pesh_imaam_salary = $database->select_where('tbl_peshimaamsalary', $where);
                                                    foreach ($pesh_imaam_salary as $pesh_imaam_salary_item) {
                                                        echo "
                                                         <tr>
                                                            <td>" . $pesh_imaam_salary_item['pSal_basicSalary'] . "</td>
                                                            <td>" . $pesh_imaam_salary_item['pSal_incentive'] . "</td>
                                                            <td>" . $pesh_imaam_salary_item['pSal_madrasaFee'] . "</td>
                                                            <td>" . $pesh_imaam_salary_item['pSal_advance'] . "</td>
                                                            <td>" . $pesh_imaam_salary_item['pSal_specialBhayanFee'] . "</td>
                                                            <td>" . $pesh_imaam_salary_item['pSal_EPFETF'] . "</td>
                                                        </tr>
                                                         ";
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
                    <div class="text-dark" id="editDetails">
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form method="post">
                                            <h4 class="center card-title"> Edit Details </h4>
                                            <div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputVillage"> Imaam Belongs to </label>
                                                        <input type="text" class="form-control" id="inputVillage" name="inputVillage" value="<?php echo $village; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div id="peshImaamIndex">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputIndexNo"> Index Number </label>
                                                            <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" value="<?php echo $index; ?>" readonly>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputImaamSubdivision"> Sub-division </label>
                                                            <input type="text" class="form-control" id="inputImaamSubdivision" name="inputImaamSubdivision" value="<?php echo $subdivision; ?>" readonly>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">Name </label>
                                                    <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $name; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputAddress"> Address </label>
                                                    <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $address; ?>" readonly><?php echo $address; ?></textarea>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputNIC">National Identity Card </label>
                                                        <input type="text" class="form-control" id="inputNIC" name="inputNIC" value="<?php echo $nic; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputName"> Married Status </label>
                                                        <input type="text" class="form-control" id="inputMarriedStatus" name="inputMarriedStatus" value="<?php echo $married; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputKids">No. of Kids </label>
                                                        <input type="text" class="form-control" id="inputKids" name="inputKids" value="<?php echo $noofkids; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputMobile">Mobile Number </label>
                                                        <input type="text" class="form-control" id="inputMobile" name="inputMobile" value="<?php echo $mobile_tp; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputHomeTP">Residential Contact </label>
                                                        <input type="text" class="form-control" id="inputHomeTP" name="inputHomeTP" placeholder="011xxxxxxx" value="<?php echo $home_tp; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAssignedDate">Assigned Date </label>
                                                        <input type="text" class="form-control" id="inputAssignedDate" name="inputAssignedDate" value="<?php echo $start; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputBasicSalary">Basic Salary </label>
                                                        <input type="text" class="form-control" id="inputBasicSalary" name="inputBasicSalary" value="<?php echo $salary; ?>" placeholder="Basic Salary (Rs)" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label class="form-label"> Received Letters </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row pl-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input" name="Maulavi" id="Maulavi" value="Maulavi Certificate" <?php echo ($maulavi == '1') ? 'checked' : '' ?>> Maulavi Certificate </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row pl-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input" name="Police" id="Police" value="Police Certificate" <?php echo ($police == '1') ? 'checked' : '' ?>> Police Certificate </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row pl-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input" name="Gramasevaka" id="Gramasevaka" value="Gramasevaka Certificate" <?php echo ($gramasevaka == '1') ? 'checked' : '' ?>> Gramasevaka Certificate </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row pl-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input" name="Mahalla" id="Mahalla" value="Mahalla Masjid Letter" <?php echo ($mahalla == '1') ? 'checked' : '' ?>> Mahalla Masjid Letter </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="hidden" class="form-control" id="inputDateToday">
                                                    </div>
                                                </div>
                                                <div class=" form-group">
                                                    <label for="inputNotes">Notes </label>
                                                    <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4" value="<?php echo $notes; ?>"><?php echo $notes; ?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

                                            <div class="text-center">
                                                <button class="btn btn-primary btn-lg" id="editImaam" name="editImaam">Edit Details</button>
                                            </div>
                                    </div>
                                    </form>
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