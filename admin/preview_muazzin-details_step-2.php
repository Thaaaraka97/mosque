<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if (isset($_GET['record_id'])) {
    $record_id = $_GET['record_id'];
}


$where = array(
    'md_muazzinId' => $id
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

$muazzin_details = $database->select_where('tbl_muazzindetails', $where);
foreach ($muazzin_details as $muazzin_details_item) {
    $village = $muazzin_details_item['md_village'];
    $index = $muazzin_details_item['md_index'];
    $subdivision = $muazzin_details_item['md_subDivision'];
    $name = $muazzin_details_item['md_name'];
    $address = $muazzin_details_item['md_address'];
    $nic = $muazzin_details_item['md_nic'];
    $married = $muazzin_details_item['md_married'];
    $noofkids = $muazzin_details_item['md_noofkids'];
    $mobile_tp = $muazzin_details_item['md_mobileTP'];
    $home_tp = $muazzin_details_item['md_homeTP'];
    $start = $muazzin_details_item['md_assignedDate'];
    $end = $muazzin_details_item['md_resignedDate'];
    $salary = $muazzin_details_item['md_salary'];
    $notes = $muazzin_details_item['md_notes'];
    $is_active = $muazzin_details_item['md_activestatus'];
    $mahalla = $muazzin_details_item['md_receivedLetterMahalla'];
    $gramasevaka = $muazzin_details_item['md_receivedLetterGramasevaka'];
    $police = $muazzin_details_item['md_receivedLetterPolice'];
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
                        <h3 class="page-title"> Muazzin Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_muazzin-details.php">Details Preview</a></li>
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
                                                    <h3 class="card-title top"> Muazzin Details Preview </h3>
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
                                                        <p class="text-muted"><?php echo "From " . $start . " To " . $end ?></p>
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
                                                        <th>EPF/ETF</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // displaying muazzin details
                                                    $where = array(
                                                        'mSal_muazzinId'     =>     $id
                                                    );
                                                    $muazzin_salary = $database->select_where('tbl_muazzinsalary', $where);
                                                    foreach ($muazzin_salary as $muazzin_salary_item) {
                                                        echo "
                                                         <tr>
                                                            <td>" . $muazzin_salary_item['mSal_basicSalary'] . "</td>
                                                            <td>" . $muazzin_salary_item['mSal_basicSalary'] . "</td>
                                                            <td>" . $muazzin_salary_item['mSal_madrasaFee'] . "</td>
                                                            <td>" . $muazzin_salary_item['mSal_advance'] . "</td>
                                                            <td>" . $muazzin_salary_item['mSal_EPFETF'] . "</td>
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