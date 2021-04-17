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
                        <h3 class="page-title">Saandha Collector Details</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Saandha Collector Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form class="pt-3" method="post">
                                        <h4 class="card-title">Saandha Collector Form</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision"> Sub-division </label>
                                                <select id="inputSubdivision" name="inputSubdivision" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <?php
                                                    
                                                    foreach ($sub_division as $sub_division_item) {
                                                        echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsername"> Username </label>
                                            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword"> Password </label>
                                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword2"> Confirm Password </label>
                                                <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label"> is Admin ?</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputAdmin" id="inputAdminY" value="Yes" checked> Yes </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputAdmin" id="inputAdminN" value="No"> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label"> is Active ? </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputActive" id="inputActiveY" value="Yes" checked> Yes </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputActive" id="inputActiveN" value="No"> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="admin">
                                            <div class="form-group col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="form-label"> Admin Privilages </label>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="saandhapage" id="saandhapage" value="Saandha Page"> Saandha Page </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="nonmahallaSaandha" id="nonmahallaSaandha" value="Non-Mahalla Saandha"> Non-Mahalla Saandha </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="rentalIncome" id="rentalIncome" value="Rental Income"> Rental Income </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="fridayCollection" id="fridayCollection" value="Friday Collection"> Friday Collection </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="specialBhayan" id="specialBhayan" value="Special Bhayan"> Special Bhayan </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="LaylatalQadr" id="LaylatalQadr" value="Laylat al-Qadr"> Laylat al-Qadr </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="Funds" id="Funds" value="Funds"> Funds </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="FridayAttendance" id="FridayAttendance" value="Friday Attendance"> Friday Attendance </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="maulaviSalary" id="maulaviSalary" value="Maulavi Salary"> Maulavi Salary </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="privateLoans" id="privateLoans" value="Private Loans"> Private Loans </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submitSaandhaCollector" id="submitSaandhaCollector" class="btn btn-primary btn-lg">Enter Details</button>
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