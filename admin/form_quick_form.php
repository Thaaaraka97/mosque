<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$famID = "";
if (isset($_GET['familyID'])) {
    $famID = 1;
}

if (isset($_GET['nodata'])) {
    $message = "No record on entered Family ID. Please Enter a Valid Family ID...!";
}
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
                    <?php
                    if (isset($_GET['nodata'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title">All Villagers Registration</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>dashboard.php"> Dashboard </a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Villagers Registration</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form class="pt-3" name="saandhaRegistrationForm" id="saandhaRegistrationForm" method="post">
                                        <h4 class="card-title">All Villagers Registration - Quick Form</h4>
                                        <div class="form-group">
                                            <label for="inputName"> Name </label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-4">
                                                    <div class="col-md-3 pt-2 d-flex align-items-center">
                                                        <label class="form-label"> Gender </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="M" checked> Male </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="F"> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputNIC">National Identity Card </label>
                                                <input type="text" class="form-control" id="inputNIC" name="inputNIC" placeholder="NIC">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDOB">Date of Birth </label>
                                                <input type="date" class="form-control" name="inputDOB" id="inputvillagerDOB">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAge">Age </label>
                                                <input type="text" class="form-control" name="inputAge" id="inputAge" placeholder="Age" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision"> Sub-division </label>
                                                <select id="inputSubdivision" name="inputSubdivision" class="form-control" required>
                                                    <option value="0" selected>Choose...</option>
                                                    <?php
                                                    $sub_division = $database->select_data('tbl_subdivision');
                                                    foreach ($sub_division as $sub_division_item) {
                                                        echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputResStatus">Residential Status</label>
                                                <select id="inputResStatus" name="inputResStatus" class="form-control" required>
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="Rent">Rent</option>
                                                    <option value="Permanant">Permanant</option>
                                                    <option value="Lease">Lease</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress"> Address </label>
                                            <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" required></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-4 pt-2 d-flex align-items-center t">
                                                        <label class="form-label"> Guardian ? </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianY" value="Yes" checked> Yes </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianN" value="No"> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="saandhaGuardian">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputGuardianID"> Guardian Index Number </label>
                                                    <input type="text" class="form-control" id="inputGuardianID" name="inputGuardianID" placeholder="Index No">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputGuardRelationship">Relationship to the Guardian</label>
                                                    <select id="inputGuardRelationship" name="inputGuardRelationship" class="form-control">
                                                        <option value="0" selected>Choose...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-4 pt-2 d-flex align-items-center">
                                                        <label class="form-label"> Saandha registered ? </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSaandhaStatus" id="inputSaandhaStatusY" value="Yes"> Yes </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSaandhaStatus" id="inputSaandhaStatusN" value="No" checked> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="saandhaAmountPrev">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputOutstandingSaaandhaDue"> Saandha - Outstanding Due </label>
                                                    <input type="text" class="form-control" id="inputOutstandingSaaandhaDue" name="inputOutstandingSaaandhaDue" placeholder="Amount (Rs)">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSpecialSaandha"> Saandha - Special Amount </label>
                                                    <input type="text" class="form-control" id="inputSpecialSaandha" name="inputSpecialSaandha" placeholder="Amount (Rs)">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputnoofChildren"> No. of Children </label>
                                                <input type="text" class="form-control" id="inputnoofChildren" name="inputnoofChildren" placeholder="No. of Children" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputnoofUnmarried"> No. of Unmarried Children </label>
                                                <input type="text" class="form-control" id="inputnoofUnmarried" name="inputnoofUnmarried" placeholder="No. of Unmarried Children" required>
                                            </div>
                                        </div>

                                        <div class="w-100 text-center">
                                            <input type="submit" class="btn btn-primary btn-lg" id="submitQuickForm" name="submitQuickForm" value="Submit">
                                        </div>
                                    </form>
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