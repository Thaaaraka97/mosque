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
                                    <form class="pt-3" name="saandhaRegistrationForm" id="saandhaRegistrationForm" method="post">
                                        <div id="saandhaStep0">
                                            <h4 class="card-title">All Villagers Registration Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputSubdivision"> Sub-division </label>
                                                    <select id="inputSubdivision" name="inputSubdivision" class="form-control">
                                                        <option selected>Choose...</option>
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
                                                    <select id="inputResStatus" name="inputResStatus" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option value="Rent">Rent</option>
                                                        <option value="Permanant">Permanant</option>
                                                        <option value="Lease">Lease</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress"></textarea>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row pt-3">
                                                        <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                            <label class="form-label"> New Migrant </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputMigrant" id="inputMigrantY" value="Yes"> Yes </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="inputMigrant" id="inputMigrantN" value="No" checked> No </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newMigrant">
                                                <div class="form-group">
                                                    <label for="inputPrevAddress"> Previous Residence Address </label>
                                                    <textarea rows="5" class="form-control" id="inputPrevAddress" name="inputPrevAddress"></textarea>
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
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputMonthlyIncomeFamily"> Monthly Income (Family) </label>
                                                    <input type="text" class="form-control" id="inputMonthlyIncomeFamily" name="inputMonthlyIncomeFamily" placeholder="Family Income">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputavgInterPersonal"> Average Interpersonal Income </label>
                                                    <input type="text" class="form-control" id="inputavgInterPersonal" name="inputavgInterPersonal" placeholder="InterPersonal Income">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputnoofChildren"> No. of Children </label>
                                                    <input type="text" class="form-control" id="inputnoofChildren" name="inputnoofChildren" placeholder="No. of Children">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputnoofUnmarried"> No. of Unmarried Children </label>
                                                    <input type="text" class="form-control" id="inputnoofUnmarried" name="inputnoofUnmarried" placeholder="No. of Unmarried Children">
                                                </div>
                                            </div>
                                            <div class="w-100 text-right">
                                                <!-- <a href="" class="btn btn-success btn-lg" id="addAVMember" name="addAVMember">+ ADD Member</a> -->
                                                <!-- <button class="btn btn-success btn-lg" id="addAVMember" name="addAVMember">+ ADD Member</button> -->
                                                <input type="submit" class="btn btn-success btn-lg" id="addAVMember" name="addAVMember" value="+ ADD Member">
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