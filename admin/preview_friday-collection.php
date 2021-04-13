<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
?>
<script type="text/javascript">
    var action = "";
    var donationaction = "";
    var villageraction = "";
    var fridaycollectionaction = "<?php echo $action; ?>";
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
                                                    <h3 class="card-title top"> Friday Collection Preview </h3>
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
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                            <label for="FridayCollectionList">List Down</label>
                                            <select name="FridayCollectionList" id="FridayCollectionList">
                                                <option value="fridayregular" <?= $action == 'fridayregular' ? ' selected="selected"' : ''; ?>>Regular Donations</option>
                                                <option value="fridaycollections" <?= $action == 'fridaycollections' ? ' selected="selected"' : ''; ?>>Collections</option>
                                            </select>
                                            <hr>
                                            <div id="fridayregular">
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
                                                            $fridaycollectionregular_details = $database->select_data('tbl_fridaycollectionregular');
                                                            foreach ($fridaycollectionregular_details as $fridaycollectionregular_details_item) {
                                                                echo "
                                                         <tr>
                                                            <td>" . $fridaycollectionregular_details_item['fr_date'] . "</td>
                                                            <td>" . $fridaycollectionregular_details_item['fr_name'] . "</td>
                                                            <td>" . $fridaycollectionregular_details_item['fr_address'] . "</td>
                                                            <td>" . $fridaycollectionregular_details_item['fr_telephone'] . "</td>
                                                            <td>" . $fridaycollectionregular_details_item['fr_amount'] . "</td>
                                                        </tr>
                                                         ";
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="fridaycollections">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $fridaycollection_details = $database->select_data('tbl_fridaycollectiondonation');
                                                            foreach ($fridaycollection_details as $fridaycollection_details_item) {
                                                                if (isset($fridaycollection_details_item['fd_date'])) {
                                                                    echo "
                                                                <tr>
                                                                   <td>" . $fridaycollection_details_item['fd_date'] . "</td>
                                                                   <td>" . $fridaycollection_details_item['fd_amount'] . "</td>
                                                               </tr>
                                                                ";
                                                                }
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