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
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Muazzin Details</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Muazzin Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Muazzin Details Form</h4>
                                    <form class="pt-3">
                                        <div class="form-group">
                                            <label for="inputName">Name </label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress1">Address Line 1 </label>
                                                <input type="text" class="form-control" id="inputAddress1" placeholder="Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Address Line 2 </label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Street Address">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress3">Address Line 3 </label>
                                                <input type="text" class="form-control" id="inputAddress3" placeholder="City">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputDistrict">District </label>
                                                <input type="text" class="form-control" id="inputDistrict" placeholder="District">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputNIC">National Identity Card </label>
                                                <input type="text" class="form-control" id="inputNIC" placeholder="NIC">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="form-label">Married Status</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusY" value="Yes" checked> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusN" value="No"> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputKids">No. of Kids </label>
                                                <input type="text" class="form-control" id="inputKids" placeholder="No. of Kids">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputMobile">Mobile Number </label>
                                                <input type="text" class="form-control" id="inputMobile" placeholder="07xxxxxxxx">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputHomeTP">Residential Contact </label>
                                                <input type="text" class="form-control" id="inputHomeTP" placeholder="011xxxxxxx">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAssignedDate">Assigned Date </label>
                                                <input type="date" class="form-control" id="inputAssignedDate">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputBasicSalary">Basic Salary </label>
                                                <input type="text" class="form-control" id="inputBasicSalary" placeholder="Basic Salary (Rs)">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" class="form-control" id="inputDateToday">
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes">Notes </label>
                                            <textarea class="form-control" id="inputNotes" rows="4"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">Enter Details</button>
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