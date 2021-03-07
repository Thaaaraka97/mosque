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
                    <div class="page-header">
                        <h3 class="page-title"> Rental Income Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Rental Income Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Rental Type</th>
                                                        <th>Name</th>
                                                        <th>Contact Number</th>
                                                        <th>Amount</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    
                                                    $rental_income_details = $database->select_data('tbl_rentalincome');
                                                    foreach ($rental_income_details as $rental_income_details_item) {
                                                        $id = $rental_income_details_item['ri_rentalid'];
                                                        $name = "";
                                                        $address = "";

                                                        $where = array(
                                                            'av_telephone'     =>     $rental_income_details_item['ri_telephone']
                                                        );
                                                        $person_details = $database->select_where('tbl_allvillagers', $where);
                                                        foreach ($person_details as $person_details_item) {
                                                            $name = $person_details_item["av_name"];
                                                            $address = $person_details_item["av_address"];
                                                        }

                                                        echo "
                                                         <tr>
                                                            <td>" . $rental_income_details_item['ri_type'] . "</td>
                                                            <td>" . $name . "</td>
                                                            <td>" . $rental_income_details_item['ri_telephone'] . "</td>
                                                            <td>" . $rental_income_details_item['ri_payment'] . "</td>
                                                            <td>
                                                                <a href='preview_new-rental-registration_step-2.php?id=" . $id . "&name=". $name ."&address=". $address ."&action=view&view=rental_income' class='btn btn-primary btn-md'>View</a>
                                                            </td>
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