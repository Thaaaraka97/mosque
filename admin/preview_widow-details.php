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
                        <h3 class="page-title"> Donations Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Donations Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Age</th>
                                                        <th>Subdivision</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>20</td>
                                                        <td>1</td>
                                                        <td>
                                                            <a href="preview_step-2.php" class="btn btn-primary btn-md">View</a>
                                                            <a href="#" class="btn btn-danger btn-sm">X</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>30</td>
                                                        <td>2</td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>40</td>
                                                        <td>3</td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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