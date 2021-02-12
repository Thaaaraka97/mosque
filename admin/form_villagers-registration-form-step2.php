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
                        <h3 class="page-title">All Villagers Registration</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Villagers Registration</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form class="pt-3" name="saandhaRegistrationFormStep2" id="saandhaRegistrationFormStep2" method="post">
                                        <div id="resetSection">
                                            <div id="saandhaStep1">
                                                <h4 class="card-title">Personal Details</h4>
                                                <div class="form-group">
                                                    <label for="inputName"> Name </label>
                                                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Gender </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="M" checked> Male </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="F"> Female </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Is an Orphan Child </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputOrphan" id="inputOrphanY" value="Yes"> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputOrphan" id="inputOrphanN" value="No" checked> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputNIC">National Identity Card </label>
                                                        <input type="text" class="form-control" id="inputNIC" name="inputNIC" placeholder="NIC">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputDOB">Date of Birth </label>
                                                        <input type="date" class="form-control" name="inputDOB">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputAge">Age </label>
                                                        <input type="text" class="form-control" name="inputAge" placeholder="Age">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTP">Telephone Number </label>
                                                        <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="077xxxxxxx">
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Is a Guardian </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianY" value="Yes" checked> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputGuardianStatus" id="inputGuardianN" value="No"> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6" id="saandhaGuardian">
                                                        <label for="inputGuardianID"> Guardian Index Number </label>
                                                        <input type="text" class="form-control" id="inputGuardianID" name="inputGuardianID" placeholder="Index No" value="0">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEduQual">Educational Qualifications</label>
                                                        <select value="0" id="inputEduQual" name="inputEduQual" class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option value="O/L">O/L</option>
                                                            <option value="A/L">A/L</option>
                                                            <option value="University">University</option>
                                                            <option value="Technical College">Technical College</option>
                                                            <option value="Teaching College">Teaching College</option>
                                                            <option value="Foreign Education">Foreign Education</option>
                                                            <option value="None">None</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddQual">Additional Qualifications</label>
                                                        <select id="inputAddQual" name="inputAddQual" class="form-control">
                                                            <option value="0" selected>Choose...</option>
                                                            <option value="Tailoring">Tailoring</option>
                                                            <option value="Automobile Mechanic">Automobile Mechanic</option>
                                                            <option value="A/C Mechanic">A/C Mechanic</option>
                                                            <option value="Carpenter">Carpenter</option>
                                                            <option value="Gem Cutting">Gem Cutting</option>
                                                            <option value="Mason">Mason</option>
                                                            <option value="Electrician">Electrician</option>
                                                            <option value="Plumbing">Plumbing</option>
                                                            <option value="Farming">Farming</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="college">
                                                    <label for="inputCollege">College </label>
                                                    <input type="text" class="form-control" id="inputCollege" name="inputCollege" placeholder="College">
                                                </div>
                                                <div class="w-100 text-right">
                                                    <button class="btn btn-primary btn-lg" id="avNext1">Next</button>
                                                </div>
                                            </div>
                                            <div id="saandhaStep2">
                                                <h4 class="card-title">Education</h4>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Is Student </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputStudent" id="inputStudentY" value="Yes"> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputStudent" id="inputStudentN" value="No" checked> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="avStudent">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputMedium">Medium</label>
                                                            <select id="inputMedium" name="inputMedium" class="form-control">
                                                                <option  value="0" selected>Choose...</option>
                                                                <option value="Tamil">Tamil</option>
                                                                <option value="English">English</option>
                                                                <option value="Sinhala">Sinhala</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputGrade"> Grade </label>
                                                            <input type="text" class="form-control" name="inputGrade" id="inputGrade" placeholder="Grade"  value="0">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                    <label class="form-label"> Scholarship Status </label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputSchol" id="inputScholY" value="Yes"> Receiving </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputSchol" id="inputScholN" value="No" checked> Not Receiving </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6" id="inputScholIncomeDiv">
                                                            <label for="inputScholIncome"> Scholarship Income </label>
                                                            <input type="text" class="form-control" id="inputScholIncome" name="inputScholIncome" placeholder="Scholarship Income"  value="0">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                    <label class="form-label"> Is a Madhrasa Student </label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputMad" id="inputMadY" value="Yes"> Yes </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputMad" id="inputMadN" value="No" checked> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="madhrasa">
                                                        <div class="form-group form-row">
                                                            <div class="form-group col-md-6" id="inputMadType">
                                                                <label for="inputMadType"> Madhrasa Type </label>
                                                                <select id="inputMadType" name="inputMadType" class="form-control">
                                                                    <option value="0" selected>Choose...</option>
                                                                    <option value="Tamil">Kithah</option>
                                                                    <option value="English">Hiful</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputMadName"> Madhrasa Name </label>
                                                                <input type="text" class="form-control" id="inputMadName" name="inputMadName" placeholder="Madhrasa Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputMadStart"> Madhrasa Start Date </label>
                                                                <input type="date" class="form-control" id="inputMadStart" name="inputMadStart" value="0001-01-01">
                                                            </div>
                                                            <div class="form-group col-md-6" id="inputMadExpense">
                                                                <label for="inputMadExpense"> Average monthly Expenses </label>
                                                                <input type="text" class="form-control" id="inputMadExpense" name="inputMadExpense" placeholder="Average monthly Expenses" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 text-right">
                                                    <button class="btn btn-success btn-lg" id="avPrev2">Previous</button>
                                                    <button class="btn btn-primary btn-lg" id="avNext2">Next</button>
                                                </div>
                                            </div>
                                            <div id="saandhaStep3">
                                                <h4 class="card-title"> Marital Details </h4>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Is Married </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMarried" id="inputMarriedY" value="Yes"> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputMarried" id="inputMarriedN" value="No" checked> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="married">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                    <label class="form-label"> Divorsed </label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputDivorsed" id="inputDivorsedY" value="Yes"> Yes </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputDivorsed" id="inputDivorsedN" value="No" checked> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row pt-3">
                                                                <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                    <label class="form-label"> Widowed </label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputWidowed" id="inputWidowedY" value="Yes"> Yes </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputWidowed" id="inputWidowedN" value="No" checked> No </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputSpouse"> Spouse Index </label>
                                                            <input type="text" class="form-control" id="inputSpouse" name="inputSpouse" placeholder="Spouse Index" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 text-right">
                                                    <button class="btn btn-success btn-lg" id="avPrev3">Previous</button>
                                                    <button class="btn btn-primary btn-lg" id="avNext3">Next</button>
                                                </div>
                                            </div>
                                            <div id="saandhaStep4">
                                                <h4 class="card-title"> Job Details </h4>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row pt-3">
                                                            <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                                <label class="form-label"> Has a job </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputjobYN" id="inputjobYN1" value="Yes"> Yes </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputjobYN" id="inputjobYN2" value="No" checked> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="familyIncome">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputJob"> Job </label>
                                                            <input type="text" class="form-control" id="inputJob" name="inputJob" placeholder="Job">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputMonthlyIncomePersonal"> Monthly Income (Personal) </label>
                                                            <input type="text" class="form-control" id="inputMonthlyIncomePersonal" name="inputMonthlyIncomePersonal" placeholder="Personal Income" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 text-center">
                                                    <button class="btn btn-success btn-lg" id="avPrev4">Previous</button>
                                                    <button class="btn btn-primary btn-lg" id="submitSaandha" name="submitSaandha">Submit All</button>
                                                    <button class="btn btn-success btn-lg" id="addAnother" name="addAnother">+ ADD Another Member</button>
                                                </div>
                                            </div>
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