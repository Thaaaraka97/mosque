<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['inserted'])) {
    $message = "Record successfully added to the database..!";
} elseif (isset($_GET['deleted'])) {
    $message = "Record successfully deleted..!";
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
                    <?php
                    if (isset($_GET['inserted'])) {
                        echo "
                        <div class='alert alert-primary alert-dismissible' role='alert'>" . $message . "
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                    } elseif (isset($_GET['deleted'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Non-Mahalla Saandha Collections </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Non-Mahalla Saandha Collection Preview </h4>
                                        <div class="mt-5">

                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Amount</th>
                                                        <th>Contact Number</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $non_mahalla_col = $database->select_data('tbl_nonmahallasaandhacollection');
                                                    foreach ($non_mahalla_col as $non_mahalla_col_item) {
                                                        $id = $non_mahalla_col_item['nms_id'];
                                                        $tp = $non_mahalla_col_item['nms_telephone'];
                                                        $name = $non_mahalla_col_item['nms_name'];
                                                        $address = $non_mahalla_col_item['nms_address'];
                                                        $date = $non_mahalla_col_item['nms_date'];
                                                        $amount = $non_mahalla_col_item['nms_amount'];
                                                        echo "
                                                         <tr>
                                                            <td>" . $date . "</td>
                                                            <td>" . $name . "</td>
                                                            <td>" . $address . "</td>
                                                            <td>" . $amount . "</td>
                                                            <td>" . $tp . "</td>
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