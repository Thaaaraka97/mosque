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
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}

$where = array(
    'rr_id' => $id
);

$index = "";
$subdivision = "";
$name = "";
$address = "";
$rr_rentalType = "";
$rr_rentalDuration = "";
$rr_downpayment = "";
$rr_monthlyPayment = "";
$tp = "";
$start = "";
$end = "";
$notes = "";
$rr_lease = "";
$rr_leasePayment = "";

$rental_registration_details = $database->select_where('tbl_rentalsregisteration', $where);
foreach ($rental_registration_details as $rental_registration_details_item) {
    $index = $rental_registration_details_item['rr_index'];
    $subdivision = $rental_registration_details_item['rr_subDivision'];
    $name = $rental_registration_details_item['rr_name'];
    $address = $rental_registration_details_item['rr_address'];
    $rr_rentalType = $rental_registration_details_item['rr_rentalType'];
    $rr_rentalDuration = $rental_registration_details_item['rr_rentalDuration'];
    $rr_downpayment = $rental_registration_details_item['rr_downpayment'];
    $rr_monthlyPayment = $rental_registration_details_item['rr_monthlyPayment'];
    $tp = $rental_registration_details_item['rr_telephone'];
    $start = $rental_registration_details_item['rr_startDate'];
    $end = $rental_registration_details_item['rr_endDate'];
    $rr_lease = $rental_registration_details_item['rr_lease'];
    $notes = $rental_registration_details_item['rr_notes'];
    $rr_leasePayment = $rental_registration_details_item['rr_leasePayment'];
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
                        <?php
                        if ($view == "rental_income") {
                            $url = "preview_rental-incomes.php";
                            echo "<h3 class='page-title'>  </h3>";
                        } else {
                            $url = "preview_new-rental-registration.php";
                            echo "<h3 class='page-title'>  </h3>";
                        }
                        ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?><?php echo $url ?>">Details Preview</a></li>
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
                                                    if ($view == "rental_income") {
                                                        echo "<h3 class='card-title top'> Rental Income Details </h3>";
                                                    } else {
                                                        echo "<h3 class='card-title top'> Rental Status Details </h3>";
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
                                        <h4 class="card-title"> Personal Details </h4>
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
                                                        <h6 class="preview-subject">Contact Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $tp ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($index != "0") {
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
                                                            <h6 class='preview-subject'>Sub Division</h6>
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
                                                        <h6 class="preview-subject">Address</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $address ?></p>
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
                                        <h4 class="card-title"> Rental Place Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Rental Type</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $rr_rentalType ?></p>
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
                                                        <p class="text-muted"><?php echo "From " . $start . " To " . $end ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Downpayment</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $rr_downpayment ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($rr_lease == "1") {
                                            echo "
                                                            <div class='preview-list'>
                                                                <div class='preview-item border-bottom'>
                                                                    <div class='preview-item-content d-sm-flex flex-grow'>
                                                                        <div class='flex-grow'>
                                                                            <h6 class='preview-subject'>Lease Amount</h6>
                                                                        </div>
                                                                        <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                            <p class='text-muted'>$rr_leasePayment</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                        } else {
                                            echo "
                                                            <div class='preview-list'>
                                                                <div class='preview-item border-bottom'>
                                                                    <div class='preview-item-content d-sm-flex flex-grow'>
                                                                        <div class='flex-grow'>
                                                                            <h6 class='preview-subject'>Monthly Payment</h6>
                                                                        </div>
                                                                        <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                            <p class='text-muted'>$rr_monthlyPayment</p>
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
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Payment History </h4>
                                        <div class="table-responsive table-responsive-data2 text-center">
                                            <table class="table table-data2">
                                                <thead>
                                                    <tr class="tr-shadow">
                                                        <th>Date</th>
                                                        <th>Payment</th>
                                                        <th>Notes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $where2 = array(
                                                        'ri_rentalid' => $id
                                                    );
                                                    $rental_income_details = $database->select_where('tbl_rentalincome', $where2);
                                                    foreach ($rental_income_details as $rental_income_details_item) {
                                                        $id = $rental_income_details_item['ri_id'];

                                                        echo "
                                                            <tr>
                                                                <td>" . $rental_income_details_item['ri_date'] . "</td>
                                                                <td>" . $rental_income_details_item['ri_payment'] . "</td>
                                                                <td>" . $rental_income_details_item['ri_notes'] . "</td>
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