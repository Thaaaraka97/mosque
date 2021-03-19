<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
}
?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    var villageraction = "";
    var donationaction = "";
    var fridaycollectionaction = "";

</script>

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
                    <?php
                    if (isset($_GET['edited'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Janaza Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Janaza Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Gender</th>
                                                        <th>Sub Division</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $janaza_details = $database->select_data('tbl_janazadetails');
                                                    foreach ($janaza_details as $janaza_details_item) {
                                                        $gender = $janaza_details_item['jd_gender'];
                                                        if ($gender == "M") {
                                                            $gender = "Male";
                                                        } else {
                                                            $gender = "Female";
                                                        }
                                                        $id = $janaza_details_item['jd_janazaId'];
                                                        echo "
                                                         <tr>
                                                            <td>" . $janaza_details_item['jd_name'] . "</td>
                                                            <td>" . $janaza_details_item['jd_dateofDeath'] . "</td>
                                                            <td>" . $gender . "</td>
                                                            <td>" . $janaza_details_item['jd_subDivision'] . "</td>
                                                            <td>
                                                                <a href='preview_janaza-details_step-2.php?id=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-2x' aria-hidden='true'></i></a>
                                                                <a href='preview_janaza-details_step-2.php?id=" . $id . "&action=edit'' class='item'><i class='fa fa-pencil-square-o fa-2x' aria-hidden='true'></i></a>
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