<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$income = 0.00;
$expense = 0.00;
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
                        <table class="table table-data2">
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
                            foreach ($collection as $collection_item) {
                              echo "
                                <tr>
                                  <td>" . $collection_item['bill_type'] . "</td>
                                  <td> - </td>
                                  <td>" . $collection_item['bill_amountPaid'] . "</td>
                              </tr>
                                ";
                              $expense = (float)$expense + (float)$collection_item['bill_amountPaid'];
                            }
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
                            foreach ($collection4 as $collection4_item) {
                              echo "
                                <tr>
                                  <td> Donation - " . $collection4_item['d_donationType'] . " </td>
                                  <td> " . $collection4_item['d_amount'] . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                              $income = (float)$income + (float)$collection4_item['d_amount'];
                            }
                            foreach ($collection5 as $collection5_item) {
                              echo "
                                <tr>
                                  <td> Trusteeboard Donation </td>
                                  <td> " . $collection5_item['tbd_amount'] . " </td>
                                  <td> - </td>
                              </tr>
                                ";
                              $income = (float)$income + (float)$collection5_item['tbd_amount'];
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
                            foreach ($collection10 as $collection10_item) {
                              $basic = $collection10_item['mSal_basicSalary'];
                              $incentive = $collection10_item['mSal_incentive'];
                              $madrasa_fee = $collection10_item['mSal_madrasaFee'];
                              $epf = $collection10_item['mSal_EPFETF'];
                              $total = (float)$basic + (float)$incentive + (float)$madrasa_fee;
                              echo "
                                <tr>
                                  <td> Muazzin Salary </td>
                                  <td> - </td>
                                  <td>" . $total . "</td>
                              </tr>
                                ";
                              $expense = (float)$expense + (float)$total;
                            }
                            foreach ($collection11 as $collection11_item) {
                              $basic = $collection11_item['pSal_basicSalary'];
                              $incentive = $collection11_item['pSal_incentive'];
                              $madrasa_fee = $collection11_item['pSal_madrasaFee'];
                              $epf = $collection11_item['pSal_EPFETF'];
                              $bhayan = $collection11_item['pSal_specialBhayanFee'];
                              $total = (float)$basic + (float)$incentive + (float)$madrasa_fee + (float)$bhayan;
                              echo "
                                <tr>
                                  <td> Pesh Imaam Salary </td>
                                  <td> - </td>
                                  <td>" . $total . "</td>
                              </tr>
                                ";
                              $expense = (float)$expense + (float)$total;
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
                            foreach ($collection13 as $collection13_item) {
                              echo "
                                <tr>
                                  <td> Other Servant Salary </td>
                                  <td> - </td>
                                  <td>" . $collection13_item['oss_amount'] . "</td>
                              </tr>
                                ";
                              $expense = (float)$expense + (float)$collection13_item['oss_amount'];
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
                            foreach ($collection16 as $collection16_item) {
                              $meals = $collection16_item['sb_meals'];
                              $transport = $collection16_item['sb_transport'];
                              $tea = $collection16_item['sb_tea'];
                              $other = $collection16_item['sb_other'];
                              $total = (float)$meals + (float)$transport + (float)$tea + (float)$other;
                              echo "
                                <tr>
                                  <td> Special Bhayan Payment </td>
                                  <td> - </td>
                                  <td>" . $total . "</td>
                              </tr>
                                ";
                              $expense = (float)$expense + (float)$total;
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