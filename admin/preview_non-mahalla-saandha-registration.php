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
elseif (isset($_GET['edited'])) {
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
                    }elseif (isset($_GET['edited'])) {
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
                                                    <h3 class="card-title top"> Non-Mahalla Saandha Registrations Preview </h3>
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
                                        <div class="w-100 text-right">
                                            <button class='btn btn-success btn-md ' data-toggle='modal' data-target='#addRecord' id="addNewNonMahallaSaandha" name="addNewNonMahallaSaandha"> Add New </button>
                                        </div>
                                        <div class="mt-3">
                                        <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                        <th>Contact Number</th>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $non_mahalla_reg = $database->select_data('tbl_nonmahallasaandharegistration');
                                                    foreach ($non_mahalla_reg as $non_mahalla_reg_item) {
                                                        $id = $non_mahalla_reg_item['nmsr_id'];
                                                        $tp = $non_mahalla_reg_item['nmsr_telephone'];
                                                        $name = $non_mahalla_reg_item['nmsr_name'];
                                                        $address = $non_mahalla_reg_item['nmsr_address'];
                                                        echo "
                                                         <tr>
                                                            <td>" . $tp . "</td>
                                                            <td>" . $name . "</td>
                                                            <td>" . $address . "</td>
                                                            <td>
                                                                <a href='preview_non-mahalla-saandha-registration_step-2.php?action=view&id=" . $id . "' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='' id ='".$id."' class='item edit_nonmahalla_saandha_reg' data-toggle='modal' data-target='#updateRecord'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
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

    <!-- add record Modal -->
    <div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"> Add new Non-Mahalla Saandha Member </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please fill out the form below.
                    <div class="form-group ">
                        <label for="inputName"> Name </label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                    </div>
                    <div class="form-group ">
                        <label for="inputTP">Telephone Number </label>
                        <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="077xxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress"> Address </label>
                        <textarea class="form-control" id="inputAddress" name="inputAddress" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-primary" id="add" name="add"> Add </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"> Update Non-Mahalla Saandha Member </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please edit out the fields in the form.
                    <div class="form-group ">
                        <label for="inputName"> Name </label>
                        <input type="text" class="form-control" id="inputNameE" name="inputNameE" placeholder="Name">
                    </div>
                    <div class="form-group ">
                        <label for="inputTP">Telephone Number </label>
                        <input type="text" class="form-control" id="inputTPE" name="inputTPE" placeholder="077xxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress"> Address </label>
                        <textarea class="form-control" id="inputAddressE" name="inputAddressE" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="update" name="update"> Update </a>
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