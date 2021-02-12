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
                        <h3 class="page-title"> All Villagers Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> All Villagers Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Index Number</th>
                                                        <th>Sub Division</th>
                                                        <th>Age</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     $all_villagers_details = $database->select_data('tbl_allvillagers');
                                                     foreach ($all_villagers_details as $all_villagers_details_item) {
                                                         $index = $all_villagers_details_item['av_index'];
                                                         $subdivision = $all_villagers_details_item['av_subDivision'];
                                                         echo "
                                                         <tr>
                                                            <td>".$all_villagers_details_item['av_name']."</td>
                                                            <td>".$index."</td>
                                                            <td>".$subdivision."</td>
                                                            <td>".$all_villagers_details_item['av_age']."</td>
                                                            <td>
                                                                <a href='preview_villager-details_step-2.php?index=".$index."&subdivision=".$subdivision."&action=view' class='btn btn-primary btn-md'>View</a>
                                                                <a href='preview_villager-details_step-2.php?index=".$index."&subdivision=".$subdivision."&action=edit'' class='btn btn-danger btn-md'>Edit</a>
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