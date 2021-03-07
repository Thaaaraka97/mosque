<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
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
                    <div class="page-header">
                        <h3 class="page-title"> Friday Collection </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Friday Collection Preview </h4>
                                        <div class="mt-5">
                                            <label for="FridayCollectionList">List Down</label>
                                            <select name="FridayCollectionList" id="FridayCollectionList">
                                                <option value="fridayregular" <?= $action == 'fridayregular' ? ' selected="selected"' : ''; ?>>Regular Donations</option>
                                                <option value="fridaycollections" <?= $action == 'fridaycollections' ? ' selected="selected"' : ''; ?>>Collections</option>
                                            </select>
                                            <div id="fridayregular">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
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
                                            <div id="fridaycollections">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
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