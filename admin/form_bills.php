<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
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
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Bills </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bills</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title"> Bills Form</h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputBillType"> Bill Type </label>
                                                <select id="inputBillType" name="inputBillType" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="Current Bill">Current Bill</option>
                                                    <option value="Water Bill">Water Bill</option>
                                                    <option value="Telephone Bill">Telephone Bill</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputBillDate">Bill Date </label>
                                                <input type="date" class="form-control" id="inputBillDate" name="inputBillDate">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputOutAmount">Outstanding Amount </label>
                                                <input type="text" class="form-control" id="inputOutAmount" name="inputOutAmount" placeholder="Amount (Rs)">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPaidAmount">Paid Amount </label>
                                                <input type="text" class="form-control" id="inputPaidAmount" name="inputPaidAmount" placeholder="Amount (Rs)">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPaidDate">Paid Date </label>
                                                <input type="date" class="form-control" id="inputPaidDate" name="inputPaidDate">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="submitBills" name="submitBills">Enter</button>

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