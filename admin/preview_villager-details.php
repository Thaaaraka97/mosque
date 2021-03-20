<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['left'])) {
    $message = "Record successsfully updated..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successsfully Edited and Updated..!";
} elseif (isset($_GET['saandha'])) {
    $message = "Saandha Status successsfully Edited and Updated..!";
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
?>
<script type="text/javascript">
    var action = "";
    var villageraction = "<?php echo $action; ?>";
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
                    if (isset($message)) {
                        if (isset($_GET['left'])) {
                            echo "
                            <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                        } elseif (isset($_GET['edited'])) {
                            echo "
                            <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                        } elseif (isset($_GET['saandha'])) {
                            echo "
                            <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                        }
                    }

                    $all_villagers_details = "";
                    if ($action == "allvillagers") {
                        $where = array(
                            'av_index ' != 0
                        );
                        $all_villagers_details = $database->select_data('tbl_allvillagers');
                        $all_villagers_count = $database->select_count('tbl_allvillagers', $where);
                    } elseif ($action == "widow") {
                        $where = array(
                            'av_widowed'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                        $all_villagers_count = $database->select_count('tbl_allvillagers', $where);
                    } elseif ($action == "divorse") {
                        $where = array(
                            'av_divorced'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                        $all_villagers_count = $database->select_count('tbl_allvillagers', $where);
                    } elseif ($action == "orphan") {
                        $where = array(
                            'av_orphaned'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                        $all_villagers_count = $database->select_count('tbl_allvillagers', $where);
                    } elseif ($action == "madrasa") {
                        $where = array(
                            'av_madChild_status'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                        $all_villagers_count = $database->select_count('tbl_allvillagers', $where);
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
                                                    <h3 class="card-title top"> All Villagers Details Preview </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                            <td class="total-td">
                                                <div>
                                                    <p class="text-dark">No. of Entries <?php echo " : " . $all_villagers_count ?></p>
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
                                        <div class="">
                                            <label for="listDetails">List Down</label>
                                            <select name="listDetails" id="listDetails">
                                                <option value="allvillagers" <?= $action == 'allvillagers' ? ' selected="selected"' : ''; ?>>All Villagers Details</option>
                                                <option value="widow" <?= $action == 'widow' ? ' selected="selected"' : ''; ?>>Widow Details</option>
                                                <option value="divorse" <?= $action == 'divorse' ? ' selected="selected"' : ''; ?>>Divorsed Details</option>
                                                <option value="madrasa" <?= $action == 'madrasa' ? ' selected="selected"' : ''; ?>>Madrasa Children Details</option>
                                                <option value="orphan" <?= $action == 'orphan' ? ' selected="selected"' : ''; ?>>Orphan Children Details</option>
                                            </select>
                                            <hr>
                                            <div id="allVillagers">
                                                <div class="table-responsive table-responsive-data2">
                                                    <div class="sorting">
                                                        <div class="row">
                                                            <div class="form-group col-md-1">
                                                                <label for="sortvillagersubdivision">Sort By</label>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <select name="sortvillagersubdivision" id="sortvillagersubdivision" class="form-control">
                                                                    <option value="0" selected>Sub-Division</option>
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
                                                            <tr class="tr-shadow">
                                                                <th>Index Number</th>
                                                                <th>Sub Division</th>
                                                                <th>Name</th>
                                                                <th>Age</th>
                                                                <th>Left the Village</th>
                                                                <th>Saandha Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($all_villagers_details as $all_villagers_details_item) {
                                                                $index = $all_villagers_details_item['av_index'];
                                                                $subdivision = $all_villagers_details_item['av_subDivision'];
                                                                $left_village = $all_villagers_details_item['av_leftVillage'];
                                                                $saandha_status = $all_villagers_details_item['av_saandhaStatus'];
                                                                $dob = $all_villagers_details_item['av_dob'];
                                                                $age = $database->calculate_age($dob);
                                                                echo "
                                                         <tr>
                                                            <td>" . $index . "</td>
                                                            <td>" . $subdivision . "</td>
                                                            <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                            <td>" . $age . "</td>
                                                            <td>";
                                                                if (!$left_village) {
                                                                    echo "<a href='' id=" . $index . " class='btn btn-danger btn-md left_village' data-toggle='modal' data-target='#updateRecord'>Yes</a>";
                                                                } else {
                                                                    echo "<span class='status--denied'>Already Left</span>";
                                                                }
                                                                echo "</td>
                                                                <td>";
                                                                if (!$saandha_status) {
                                                                    if ($age >= 18) {
                                                                        echo "<a href='' id='" . $index . "' class='btn btn-warning btn-md update_row_saandha' data-toggle='modal' data-target='#deleteRecord'>Pending</a>";
                                                                    } else {
                                                                        echo "<span class='status--denied'>Not Eligible</span>";
                                                                    }
                                                                } else {
                                                                    echo "<span class='status--process'>Saandhaa member</span>";
                                                                }
                                                                echo "
                                                                </td>
                                                            <td class='pl-3'>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                         ";
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div id="widow">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Index Number</th>
                                                                <th>Address</th>
                                                                <th>No. of Children</th>
                                                                <th>Left the Village</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($action == "widow") {
                                                                foreach ($all_villagers_details as $all_villagers_details_item) {
                                                                    $index = $all_villagers_details_item['av_index'];
                                                                    $subdivision = $all_villagers_details_item['av_subDivision'];
                                                                    $left_village = $all_villagers_details_item['av_leftVillage'];
                                                                    echo "
                                                             <tr>
                                                                <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                                <td>" . $index . "</td>
                                                                <td>" . $all_villagers_details_item['av_address'] . "</td>
                                                                <td>" . $all_villagers_details_item['av_unmarriedChildren'] . "</td>
                                                                <td>";
                                                                    if (!$left_village) {
                                                                        echo "<a href='' id=" . $index . " class='btn btn-danger btn-md left_village' data-toggle='modal' data-target='#updateRecord'>Yes</a>";
                                                                    } else {
                                                                        echo "Already Left";
                                                                    }
                                                                    echo "</td>
                                                                <td>
                                                                    <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                    <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                                </td>
                                                            </tr>
                                                             ";
                                                                }
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="divorse">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Index Number</th>
                                                                <th>Address</th>
                                                                <th>No. of Children</th>
                                                                <th>Left the Village</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($all_villagers_details as $all_villagers_details_item) {
                                                                $index = $all_villagers_details_item['av_index'];
                                                                $subdivision = $all_villagers_details_item['av_address'];
                                                                $left_village = $all_villagers_details_item['av_leftVillage'];
                                                                echo "
                                                                <tr>
                                                                    <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                                    <td>" . $index . "</td>
                                                                    <td>" . $all_villagers_details_item['av_address'] . "</td>
                                                                    <td>" . $all_villagers_details_item['av_unmarriedChildren'] . "</td>
                                                                    <td>";
                                                                if (!$left_village) {
                                                                    echo "<a href=''' id=" . $index . " class='btn btn-danger btn-md left_village' data-toggle='modal' data-target='#updateRecord'>Yes</a>";
                                                                } else {
                                                                    echo "Already Left";
                                                                }
                                                                echo "</td>
                                                                <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                                    </td>
                                                                </tr>
                                                                ";
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="madrasa">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Index Number</th>
                                                                <th>Madrasa Type</th>
                                                                <th>Enrolment Date</th>
                                                                <th>Address</th>
                                                                <th>Left the Village</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($all_villagers_details as $all_villagers_details_item) {
                                                                $index = $all_villagers_details_item['av_index'];
                                                                $subdivision = $all_villagers_details_item['av_subDivision'];
                                                                $left_village = $all_villagers_details_item['av_leftVillage'];
                                                                echo "
                                                         <tr>
                                                            <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                            <td>" . $index . "</td>
                                                            <td>" . $all_villagers_details_item['av_madChild_type'] . "</td>
                                                            <td>" . $all_villagers_details_item['av_madChild_startDate'] . "</td>
                                                            <td>" . $all_villagers_details_item['av_address'] . "</td>
                                                            <td>";
                                                                if (!$left_village) {
                                                                    echo "<a href='' id=" . $index . " class='btn btn-danger btn-md left_village' data-toggle='modal' data-target='#updateRecord'>Yes</a>";
                                                                } else {
                                                                    echo "Already Left";
                                                                }
                                                                echo "</td>
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                            </td>
                                                        </tr>
                                                         ";
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="orphan">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Address</th>
                                                                <th>Age</th>
                                                                <th>Left the Village</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($all_villagers_details as $all_villagers_details_item) {
                                                                $index = $all_villagers_details_item['av_index'];
                                                                $subdivision = $all_villagers_details_item['av_subDivision'];
                                                                $left_village = $all_villagers_details_item['av_leftVillage'];
                                                                echo "
                                                         <tr>
                                                            <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                            <td>" . $all_villagers_details_item['av_address'] . "</td>
                                                            <td>" . $all_villagers_details_item['av_age'] . "</td>
                                                            <td>";
                                                                if (!$left_village) {
                                                                    echo "<a href='' id=" . $index . " class='btn btn-danger btn-md left_village' data-toggle='modal' data-target='#updateRecord'>Yes</a>";
                                                                } else {
                                                                    echo "Already Left";
                                                                }
                                                                echo "</td>
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
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

        <!-- Update Modal -->
        <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Accept Saandha Membership ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to accept this person as a saandha member? <br>
                        Make sure you ask the specific person, for his/her idea of becoming a saandha member. If he/she agrees, then click Accept Saandhaa. Otherwise click on Close.
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <a class="btn btn-primary" id="accept">Accept</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
    <div class="modal fade" id="updateRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"> Left Village ? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure this person left the village?
                    
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="update" name="update"> Yes </a>
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