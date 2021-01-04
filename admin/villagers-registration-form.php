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
                        <h3 class="page-title">Whole Villagers Registration</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Whole Villagers Registration</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Whole Villagers Registration Form</h4>
                                    <form class="pt-3" name="saandhaRegistrationForm" id="saandhaRegistrationForm">
                                        <div class="form-group">
                                            <label for="inputName">Name </label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputIndex">Index </label>
                                                <input type="text" class="form-control" name="inputIndex" placeholder="Index">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAge">Age </label>
                                                <input type="text" class="form-control" name="inputAge" placeholder="Age">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputDOB">Date of Birth </label>
                                                <input type="date" class="form-control" name="inputDOB">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress1">Address Line 1 </label>
                                                <input type="text" class="form-control" id="inputAddress1" name="inputAddress1" placeholder="Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Address Line 2 </label>
                                                <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Street Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress3">Address Line 3 </label>
                                            <input type="text" class="form-control" id="inputAddress3" name="inputAddress3" placeholder="City">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-2 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label">Sex</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSex" id="inputSex1" value="Male" checked> Male </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputSex" id="inputSex2" value="Female"> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputNIC">National Identity Card </label>
                                                <input type="text" class="form-control" id="inputNIC" name="inputNIC" placeholder="NIC">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision">Sub division </label>
                                                <input type="text" class="form-control" id="inputSubdivision" name="inputSubdivision" placeholder="Sub division">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputID">Membership ID </label>
                                                <input type="text" class="form-control" id="inputID" name="inputID" placeholder="Membership ID ">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputIncome">Personal Income </label>
                                                <input type="text" class="form-control" id="inputIncome" name="inputIncome" placeholder="Income (Rs)">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEduQual">Educational Qualifications</label>
                                                <select id="inputEduQual" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option value="University">University</option>
                                                    <option value="Technical College">Technical College</option>
                                                    <option value="None">None</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="college">
                                            <label for="inputCollege">College </label>
                                            <input type="text" class="form-control" id="inputCollege" name="inputCollege" placeholder="College">
                                        </div>
                                        <div class="text-center">
                                            <Submit class="btn btn-primary btn-lg" id="submitSaandha" name="submitSaandha">Enter Details</submit>
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