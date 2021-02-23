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
      if (isset($_GET["inserted_record"])) {
        $success_message = 'Record is added to the Database!';
      }
      ?>
      <!-- partial -->
      <div class="main-panel" id="cardhover">
        <div class="content-wrapper">

          <?php
          if (isset($success_message)) {
            if (isset($_GET["inserted_records"]) || isset($_GET["inserted_record"])) {
              echo "
            <div class='alert alert-primary alert-dismissible' role='alert'>" . $success_message . "
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          </div>";
            }
            elseif (isset($_GET["deleted"])) {
              echo "
            <div class='alert alert-danger alert-dismissible' role='alert'>" . $success_message . "
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
          <div class="row">
            <!-- form row 1 -->
            <div class="col-md-4 grid-margin">
              <div class="card d-flex alig-content-end text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="<?php echo $server_name ?>assets/images/icons/group-meeting.png" alt="Board-Member-img">

                  <h5 class="card-title mt-3">Trustee Board Details</h5>
                  <a href="<?php echo $server_name ?>form_trustee-board-form.php" class="btn btn-primary py-3 mt-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin flip-card">
              <div class="text-center text-dark shadow-sm flip-card-inner" style="height : 100%;">
                <div class="card-body flip-card-front">
                  <img class="pt-4" src="<?php echo $server_name ?>assets/images/icons/shop.png" alt="Shop-img">
                  <h5 class="card-title mt-5">Rental Details</h5>
                </div>
                <div class="flip-card-back">
                  <div class="pt-5">
                    <p>
                      Click to open..
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_add-new-rental.php" class="btn btn-primary btn-md">Add new Rental</a>
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_add-payment.php" class="btn btn-primary btn-md">Add a payment</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="<?php echo $server_name ?>assets/images/icons/quran.png" alt="Quran-img">
                  <h5 class="card-title mt-3">Quran Madhrasa Registration Details</h5>
                  <a href="<?php echo $server_name ?>form_quran-registration-form.php" class="btn btn-primary py-3">Open..</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- form row 2 -->
            <div class="col-md-4 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="<?php echo $server_name ?>assets/images/icons/moon.png" alt="Head-Stone-img">
                  <h5 class="card-title mt-3">Janaza Details</h5>
                  <a href="<?php echo $server_name ?>form_janaza-details-form.php" class="btn btn-primary py-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin flip-card">
              <div class="text-center text-dark shadow-sm flip-card-inner" style="height : 100%;">
                <div class="card-body flip-card-front">
                  <img class="pt-4" src="<?php echo $server_name ?>assets/images/icons/online-donation.png" alt="Donate-img">
                  <h5 class="card-title mt-5">Donations</h5>
                </div>
                <div class="flip-card-back">
                  <div class="pt-4 pl-4">
                    <p>
                      Click to open..
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_disaster-relief-donations.php" class="float-left btn btn-primary btn-md ml-3">Disaster Relief Donations</a>
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_board-member-donations.php" class="btn btn-primary btn-md">Board Member Donations</a>
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_other-donations.php" class="btn btn-primary btn-md">Other Donations</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="<?php echo $server_name ?>assets/images/icons/member.png" alt="Member-img">
                  <h5 class="card-title mt-3">Member Details</h5>
                  <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="btn btn-primary py-3">Open..</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="<?php echo $server_name ?>assets/images/icons/wedding-couple.png" alt="Wedding-img">
                  <h5 class="card-title mt-3">Nikkah Details</h5>
                  <a href="<?php echo $server_name ?>form_nikkah-details-form.php" class="btn btn-primary py-3 mt-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin flip-card">
              <div class="text-center text-dark shadow-sm flip-card-inner" style="height : 100%;">
                <div class="card-body flip-card-front">
                  <img class="pt-4" src="<?php echo $server_name ?>assets/images/icons/muslim.png" alt="Priest-img">
                  <h5 class="card-title mt-5">Head Priest</h5>
                </div>
                <div class="flip-card-back">
                  <div class="pt-5">
                    <p>
                      Click to open..
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_pesh-imaam-details.php" class="btn btn-primary btn-md">Pesh Imaam Details</a>
                    </p>
                    <p>
                      <a href="<?php echo $server_name ?>form_muazzin-details.php" class="btn btn-primary btn-md">Muazzin Details</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="<?php echo $server_name ?>assets/images/icons/speech.png" alt="Speach-img">

                  <h5 class="card-title mt-3">Bhayan Details</h5>
                  <a href="<?php echo $server_name ?>form_bhayan-details.php" class="btn btn-primary py-3">Open..</a>
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