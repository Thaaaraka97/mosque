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

$balance_before = (float)$_GET['before_income'] - (float)$_GET['before_expense'];
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
            <div class="top-spacing">
                <div class="wrapper">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="">
                                <div class="">
                                    <p class="date-top">Date : <?php echo date('Y/m/d'); ?></p>
                                    <div class="text-center">
                                        <table class="table table-bordered table-lg font-size-1-5 print-table" id="monthly_report_print">
                                            <thead>
                                                <tr class="tr-shadow">
                                                    <th class='text-dark font-weight-bold'>Description</th>
                                                    <th class='text-dark font-weight-bold'>Income</th>
                                                    <th class='text-dark font-weight-bold'>Expense</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class='text-dark text-left'>Balance Before</td>
                                                    <td class='text-dark'><?php echo number_format((float)$balance_before, 2, '.', '') ?></td>
                                                    <td class='text-dark'>-</td>
                                                </tr>
                                                <?php
                                                if ($_GET['collection_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Bills </td>
                                                        <td class='text-dark'> - </td>
                                                        <td class='text-dark'>" . number_format((float)$_GET['collection_total'], 2, '.', '') . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection2_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Expenses </td>
                                                        <td class='text-dark'> - </td>
                                                        <td class='text-dark'>" . number_format((float)$_GET['collection2_total'], 2, '.', '') . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection3_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Kanduri Collection </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection3_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                    ";
                                                }
                                                if ($_GET['collection4_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Donations  </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection4_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection5_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Trusteeboard Donation </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection5_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection6_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Friday Collection Donation </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection6_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection7_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Friday Collection Regular </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection7_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection8_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                      <td class='text-dark text-left'> Funds  </td>
                                                      <td class='text-dark'> " . number_format((float)$_GET['collection8_total'], 2, '.', '') . " </td>
                                                      <td class='text-dark'> - </td>
                                                    </tr>
                                                    ";
                                                }
                                                if ($_GET['collection9_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Laylat al-Qadr Collection </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection9_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection10_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Muazzin Salary </td>
                                                        <td class='text-dark'> - </td>
                                                        <td class='text-dark'>" . number_format((float)$_GET['collection10_total'], 2, '.', '') . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection11_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Pesh Imaam Salary </td>
                                                        <td class='text-dark'> - </td>
                                                        <td class='text-dark'>" . number_format((float)$_GET['collection11_total'], 2, '.', '') . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection12_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Non-Mahalla Saandha Collections </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection12_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection13_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Other Servant Salary </td>
                                                        <td class='text-dark'> - </td>
                                                        <td class='text-dark'>" . number_format((float)$_GET['collection13_total'], 2, '.', '') . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection14_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Rental Income </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection14_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection15_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Saandha Collection </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection15_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection16_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Special Bhayan Payment </td>
                                                        <td class='text-dark'> - </td>
                                                        <td class='text-dark'>" . number_format((float)$_GET['collection16_total'], 2, '.', '') . "</td>
                                                    </tr>
                                                        ";
                                                }
                                                if ($_GET['collection17_total'] != 0) {
                                                    echo "
                                                    <tr>
                                                        <td class='text-dark text-left'> Undiyal Collection </td>
                                                        <td class='text-dark'> " . number_format((float)$_GET['collection17_total'], 2, '.', '') . " </td>
                                                        <td class='text-dark'> - </td>
                                                    </tr>
                                                        ";
                                                }
                                                echo "
                                                <tr class='border-2px'>
                                                    <td class='text-dark font-weight-bold'> Total </td>
                                                    <td class='text-dark font-weight-bold'> " . number_format((float)$_GET['total_income'], 2, '.', ''). " </td>
                                                    <td class='text-dark font-weight-bold'> " . number_format((float)$_GET['total_expense'], 2, '.', '') . " </td>
                                                </tr>
                                                    ";

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p class="mt-4">*contact the relevant officers for any corrections</p>
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