<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/header.php";
?>

<body>
  <div class="container-scroller">
    <!-- navigation bar -->
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/navbar.php";
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- top bar -->
      <?php

      include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/topbar.php";
      ?>
      <!-- partial -->
      <div class="main-panel" id="cardhover">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Forms </h3>

          </div>
          <div class="row">
            <!-- forms body -->
            <div class="col-md-3 grid-margin">
              <div class="card d-flex alig-content-end text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="/mosque/admin/assets/images/icons/group-meeting.png" alt="Trustee Board">

                  <h5 class="card-title mt-3">Trustee Board Details</h5>
                  <a href="/mosque/admin/trustee-board-form.php" class="btn btn-primary py-3 mt-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin flip-card">
              <div class="text-center text-dark shadow-sm flip-card-inner" style="height : 100%;">
                <div class="card-body flip-card-front">
                  <img class="pt-4" src="/mosque/admin/assets/images/icons/shop.png" alt="Trustee Board">

                  <h5 class="card-title mt-5">Rental Details</h5>
                </div>
                <div class="flip-card-back">
                  <div class="pt-5">
                    <p>
                      Click to open..
                    </p>
                    <p>
                      <a href="/mosque/admin/add-new-rental.php" class="btn btn-primary btn-md">Add new Rental</a>
                    </p>
                    <p>
                      <a href="/mosque/admin/add-payment.php" class="btn btn-primary btn-md">Add a payment</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="/mosque/admin/assets/images/icons/quran.png" alt="Trustee Board">

                  <h5 class="card-title mt-3">Quran Madhrasa Registration Details</h5>
                  <a href="/mosque/admin/quran-registration-form.php" class="btn btn-primary py-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="/mosque/admin/assets/images/icons/wedding-couple.png" alt="Trustee Board">

                  <h5 class="card-title mt-3">Nikkah Details</h5>
                  <a href="/mosque/admin/nikkah-details-form.php" class="btn btn-primary py-3 mt-3">Open..</a>
                </div>
              </div>
            </div>


          </div>
          <div class="row">
            <!-- forms body -->
            <div class="col-md-3 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="/mosque/admin/assets/images/icons/moon.png" alt="Trustee Board">

                  <h5 class="card-title mt-3">Janaza Details</h5>
                  <a href="/mosque/admin/janaza-details-form.php" class="btn btn-primary py-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin">
              <div class="card text-center text-dark shadow-sm" style="height : 100%;">
                <div class="card-body">
                  <img src="/mosque/admin/assets/images/icons/member.png" alt="Member">

                  <h5 class="card-title mt-3">Saandha Registration Details</h5>
                  <a href="/mosque/admin/saandha-registration-form.php" class="btn btn-primary py-3">Open..</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin flip-card">
              <div class="text-center text-dark shadow-sm flip-card-inner" style="height : 100%;">
                <div class="card-body flip-card-front">
                  <img class="pt-4" src="/mosque/admin/assets/images/icons/online-donation.png" alt="Trustee Board">

                  <h5 class="card-title mt-5">Donations</h5>
                </div>
                <div class="flip-card-back">
                  <div class="pt-4">
                    <p>
                      Click to open..
                    </p>
                    <p>
                      <a href="/mosque/admin/disaster-relief-donations.php" class="btn btn-primary btn-md">Disaster Relief Donations</a>
                    </p>
                    <p>
                      <a href="/mosque/admin/other-donations.php" class="btn btn-primary btn-md">Other Donations</a>
                    </p>
                  </div>


                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin flip-card">
              <div class="text-center text-dark shadow-sm flip-card-inner" style="height : 100%;">
                <div class="card-body flip-card-front">
                  <img class="pt-4" src="/mosque/admin/assets/images/icons/muslim.png" alt="Trustee Board">

                  <h5 class="card-title mt-5">Head Priest</h5>
                </div>
                <div class="flip-card-back">
                  <div class="pt-4">
                    <p>
                      Click to open..
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-md">Pesh Imaam Details</a>
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-md">Muazzin Details</a>
                    </p>
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

  include "$server_name/mosque/admin/template_parts/footer.php";
  ?>
  <!-- End custom js for this page -->
</body>

</html>