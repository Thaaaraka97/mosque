<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

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
                        <h3 class="page-title"> Other Servant Salary </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Other Servant Salary </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title"> Other Servant Salary Form </h4>
                                    <form class="pt-3" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDate"> Date </label>
                                                <input type="date" class="form-control" id="inputDate" name="inputDate" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputName"> Name </label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
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
                                            <button class="btn btn-primary btn-lg" id="submitServantSalary" name="submitServantSalary"> Enter </button>

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