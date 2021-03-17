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
                        $all_villagers_details = $database->select_data('tbl_allvillagers');
                    } elseif ($action == "widow") {
                        $where = array(
                            'av_widowed'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                    } elseif ($action == "divorse") {
                        $where = array(
                            'av_divorced'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                    } elseif ($action == "orphan") {
                        $where = array(
                            'av_orphaned'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                    } elseif ($action == "madrasa") {
                        $where = array(
                            'av_madChild_status'     =>    1
                        );
                        $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> All Villagers Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> All Villagers Details Preview </h4>
                                        <div class="mt-5">
                                            <label for="listDetails">List Down</label>
                                            <select name="listDetails" id="listDetails">
                                                <option value="allvillagers" <?= $action == 'allvillagers' ? ' selected="selected"' : ''; ?>>All Villagers Details</option>
                                                <option value="widow" <?= $action == 'widow' ? ' selected="selected"' : ''; ?>>Widow Details</option>
                                                <option value="divorse" <?= $action == 'divorse' ? ' selected="selected"' : ''; ?>>Divorsed Details</option>
                                                <option value="madrasa" <?= $action == 'madrasa' ? ' selected="selected"' : ''; ?>>Madrasa Children Details</option>
                                                <option value="orphan" <?= $action == 'orphan' ? ' selected="selected"' : ''; ?>>Orphan Children Details</option>
                                            </select>
                                            <div id="allVillagers">
                                                <div class="table-responsive">
                                                    <table class="display datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Index Number</th>
                                                                <th>Sub Division</th>
                                                                <th>Age</th>
                                                                <th>Actions</th>
                                                                <th>Left the Village</th>
                                                                <th>Saandha Status</th>
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
                                                            <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                            <td>" . $index . "</td>
                                                            <td>" . $subdivision . "</td>
                                                            <td>" . $age . "</td>
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='btn btn-warning btn-md'>Edit</a>
                                                            </td>
                                                            <td>";
                                                                if (!$left_village) {
                                                                    echo "<a href='handlers/preview_villagers_handler.php?index=" . $index . "&subdivision=" . $subdivision . "&action=left_village' class='btn btn-danger btn-md' id='left_village'>Yes</a>";
                                                                } else {
                                                                    echo "Already Left";
                                                                }
                                                                echo "</td>
                                                                <td>";
                                                                if (!$saandha_status) {
                                                                    if ($age >= 18) {
                                                                        echo "<a href='' id='" . $index . "' class='btn btn-warning btn-md update_row_saandha' data-toggle='modal' data-target='#deleteRecord'>Pending</a>";
                                                                    } else {
                                                                        echo "Not Eligible";
                                                                    }
                                                                } else {
                                                                    echo "Saandhaa member";
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
                                            <div id="widow">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Index Number</th>
                                                            <th>Address</th>
                                                            <th>No. of Children</th>
                                                            <th>Actions</th>
                                                            <th>Left the Village</th>
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
                                                                <td>
                                                                    <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                    <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='btn btn-warning btn-md'>Edit</a>
                                                                </td>
                                                                <td>";
                                                                if (!$left_village) {
                                                                    echo "<a href='handlers/preview_villagers_handler.php?index=" . $index . "&subdivision=" . $subdivision . "&action=left_village' class='btn btn-danger btn-md' id='left_village'>Yes</a>";
                                                                } else {
                                                                    echo "Already Left";
                                                                }
                                                                echo "</td>
                                                            </tr>
                                                             ";
                                                            }
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="divorse">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Index Number</th>
                                                            <th>Address</th>
                                                            <th>No. of Children</th>
                                                            <th>Actions</th>
                                                            <th>Left the Village</th>
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
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='btn btn-warning btn-md'>Edit</a>
                                                            </td>
                                                            <td>";
                                                            if (!$left_village) {
                                                                echo "<a href='handlers/preview_villagers_handler.php?index=" . $index . "&subdivision=" . $subdivision . "&action=left_village' class='btn btn-danger btn-md' id='left_village'>Yes</a>";
                                                            } else {
                                                                echo "Already Left";
                                                            }
                                                            echo "</td>
                                                        </tr>
                                                         ";
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="madrasa">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Index Number</th>
                                                            <th>Madrasa Type</th>
                                                            <th>Enrolment Date</th>
                                                            <th>Address</th>
                                                            <th>Actions</th>
                                                            <th>Left the Village</th>
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
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='btn btn-warning btn-md'>Edit</a>
                                                            </td>
                                                            <td>";
                                                            if (!$left_village) {
                                                                echo "<a href='handlers/preview_villagers_handler.php?index=" . $index . "&subdivision=" . $subdivision . "&action=left_village' class='btn btn-danger btn-md' id='left_village'>Yes</a>";
                                                            } else {
                                                                echo "Already Left";
                                                            }
                                                            echo "</td>
                                                        </tr>
                                                         ";
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="orphan">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Address</th>
                                                            <th>Age</th>
                                                            <th>Actions</th>
                                                            <th>Left the Village</th>
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

                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='btn btn-warning btn-md'>Edit</a>
                                                            </td>
                                                            <td>";
                                                            if (!$left_village) {
                                                                echo "<a href='handlers/preview_villagers_handler.php?index=" . $index . "&subdivision=" . $subdivision . "&action=left_village' class='btn btn-danger btn-md' id='left_village'>Yes</a>";
                                                            } else {
                                                                echo "Already Left";
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

    <!-- footer -->
    <?php
    include "template_parts/footer.php";
    ?>
    <!-- End custom js for this page -->
</body>

</html>