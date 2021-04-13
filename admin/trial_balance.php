<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$income = 0.00;
$expense = 0.00;
$total_income = 0.00;
$total_expense = 0.00;
$before_income = 0.00;
$before_expense = 0.00;
$sort5 = 0;
$sort6 = 0;
if (isset($_GET['sort5'])) {
  $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
  $sort6 = $_GET['sort6'];
}


$collection = $database->select_dates('tbl_bills', 'bill_payedDate', $sort5, $sort6);
$collection2 = $database->select_dates('tbl_expenses', 'ex_date', $sort5, $sort6);
$collection3 = $database->select_dates('tbl_kanduricollection', 'kc_date', $sort5, $sort6);
$collection4 = $database->select_dates('tbl_donations', 'd_date', $sort5, $sort6);
$collection5 = $database->select_dates('tbl_trusteeboarddonation', 'tbd_date', $sort5, $sort6);
$collection6 = $database->select_dates('tbl_fridaycollectiondonation', 'fd_date', $sort5, $sort6);
$collection7 = $database->select_dates('tbl_fridaycollectionregular', 'fr_date', $sort5, $sort6);
$collection8 = $database->select_dates('tbl_funds', 'funds_date', $sort5, $sort6);
$collection9 = $database->select_dates('tbl_lailathulkadhrcollection', 'lk_date', $sort5, $sort6);
$collection10 = $database->select_dates('tbl_muazzinsalary', 'mSal_date', $sort5, $sort6);
$collection11 = $database->select_dates('tbl_peshimaamsalary', 'pSal_date', $sort5, $sort6);
$collection12 = $database->select_dates('tbl_nonmahallasaandhacollection', 'nms_date', $sort5, $sort6);
$collection13 = $database->select_dates('tbl_otherservantsalary', 'oss_date', $sort5, $sort6);
$collection14 = $database->select_dates('tbl_rentalincome', 'ri_date', $sort5, $sort6);
$collection15 = $database->select_dates('tbl_saandhacollection', 'collection_date', $sort5, $sort6);
$collection16 = $database->select_dates('tbl_specialbhyan', 'sb_date', $sort5, $sort6);
$collection17 = $database->select_dates('tbl_undiyalcollection', 'uc_date', $sort5, $sort6);

// get details upto the selected date
$before_collection = $database->select_dates('tbl_bills', 'bill_payedDate', '0', $sort5);
$before_collection2 = $database->select_dates('tbl_expenses', 'ex_date', '0', $sort5);
$before_collection3 = $database->select_dates('tbl_kanduricollection', 'kc_date', '0', $sort5);
$before_collection4 = $database->select_dates('tbl_donations', 'd_date', '0', $sort5);
$before_collection5 = $database->select_dates('tbl_trusteeboarddonation', 'tbd_date', '0', $sort5);
$before_collection6 = $database->select_dates('tbl_fridaycollectiondonation', 'fd_date', '0', $sort5);
$before_collection7 = $database->select_dates('tbl_fridaycollectionregular', 'fr_date', '0', $sort5);
$before_collection8 = $database->select_dates('tbl_funds', 'funds_date', '0', $sort5);
$before_collection9 = $database->select_dates('tbl_lailathulkadhrcollection', 'lk_date', '0', $sort5);
$before_collection10 = $database->select_dates('tbl_muazzinsalary', 'mSal_date', '0', $sort5);
$before_collection11 = $database->select_dates('tbl_peshimaamsalary', 'pSal_date', '0', $sort5);
$before_collection12 = $database->select_dates('tbl_nonmahallasaandhacollection', 'nms_date', '0', $sort5);
$before_collection13 = $database->select_dates('tbl_otherservantsalary', 'oss_date', '0', $sort5);
$before_collection14 = $database->select_dates('tbl_rentalincome', 'ri_date', '0', $sort5);
$before_collection15 = $database->select_dates('tbl_saandhacollection', 'collection_date', '0', $sort5);
$before_collection16 = $database->select_dates('tbl_specialbhyan', 'sb_date', '0', $sort5);
$before_collection17 = $database->select_dates('tbl_undiyalcollection', 'uc_date', '0', $sort5);
foreach ($before_collection as $before_collection_item) {
  $before_expense = (float)$before_expense + (float)$before_collection_item['bill_amountPaid'];
}
foreach ($before_collection2 as $before_collection2_item) {
  $before_expense = (float)$before_expense + (float)$before_collection2_item['ex_amount'];
}
foreach ($before_collection3 as $before_collection3_item) {
  $before_income = (float)$before_income + (float)$before_collection3_item['kc_amount'];
}
foreach ($before_collection4 as $before_collection4_item) {
  $before_income = (float)$before_income + (float)$before_collection4_item['d_amount'];
}
foreach ($before_collection5 as $before_collection5_item) {
  $before_income = (float)$before_income + (float)$before_collection5_item['tbd_amount'];
}
foreach ($before_collection6 as $before_collection6_item) {
  $before_income = (float)$before_income + (float)$before_collection6_item['fd_amount'];
}
foreach ($before_collection7 as $before_collection7_item) {
  $before_income = (float)$before_income + (float)$before_collection7_item['fr_amount'];
}
foreach ($before_collection8 as $before_collection8_item) {
  $before_income = (float)$before_income + (float)$before_collection8_item['funds_amount'];
}
foreach ($before_collection9 as $before_collection9_item) {
  $before_income = (float)$before_income + (float)$before_collection9_item['lk_amount'];
}
foreach ($before_collection10 as $before_collection10_item) {
  $basic = $before_collection10_item['mSal_basicSalary'];
  $incentive = $before_collection10_item['mSal_incentive'];
  $madrasa_fee = $before_collection10_item['mSal_madrasaFee'];
  $epf = $before_collection10_item['mSal_EPFETF'];
  $total = (float)$basic + (float)$incentive + (float)$madrasa_fee;
  $before_expense = (float)$before_expense + (float)$total;
}
foreach ($before_collection11 as $before_collection11_item) {
  $basic = $before_collection11_item['pSal_basicSalary'];
  $incentive = $before_collection11_item['pSal_incentive'];
  $madrasa_fee = $before_collection11_item['pSal_madrasaFee'];
  $epf = $before_collection11_item['pSal_EPFETF'];
  $bhayan = $before_collection11_item['pSal_specialBhayanFee'];
  $total = (float)$basic + (float)$incentive + (float)$madrasa_fee + (float)$bhayan;
  $before_expense = (float)$before_expense + (float)$total;
}
foreach ($before_collection12 as $before_collection12_item) {
  $before_income = (float)$before_income + (float)$before_collection12_item['nms_amount'];
}
foreach ($before_collection13 as $before_collection13_item) {
  $before_expense = (float)$before_expense + (float)$before_collection13_item['oss_amount'];
}
foreach ($before_collection14 as $before_collection14_item) {
  $before_income = (float)$before_income + (float)$before_collection14_item['ri_payment'];
}
foreach ($before_collection15 as $before_collection15_item) {
  $before_income = (float)$before_income + (float)$before_collection15_item['collection_paidAmount'];
}
foreach ($before_collection16 as $before_collection16_item) {
  $meals = $before_collection16_item['sb_meals'];
  $transport = $before_collection16_item['sb_transport'];
  $tea = $before_collection16_item['sb_tea'];
  $other = $before_collection16_item['sb_other'];
  $total = (float)$meals + (float)$transport + (float)$tea + (float)$other;
  $before_expense = (float)$before_expense + (float)$total;
}
foreach ($before_collection17 as $before_collection17_item) {
  $before_income = (float)$before_income + (float)$before_collection17_item['uc_amount'];
}
?>
<script type="text/javascript">
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
                          <h3 class="card-title top"> Monthly Report </h3>
                          <span class="top-span">AN-NOOR JUMMA MASJID</span>
                        </div>
                      </td>
                      <td>
                        <div class="text-right">
                          <button class="btn btn-primary btn-lg" id="monthlyReportPrint">Print</button>
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
                      <div class="table-responsive table-responsive-data2">
                        <div class="sorting">
                          <div class="row">
                            <div class="form-group col-md-3">
                              <label for="sortvillagersubdivision">From</label>
                              <input class="form-control" type="date" name="sortFrom" id="sortFrom" value="<?php echo $sort5 ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="sortvillagersubdivision">To</label>
                              <input class="form-control" type="date" name="sortTo" id="sortTo" value="<?php echo $sort6 ?>">
                            </div>
                          </div>
                        </div>
                        <table class="" id="monthly_report">
                          <thead>
                            <tr class="tr-shadow">
                              <th>Description</th>
                              <th>Income</th>
                              <th>Expenses</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Balance Carry Forward</td>
                              <td><?php echo (float)$before_income - (float)$before_expense ?></td>
                              <td>-</td>
                            </tr>
                            <?php
                            $collection_total = 0;
                            foreach ($collection as $collection_item) {
                              $expense = (float)$expense + (float)$collection_item['bill_amountPaid'];
                              $collection_total = $collection_total + (float)$collection_item['bill_amountPaid'];
                              $total_expense = $total_expense + (float)$collection_item['bill_amountPaid'];
                            }
                            if ($collection_total != 0) {
                              echo "
                                <tr>
                                  <td> Bills </td>
                                  <td> - </td>
                                  <td>" . $collection_total . "</td>
                              </tr>
                                ";
                            }
                            $collection2_total = 0;
                            foreach ($collection2 as $collection2_item) {
                              $expense = (float)$expense + (float)$collection2_item['ex_amount'];
                              $collection2_total = $collection2_total + (float)$collection2_item['ex_amount'];
                              $total_expense = $total_expense + (float)$collection2_item['ex_amount'];
                            }
                            if ($collection2_total != 0) {
                              echo "
                                <tr>
                                  <td> Expenses </td>
                                  <td> - </td>
                                  <td>" . $collection2_total . "</td>
                              </tr>
                                ";
                            }
                            $collection3_total = 0;
                            foreach ($collection3 as $collection3_item) {
                              $income = (float)$income + (float)$collection3_item['kc_amount'];
                              $collection3_total = $collection3_total + (float)$collection3_item['kc_amount'];
                              $total_income = $total_income + (float)$collection3_item['kc_amount'];
                            }
                            if ($collection3_total != 0) {
                              echo "
                                <tr>
                                  <td> Kanduri Collection </td>
                                  <td> " . $collection3_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection4_total = 0;
                            foreach ($collection4 as $collection4_item) {
                              $income = (float)$income + (float)$collection4_item['d_amount'];
                              $collection4_total = $collection4_total + (float)$collection4_item['d_amount'];
                              $total_income = $total_income + (float)$collection4_item['d_amount'];
                            }
                            if ($collection4_total != 0) {
                              echo "
                                <tr>
                                  <td> Donations  </td>
                                  <td> " . $collection4_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection5_total = 0;
                            foreach ($collection5 as $collection5_item) {
                              $income = (float)$income + (float)$collection5_item['tbd_amount'];
                              $collection5_total = $collection5_total + (float)$collection5_item['tbd_amount'];
                              $total_income = $total_income + (float)$collection5_item['tbd_amount'];
                            }
                            if ($collection5_total != 0) {
                              echo "
                                <tr>
                                  <td> Trusteeboard Donation </td>
                                  <td> " . $collection5_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection6_total = 0;
                            foreach ($collection6 as $collection6_item) {
                              $income = (float)$income + (float)$collection6_item['fd_amount'];
                              $collection6_total = $collection6_total + (float)$collection6_item['fd_amount'];
                              $total_income = $total_income + (float)$collection6_item['fd_amount'];
                            }
                            if ($collection6_total != 0) {
                              echo "
                                <tr>
                                  <td> Friday Collection Donation </td>
                                  <td> " . $collection6_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection7_total = 0;
                            foreach ($collection7 as $collection7_item) {
                              $income = (float)$income + (float)$collection7_item['fr_amount'];
                              $collection7_total = $collection7_total + (float)$collection7_item['fr_amount'];
                              $total_income = $total_income + (float)$collection7_item['fr_amount'];
                            }
                            if ($collection7_total != 0) {
                              echo "
                                <tr>
                                  <td> Friday Collection Regular </td>
                                  <td> " . $collection7_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection8_total = 0;
                            foreach ($collection8 as $collection8_item) {
                              $income = (float)$income + (float)$collection8_item['funds_amount'];
                              $collection8_total = $collection8_total + (float)$collection8_item['funds_amount'];
                              $total_income = $total_income + (float)$collection8_item['funds_amount'];
                            }
                            if ($collection8_total != 0) {
                              echo "
                                <tr>
                                  <td> Funds  </td>
                                  <td> " . $collection8_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection9_total = 0;
                            foreach ($collection9 as $collection9_item) {
                              $income = (float)$income + (float)$collection9_item['lk_amount'];
                              $collection9_total = $collection9_total + (float)$collection9_item['lk_amount'];
                            }
                            if ($collection9_total != 0) {
                              echo "
                                <tr>
                                  <td> Laylat al-Qadr Collection </td>
                                  <td> " . $collection9_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection10_total = 0;
                            foreach ($collection10 as $collection10_item) {
                              $basic = $collection10_item['mSal_basicSalary'];
                              $incentive = $collection10_item['mSal_incentive'];
                              $madrasa_fee = $collection10_item['mSal_madrasaFee'];
                              $epf = $collection10_item['mSal_EPFETF'];
                              $collection10_total = (float)$basic + (float)$incentive + (float)$madrasa_fee;
                              $expense = (float)$expense + (float)$collection10_total;
                              $total_expense = (float)$total_expense + (float)$collection10_total;
                            }
                            if ($collection10_total != 0) {
                              echo "
                                <tr>
                                  <td> Muazzin Salary </td>
                                  <td> - </td>
                                  <td>" . $collection10_total . "</td>
                              </tr>
                                ";
                            }
                            $collection11_total = 0;
                            foreach ($collection11 as $collection11_item) {
                              $basic = $collection11_item['pSal_basicSalary'];
                              $incentive = $collection11_item['pSal_incentive'];
                              $madrasa_fee = $collection11_item['pSal_madrasaFee'];
                              $epf = $collection11_item['pSal_EPFETF'];
                              $bhayan = $collection11_item['pSal_specialBhayanFee'];
                              $collection11_total = (float)$basic + (float)$incentive + (float)$madrasa_fee + (float)$bhayan;
                              $expense = (float)$expense + (float)$collection11_total;
                              $total_expense = (float)$total_expense + (float)$collection11_total;
                            }
                            if ($collection11_total != 0) {
                              echo "
                                <tr>
                                  <td> Pesh Imaam Salary </td>
                                  <td> - </td>
                                  <td>" . $collection11_total . "</td>
                              </tr>
                                ";
                            }
                            $collection12_total = 0;
                            foreach ($collection12 as $collection12_item) {
                              $income = (float)$income + (float)$collection12_item['nms_amount'];
                              $collection12_total = $collection12_total + (float)$collection12_item['nms_amount'];
                              $total_income = $total_income + (float)$collection12_item['nms_amount'];
                            }
                            if ($collection12_total != 0) {
                              echo "
                                <tr>
                                  <td> Non-Mahalla Saandha Collections </td>
                                  <td> " . $collection12_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection13_total = 0;
                            foreach ($collection13 as $collection13_item) {
                              $income = (float)$income + (float)$collection13_item['oss_amount'];
                              $collection13_total = $collection13_total + (float)$collection13_item['oss_amount'];
                              $total_income = $total_income + (float)$collection13_item['oss_amount'];
                            }
                            if ($collection13_total != 0) {
                              echo "
                                <tr>
                                  <td> Other Servant Salary </td>
                                  <td> - </td>
                                  <td>" . $collection13_total . "</td>
                              </tr>
                                ";
                            }
                            $collection14_total = 0;
                            foreach ($collection14 as $collection14_item) {
                              $income = (float)$income + (float)$collection14_item['ri_payment'];
                              $collection14_total = $collection14_total + (float)$collection14_item['ri_payment'];
                              $total_income = $total_income + (float)$collection14_item['ri_payment'];
                            }
                            if ($collection14_total != 0) {
                              echo "
                                <tr>
                                  <td> Rental Income </td>
                                  <td> " . $collection14_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection15_total = 0;
                            foreach ($collection15 as $collection15_item) {
                              $income = (float)$income + (float)$collection15_item['collection_paidAmount'];
                              $collection15_total = $collection15_total + (float)$collection15_item['collection_paidAmount'];
                              $total_income = $total_income + (float)$collection15_item['collection_paidAmount'];
                            }
                            if ($collection15_total != 0) {
                              echo "
                                <tr>
                                  <td> Saandha Collection </td>
                                  <td> " . $collection15_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            $collection16_total = 0;
                            foreach ($collection16 as $collection16_item) {
                              $meals = $collection16_item['sb_meals'];
                              $transport = $collection16_item['sb_transport'];
                              $tea = $collection16_item['sb_tea'];
                              $other = $collection16_item['sb_other'];
                              $collection16_total = (float)$meals + (float)$transport + (float)$tea + (float)$other;
                              $expense = (float)$expense + (float)$collection16_total;
                              $total_expense = (float)$total_expense + (float)$collection16_total;
                            }
                            if ($collection16_total != 0) {
                              echo "
                                <tr>
                                  <td> Special Bhayan Payment </td>
                                  <td> - </td>
                                  <td>" . $collection16_total . "</td>
                              </tr>
                                ";
                            }
                            $collection17_total = 0;
                            foreach ($collection17 as $collection17_item) {
                              $income = (float)$income + (float)$collection17_item['uc_amount'];
                              $collection17_total = $collection17_total + (float)$collection17_item['uc_amount'];
                              $total_income = $total_income + (float)$collection17_item['uc_amount'];
                            }
                            if ($collection17_total != 0) {
                              echo "
                                <tr>
                                  <td> Undiyal Collection </td>
                                  <td> " . $collection17_total . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                            }
                            echo "
                                <tr>
                                  <td> Total </td>
                                  <td> " . $total_income . " </td>
                                  <td> " . $total_expense . " </td>
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
<script>
  var collection_total = "<?php echo $collection_total; ?>";
  var collection2_total = "<?php echo $collection2_total; ?>";
  var collection3_total = "<?php echo $collection3_total; ?>";
  var collection4_total = "<?php echo $collection4_total; ?>";
  var collection5_total = "<?php echo $collection5_total; ?>";
  var collection6_total = "<?php echo $collection6_total; ?>";
  var collection7_total = "<?php echo $collection7_total; ?>";
  var collection8_total = "<?php echo $collection8_total; ?>";
  var collection9_total = "<?php echo $collection9_total; ?>";
  var collection10_total = "<?php echo $collection10_total; ?>";
  var collection11_total = "<?php echo $collection11_total; ?>";
  var collection12_total = "<?php echo $collection12_total; ?>";
  var collection13_total = "<?php echo $collection13_total; ?>";
  var collection14_total = "<?php echo $collection14_total; ?>";
  var collection15_total = "<?php echo $collection15_total; ?>";
  var collection16_total = "<?php echo $collection16_total; ?>";
  var collection17_total = "<?php echo $collection17_total; ?>";
  var total_income = "<?php echo $total_income; ?>";
  var total_expense = "<?php echo $total_expense; ?>";
  var before_income = "<?php echo $before_income; ?>";
  var before_expense = "<?php echo $before_expense; ?>";
</script>

</html>