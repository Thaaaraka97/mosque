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
                        <h3 class="page-title"> Saandha Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Saandha Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Membership ID</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Mxxxxx</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>name@email.com</td>
                                                        <td>
                                                            <a href="preview_step-2.php" class="btn btn-primary btn-md">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mxxxxx</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>name@email.com</td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mxxxxx</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>name@email.com</td>
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