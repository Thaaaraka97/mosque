<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/header.php";
?>

<body>
    <div class="container-scroller">
        <!-- navigation bar -->
        <?php

        include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/navbar.php";
        ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- top bar -->
            <?php

            include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/topbar.php";
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> New Rental </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/mosque/admin/forms.php">Forms</a></li>
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
                                                <label for="inputMemberID">Membership ID </label>
                                                <input type="text" class="form-control" id="inputMemberID" placeholder="Membership ID">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputDonation">Rental</label>
                                                <select id="inputDonation" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
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

    include "$server_name/mosque/admin/template_parts/footer.php";
    ?>
    <!-- End custom js for this page -->
</body>

</html>