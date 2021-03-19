<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
} elseif (isset($_GET['terminated'])) {
    $message = "Member terminated and Updated the Record..!";
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
                    } elseif (isset($_GET['terminated'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Pesh Imaam Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Pesh Imaam Details Preview </h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Posting</th>
                                                        <th>Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // displaying pesh imaam details
                                                    $pesh_imaam_salary = $database->select_data('tbl_peshimaamsalary');
                                                    foreach ($pesh_imaam_salary as $pesh_imaam_salary_item) {
                                                        $imaam_id = "";
                                                        $id = "";
                                                        if (isset($pesh_imaam_salary_item['pSal_id']) || isset($pesh_imaam_salary_item['pSal_peshImaamId'])) {
                                                            $id = $pesh_imaam_salary_item['pSal_id'];
                                                            $imaam_id = $pesh_imaam_salary_item['pSal_peshImaamId'];
                                                        }

                                                        $where = array(
                                                            'pi_peshImaamId'     =>     $imaam_id
                                                        );
                                                        $pesh_imaam_details = $database->select_where('tbl_peshimaaamdetails', $where);
                                                        foreach ($pesh_imaam_details as $pesh_imaam_details_item) {
                                                            $name = $pesh_imaam_details_item['pi_name'];
                                                            $isActive = $pesh_imaam_details_item['pi_activestatus'];

                                                            echo "
                                                         <tr>
                                                            <td>";
                                                            if ($isActive) {
                                                                echo "Active";
                                                            } else {
                                                                echo "Not Active";
                                                            }
                                                            echo "</td>
                                                            <td> Pesh Imaam </td>
                                                            <td>" . $name . "</td>
                                                            <td>
                                                                <a href='preview_pesh_imaam-details_step-2.php?id=" . $imaam_id . "&record_id=". $id ."&action=view_salary' class='item'><i class='fa fa-eye fa-2x' aria-hidden='true'></i></a>
                                                            </td>
                                                            
                                                        </tr>
                                                         ";
                                                        }
                                                    }
                                                    // displaying muazzin details
                                                    $muazzin_salary = $database->select_data('tbl_muazzinsalary');
                                                    foreach ($muazzin_salary as $muazzin_salary_item) {
                                                        $muazzin_id = "";
                                                        $id = "";
                                                        if (isset($muazzin_salary_item['mSal_id']) || isset($muazzin_salary_item['mSal_muazzinId'])) {
                                                            $id = $muazzin_salary_item['mSal_id'];
                                                            $muazzin_id = $muazzin_salary_item['mSal_muazzinId'];
                                                        }

                                                        $where = array(
                                                            'md_muazzinId'     =>     $muazzin_id
                                                        );
                                                        $muazzin_details = $database->select_where('tbl_muazzindetails', $where);
                                                        foreach ($muazzin_details as $muazzin_details_item) {
                                                            $name = $muazzin_details_item['md_name'];
                                                            $isActive = $muazzin_details_item['md_activestatus'];

                                                            echo "
                                                         <tr>
                                                            <td>";
                                                            if ($isActive) {
                                                                echo "Active";
                                                            } else {
                                                                echo "Not Active";
                                                            }
                                                            echo "</td>
                                                            <td> Muazzin </td>
                                                            <td>" . $name . "</td>
                                                            <td>
                                                                <a href='preview_muazzin-details_step-2.php?id=" . $muazzin_id . "&record_id=". $id ."&action=view_salary' class='item'><i class='fa fa-eye fa-2x' aria-hidden='true'></i></a>
                                                            </td>
                                                            
                                                        </tr>
                                                         ";
                                                        }
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Terminate Pesh Imaam ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to terminate this Pesh Imaam?
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="del">Terminate</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include "template_parts/footer.php";
    ?>
    <!-- End custom js for this page -->
</body>

</html>