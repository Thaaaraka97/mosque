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
                        <h3 class="page-title">Salary Details</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Salary Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form class="pt-3" method="post">
                                        <h4 class="card-title">Salary Details Form</h4>
                                        <div class="form-group col-md-12">
                                            <div class="form-group row pt-3">
                                                <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                    <label class="form-label"> Posting </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="inputPost" id="inputPostImaam" value="Pesh Imaam"> Pesh Imaam </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="inputPost" id="inputPostMuazzin" value="Muazzin"> Muazzin </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="salarydiv">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPriestIndexNo"> ID </label>
                                                    <select id="inputPriestIndexNo" name="inputPriestIndexNo" class="form-control">                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputBasicSalary"> Basic Salary </label>
                                                    <input type="text" class="form-control" id="inputBasicSalary" name="inputBasicSalary" placeholder="Salary" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group row col-md-6">
                                                    <label for="inputAmountMeals" class="col-sm-4 col-form-label"> Incentive </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="inputIncentive" name="inputIncentive" placeholder="Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group row col-md-6">
                                                    <label for="inputAmountTransport" class="col-sm-4 col-form-label"> Madhrasa Fee </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="inputMadrasaFee" name="inputMadrasaFee" placeholder="Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group row col-md-6">
                                                    <label for="inputAmountTea" class="col-sm-4 col-form-label"> Advance </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="inputAdvance" name="inputAdvance" placeholder="Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-group row col-md-6" id="specialbhyan">
                                                    <label for="inputAmountOther" class="col-sm-4 col-form-label"> Special Bhayan Fee</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="inputBhayanFee" name="inputBhayanFee" placeholder="Amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submitSalary" id="submitSalary" class="btn btn-primary btn-lg">Enter Details</button>
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