<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
?>

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
      if (isset($_GET["deleted"])) {
        $success_message = 'Record Deleted';
      }
      if (isset($_GET["inserted_records"])) {
        $success_message = 'All the records are added to the Database!';
      }
      if (isset($_GET["inserted_records_villagers"])) {
        $data_from_villagers = $database->select_data('tbl_allvillagers');
        foreach ($data_from_villagers as $data_from_villagers_item) {
          if (isset($data_from_villagers_item["av_index"])) {
            $index = $data_from_villagers_item["av_index"];
            $name = $data_from_villagers_item["av_name"];
          }
        }
        $success_message = 'All the records are added to the Database! <br><strong>' . $index . '</strong> is the registered <strong>Index</strong> of ' . $name;
      }
      if (isset($_GET["inserted_record"])) {
        $success_message = 'Record is added to the Database!';
      }
      if (isset($_GET["updated"])) {
        $success_message = 'Record is updated successfully..!';
      }
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" id="cardhover">

          <?php
          if (isset($success_message)) {
            if (isset($_GET["inserted_records"]) || isset($_GET["inserted_record"])) {
              echo "
            <div class='alert alert-success alert-dismissible' role='alert'>" . $success_message . "
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
            } elseif (isset($_GET["inserted_records_villagers"])) {
              echo "
            <div class='alert alert-success alert-dismissible' role='alert'>" . $success_message . "
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
            } elseif (isset($_GET["deleted"])) {
              echo "
              <div class='alert alert-danger alert-dismissible' role='alert'>" . $success_message . "
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            } elseif (isset($_GET["updated"])) {
              echo "
              <div class='alert alert-warning alert-dismissible' role='alert'>" . $success_message . "
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
          }
          ?>

          <div class="page-header">
            <h3 class="page-title"> Forms </h3>

          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/member.png" alt="Member-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5>Member Details</h5>
                    <p>Register village memebers and the Families to the Database ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="btn btn-lg btn-primary">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/wedding-couple.png" alt="Wedding-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5>Nikkah Details</h5>
                    <p>Register Weddings performed by the Mosque to the Database ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_nikkah-details-form.php" class="btn btn-lg btn-primary">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/group-meeting.png" alt="Board-Member-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5>Trustee Board Details</h5>
                    <p>Select this year's Trusteeboard ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_trustee-board-form.php" class="btn btn-lg btn-primary">Open..</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/quran.png" alt="Quran-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5>Quran Madhrasa Registration Details</h5>
                    <p> Register new Students for Quran Madrasa Education ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_quran-registration-form.php" class="btn btn-lg btn-primary py-3">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/moon.png" alt="Head-Stone-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5>Janaza Details</h5>
                    <p> Funeral Details ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_janaza-details-form.php" class="btn btn-lg btn-primary py-3">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/speech.png" alt="Speach-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5>Bhayan Details</h5>
                    <p> Enter Special Bhayan Details ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_bhayan-details.php" class="btn btn-lg btn-primary py-3">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/bills.png" alt="Bills-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5> Bills </h5>
                    <p> Enter Bills Details ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_bills.php" class="btn btn-lg btn-primary py-3">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body text-center d-flex align-items-center">
                  <div class="float-left col-md-4 align-middle">
                    <img src="assets/images/icons/expenses.png" alt="Expenses-img">
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <h5> Expenses </h5>
                    <p> Enter Other Expenses ...</p>
                  </div>
                  <div class="float-left col-md-4 align-middle">
                    <a href="<?php echo $server_name ?>form_expenses.php" class="btn btn-lg btn-primary py-3">Open..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 2 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/muslim.png" alt="Priest-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> New Pesh Imaam </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_pesh-imaam-details.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> New Muazzin </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_muazzin-details.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 2 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/salary.png" alt="Expenses-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Head Priest Salary </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_salary.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Other Servant Salary </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_other-servant-salary.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 2 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/membership.png" alt="Membership-card-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Saandha Collector Registration </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_saandha-collector-registration.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Non-Mahalla Saandha Registration </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_nonmahalla-saandha-registration.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 2 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/kanji.png" alt="Kanji-mug-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Kanji Ingredients List </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>kanji_ingredients.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Kanji List </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>kanji_people.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 3 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/shop.png" alt="Shop-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Add New Rental Places </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_rental-places.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5>Register New Rental</h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_new-rental-registration.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5>Make a Payment</h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_add-payment.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 3 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/online-donation.png" alt="Donate-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Disaster Relief Donations </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_disaster-relief-donations.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Board Member Donations </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_board-member-donations.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Other Donations </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_other-donations.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 5 rows -->
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body d-flex justify-content-center">
                  <div class="float-left col-md-4 d-flex justify-content-center align-self-center">
                    <img src="assets/images/icons/funding.png" alt="Collection-img">
                  </div>
                  <div class=" float-left col-md-8">
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Friday Collection </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_friday-collection.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Kanduri Collection </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_kanduri-collection.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Undiyal Collection </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_undiyal-collection.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Laylat al-Qadr Collection </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_lailathul-kadhir-collection.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Saandha Collection </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_saandha-collection.php" class="btn btn-lg btn-primary">Open..</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <h5> Funds </h5>
                      </div>
                      <div class="col-md-6 d-flex justify-content-center align-self-center">
                        <a href="<?php echo $server_name ?>form_funds-collection.php" class="btn btn-lg btn-primary">Open..</a>
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