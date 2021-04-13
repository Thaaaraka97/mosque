<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
if (isset($_GET['left'])) {
    $message = "Record successsfully updated..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successsfully Edited and Updated..!";
} elseif (isset($_GET['saandha'])) {
    $message = "Saandha Status successsfully Edited and Updated..!";
}

if (isset($_GET['list'])) {
    $list = $_GET['list'];
}

$kanji_ingredients = $database->select_data('tbl_kanjiingredients');
$kanji_people = $database->select_data('tbl_kanjipeople');
$i = 1;
$j = 1;
?>
<style>
    table.dataTable.no-footer {
        border-bottom: 0;
    }

    .table-data2.table tbody tr td:last-child {
        padding-right: 0;
    }

    body,
    html {
        background-color: white;
    }

    .card-body {
        background-color: #f6f6f6;
        border-radius: 30px;

    }

    .card {
        border-radius: 30px;
        border-width: 1px;
    }
</style>

<body>
    <div class="mt-8">
        <!-- partial -->
        <div class="">
            <!-- partial -->
            <div class="">
                <div class="wrapper">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td class="pl-5">
                                                <div>
                                                    <h3 class='card-title top'> Monthly Report </h3>
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
                        <div class="col-md-8">
                            <div class="">
                                <div class="">
                                    <div class="text-center">
                                        <table class="table table-bordered table-lg" id="ingredients">
                                            <thead>
                                                <tr class="tr-shadow">
                                                    <th>Description</th>
                                                    <th>Income</th>
                                                    <th>Expense</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class='text-dark font-weight-bold'>Balance Carry Forward</td>
                                                    <td class='text-dark font-weight-bold'><?php echo (float)$_GET['before_income'] - (float)$_GET['before_expense'] ?></td>
                                                    <td class='text-dark font-weight-bold'>-</td>
                                                </tr>
                                                <?php
                                                if ($_GET['collection_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Bills </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                        <td class='text-dark font-weight-bold'>" . $_GET['collection_total'] . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection2_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Expenses </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                        <td class='text-dark font-weight-bold'>" . $_GET['collection2_total'] . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection3_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Kanduri Collection </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection3_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                    ";
                                                }
                                                if ($_GET['collection4_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Donations  </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection4_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection5_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Trusteeboard Donation </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection5_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection6_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Friday Collection Donation </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection6_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection7_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Friday Collection Regular </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection7_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection8_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                      <td class='text-dark font-weight-bold'> Funds  </td>
                                                      <td class='text-dark font-weight-bold'> " . $_GET['collection8_total'] . " </td>
                                                      <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                    ";
                                                }
                                                if ($_GET['collection9_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Laylat al-Qadr Collection </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection9_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection10_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Muazzin Salary </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                        <td class='text-dark font-weight-bold'>" . $_GET['collection10_total'] . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection11_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Pesh Imaam Salary </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                        <td class='text-dark font-weight-bold'>" . $_GET['collection11_total'] . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection12_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Non-Mahalla Saandha Collections </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection12_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection13_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Other Servant Salary </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                        <td class='text-dark font-weight-bold'>" . $_GET['collection13_total'] . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection14_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Rental Income </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection14_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection15_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Saandha Collection </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection15_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection16_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Special Bhayan Payment </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                        <td class='text-dark font-weight-bold'>" . $_GET['collection16_total'] . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection17_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark font-weight-bold'> Undiyal Collection </td>
                                                        <td class='text-dark font-weight-bold'> " . $_GET['collection17_total'] . " </td>
                                                        <td class='text-dark font-weight-bold'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                echo "
                                                <tr>
                                                    <td class='text-dark font-weight-bold'> Total </td>
                                                    <td class='text-dark font-weight-bold'> " . $_GET['total_income'] . " </td>
                                                    <td class='text-dark font-weight-bold'> " . $_GET['total_expense'] . " </td>
                                                </tr>
                                                    ";

                                                ?>
                                            </tbody>
                                        </table>
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
    </div>
    <!-- container-scroller -->

    <!-- footer -->
    <script src="<?php $server_name ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</body>

<script type="text/javascript">
    window.onload = function() {
        window.print();
    }
</script>

</html>