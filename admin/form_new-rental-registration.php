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
                        <h3 class="page-title"> New Rental </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Rental</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">New Rental Form</h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision"> Sub-division </label>
                                                <select id="inputnewRentalSubdivision" name="inputnewRentalSubdivision" class="form-control">
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
                                                <label for="inputTP">Telephone Number </label>
                                                <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="077xxxxxxx" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Name </label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" readonly>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputNewRentalType">Rental Type</label>
                                                <select id="inputNewRentalType" name="inputNewRentalType" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="Land">Land</option>
                                                    <option value="House">House</option>
                                                    <option value="Shop">Shop</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6" id="rentalPlace">
                                                <label for="inputRentalPlace"> Rental Place </label>
                                                <select id="inputRentalPlace" name="inputRentalPlace" class="form-control">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDownPayment">Down Payment </label>
                                                <input type="text" class="form-control" id="inputDownPayment" name="inputDownPayment" placeholder="Down Payment (Rs)">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputRentalDuration">Rental Duration</label>
                                                <select id="inputRentalDuration" name="inputRentalDuration" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="6">6 months</option>
                                                    <option value="12">12 months</option>
                                                    <option value="24">24 months</option>
                                                    <option value="36">36 months</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6" id="inputRentalMonthsDiv">
                                                <label for="inputRentalMonths"> Enter Rental Duration (in months) </label>
                                                <input type="text" class="form-control" id="inputRentalMonths" name="inputRentalMonths" placeholder=" Duration ">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputRentalStartDate">Rental Start Date </label>
                                                <input type="date" class="form-control" id="inputRentalStartDate" name="inputRentalStartDate">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputRentalEndDate">Rental End Date </label>
                                                <input type="text" class="form-control" id="inputRentalEndDate" name="inputRentalEndDate" placeholder="End Date" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">

                                                    <div class="col-md-2 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label">Lease</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputLease" id="inputLeaseY" value="Yes"> Yes </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputLease" id="inputLeaseN" value="No" checked> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6" id="lease">
                                                <label for="inputTP">Lease Amount </label>
                                                <input type="text" class="form-control" id="inputLeaseAmount" name="inputLeaseAmount" placeholder="Amount">
                                            </div>
                                            <div class="form-group col-md-6" id="monthlyPayment">
                                                <label for="inputTP">Monthly Payment Amount </label>
                                                <input type="text" class="form-control" id="inputMonthlyAmount" name="inputMonthlyAmount" placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes">Notes </label>
                                            <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4"></textarea>
                                        </div>
                                        <input type="hidden" name="inputAddress" id="inputAddress">
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="submitNewRental" name="submitNewRental">Add Rental</button>
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