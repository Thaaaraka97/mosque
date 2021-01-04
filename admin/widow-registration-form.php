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
                        <h3 class="page-title">Widow Registration</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Widow Registration</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">Widow Registration Form</h4>
                                    <form class="pt-3">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress1">Address Line 1 </label>
                                                <input type="text" class="form-control" id="inputAddress1" name="inputAddress1" placeholder="Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Address Line 2 </label>
                                                <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Street Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress3">Address Line 3 </label>
                                            <input type="text" class="form-control" id="inputAddress3" name="inputAddress3" placeholder="City">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAge">Age </label>
                                                <input type="text" class="form-control" id="inputAge" placeholder="Age">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputSubdivision">Sub division </label>
                                                <input type="text" class="form-control" id="inputSubdivision" placeholder="Sub division">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">Enter</button>

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