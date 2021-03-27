<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
$id = "";
$where = "";
$sort1 = "";
$sort5 = 0;
$sort6 = 0;
if (isset($_GET['sort5'])) {
    $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
    $sort6 = $_GET['sort6'];
}
$item_count = 0;

if (isset($_GET['deleted'])) {
    $message = "Record successfully Deleted..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successfully Updated..!";
}

if (isset($_GET['sort1'])) {
    $sort1 = $_GET['sort1'];
    if ($sort1 != "0") {
        $where = array(
            'nd_groomSubDivision' => $sort1
        );
        $where2 = array(
            'nd_brideSubDivision' => $sort1
        );
        $item_count1 = $database->select_count('tbl_nikkahdetails', $where);
        $item_count2 = $database->select_count('tbl_nikkahdetails', $where);
        $item_count = (int)$item_count1 + (int)$item_count2;
    } else {
        $nikkah_details = $database->select_dates('tbl_nikkahdetails', 'nd_marriageDate', $sort5, $sort6);
        foreach ($nikkah_details as $nikkah_details_item) {
            $item_count = $item_count + 1;
        }
    }
}

?>
<script type="text/javascript">
    var sort1 = "<?php echo $sort1; ?>";
    var sort5 = "<?php echo $sort5; ?>";
    var sort6 = "<?php echo $sort6; ?>";
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
                    if (isset($_GET['deleted'])) {
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
                                                    <h3 class="card-title top"> Nikkah Details Preview </h3>
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
                                                        <div class="form-group col-md-3">
                                                            <label for="sortNikkahsubdivision">Sort By</label>
                                                            <select name="sortNikkahsubdivision" id="sortNikkahsubdivision" class="form-control">
                                                                <option value="0" selected>All Sub-Divisions</option>
                                                                <option value="Moragala Main-Street" <?= $sort1 == 'Moragala Main-Street' ? ' selected="selected"' : ''; ?>>Moragala Main-Street </option>
                                                                <option value="Old Rail Road" <?= $sort1 == 'Old Rail Road' ? ' selected="selected"' : ''; ?>>Old Rail Road </option>
                                                                <option value="Bandarawaththa" <?= $sort1 == 'Bandarawaththa' ? ' selected="selected"' : ''; ?>>Bandarawaththa </option>
                                                                <option value="Kothvila" <?= $sort1 == 'Kothvila' ? ' selected="selected"' : ''; ?>>Kothvila </option>
                                                                <option value="Palpitiya" <?= $sort1 == 'Palpitiya' ? ' selected="selected"' : ''; ?>>Palpitiya </option>
                                                                <option value="Ranaviru Mawatha" <?= $sort1 == 'Ranaviru Mawatha' ? ' selected="selected"' : ''; ?>>Ranaviru Mawatha </option>
                                                                <option value="Wekada-1" <?= $sort1 == 'Wekada-1' ? ' selected="selected"' : ''; ?>>Wekada-1 </option>
                                                                <option value="Wekada-2" <?= $sort1 == 'Wekada-2' ? ' selected="selected"' : ''; ?>>Wekada-2 </option>
                                                                <option value="Wekada-3" <?= $sort1 == 'Wekada-3' ? ' selected="selected"' : ''; ?>>Wekada-3 </option>
                                                                <option value="Eheliyagoda Town" <?= $sort1 == 'Eheliyagoda Town' ? ' selected="selected"' : ''; ?>>Eheliyagoda Town </option>
                                                                <option value="Other-1" <?= $sort1 == 'Other-1' ? ' selected="selected"' : ''; ?>>Other-1 </option>
                                                                <option value="Other-2" <?= $sort1 == 'Other-2' ? ' selected="selected"' : ''; ?>>Other-2 </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortNikkahFrom">From</label>
                                                            <input class="form-control" type="date" name="sortNikkahFrom" id="sortNikkahFrom" value="<?php echo $sort5 ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortNikkahTo">To</label>
                                                            <input class="form-control" type="date" name="sortNikkahTo" id="sortNikkahTo" value="<?php echo $sort6 ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                            <th>Date</th>
                                                            <th>Bride Name</th>
                                                            <th>Groom Name</th>
                                                            <th>Address</th>
                                                            <th>Actions</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $where = array(
                                                            'nd_groomSubDivision' => $sort1
                                                        );
                                                        $nikkah_details = $database->select_where('tbl_nikkahdetails', $where);
                                                        $where2 = array(
                                                            'nd_brideSubDivision' => $sort1
                                                        );
                                                        $nikkah_details2 = $database->select_where('tbl_nikkahdetails', $where2);

                                                        if ($sort1 == "0") {
                                                            $nikkah_details = $database->select_dates('tbl_nikkahdetails', 'nd_marriageDate', $sort5, $sort6);
                                                            $nikkah_details2 = $database->select_dates('tbl_nikkahdetails', 'nd_marriageDate', $sort5, $sort6);

                                                        }
                                                        foreach ($nikkah_details as $nikkah_details_item) {
                                                            $id = $nikkah_details_item['nd_nikkahId'];

                                                            echo "
                                                         <tr>
                                                            <td>" . $nikkah_details_item['nd_marriageDate'] . "</td>
                                                            <td>" . $nikkah_details_item['nd_brideName'] . "</td>
                                                            <td>" . $nikkah_details_item['nd_groomName'] . "</td>
                                                            <td>" . $nikkah_details_item['nd_groomAddress'] . "</td>
                                                            <td>
                                                                <a href='preview_nikkah-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_nikkah-details_step-2.php?id=" . $id . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                            </td>
                                                            <td>
                                                                <a href='' id ='" . $id . "' class='item delete_row_nikkah' data-toggle='modal' data-target='#deleteRecord'><i class='fa fa-trash fa-lg' aria-hidden='true'></i></a>
                                                            </td>
                                                        </tr>
                                                         ";
                                                        }
                                                        if ($sort1 != "0") {
                                                            foreach ($nikkah_details2 as $nikkah_details2_item) {
                                                                if (isset($nikkah_details2_item['nd_nikkahId'])) {
                                                                    $id = $nikkah_details2_item['nd_nikkahId'];

                                                                    echo "
                                                                    <tr>
                                                                        <td>" . $nikkah_details2_item['nd_marriageDate'] . "</td>
                                                                        <td>" . $nikkah_details2_item['nd_brideName'] . "</td>
                                                                        <td>" . $nikkah_details2_item['nd_groomName'] . "</td>
                                                                        <td>" . $nikkah_details2_item['nd_groomAddress'] . "</td>
                                                                        <td>
                                                                            <a href='preview_nikkah-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                            <a href='preview_nikkah-details_step-2.php?id=" . $id . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <a href='' id ='" . $id . "' class='item delete_row_nikkah' data-toggle='modal' data-target='#deleteRecord'><i class='fa fa-trash fa-lg' aria-hidden='true'></i></a>
                                                                            
            
                                                                        </td>
                                                                    </tr>
                                                                ";
                                                                }
                                                            }
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
</body>

</html>