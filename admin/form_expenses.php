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
                        <h3 class="page-title"> Expenses </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Expenses </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title"> Expenses Form </h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDate"> Date </label>
                                                <input type="date" class="form-control" id="inputDate" name="inputDate" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputExpensesType"> Type </label>
                                                <select id="inputExpensesType" name="inputExpensesType" class="form-control">
                                                    <option value="0" selected>Choose...</option>
                                                    <option value="Maintainance">Maintainance</option>
                                                    <option value="Stationary">Stationary</option>
                                                    <option value="Building Repair">Building Repair</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAmount"> Amount </label>
                                                <input type="text" class="form-control" id="inputAmount" name="inputAmount" placeholder="Amount (Rs)">
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputNotes"> Notes </label>
                                            <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-lg" id="submitExpenses" name="submitExpenses"> Enter </button>

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