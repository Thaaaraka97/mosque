<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
$id = "";

if (isset($_GET['deleted'])) {
    $message = "Record successfully Deleted..!";
}
elseif (isset($_GET['edited'])) {
    $message = "Record successfully Updated..!";
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
                    if (isset($_GET['deleted'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    elseif (isset($_GET['edited'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Nikkah Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Nikkah Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Bride Name</th>
                                                        <th>Groom Name</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nikkah_details = $database->select_data('tbl_nikkahdetails');
                                                    foreach ($nikkah_details as $nikkah_details_item) {
                                                        $id = $nikkah_details_item['nd_nikkahId'];

                                                        echo "
                                                         <tr>
                                                            <td>" . $nikkah_details_item['nd_marriageDate'] . "</td>
                                                            <td>" . $nikkah_details_item['nd_brideName'] . "</td>
                                                            <td>" . $nikkah_details_item['nd_groomName'] . "</td>
                                                            <td>" . $nikkah_details_item['nd_groomAddress'] . "</td>
                                                            <td>
                                                                <a href='preview_nikkah-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-2x' aria-hidden='true'></i></a>
                                                                <a href='preview_nikkah-details_step-2.php?id=" . $id . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-2x' aria-hidden='true'></i></a>
                                                            </td>
                                                            <td>
                                                                <a href='' id ='".$id."' class='item delete_row_nikkah' data-toggle='modal' data-target='#deleteRecord'><i class='fa fa-trash fa-2x' aria-hidden='true'></i></a>
                                                                

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
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Delete Record ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record? Once you click delete there's no going back.
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="del">Delete</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>