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
                        <h3 class="page-title"> Undiyal Collection </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Undiyal Collection Preview </h4>
                                        <div class="w-100 text-right">
                                            <button class='btn btn-success btn-md ' data-toggle='modal' data-target='#addRecord' id="addNewUndiyal"> Add New </button>
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

                                                    $undiyal = $database->select_data('tbl_undiyalcollection');
                                                    foreach ($undiyal as $undiyal_item) {
                                                        $id = $undiyal_item['uc_id'];
                                                        $date = $undiyal_item['uc_date'];
                                                        $amount = $undiyal_item['uc_amount'];
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
                                            <input type="hidden" name="inputUser" id="inputUser" value="user">
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

    <!-- Add new Modal -->
    <div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"> Add new Undiyal Collection </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please fill out the form below.
                    <div class="form-group col-md-12">
                        <label for="inputDate"> Date </label>
                        <input type="Date" class="form-control" id="inputDate" name="inputDate">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputAmount">Amount </label>
                        <input type="text" class="form-control" id="inputAmount" name="inputAmount" placeholder="Amount (Rs)">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-primary" id="add"> Add </a>
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