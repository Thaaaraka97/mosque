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
                        <h3 class="page-title"> Nikkah Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Nikkah Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Bride Name</th>
                                                        <th>Groom Name</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     $nikkah_details = $database->select_data('tbl_nikkahdetails');
                                                     foreach ($nikkah_details as $nikkah_details_item) {
                                                         $id = $nikkah_details_item['nd_nikkahId'];
                                                         echo "
                                                         <tr>
                                                            <td>".$nikkah_details_item['nd_marriageDate']."</td>
                                                            <td>".$nikkah_details_item['nd_brideName']."</td>
                                                            <td>".$nikkah_details_item['nd_groomName']."</td>
                                                            <td>".$nikkah_details_item['nd_groomAddress']."</td>
                                                            <td>
                                                                <a href='preview_nikkah-details_step-2.php?id=".$id."&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_nikkah-details_step-2.php?id=".$id."&action=edit' class='btn btn-danger btn-md'>Edit</a>
                                                            </td>
                                                        </tr>
                                                         ";
                                                     }

                                                    ?> 
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