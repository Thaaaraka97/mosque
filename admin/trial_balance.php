<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$income = 0.00;
$expense = 0.00;
$where = array(
  'bill_id' != 0
);
$collection = $database->select_where('tbl_bills',$where);
$where2 = array(
  'ex_expenseId' != 0
);
$collection2 = $database->select_where('tbl_expenses',$where2);
$where3 = array(
  'kc_id' != 0
);
$collection3 = $database->select_where('tbl_kanduricollection',$where3);
$where4 = array(
  'd_id' != 0
);
$collection4 = $database->select_where('tbl_donations',$where4);
$where5 = array(
  'tbd_id' != 0
);
$collection5 = $database->select_where('tbl_trusteeboarddonation',$where5);
$where6 = array(
  'fd_id' != 0
);
$collection6 = $database->select_where('tbl_fridaycollectiondonation',$where6);
$where7 = array(
  'fr_id' != 0
);
$collection7 = $database->select_where('tbl_fridaycollectionregular',$where7);
$where8 = array(
  'funds_id' != 0
);
$collection8 = $database->select_where('tbl_funds',$where8);
$where9 = array(
  'lk_id' != 0
);
$collection9 = $database->select_where('tbl_lailathulkadhrcollection',$where9);
$where10 = array(
  'mSal_id' != 0
);
$collection10 = $database->select_where('tbl_muazzinsalary',$where10);
$where11 = array(
  'pSal_id' != 0
);
$collection11 = $database->select_where('tbl_peshimaamsalary',$where11);
$where12 = array(
  'nms_id' != 0
);
$collection12 = $database->select_where('tbl_nonmahallasaandhacollection',$where12);
$where13 = array(
  'oss_Id' != 0
);
$collection13 = $database->select_where('tbl_otherservantsalary',$where13);
$where14 = array(
  'ri_id' != 0
);
$collection14 = $database->select_where('tbl_rentalincome',$where14);
$where15 = array(
  'collection_id' != 0
);
$collection15 = $database->select_where('tbl_saandhacollection',$where15);
$where16 = array(
  'sb_id' != 0
);
$collection16 = $database->select_where('tbl_specialbhyan',$where16);
$where17 = array(
  'uc_id' != 0
);
$collection17 = $database->select_where('tbl_undiyalcollection',$where17);
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
                        <table class="table table-data2">
                          <thead>
                            <tr class="tr-shadow">
                              <th>Description</th>
                              <th>Income</th>
                              <th>Expenses</th>
                            </tr>
                          </thead>
                          <tbody>
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
                              $basic = $collection10_item['mSal_basicSalary'] ;
                              $incentive = $collection10_item['mSal_incentive'] ;
                              $madrasa_fee = $collection10_item['mSal_madrasaFee'] ;
                              $epf = $collection10_item['mSal_EPFETF'] ;
                              $total = (float)$basic + (float)$incentive + (float)$madrasa_fee + (float)$epf;
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
                              $basic = $collection11_item['pSal_basicSalary'] ;
                              $incentive = $collection11_item['pSal_incentive'] ;
                              $madrasa_fee = $collection11_item['pSal_madrasaFee'] ;
                              $epf = $collection11_item['pSal_EPFETF'] ;
                              $bhayan = $collection11_item['pSal_specialBhayanFee'] ;
                              $total = (float)$basic + (float)$incentive + (float)$madrasa_fee + (float)$epf + (float)$bhayan;
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
                            echo "income = ". $income . "<br>Expense = ".$expense;

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