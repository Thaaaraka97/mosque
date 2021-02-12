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
                        <h3 class="page-title"> Special Bhayan Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Special Bhayan Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Special Bhayan Details Form</h4>
                                    <form class="pt-3" method="POST" action="">
                                        <div class="form-group">
                                            <label for="inputTopic">Topic </label>
                                            <input type="text" class="form-control" id="inputTopic" name="inputTopic" placeholder="Topic" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Name </label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress"> Address </label>
                                            <textarea rows = "5" class="form-control" id="inputAddress" name="inputAddress" ></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputTP">Telephone Number </label>
                                                <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="Telephone" required >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputDate">Date </label>
                                                <input type="date" class="form-control" id="inputDate" name="inputDate" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputTime">Time </label>
                                                <input type="time" class="form-control" id="inputTime" name="inputTime" required>
                                            </div>
                                        </div>
                                        <p class="card-description"> Details of the Amount </p>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-group row col-md-6">
                                                <label for="inputAmountMeals" class="col-sm-4 col-form-label">Meals</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputAmountMeals" name="inputAmountMeals" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-group row col-md-6">
                                                <label for="inputAmountTransport" class="col-sm-4 col-form-label">Transport</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputAmountTransport" name="inputAmountTransport" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-group row col-md-6">
                                                <label for="inputAmountTea" class="col-sm-4 col-form-label">Tea & Coffee</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputAmountTea" name="inputAmountTea" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-group row col-md-6">
                                                <label for="inputAmountOther" class="col-sm-4 col-form-label">Other</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputAmountOther" name="inputAmountOther" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-lg" id="submitBhayan" name="submitBhayan">Enter</button>
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