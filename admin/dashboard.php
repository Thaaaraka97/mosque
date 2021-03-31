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
        <div class="content-wrapper">

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
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Saandha Collector</h5>
                    <a href="<?php echo $server_name ?>form_saandha-collection.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary d-flex justify-content-center align-items-center">
                  <div class="number">
                    <h5>Saandha Collector Settlements</h5>
                    <a href="<?php echo $server_name ?>form_collector-settlement.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary d-flex justify-content-center align-items-center">
                  <div class="number">
                    <h5>Membership Details</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Friday Collection</h5>
                    <a href="<?php echo $server_name ?>form_friday-collection.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary d-flex justify-content-center align-items-center">
                  <div class="number">
                    <h5>Trusteeboard Details</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
              <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Bhayan Details</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
              <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Bills</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary d-flex justify-content-center align-items-center">
                  <div class="number">
                    <h5>Saandha Collector Registration</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
              <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Pesh Imaam Details</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
              <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Muazzin Details</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
              <div class="panel panel-primary">
                  <div class="number pt-3">
                    <h5>Priest Salary</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary d-flex justify-content-center align-items-center">
                  <div class="number">
                    <h5>Board Member Donations</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="board">
                <div class="panel panel-primary d-flex justify-content-center align-items-center">
                  <div class="number">
                    <h5>Non-Mahalla Saandha Collection</h5>
                    <a href="<?php echo $server_name ?>form_villagers-registration-form.php" class="">Open ...</a>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye fa-5x red"></i>
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