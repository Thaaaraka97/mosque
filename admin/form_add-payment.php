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
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
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
                                    <h4 class="card-title">New Payment Form</h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputRentalPaymentSubdivision"> Sub-division </label>
                                                <select id="inputRentalPaymentSubdivision" name="inputRentalPaymentSubdivision" class="form-control">
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
                                                <label for="inputRentalPaymentTP">Telephone Number </label>
                                                <input type="text" class="form-control" id="inputRentalPaymentTP" name="inputRentalPaymentTP" placeholder="077xxxxxxx">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputName">Name </label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" readonly>
                                            </div>
                                        </div>
                                        <div id="form-row">
                                            <div class="form-group">
                                                <label for="inputAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" readonly></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputRentalType">Rental Type</label>
                                                <select id="inputRentalType" name="inputRentalType" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="Land">Land</option>
                                                    <option value="House">House</option>
                                                    <option value="Shop">Shop</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputRentalID">Rental ID</label>
                                                <select id="inputRentalID" name="inputRentalID" class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPreviousDue"> Previous Due Amount </label>
                                                <input type="text" class="form-control" id="inputPreviousDue" name="inputPreviousDue" placeholder="Due Amount (Rs)" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPayment"> Payment </label>
                                                <input type="text" class="form-control" id="inputPayment" name="inputPayment" placeholder="Payment (Rs)">
                                            </div>

                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes">Notes </label>
                                            <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4"></textarea>
                                        </div>
                                        <input type="hidden" name="payedFor" id="payedFor">
                                        <input type="hidden" id="inputDuePayment" name="inputDuePayment">

                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="submitRentalPayment" name="submitRentalPayment">Add Payment</button>
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