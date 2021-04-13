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
}

$sort3 = "0";
$sort3 = $_GET['sort3'] ?? $_GET['sort3'];
?>
<script type="text/javascript">

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
                    }
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <h3 class="card-title top"> Expenses Details Preview </h3>
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
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                            <div class="row">
                                                <div class="form-group col-md-1">
                                                    <label for="sort">Filter By</label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <select name="sortExpensesType" id="sortExpensesType" class="form-control">
                                                        <option value="0" selected> Expenses Type </option>
                                                        <option value="Maintainance" <?= $sort3 == 'Maintainance' ? ' selected="selected"' : ''; ?>> Maintainance </option>
                                                        <option value="Stationary" <?= $sort3 == 'Stationary' ? ' selected="selected"' : ''; ?>> Stationary </option>
                                                        <option value="Building Repair" <?= $sort3 == 'Building Repair' ? ' selected="selected"' : ''; ?>> Building Repair </option>
                                                        <option value="Other" <?= $sort3 == 'Other' ? ' selected="selected"' : ''; ?>> Other </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                            <th>Date</th>
                                                            <th>Type</th>
                                                            <th>Amount</th>
                                                            <th>Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $where = array(
                                                            'ex_type'     =>    $sort3
                                                        );
                                                        if ($sort3 == "0") {
                                                            $where = array(
                                                                'ex_type'     !=    0
                                                            );
                                                        }
                                                        $expenses_details = $database->select_where('tbl_expenses',$where);
                                                        foreach ($expenses_details as $expenses_details_item) {
                                                            echo "
                                                         <tr>
                                                            <td>" . $expenses_details_item['ex_date'] . "</td>
                                                            <td>" . $expenses_details_item['ex_type'] . "</td>
                                                            <td>" . $expenses_details_item['ex_amount'] . "</td>
                                                            <td>" . $expenses_details_item['ex_notes'] . "</td>
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