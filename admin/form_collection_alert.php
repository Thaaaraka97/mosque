<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
?>
<script type="text/javascript">
    var donationaction = "";
    var villageraction = "";
    var action = "";
    var fridaycollectionaction = "";
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

            if (isset($_GET["inserted_record"])) {
                $success_message = 'Alert message has been sent!';
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
                    }
                } 
                ?>
                    <div class="page-header">
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Payment</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Collection Alert Form</h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAlertIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputAlertIndexNo" name="inputAlertIndexNo" placeholder="Index No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAlertSubdivision"> Sub-division </label>
                                                <select id="inputAlertSubdivision" name="inputAlertSubdivision" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <?php
                                                    
                                                    foreach ($sub_division as $sub_division_item) {
                                                        echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAlertDate"> Date </label>
                                                <input type="date" class="form-control" id="inputAlertDate" name="inputAlertDate">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAlertCollector"> Collector </label>
                                                <select id="inputAlertCollector" name="inputAlertCollector" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <?php
                                                    
                                                    foreach ($collector as $collector_item) {
                                                        if ($collector_item["sc_username"] != "") {
                                                            echo "<option value='" . $collector_item["sc_username"] . "'>" . $collector_item["sc_username"] . "</option>";
                                                        }  
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="inputTP" id="inputTP">
                                        <input type="hidden" id="inputDuePayment" name="inputDuePayment">

                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="submitAlert" name="submitAlert">Generate Alert</button>
                                        </div>
                                    </form>
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