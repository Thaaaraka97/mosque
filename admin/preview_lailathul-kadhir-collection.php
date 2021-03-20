<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
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
                    if (isset($_GET['edited'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <h3 class="card-title top"> Laylat al-Qadr Collection Details </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                        <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Contact Number</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $lailathul_kadhir_details = $database->select_data('tbl_lailathulkadhrcollection');
                                                    foreach ($lailathul_kadhir_details as $lailathul_kadhir_details_item) {
                                                        $id = $lailathul_kadhir_details_item['lk_id'];
                                                        echo "
                                                         <tr>
                                                            <td>" . $lailathul_kadhir_details_item['lk_date'] . "</td>
                                                            <td>" . $lailathul_kadhir_details_item['lk_name'] . "</td>
                                                            <td>" . $lailathul_kadhir_details_item['lk_address'] . "</td>
                                                            <td>" . $lailathul_kadhir_details_item['lk_telephone'] . "</td>
                                                            <td>" . $lailathul_kadhir_details_item['lk_amount'] . "</td>
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