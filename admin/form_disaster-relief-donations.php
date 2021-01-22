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
                        <h3 class="page-title">Disaster Relief Donations</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Donations</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Donation Acceptance Form</h4>
                                    <form class="pt-3">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDonationDisaster">Donation</label>
                                                <select id="inputDonationDisaster" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option value="Mahalla">Mahalla</option>
                                                    <option value="NonMahalla">Non-Mahalla</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="disaterDonationIndex">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputIndexNo" placeholder="Index No">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSubdivision"> Sub-division </label>
                                                    <select id="inputSubdivision" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $sub_division = $database->select_data('tbl_subDivision');
                                                        foreach ($sub_division as $sub_division1) {
                                                            echo "<option value='" . $sub_division1["sb_name"] . "'>" . $sub_division1["sb_name"] . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDate">Date </label>
                                                <input type="date" class="form-control" id="inputDate">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAmount">Amount </label>
                                                <input type="text" class="form-control" id="inputAmount" placeholder="Amount (Rs)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Subject </label>
                                            <input type="text" class="form-control" id="inputSubject" placeholder="Subject">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">Accept Donation</button>

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