<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$where = array(
    'nmsr_id' => $id
);

$address = "";
$tp = "";
$name = "";

$non_mahalla_reg_details = $database->select_where('tbl_nonmahallasaandharegistration', $where);
foreach ($non_mahalla_reg_details as $non_mahalla_reg_details_item) {
    $address = $non_mahalla_reg_details_item['nmsr_address'];
    $tp = $non_mahalla_reg_details_item['nmsr_telephone'];
    $name = $non_mahalla_reg_details_item['nmsr_name'];
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
                        <h3 class='page-title'> Non-Mahalla Saandha Registrations </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_non-mahalla-saandha-registration.php">Details Preview</a></li>
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
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
                                            </tr>
                                        </table>
                                        <div class="mt-5">
                                            <h4 class="card-title"> Payment History </h4>
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Payment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $where2 = array(
                                                        'nms_nmsrid' => $id
                                                    );
                                                    $non_mahalla_income_details = $database->select_where('tbl_nonmahallasaandhacollection', $where2);
                                                    foreach ($non_mahalla_income_details as $non_mahalla_income_details_item) {
                                                        $id = $non_mahalla_income_details_item['nms_id'];

                                                        echo "
                                                            <tr>
                                                                <td>" . $non_mahalla_income_details_item['nms_date'] . "</td>
                                                                <td>" . $non_mahalla_income_details_item['nms_amount'] . "</td>
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