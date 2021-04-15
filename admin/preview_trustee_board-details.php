<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
} elseif (isset($_GET['terminated'])) {
    $message = "Member terminated and Updated the Record..!";
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$sort3 = "0";
if (isset($_GET['sort3'])) {
    $sort3 = $_GET['sort3'];
}

$where = array(
    'tb_id ' != 0
);
$item_count = $database->select_count('tbl_trusteeboarddetails', $where);

if ($action == "present") {
    $where = array(
        'tb_isActive'     =>    1
    );
    $trustee_board_details = $database->select_where('tbl_trusteeboarddetails', $where);
    $item_count = $database->select_count('tbl_trusteeboarddetails', $where);
}
elseif ($action == "previous") {
    $where = array(
        'tb_isActive'     =>    0
    );
    if ($sort3 != 0) {
        $where = array(
            'tb_isActive'     =>    0,
            'tb_electedYYMM'     =>    $sort3
        );
    }
    $trustee_board_details2 = $database->select_where('tbl_trusteeboarddetails', $where);
    $item_count = $database->select_count('tbl_trusteeboarddetails', $where);

}
?>

<script type="text/javascript">
    var TBlistDetails = "<?php echo $action; ?>";
    var sort3 = "<?php echo $sort3; ?>";

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
                                                    <h3 class="card-title top"> Trusteeboard Details Preview </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                            <td class="total-td">
                                                <div>
                                                    <p class="text-dark">No. of Entries <?php echo " : " . $item_count ?></p>
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
                                            <label for="TBlistDetails">List Down</label>
                                            <select name="TBlistDetails" id="TBlistDetails">
                                                <option value="present" <?= $action == 'present' ? ' selected="selected"' : ''; ?>>Present Trusteeboard</option>
                                                <option value="previous" <?= $action == 'previous' ? ' selected="selected"' : ''; ?>>Previous Trusteeboard</option>
                                            </select>
                                            <hr>
                                            <div id="presentTB">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>From - To</th>
                                                                <th>Designation</th>
                                                                <th>Name</th>
                                                                <th>Telephone</th>
                                                                <th>Left Position</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            
                                                            foreach ($trustee_board_details as $trustee_board_details_item) {
                                                                $id = $trustee_board_details_item['tb_id'];
                                                                $start = $trustee_board_details_item['tb_startDate'];
                                                                $end = $trustee_board_details_item['tb_endDate'];
                                                                $designation = $trustee_board_details_item['tb_designation'];
                                                                $isActive = $trustee_board_details_item['tb_isActive'];
                                                                if ($end == "" || $end == "0000-00-00") {
                                                                    $end = "Present";
                                                                }
                                                                echo "
                                                         <tr>
                                                            <td>" . $start . " => " . $end . "</td>
                                                            <td>" . $designation . "</td>
                                                            <td>" . $trustee_board_details_item['tb_name'] . "</td>
                                                            <td>" . $trustee_board_details_item['tb_telephone'] . "</td>
                                                            <td>
                                                                <a href='' id ='" . $id . "' class='btn btn-warning btn-md terminate_row_trustee' data-toggle='modal' data-target='#deleteRecord'>Left</a>
                                                            </td>
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
                                            <div id="previousTB">
                                                <div class="table-responsive table-responsive-data2">
                                                    <div class="sorting">
                                                        <div class="row">
                                                            <div class="form-group col-md-3">
                                                                <select name="sortTrusteeboardID" id="sortTrusteeboardID" class="form-control">
                                                                    <option value="0" <?= $sort3 == '0' ? ' selected="selected"' : ''; ?>> Trusteeboard ID </option>
                                                                    <?php
                                                                    $where = array(
                                                                        'tb_isActive'     =>     0
                                                                    );
                                                                    $current_tb_id = 0;
                                                                    $tb_details = $database->select_where('tbl_trusteeboarddetails', $where);
                                                                    foreach ($tb_details as $tb_details_item) {
                                                                        $tb_id = $tb_details_item["tb_electedYYMM"];
                                                                        if ($current_tb_id != $tb_id) {
                                                                            $current_tb_id = $tb_id;
                                                                            echo "<option value='".$tb_id."'";
                                                                            if ($sort3 == $tb_id) {
                                                                                echo ' selected="selected"';
                                                                            }
                                                                            echo ">".$tb_id." </option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-data2">
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
                        <h5 class="modal-title" id="ModalLabel"> Recruting new member </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Fill the form below to recruit a new member to the Position

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputIndexNo"> Index Number </label>
                                <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputSubdivision"> Sub-division </label>
                                <select id="inputSubdivision" name="inputSubdivision" class="form-control">
                                    <option value="0" selected>Choose...</option>
                                    <?php
                                    $sub_division = $database->select_data('tbl_subdivision');
                                    foreach ($sub_division as $sub_division_item) {
                                        echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Name </label>
                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTP">Telephone Number </label>
                                <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="077xxxxxxx" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputJob">Job </label>
                                <input type="text" class="form-control" id="inputJob" name="inputJob" placeholder="Job">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputSalary">Salary </label>
                                <input type="text" class="form-control" id="inputSalary" name="inputSalary" placeholder="Salary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress"> Address </label>
                            <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" readonly></textarea>
                        </div>
                        Click Add to terminate current member and add new member to the position.
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <a class="btn btn-primary" id="del"> Add </a>
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