<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


$where = array(
    'pi_peshImaamId' => $id
);

$village = "";
$index = "";
$subdivision = "";
$name = "";
$address = "";
$nic = "";
$married = "";
$salary = "";
$mobile_tp = "";
$home_tp = "";
$is_active = "";
$noofkids = "";
$start = "";
$end = "";
$notes = "";
$mahalla = "";
$gramasevaka = "";
$police = "";
$maulavi = "";

$pesh_imaam_details = $database->select_where('tbl_peshimaaamdetails', $where);
foreach ($pesh_imaam_details as $pesh_imaam_details_item) {
    $village = $pesh_imaam_details_item['pi_village'];
    $index = $pesh_imaam_details_item['pi_index'];
    $subdivision = $pesh_imaam_details_item['pi_subDivision'];
    $name = $pesh_imaam_details_item['pi_name'];
    $address = $pesh_imaam_details_item['pi_address'];
    $nic = $pesh_imaam_details_item['pi_nic'];
    $married = $pesh_imaam_details_item['pi_married'];
    $noofkids = $pesh_imaam_details_item['pi_noofkids'];
    $mobile_tp = $pesh_imaam_details_item['pi_mobileTP'];
    $home_tp = $pesh_imaam_details_item['pi_homeTP'];
    $start = $pesh_imaam_details_item['pi_assignedDate'];
    $end = $pesh_imaam_details_item['pi_resignedDate'];
    $salary = $pesh_imaam_details_item['pi_salary'];
    $notes = $pesh_imaam_details_item['pi_notes'];
    $is_active = $pesh_imaam_details_item['pi_activestatus'];
    $mahalla = $pesh_imaam_details_item['pi_receivedLetterMahalla'];
    $gramasevaka = $pesh_imaam_details_item['pi_receivedLetterGramasevaka'];
    $police = $pesh_imaam_details_item['pi_receivedLetterPolice'];
    $maulavi = $pesh_imaam_details_item['pi_receivedLetterMaulavi'];
    if ($end == "") {
        $end = "Present";
    }
    if ($is_active == "0") {
        $is_active = "No";
    } else {
        $is_active = "Yes";
    }
    if ($married == "0") {
        $married = "No";
    } else {
        $married = "Yes";
    }
}

?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
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
                    <div class="page-header">
                        <h3 class="page-title"> Trustee Board Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_pesh_imaam-details.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="mt-5 text-dark col-auto" id="viewDetails">
                                        <h4 class="card-title"> Details Preview Step-2 </h4>

                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Name</th>
                                                <td> : </td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Village</th>
                                                <td> : </td>
                                                <td><?php echo $village ?></td>
                                            </tr>
                                            <tr>
                                                <th>Index</th>
                                                <td> : </td>
                                                <td><?php echo $index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th>
                                                <td> : </td>
                                                <td><?php echo $start . " - " . $end ?></td>
                                            </tr>
                                            <tr>
                                                <th>is Active ?</th>
                                                <td> : </td>
                                                <td><?php echo $is_active ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIC</th>
                                                <td> : </td>
                                                <td><?php echo $nic ?></td>
                                            </tr>
                                            <tr>
                                                <th>Salary</th>
                                                <td> : </td>
                                                <td><?php echo $salary ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact Number</th>
                                                <td> : </td>
                                                <td>Home : <?php echo $home_tp ?><br>Mobile : <?php echo $mobile_tp ?></td>
                                            </tr>
                                            <tr>
                                                <th>is Married ?</th>
                                                <td> : </td>
                                                <td><?php echo $married ?></td>
                                            </tr>
                                            <tr>
                                                <th>No. of Kids</th>
                                                <td> : </td>
                                                <td><?php echo $noofkids ?></td>
                                            </tr>
                                            <tr>
                                                <th>Notes</th>
                                                <td> : </td>
                                                <td><?php echo $notes ?></td>
                                            </tr>
                                            <tr>
                                                <th>Received Letters</th>
                                                <td> : </td>
                                                <td>
                                                    <?php 
                                                        if ($mahalla == "1") {
                                                            echo "Mahalla Letter<br>";
                                                        }
                                                        if ($gramasevaka == "1") {
                                                            echo "Gramasevaka Letter<br>";
                                                        }
                                                        if ($police == "1") {
                                                            echo "Police Certification<br>";
                                                        }
                                                        if ($maulavi == "1") {
                                                            echo "Maulavi Letter<br>";
                                                        }
                                                         
                                                    ?>
                                                </td>
                                            </tr>

                                        </table>

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