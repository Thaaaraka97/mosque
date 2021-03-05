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
                        <h3 class="page-title"> Laylat al-Qadr Collection </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Laylat al-Qadr Collection </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title"> Laylat al-Qadr Collection Form </h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label"> Person is </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputFundsMahalla" id="inputMahallaY" value="Mahalla" checked> Mahalla </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputFundsMahalla" id="inputMahallaN" value="Non Mahalla"> Non Mahalla </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6" id="verify">
                                                <div class="form-group row pt-3">
                                                    <div class="col-md-3 pt-2 d-flex align-items-center text-right">
                                                        <label class="form-label"> Verify using </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputFundsVerification" id="inputFundsVerificationTP" value="TP"> Telephone </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="inputFundsVerification" id="inputFundsVerificationIndex" value="Index" checked> Index </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="mahalla">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputQuranSubdivision"> Sub-division </label>
                                                <select id="inputQuranSubdivision" name="inputQuranSubdivision" class="form-control">
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
                                        <div class="form-row" id="nonmahalla">
                                            <div class="form-group col-md-6">
                                                <label for="inputTP">Telephone Number </label>
                                                <input type="text" class="form-control" id="inputTP" name="inputTP" placeholder="077xxxxxxx">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputName">Name</label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress"> Address </label>
                                            <textarea rows = "5" class="form-control" id="inputAddress" name="inputAddress" ></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAmount">Amount </label>
                                                <input type="text" class="form-control" id="inputAmount" name="inputAmount" placeholder="Amount (Rs)">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="submitLailathulKadhir" name="submitLailathulKadhir"> Enter </button>

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