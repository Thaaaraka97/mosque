<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
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

    if ($index == "0") {
        $index = "-";
    }
    if ($subdivision == "0") {
        $subdivision = "-";
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
                        <?php
                        if ($view == "rental_income") {
                            $url = "preview_rental-incomes.php";
                            echo "<h3 class='page-title'> Rental Income Details </h3>";
                        } else {
                            $url = "preview_new-rental-registration.php";
                            echo "<h3 class='page-title'> Rental Status Details </h3>";
                        }
                        ?>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?><?php  echo $url ?>">Details Preview</a></li>
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
                                                <th>Contact Number</th>
                                                <td> : </td>
                                                <td><?php echo $tp ?></td>
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
                                                <th>Rental Type</th>
                                                <td> : </td>
                                                <td><?php echo $rr_rentalType ?></td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th>
                                                <td> : </td>
                                                <td><?php echo $start . " - " . $end ?></td>
                                            </tr>
                                            <tr>
                                                <th>Downpayment</th>
                                                <td> : </td>
                                                <td><?php echo $rr_downpayment ?></td>
                                            </tr>
                                            <?php
                                            if ($rr_lease == "1") {
                                                echo "
                                                <tr>
                                                    <th>Salary</th>
                                                    <td> : </td>
                                                    <td>" . $rr_leasePayment . "</td>
                                                </tr>";
                                            } else {
                                                echo "
                                                <tr>
                                                    <th>Monthly Payment</th>
                                                    <td> : </td>
                                                    <td>" . $rr_monthlyPayment . "</td>
                                                </tr>";
                                            }
                                            ?>
                                            <tr>
                                                <th>Notes</th>
                                                <td> : </td>
                                                <td><?php echo $notes ?></td>
                                            </tr>
                                        </table>
                                        <div class="mt-5">
                                            <h4 class="card-title"> Payment History </h4>
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
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