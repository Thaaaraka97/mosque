<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
} elseif (isset($_GET['terminated'])) {
    $message = "Member terminated and Updated the Record..!";
}
?>

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
                    } elseif (isset($_GET['terminated'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Saandha Amount Fixing History </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Saandha Amount Fixing History Preview </h4>
                                        <div class="w-100 text-right">
                                            <button class='btn btn-success btn-md ' data-toggle='modal' data-target='#updateRecord' id="editSaandhaAmount">Edit Existing Amount</button>
                                        </div>
                                        <div class="mt-5">

                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $saandha_amount_history = $database->select_data('tbl_saandhaamountfixing');
                                                    foreach ($saandha_amount_history as $saandha_amount_history_item) {
                                                        $id = $saandha_amount_history_item['saf_id'];
                                                        $date = $saandha_amount_history_item['saf_date'];
                                                        $amount = $saandha_amount_history_item['saf_amount'];
                                                        echo "
                                                         <tr>
                                                            <td>" . $date . "</td>
                                                            <td>" . $amount . "</td>
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

    <!-- Update Modal -->
    <div class="modal fade" id="updateRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"> Change the current Value ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to change the current Saandha Amount?
                    <p>
                        If you want to change the current Saandha Amount, enter the new amount in the given dialog box and click update..!
                    </p>
                    <p>
                        Otherwise click close.
                    </p>
                    <div class="form-group">
                        <label for="newAmount" class="col-form-label"> New Amount</label>
                        <input type="text" class="form-control" name="newAmount" id="newAmount" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="update">Update</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include "template_parts/footer.php";
    ?>
    <!-- End custom js for this page -->
</body>

</html>