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
                        <h3 class="page-title">Pesh Imaam Details</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pesh Imaam Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Pesh Imaam Details Form</h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-group col-md-6 pl-5">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="form-label">New Pesh Imaam belongs to</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputVillage" id="inputVillageY" value="Home Village"> Home Village </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputVillage" id="inputVillageN" value="Not Home Village" checked> Not Home Village </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="peshImaamIndex">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputImaamSubdivision"> Sub-division </label>
                                                    <select id="inputImaamSubdivision" name="inputImaamSubdivision" class="form-control">
                                                        <option value="0" selected>Choose...</option>
                                                        <?php
                                                        $sub_division = $database->select_data('tbl_subdivision');
                                                        foreach ($sub_division as $sub_division_item) {
                                                            echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Name </label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress"> Address </label>
                                            <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" required></textarea>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDistrict">District </label>
                                                <input type="text" class="form-control" id="inputDistrict" name="inputDistrict" placeholder="District" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputNIC">National Identity Card </label>
                                                <input type="text" class="form-control" id="inputNIC" name="inputNIC" placeholder="NIC" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="form-label">Married Status</label>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
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
                                            <div class="form-group col-md-6">
                                                <label for="inputKids">No. of Kids </label>
                                                <input type="text" class="form-control" id="inputKids" name="inputKids" placeholder="No. of Kids" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputMobile">Mobile Number </label>
                                                <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="07xxxxxxxx" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputHomeTP">Residential Contact </label>
                                                <input type="text" class="form-control" id="inputHomeTP" name="inputHomeTP" placeholder="011xxxxxxx">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAssignedDate">Assigned Date </label>
                                                <input type="date" class="form-control" id="inputAssignedDate" name="inputAssignedDate" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputBasicSalary">Basic Salary </label>
                                                <input type="text" class="form-control" id="inputBasicSalary" name="inputBasicSalary" placeholder="Basic Salary (Rs)" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="form-label"> Received Letters </label>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="Maulavi" id="Maulavi" value="Maulavi Certificate"> Maulavi Certificate </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="Police" id="Police" value="Police Certificate"> Police Certificate </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="Gramasevaka" id="Gramasevaka" value="Gramasevaka Certificate"> Gramasevaka Certificate </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pl-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="Mahalla" id="Mahalla" value="Mahalla Letter"> Mahalla Letter </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" class="form-control" id="inputDateToday">
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes">Notes </label>
                                            <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" name="submitPeshImaam">Enter Details</button>
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