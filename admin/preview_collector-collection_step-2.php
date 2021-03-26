<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$income = 0.00;
$expense = 0.00;
$username = $_GET['username'] ?? $_GET['username'];
$action = $_GET['action'] ?? $_GET['action'];
?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    
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
                    if (isset($_GET["updated"])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $success_message . "
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_villager-details.php?action=allvillagers">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
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
                                                    <?php
                                                    if ($action == "view") {
                                                        echo "<h3 class='card-title top'> Saandha Collector Collection Preview </h3>";
                                                    }
                                                    if ($action == "edit") {
                                                        echo "<h3 class='card-title top'> Saandha Collector Collection (Edit) </h3>";
                                                    }
                                                    ?>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collections">
                        <?php
                        $where2 = array(
                            'ex_username' => $username
                        );
                        $collection2 = $database->select_where('tbl_expenses', $where2);
                        $where3 = array(
                            'kc_username' => $username
                        );
                        $collection3 = $database->select_where('tbl_kanduricollection', $where3);
                        $where6 = array(
                            'fd_username' => $username
                        );
                        $collection6 = $database->select_where('tbl_fridaycollectiondonation', $where6);
                        $where7 = array(
                            'fr_username' => $username
                        );
                        $collection7 = $database->select_where('tbl_fridaycollectionregular', $where7);
                        $where8 = array(
                            'funds_username' => $username
                        );
                        $collection8 = $database->select_where('tbl_funds', $where8);
                        $where9 = array(
                            'lk_username' => $username
                        );
                        $collection9 = $database->select_where('tbl_lailathulkadhrcollection', $where9);
                        $where12 = array(
                            'nms_username' => $username
                        );
                        $collection12 = $database->select_where('tbl_nonmahallasaandhacollection', $where12);
                        $where14 = array(
                            'ri_username' => $username
                        );
                        $collection14 = $database->select_where('tbl_rentalincome', $where14);
                        $where15 = array(
                            'collection_username' => $username
                        );
                        $collection15 = $database->select_where('tbl_saandhacollection', $where15);
                        $where17 = array(
                            'uc_username' => $username
                        );
                        $collection17 = $database->select_where('tbl_undiyalcollection', $where17);
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                            <th>Description</th>
                                                            <th>Collection</th>
                                                            <th>Expenses</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($collection2 as $collection2_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Expenses - " . $collection2_item['ex_type'] . "</td>
                                                                <td> - </td>
                                                                <td>" . $collection2_item['ex_amount'] . "</td>
                                                            </tr>
                                                              ";
                                                            $expense = (float)$expense + (float)$collection2_item['ex_amount'];
                                                        }
                                                        foreach ($collection3 as $collection3_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Kanduri Collection </td>
                                                                <td> " . $collection3_item['kc_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection3_item['kc_amount'];
                                                        }
                                                        foreach ($collection6 as $collection6_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Friday Collection Donation </td>
                                                                <td> " . $collection6_item['fd_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection6_item['fd_amount'];
                                                        }
                                                        foreach ($collection7 as $collection7_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Friday Collection Regular </td>
                                                                <td> " . $collection7_item['fr_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection7_item['fr_amount'];
                                                        }
                                                        foreach ($collection8 as $collection8_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Funds - " . $collection8_item['funds_type'] . " </td>
                                                                <td> " . $collection8_item['funds_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection8_item['funds_amount'];
                                                        }
                                                        foreach ($collection9 as $collection9_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Laylat al-Qadr Collection </td>
                                                                <td> " . $collection9_item['lk_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection9_item['lk_amount'];
                                                        }
                                                        foreach ($collection12 as $collection12_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Non-Mahalla Saandha Collections </td>
                                                                <td> " . $collection12_item['nms_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection12_item['nms_amount'];
                                                        }
                                                        foreach ($collection14 as $collection14_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Rental Income </td>
                                                                <td> " . $collection14_item['ri_payment'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection14_item['ri_payment'];
                                                        }
                                                        foreach ($collection15 as $collection15_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Saandha Collection </td>
                                                                <td> " . $collection15_item['collection_paidAmount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection15_item['collection_paidAmount'];
                                                        }
                                                        foreach ($collection17 as $collection17_item) {
                                                            echo "
                                                              <tr>
                                                                <td> Undiyal Collection </td>
                                                                <td> " . $collection17_item['uc_amount'] . " </td>
                                                                <td> - </td>
                                                            </tr>
                                                              ";
                                                            $income = (float)$income + (float)$collection17_item['uc_amount'];
                                                        }
                                                        echo "income = " . $income . "<br>Expense = " . $expense;

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