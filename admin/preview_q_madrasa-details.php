<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
}
elseif (isset($_GET['deleted'])) {
    $message = "Record deleted Successfully..!";
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
                        <h3 class="page-title"> Quran Madrasa Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Quran Madrasa Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Guardian Name</th>
                                                        <th>Enrolled Date</th>
                                                        <th>Actions</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     $q_madrasa_details = $database->select_data('tbl_quranmadrasadetails');
                                                     foreach ($q_madrasa_details as $q_madrasa_details_item) {
                                                         $id = $q_madrasa_details_item['qm_qmadrasaId'];
                                                         
                                                         echo "
                                                         <tr>
                                                            <td>".$q_madrasa_details_item['qm_name']."</td>
                                                            <td>".$q_madrasa_details_item['qm_address']."</td>
                                                            <td>".$q_madrasa_details_item['qm_guardName']."</td>
                                                            <td>".$q_madrasa_details_item['qm_startDate']."</td>
                                                            <td>
                                                                <a href='preview_q_madrasa-details_step-2.php?id=".$id."&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_q_madrasa-details_step-2.php?id=".$id."&action=edit' class='btn btn-warning btn-md'>Edit</a>
                                                            </td>
                                                            <td>
                                                                <a href='' id='".$id."' class='btn btn-danger btn-md delete_q_madrasa' data-toggle='modal' data-target='#deleteRecord'>Delete</a>

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
    <!-- container-scroller -->

    <!-- footer -->
    <?php
    include "template_parts/footer.php";
    ?>
    <!-- End custom js for this page -->
</body>

</html>