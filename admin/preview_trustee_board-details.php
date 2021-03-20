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
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
?>

<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    var designation = "<?php echo $designation; ?>";
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
                    <div class="page-header">
                        <h3 class="page-title"> Trustee Board Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Trustee Board Details Preview </h4>
                                        <div class="mt-5">
                                            <label for="TBlistDetails">List Down</label>
                                            <select name="TBlistDetails" id="TBlistDetails">
                                                <option value="present" <?= $action == 'present' ? ' selected="selected"' : ''; ?>>Present Trusteeboard</option>
                                                <option value="previous" <?= $action == 'previous' ? ' selected="selected"' : ''; ?>>Previous Trusteeboard</option>
                                            </select>
                                            <div id="presentTB">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>From - To</th>
                                                            <th>Designation</th>
                                                            <th>Name</th>
                                                            <th>Telephone</th>
                                                            <th>Actions</th>
                                                            <th>Terminate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $where = array(
                                                            'tb_isActive'     =>    1
                                                        );
                                                        $trustee_board_details = $database->select_where('tbl_trusteeboarddetails', $where);
                                                        foreach ($trustee_board_details as $trustee_board_details_item) {
                                                            $id = $trustee_board_details_item['tb_id'];
                                                            $start = $trustee_board_details_item['tb_startDate'];
                                                            $end = $trustee_board_details_item['tb_endDate'];
                                                            $designation = $trustee_board_details_item['tb_designation'];
                                                            $isActive = $trustee_board_details_item['tb_isActive'];
                                                            if ($end == "") {
                                                                $end = "Present";
                                                            }
                                                            echo "
                                                         <tr>
                                                            <td>" . $start . " => " . $end . "</td>
                                                            <td>" . $designation . "</td>
                                                            <td>" . $trustee_board_details_item['tb_name'] . "</td>
                                                            <td>" . $trustee_board_details_item['tb_telephone'] . "</td>
                                                            <td>
                                                                <a href='preview_trustee_board-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_trustee_board-details_step-2.php?id=" . $id . "&action=edit&designation=" . $designation . "' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                            </td>
                                                            <td>";
                                                            if ($isActive) {
                                                                echo "<a href='' id ='" . $id . "' class='btn btn-danger btn-md terminate_row_trustee' data-toggle='modal' data-target='#deleteRecord'>Terminate</a>";
                                                            } else {
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
                                            <div id="previousTB">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>From - To</th>
                                                            <th>Designation</th>
                                                            <th>Name</th>
                                                            <th>Telephone</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $where2 = array(
                                                            'tb_isActive'     =>    0
                                                        );
                                                        $trustee_board_details2 = $database->select_where('tbl_trusteeboarddetails', $where2);
                                                        foreach ($trustee_board_details2 as $trustee_board_details2_item) {
                                                            $id = $trustee_board_details2_item['tb_id'];
                                                            $start = $trustee_board_details2_item['tb_startDate'];
                                                            $end = $trustee_board_details2_item['tb_endDate'];
                                                            $designation = $trustee_board_details2_item['tb_designation'];
                                                            $isActive = $trustee_board_details2_item['tb_isActive'];
                                                            if ($end == "") {
                                                                $end = "Present";
                                                            }
                                                            echo "
                                                         <tr>
                                                            <td>" . $start . " => " . $end . "</td>
                                                            <td>" . $designation . "</td>
                                                            <td>" . $trustee_board_details2_item['tb_name'] . "</td>
                                                            <td>" . $trustee_board_details2_item['tb_telephone'] . "</td>
                                                            <td>
                                                                <a href='preview_trustee_board-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_trustee_board-details_step-2.php?id=" . $id . "&action=edit&designation=" . $designation . "' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                            </td>
                                                        </tr>
                                                         ";
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- <div class="mt-5">
                                            <h4 class="card-title"> Trustee Board History Preview </h4>
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Trusteeboard ID</th>
                                                        <th>Details</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // $tb_ID = "";

                                                    // $where = array(
                                                    //     'tb_isActive'     =>     1
                                                    // );
                                                    // $trustee_board_details2 = $database->select_where('tbl_trusteeboarddetails', $where);
                                                    // foreach ($trustee_board_details2 as $trustee_board_details2_item) {
                                                    //     $tb_ID = $trustee_board_details2_item['tb_electedYYMM'];
                                                    // }

                                                    // $trustee_board_history = $database->select_data('tbl_trusteeboardhistory');
                                                    // foreach ($trustee_board_history as $trustee_board_history_item) {
                                                    //     $id = $trustee_board_history_item['th_id'];
                                                    //     $elected_ID = $trustee_board_history_item['th_electedYYMM'];
                                                    //     $record = $trustee_board_history_item['th_record'];
                                                    //     echo "
                                                    //      <tr>
                                                    //         <td>" . $elected_ID . "</td>
                                                    //         <td>" . $record . "</td>
                                                    //         <td>";
                                                    //     if ($elected_ID == $tb_ID) {
                                                    //         echo "<a href='preview_trustee_board-history_step-2.php?id=" . $id . "&action=editable' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>";
                                                    //     } else {
                                                    //         echo "<a href='preview_trustee_board-history_step-2.php?id=" . $id . "&action=noneditable' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>";
                                                    //     }
                                                    //     echo "
                                                    //         </td>

                                                    //     </tr>
                                                    //      ";
                                                    // }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div> -->
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