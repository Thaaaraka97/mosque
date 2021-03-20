<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['updated'])) {
    $message = "Record successfully edited and Updated..!";
}

$where = array(
    'jd_janazaId ' != 0
);
$item_count = $database->select_count('tbl_janazadetails', $where);
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
                    if (isset($_GET['updated'])) {
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
                                                    <h3 class="card-title top"> Janaza Details Preview </h3>
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
                                                        <div class="form-group col-md-3">
                                                            <select name="sortvillagersubdivision" id="sortvillagersubdivision" class="form-control">
                                                                <option value="0" selected>Time</option>
                                                                <option value="widow" <?= $action == 'widow' ? ' selected="selected"' : ''; ?>>Widow Details</option>
                                                                <option value="divorse" <?= $action == 'divorse' ? ' selected="selected"' : ''; ?>>Divorsed Details</option>
                                                                <option value="madrasa" <?= $action == 'madrasa' ? ' selected="selected"' : ''; ?>>Madrasa Children Details</option>
                                                                <option value="orphan" <?= $action == 'orphan' ? ' selected="selected"' : ''; ?>>Orphan Children Details</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <select name="sortvillagersubdivision" id="sortvillagersubdivision" class="form-control">
                                                                <option value="0" selected>Gender</option>
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
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Gender</th>
                                                            <th>Sub Division</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $janaza_details = $database->select_data('tbl_janazadetails');
                                                        foreach ($janaza_details as $janaza_details_item) {
                                                            $gender = $janaza_details_item['jd_gender'];
                                                            if ($gender == "M") {
                                                                $gender = "Male";
                                                            } else {
                                                                $gender = "Female";
                                                            }
                                                            $id = $janaza_details_item['jd_janazaId'];
                                                            echo "
                                                         <tr>
                                                            <td>" . $janaza_details_item['jd_name'] . "</td>
                                                            <td>" . $janaza_details_item['jd_dateofDeath'] . "</td>
                                                            <td>" . $gender . "</td>
                                                            <td>" . $janaza_details_item['jd_subDivision'] . "</td>
                                                            <td>
                                                                <a href='preview_janaza-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_janaza-details_step-2.php?id=" . $id . "&action=edit'' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
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
</body>

</html>