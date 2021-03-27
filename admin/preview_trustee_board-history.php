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
                    } elseif (isset($_GET['terminated'])) {
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
                                                    <h3 class="card-title top"> Trusteeboard History Preview </h3>
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
                                                        <div class="form-group col-md-1">
                                                            <label for="sortvillagersubdivision">Sort By</label>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <select name="sortvillagersubdivision" id="sortvillagersubdivision" class="form-control">
                                                                <option value="0" selected>Time</option>
                                                                <option value="widow" <?= $action == 'widow' ? ' selected="selected"' : ''; ?>>Widow Details</option>
                                                                <option value="divorse" <?= $action == 'divorse' ? ' selected="selected"' : ''; ?>>Divorsed Details</option>
                                                                <option value="madrasa" <?= $action == 'madrasa' ? ' selected="selected"' : ''; ?>>Madrasa Children Details</option>
                                                                <option value="orphan" <?= $action == 'orphan' ? ' selected="selected"' : ''; ?>>Orphan Children Details</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr>
                                                            <th>Trusteeboard ID</th>
                                                            <th>Details</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $tb_ID = "";

                                                        $where = array(
                                                            'tb_isActive'     =>     1
                                                        );
                                                        $trustee_board_details = $database->select_where('tbl_trusteeboarddetails', $where);
                                                        foreach ($trustee_board_details as $trustee_board_details_item) {
                                                            $tb_ID = $trustee_board_details_item['tb_electedYYMM'];
                                                        }

                                                        $trustee_board_history = $database->select_data('tbl_trusteeboardhistory');
                                                        foreach ($trustee_board_history as $trustee_board_history_item) {
                                                            $id = $trustee_board_history_item['th_id'];
                                                            $elected_ID = $trustee_board_history_item['th_electedYYMM'];
                                                            $record = $trustee_board_history_item['th_record'];
                                                            if ($record == "") {
                                                                $record = "-";
                                                            }
                                                            echo "
                                                         <tr>
                                                            <td>" . $elected_ID . "</td>
                                                            <td>" . $record . "</td>
                                                            <td>";
                                                            if ($elected_ID == $tb_ID) {
                                                                echo "<a href='preview_trustee_board-history_step-2.php?id=" . $id . "&action=editable' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>";
                                                            } else {
                                                                echo "<a href='preview_trustee_board-history_step-2.php?id=" . $id . "&action=noneditable' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>";
                                                            }
                                                            echo "
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

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Terminate Member ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to terminate this member from Trustee Board?
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