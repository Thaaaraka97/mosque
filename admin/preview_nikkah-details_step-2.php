<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'];
$where = array(
    'nd_nikkahId' => $id
);

$date = "";
$bride_name = "";
$groom_name = "";
$groom_address = "";
$groom_village = "";
$groom_index = "";
$groom_subdivision = "";
$groom_dob = "";
$groom_nic = "";
$groom_age = "";
$groom_tp = "";
$groom_prev_married = "";
$groom_guard_name = "";
$groom_guard_index = "";
$groom_mosque_name = "";
$groom_mosque_add = "";
$bride_village = "";
$bride_index = "";
$bride_subdivision = "";
$bride_dob = "";
$bride_nic = "";
$bride_age = "";
$bride_tp = "";
$bride_address = "";
$bride_guard_name = "";
$bride_guard_index = "";
$bride_mosque_name = "";
$bride_mosque_add = "";
$venue = "";
$donation = "";

$nikkah_details = $database->select_where('tbl_nikkahdetails', $where);
foreach ($nikkah_details as $nikkah_details_item) {
    $date = $nikkah_details_item['nd_marriageDate'];
    $bride_name = $nikkah_details_item['nd_brideName'];
    $groom_name = $nikkah_details_item['nd_groomName'];
    $groom_address = $nikkah_details_item['nd_groomAddress'];
    $groom_village = $nikkah_details_item['nd_groomVillage'];
    $groom_index = $nikkah_details_item['nd_groomIndex'];
    $groom_subdivision = $nikkah_details_item['nd_groomSubDivision'];
    $groom_dob = $nikkah_details_item['nd_groomDOB'];
    $groom_nic = $nikkah_details_item['nd_groomNIC'];
    $groom_age = $nikkah_details_item['nd_groomAge'];
    $groom_tp = $nikkah_details_item['nd_groomTP'];
    $groom_prev_married = $nikkah_details_item['nd_groomPrevMarried'];
    $groom_guard_name = $nikkah_details_item['nd_groomGuardName'];
    $groom_guard_index = $nikkah_details_item['nd_groomGuardIndex'];
    $groom_mosque_name = $nikkah_details_item['nd_groomMosqueName'];
    $groom_mosque_add = $nikkah_details_item['nd_groomMosqueAddress'];
    $bride_village = $nikkah_details_item['nd_brideVillage'];
    $bride_index = $nikkah_details_item['nd_brideIndex'];
    $bride_subdivision = $nikkah_details_item['nd_brideSubDivision'];
    $bride_dob = $nikkah_details_item['nd_brideDOB'];
    $bride_nic = $nikkah_details_item['nd_brideNIC'];
    $bride_age = $nikkah_details_item['nd_brideAge'];
    $bride_tp = $nikkah_details_item['nd_brideTP'];
    $bride_address = $nikkah_details_item['nd_brideAddress'];
    $bride_guard_name = $nikkah_details_item['nd_brideGuardName'];
    $bride_guard_index = $nikkah_details_item['nd_brideGuardIndex'];
    $bride_mosque_name = $nikkah_details_item['nd_brideMosqueName'];
    $bride_mosque_add = $nikkah_details_item['nd_brideMosqueAddress'];
    $venue = $nikkah_details_item['nd_marriageVenue'];
    $donation = $nikkah_details_item['nd_donation'];
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
                        <h3 class="page-title"> Nikkah Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_nikkah-details.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title"> Details Preview Step-2 </h4>
                                    <div class="mt-5 text-dark col-auto d-flex justify-content-center " id="viewDetails">
                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Date</th>
                                                <td> : </td>
                                                <td><?php echo $date ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Name</th>
                                                <td> : </td>
                                                <td><?php echo $groom_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Bride Name</th>
                                                <td> : </td>
                                                <td><?php echo $bride_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Venue</th>
                                                <td> : </td>
                                                <td><?php echo $venue ?></td>
                                            </tr>
                                            <tr>
                                                <th>Donation</th>
                                                <td> : </td>
                                                <td><?php echo $donation ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="align-items-center">Groom Details</th>
                                            </tr>
                                            <tr>
                                                <th>Groom Village</th>
                                                <td> : </td>
                                                <td><?php echo $groom_village ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Index</th>
                                                <td> : </td>
                                                <td><?php echo $groom_index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $groom_subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Date of Birth</th>
                                                <td> : </td>
                                                <td><?php echo $groom_dob ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom NIC</th>
                                                <td> : </td>
                                                <td><?php echo $groom_nic ?></td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td> : </td>
                                                <td><?php echo $groom_age ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact Number</th>
                                                <td> : </td>
                                                <td><?php echo $groom_tp ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $groom_address ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Previously married Status</th>
                                                <td> : </td>
                                                <td><?php echo $groom_prev_married ?></td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Guardian</th>
                                                <td> : </td>
                                                <td><?php echo $groom_guard_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Index of the Guardian</th>
                                                <td> : </td>
                                                <td><?php echo $groom_guard_index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Mosque</th>
                                                <td> : </td>
                                                <td><?php echo $groom_mosque_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address of the Mosque</th>
                                                <td> : </td>
                                                <td><?php echo $groom_mosque_add ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="align-items-center">Bride Details</th>
                                            </tr>
                                            <tr>
                                                <th>Groom Village</th>
                                                <td> : </td>
                                                <td><?php echo $bride_village ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Index</th>
                                                <td> : </td>
                                                <td><?php echo $bride_index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $bride_subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Date of Birth</th>
                                                <td> : </td>
                                                <td><?php echo $bride_dob ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom NIC</th>
                                                <td> : </td>
                                                <td><?php echo $bride_nic ?></td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td> : </td>
                                                <td><?php echo $bride_age ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact Number</th>
                                                <td> : </td>
                                                <td><?php echo $bride_tp ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $bride_address ?></td>
                                            </tr>
                                            <tr>
                                                <th>>Name of the Guardian</th>
                                                <td> : </td>
                                                <td><?php echo $bride_guard_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Index of the Guardian</th>
                                                <td> : </td>
                                                <td><?php echo $bride_guard_index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Mosque</th>
                                                <td> : </td>
                                                <td><?php echo $bride_mosque_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address of the Mosque</th>
                                                <td> : </td>
                                                <td><?php echo $bride_mosque_add ?></td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="mt-5 text-dark" id="editDetails">

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