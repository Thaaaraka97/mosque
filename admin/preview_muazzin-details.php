<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();

$id = "";
$muazzin_salary_details = "";
$name = "";
$basic_salary = 0;
// $incentive = 0;
// $madrasa_fee = 0;
// $advance = 0;
(float)$epfetf = 0;
// $loan_deduction = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $where2 = array(
        'mSal_muazzinId ' => $id
    );
    $muazzin_salary_details = $database->select_where('tbl_muazzinsalary', $where2);
    foreach ($muazzin_salary_details as $muazzin_salary_details_item) {
        (float)$basic_salary = $basic_salary + $muazzin_salary_details_item['mSal_basicSalary'];
        // $incentive = $incentive + $muazzin_salary_details_item['mSal_incentive'];
        // $madrasa_fee = $madrasa_fee + $muazzin_salary_details_item['mSal_madrasaFee'];
        // $advance = $advance + $muazzin_salary_details_item['mSal_advance'];
        (float)$epf = $muazzin_salary_details_item['mSal_EPFETF'];
        // $loan_deduction = $loan_deduction + $muazzin_salary_details_item['mSal_loanDeduction'];
        (float)$epfetf = (float)$epfetf + (float)$epf;
        (float)$basic_salary = (float)$basic_salary + (float)$basic_salary;

    }
}

$where = array(
    'md_muazzinId ' != 0
);
$item_count = $database->select_count('tbl_muazzindetails', $where);

$where3 = array(
    'md_muazzinId ' => $id
);
$muazzin_details = $database->select_where('tbl_muazzindetails', $where3);
foreach ($muazzin_details as $muazzin_details_item) {
    $name = $muazzin_details_item['md_name'];
}

if (isset($_GET['edited'])) {
    $message = "Record successfully edited and Updated..!";
}
elseif (isset($_GET['terminated'])) {
    $message = "Muazzin has been terminated..!<br>Toal EPF/ETF paid on behalf of Muazzin $name with the ID-$id is Rs. $epfetf /=<br>Total Basic Salary paid is Rs. $basic_salary/=";
}
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
                    <?php
                    if (isset($_GET['edited'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    elseif (isset($_GET['terminated'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <h3 class="card-title top"> Muazzin Details Preview </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                            <td class="total-td">
                                                <div>
                                                    <p class="text-dark">No. of Entries <?php echo " : " . $item_count ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                        <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                <thead>
                                                    <tr class="tr-shadow">
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Telephone</th>
                                                        <th>Active Peroid</th>
                                                        <th>Left the Position</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     $pesh_imaam_details = $database->select_data('tbl_muazzindetails');
                                                     foreach ($pesh_imaam_details as $pesh_imaam_details_item) {
                                                         $id = $pesh_imaam_details_item['md_muazzinId'];
                                                         $start = $pesh_imaam_details_item['md_assignedDate'];
                                                         $end = $pesh_imaam_details_item['md_resignedDate'];
                                                         $isActive = $pesh_imaam_details_item['md_activestatus'];
                                                         if ($end == "") {
                                                             $end = "Present";
                                                         }
                                                         echo "
                                                         <tr>
                                                            <td>".$pesh_imaam_details_item['md_name']."</td>
                                                            <td>".$pesh_imaam_details_item['md_address']."</td>
                                                            <td>".$pesh_imaam_details_item['md_mobileTP']."</td>
                                                            <td>".$start." - ".$end."</td>
                                                            <td>";
                                                            if ($isActive) {
                                                                echo "<a href='' id ='".$id."' class='btn btn-warning btn-md terminate_row_muazzin' data-toggle='modal' data-target='#deleteRecord'>Left</a>";
                                                            }
                                                            else{
                                                                echo "<span class='status--denied'>Already Left</span>";
                                                            }
                                                            echo "</td>
                                                            <td>
                                                                <a href='preview_muazzin-details_step-2.php?id=".$id."&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                <a href='preview_muazzin-details_step-2.php?id=" . $id . "&action=edit' class='item'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a>

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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"> Remove Muazzin </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove this Muazzin? 
                    If he left the position click Remove to empty his position.
                    Please provide reasons for leaving..!
                    <div class="form-group">
                        <label for="inputReason" class="col-form-label"> Reason </label>
                        <textarea class="form-control" name="inputReason" id="inputReason" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a class="btn btn-danger" id="del">Remove</a>
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