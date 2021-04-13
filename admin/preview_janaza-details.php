<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
if (isset($_GET['updated'])) {
    $message = "Record successfully edited and Updated..!";
}

$sort1 = "0";
$sort2 = "0";
$where = "";
$sort1 = $_GET['sort1'] ?? $_GET['sort1'];
$sort2 = $_GET['sort2'] ?? $_GET['sort2'];
$sort5 = 0;
$sort6 = 0;
if (isset($_GET['sort5'])) {
    $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
    $sort6 = $_GET['sort6'];
}

if ($sort1 == "0" && $sort2 == "0") {
    $where = array(
        'jd_janazaId'     !=    0
    );
} elseif ($sort1 == "0") {
    $where = array(
        'jd_gender'     =>    $sort2
    );
} elseif ($sort2 == "0") {
    $where = array(
        'jd_subDivision'     =>    $sort1
    );
} else {
    $where = array(
        'jd_subDivision' => $sort1,
        'jd_gender'     =>    $sort2
    );
}
$janaza_details = $database->select_where('tbl_janazadetails', $where);
$item_count = $database->select_count('tbl_janazadetails', $where);
if ($sort1 == "0" && $sort2 == "0") {
    $item_count = 0;
    $janaza_details = $database->select_dates('tbl_janazadetails','jd_dateofDeath',$sort5,$sort6);
    foreach ($janaza_details as $janaza_details_item) {
        $item_count = $item_count + 1;
    }
}

?>
<script type="text/javascript">
    var sort1 = "<?php echo $sort1; ?>";
    var sort2 = "<?php echo $sort2; ?>";
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
                                                        <div class="form-group col-md-3">
                                                            <label for="sortJanazasubdivision">Filter By</label>
                                                            <select name="sortJanazasubdivision" id="sortJanazasubdivision" class="form-control">
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
                                                            <label for="sortJanazaGender">Filter By</label>
                                                            <select name="sortJanazaGender" id="sortJanazaGender" class="form-control">
                                                                <option value="0" selected>Gender</option>
                                                                <option value="M" <?= $sort2 == 'M' ? ' selected="selected"' : ''; ?>> Male </option>
                                                                <option value="F" <?= $sort2 == 'F' ? ' selected="selected"' : ''; ?>> Female </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortJanazaFrom">From</label>
                                                            <input class="form-control" type="date" name="sortJanazaFrom" id="sortJanazaFrom" value="<?php echo $sort5 ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortJanazaTo">To</label>
                                                            <input class="form-control" type="date" name="sortJanazaTo" id="sortJanazaTo" value="<?php echo $sort6 ?>">
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
                                                        if ($sort1 == "0" && $sort2 == "0") {
                                                            $janaza_details = $database->select_dates('tbl_janazadetails','jd_dateofDeath',$sort5,$sort6);

                                                        }
                                                        foreach ($janaza_details as $janaza_details_item) {
                                                            $gender = $janaza_details_item['jd_gender'];
                                                            if ($gender == "M") {
                                                                $gender = "Male";
                                                            } else {
                                                                $gender = "Female";
                                                            }
                                                            $id = $janaza_details_item['jd_janazaId'];
                                                            if (isset($id)) {
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