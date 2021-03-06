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
    'md_muazzinId' => $id
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

$muazzin_details = $database->select_where('tbl_muazzindetails', $where);
foreach ($muazzin_details as $muazzin_details_item) {
    $village = $muazzin_details_item['md_village'];
    $index = $muazzin_details_item['md_index'];
    $subdivision = $muazzin_details_item['md_subDivision'];
    $name = $muazzin_details_item['md_name'];
    $address = $muazzin_details_item['md_address'];
    $nic = $muazzin_details_item['md_nic'];
    $married = $muazzin_details_item['md_married'];
    $noofkids = $muazzin_details_item['md_noofkids'];
    $mobile_tp = $muazzin_details_item['md_mobileTP'];
    $home_tp = $muazzin_details_item['md_homeTP'];
    $start = $muazzin_details_item['md_assignedDate'];
    $end = $muazzin_details_item['md_resignedDate'];
    $salary = $muazzin_details_item['md_salary'];
    $notes = $muazzin_details_item['md_notes'];
    $is_active = $muazzin_details_item['md_activestatus'];
    $mahalla = $muazzin_details_item['md_receivedLetterMahalla'];
    $gramasevaka = $muazzin_details_item['md_receivedLetterGramasevaka'];
    $police = $muazzin_details_item['md_receivedLetterPolice'];
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
    var villageraction = "";
    var donationaction = "";
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
                        <h3 class="page-title"> Muazzin Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_muazzin-details.php">Details Preview</a></li>
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