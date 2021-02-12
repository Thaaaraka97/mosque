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
                        <h3 class="page-title"> New Rental </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Payment</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">New Payment Form</h4>
                                    <form class="pt-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputIndexNo"> Index Number </label>
                                                <input type="text" class="form-control" id="inputIndexNo" placeholder="Index No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision"> Sub-division </label>
                                                <select id="inputSubdivision" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <?php
                                                    $sub_division = $database->select_data('tbl_subdivision');
                                                    foreach ($sub_division as $sub_division_item) {
                                                        echo "<option value='Moragala Main-Street'>" . $sub_division_item["sb_name"] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDonation">Rental</label>
                                                <select id="inputDonation" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="Land">Land</option>
                                                    <option value="House">House</option>
                                                    <option value="Shop">Shop</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPayment">Payment </label>
                                                <input type="text" class="form-control" id="inputPayment" placeholder="Payment (Rs)">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputDuePayment">Due Amount </label>
                                                <input type="text" class="form-control" id="inputDuePayment" placeholder="Due Amount (Rs)">
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes">Notes </label>
                                            <textarea class="form-control" id="inputNotes" rows="4"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">Add Payment</button>
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