<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
}
elseif (isset($_GET['terminated'])) {
    $message = "Member terminated and Updated the Record..!";
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
                    elseif (isset($_GET['terminated'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Pesh Imaam Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Pesh Imaam Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Telephone</th>
                                                        <th>Active Peroid</th>
                                                        <th>View</th>
                                                        <th>Terminate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     $pesh_imaam_details = $database->select_data('tbl_peshimaaamdetails');
                                                     foreach ($pesh_imaam_details as $pesh_imaam_details_item) {
                                                         $id = $pesh_imaam_details_item['pi_peshImaamId'];
                                                         $start = $pesh_imaam_details_item['pi_assignedDate'];
                                                         $end = $pesh_imaam_details_item['pi_resignedDate'];
                                                         $isActive = $pesh_imaam_details_item['pi_activestatus'];
                                                         if ($end == "") {
                                                             $end = "Present";
                                                         }
                                                         echo "
                                                         <tr>
                                                            <td>".$pesh_imaam_details_item['pi_name']."</td>
                                                            <td>".$pesh_imaam_details_item['pi_address']."</td>
                                                            <td>".$pesh_imaam_details_item['pi_mobileTP']."</td>
                                                            <td>".$start." - ".$end."</td>
                                                            <td>
                                                                <a href='preview_pesh_imaam-details_step-2.php?id=".$id."&action=view' class='item'><i class='fa fa-eye fa-2x' aria-hidden='true'></i></a>
                                                            </td>
                                                            <td>";
                                                            if ($isActive) {
                                                                echo "<a href='' id ='".$id."' class='btn btn-danger btn-md terminate_row_peshimaam' data-toggle='modal' data-target='#deleteRecord'>Terminate</a>";
                                                            }
                                                            else{
                                                                echo "Already Terminated";
                                                            }
                                                            echo "</td>
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Terminate Pesh Imaam ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to terminate this Pesh Imaam? 
                    <div class="form-group">
                        <label for="inputReason" class="col-form-label"> Reason </label>
                        <textarea class="form-control" name="inputReason" id="inputReason" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="del">Terminate</a>
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