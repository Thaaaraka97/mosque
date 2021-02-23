<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
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
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
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
                                                <option value="allvillagers" <?=$action == 'allvillagers' ? ' selected="selected"' : '';?>>All Villagers Details</option>
                                                <option value="widow" <?=$action == 'widow' ? ' selected="selected"' : '';?>>Widow Details</option>
                                                <option value="divorse" <?=$action == 'divorse' ? ' selected="selected"' : '';?>>Divorsed Details</option>
                                                <option value="madrasa" <?=$action == 'madrasa' ? ' selected="selected"' : '';?>>Madrasa Children Details</option>
                                                <option value="orphan" <?=$action == 'orphan' ? ' selected="selected"' : '';?>>Orphan Children Details</option>
                                            </select>
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Index Number</th>
                                                        <th>Sub Division</th>
                                                        <th>Age</th>
                                                        <th>Actions</th>
                                                        <th>Left the Village</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div id="allVillagers">
                                                        <?php
                                                        $all_villagers_details = "";
                                                        if ($action == "allvillagers") {
                                                            $all_villagers_details = $database->select_data('tbl_allvillagers');
                                                        }
                                                        elseif ($action == "widow") {
                                                            $where = array(
                                                                'av_widowed'     =>    1 
                                                            );
                                                            $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                                                        }
                                                        elseif ($action == "divorse") {
                                                            $where = array(
                                                                'av_divorced'     =>    1 
                                                            );
                                                            $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                                                        }
                                                        elseif ($action == "orphan") {
                                                            $where = array(
                                                                'av_orphaned'     =>    1 
                                                            );
                                                            $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                                                        }
                                                        elseif ($action == "madrasa") {
                                                            $where = array(
                                                                'av_madChild_status'     =>    1 
                                                            );
                                                            $all_villagers_details = $database->select_where('tbl_allvillagers', $where);
                                                        }
                                                        
                                                        foreach ($all_villagers_details as $all_villagers_details_item) {
                                                            $index = $all_villagers_details_item['av_index'];
                                                            $subdivision = $all_villagers_details_item['av_subDivision'];
                                                            $left_village = $all_villagers_details_item['av_leftVillage'];
                                                            echo "
                                                         <tr>
                                                            <td>" . $all_villagers_details_item['av_name'] . "</td>
                                                            <td>" . $index . "</td>
                                                            <td>" . $subdivision . "</td>
                                                            <td>" . $all_villagers_details_item['av_age'] . "</td>
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&action=edit' class='btn btn-danger btn-md'>Edit</a>
                                                            </td>
                                                            <td>";
                                                            if (!$left_village) {
                                                                echo "<a href='handlers/preview_villagers_handler.php?index=" . $index . "&subdivision=" . $subdivision . "&action=left_village' class='btn btn-warning btn-md' id='left_village'>Yes</a>";
                                                            }
                                                            echo "</td>
                                                        </tr>
                                                         ";
                                                        }

                                                        ?>
                                                    </div>
                                                    <div id="otherDetails"></div>
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
</body>

</html>