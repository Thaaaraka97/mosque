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
$sort5 = 0;
$sort6 = 0;
if (isset($_GET['sort5'])) {
    $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
    $sort6 = $_GET['sort6'];
}
?>
<script type="text/javascript">
    var sort5 = "<?php echo $sort5; ?>";
    var sort6 = "<?php echo $sort6; ?>";
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
                                                    <h3 class="card-title top"> Non-Mahalla Saandha Collection Preview </h3>
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
                                                <div class="sorting">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="sortNMSaandhaFrom">From</label>
                                                            <input class="form-control" type="date" name="sortNMSaandhaFrom" id="sortNMSaandhaFrom" value="<?php echo $sort5 ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortNMSaandhaTo">To</label>
                                                            <input class="form-control" type="date" name="sortNMSaandhaTo" id="sortNMSaandhaTo" value="<?php echo $sort6 ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Address</th>
                                                            <th>Amount</th>
                                                            <th>Contact Number</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $non_mahalla_col = $database->select_dates('tbl_nonmahallasaandhacollection','nms_date',$sort5,$sort6);
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