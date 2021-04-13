<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

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

    if ($groom_prev_married == "1") {
        $groom_prev_married = "Yes";
    } else {
        $groom_prev_married = "No";
    }
}

?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    console.log(action);
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
                    <div class="page-header">
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_nikkah-details.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php
                                                    if ($action == "view") {
                                                        echo "<h3 class='card-title top'> Nikkah Details Preview </h3>";
                                                    }
                                                    if ($action == "edit") {
                                                        echo "<h3 class='card-title top'> Nikkah Details (Edit) </h3>";
                                                    }
                                                    ?>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark col-auto" id="viewDetails">
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Wedding Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Date</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $date ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name of the Groom</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name of the Bride</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Venue</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $venue ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Groom Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Village</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_village ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($groom_village == "Home Village") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Index (Click on the Index Number)</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='Click to See More Details'>
                                                                <a href='preview_villager-details_step-2.php?index=" . $groom_index . "&subdivision=" . $groom_subdivision . "&action=view' class='text-muted'>$groom_index</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Sub Division</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$groom_subdivision</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Date of Birth</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_dob ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Age</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_age ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">NIC</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_nic ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Contact Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_tp ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Age</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_age ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Address</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_address ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Previously married Status</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_prev_married ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Guardian :Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $groom_guard_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($groom_village == "Home Village") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Guardian :Index</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <a data-toggle='tooltip' data-placement='top' title='Click to See More Details' href='preview_villager-details_step-2.php?index=$groom_guard_index&subdivision=$groom_subdivision&action=view' class='text-muted'>$groom_guard_index</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                            }
                                            else {
                                                echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Name of the Mosque</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$groom_mosque_name</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Address of the Mosque</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$groom_mosque_add</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Bride Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Village</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_village ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($bride_village == "Home Village") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Index (Click on the Index Number)</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <a data-toggle='tooltip' data-placement='top' title='Click to See More Details' href='preview_villager-details_step-2.php?index=" . $bride_index . "&subdivision=" . $bride_subdivision . "&action=view' class='text-muted'>$bride_index</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Sub Division</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$bride_subdivision</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Date of Birth</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_dob ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Age</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_age ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">NIC</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_nic ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Contact Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_tp ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Age</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_age ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Address</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_address ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Guardian :Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $bride_guard_name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($bride_village == "Home Village") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Guardian :Index</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <a data-toggle='tooltip' data-placement='top' title='Click to See More Details' href='preview_villager-details_step-2.php?index=$bride_guard_index&subdivision=$bride_subdivision&action=view' class='text-muted'>$bride_guard_index</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                        }
                                        else {
                                            echo "<div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Name of the Mosque</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$bride_mosque_name</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Address of the Mosque</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$bride_mosque_add</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Donation Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject"> Nikkah Donation </h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $donation ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-dark" id="editDetails">
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form method="post">
                                            <div id="groomdetails">
                                            <h4 class="card-title pt-2">Groom Details Form</h4>

                                                <?php
                                                if ($groom_village == "Home Village") {
                                                    echo "
                                                <div id='groomVillage'>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputIndexNo'> Village Details </label>
                                                            <input type='text' class='form-control' id='inputGroomVillage' name='inputGroomVillage' value='" . $groom_village . "' readonly>
                                                        </div>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputIndexNo'> Index Number </label>
                                                            <input type='text' class='form-control' id='inputIndexNo' name='inputIndexNo' value='" . $groom_index . "' readonly>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputSubdivision'> Sub-division </label>
                                                            <input type='text' class='form-control' id='inputSubdivision' name='inputSubdivision' value='" . $groom_subdivision . "' readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='inputGroomName'>Name of the Groom </label>
                                                    <input type='text' class='form-control' id='inputGroomName' name='inputGroomName' value='$groom_name' readonly>
                                                </div>
                                                <div class='form-row'>
                                                    <div class='form-group col-md-4'>
                                                        <label for='inputGroomBirthday'>Birthday </label>
                                                        <input type='text' class='form-control' id='inputGroomBirthday' name='inputGroomBirthday' value='$groom_dob' readonly>
                                                    </div>
                                                    <div class='form-group col-md-5'>
                                                        <label for='inputGroomNIC'>National Identity Card </label>
                                                        <input type='text' class='form-control' id='inputGroomNIC' name='inputGroomNIC' value='$groom_nic' readonly>
                                                    </div>
                                                    <div class='form-group col-md-3'>
                                                        <label for='inputGroomAge'>Age </label>
                                                        <input type='text' class='form-control' id='inputGroomAge' name='inputGroomAge' value='$groom_age' readonly>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='inputGroomAddress'>Address </label>
                                                    <textarea rows='5' class='form-control' id='inputGroomAddress' name='inputGroomAddress' value='$groom_address' readonly>$groom_address</textarea>
                                                </div>
                                                <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputGroomTP'>Telephone Number </label>
                                                            <input type='text' class='form-control' id='inputGroomTP' name='inputGroomTP' value='$groom_tp' readonly>
                                                        </div>
                                                ";
                                                }
                                                else {
                                                    echo "
                                                    <div class='form-group'>
                                                        <label for='inputGroomName'>Name of the Groom </label>
                                                        <input type='text' class='form-control' id='inputGroomName' name='inputGroomName' value='$groom_name'>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-4'>
                                                            <label for='inputGroomBirthday'>Birthday </label>
                                                            <input type='text' class='form-control' id='inputGroomBirthday' name='inputGroomBirthday' value='$groom_dob'>
                                                        </div>
                                                        <div class='form-group col-md-5'>
                                                            <label for='inputGroomNIC'>National Identity Card </label>
                                                            <input type='text' class='form-control' id='inputGroomNIC' name='inputGroomNIC' value='$groom_nic'>
                                                        </div>
                                                        <div class='form-group col-md-3'>
                                                            <label for='inputGroomAge'>Age </label>
                                                            <input type='text' class='form-control' id='inputGroomAge' name='inputGroomAge' value='$groom_age'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='inputGroomAddress'>Address </label>
                                                        <textarea rows='5' class='form-control' id='inputGroomAddress' name='inputGroomAddress' value='$groom_address'>$groom_address</textarea>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputGroomTP'>Telephone Number </label>
                                                            <input type='text' class='form-control' id='inputGroomTP' name='inputGroomTP' value='$groom_tp'>
                                                        </div>
                                                    ";
                                                }
                                                ?>
                                                    <div class="form-group col-md-6 pl-5">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label class="form-label">Married Status(before)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusY" value="Yes" <?php echo ($groom_prev_married == 'Yes') ? 'checked' : '' ?>> Yes </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusN" value="No" <?php echo ($groom_prev_married == 'No') ? 'checked' : '' ?>> No </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="card-description"> Details of the Guardian </p>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="inputGroomGuardianName">Name of the Guardian </label>
                                                    <input type="text" class="form-control" id="inputGroomGuardianName" name="inputGroomGuardianName" value="<?php echo $groom_guard_name ?>" placeholder="Name of the Guardian" required>
                                                </div>
                                                <?php
                                                if ($groom_village == "Home Village") {
                                                    echo "
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputGroomGuardianIndex'> Index No of the Guardian </label>
                                                            <input type='text' class='form-control' id='inputGroomGuardianIndex' name='inputGroomGuardianIndex' placeholder='Index No' value='$groom_guard_index'>
                                                        </div>
                                                    </div>
                                                ";
                                                }
                                                ?>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputVenue"> Venue of the marriage </label>
                                                        <input type="text" id="inputVenue" name="inputVenue" class="form-control" placeholder="Venue" value="<?php echo $venue ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputMarriageDate"> Date of the marriage </label>
                                                        <input type="date" id="inputMarriageDate" name="inputMarriageDate" class="form-control" value="<?php echo $date ?>">
                                                    </div>
                                                </div>
                                                <?php
                                                if ($groom_village == "Not Home Village") {
                                                    echo "
                                                <div>
                                                    <p class='card-description'> Details of the Mosque </p>
                                                    <hr>
                                                    <div class='form-group'>
                                                        <label for='inputGroomMosque'>Name of the Mosque </label>
                                                        <input type='text' class='form-control' id='inputGroomMosque' name='inputGroomMosque' placeholder='Mosque' value='$groom_mosque_name'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='inputGroomMosqueAddress'> Address </label>
                                                        <textarea rows='5' class='form-control' id='inputGroomMosqueAddress' name='inputGroomMosqueAddress' value='$groom_mosque_add'>$groom_mosque_add</textarea>
                                                    </div>
                                                </div>
                                                ";
                                                }
                                                ?>
                                                <div class="w-100 text-right">
                                                    <button class="btn btn-primary btn-lg" id="nikkahNext">Next</button>
                                                </div>
                                            </div>
                                            <div id="bridedetails">
                                                <h4 class="card-title pt-2">Bride Details Form</h4>
                                                <?php
                                                if ($bride_village == "Home Village") {
                                                    echo "
                                                <div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputBrideIndexNo'> Index Number </label>
                                                            <input type='text' class='form-control' id='inputBrideIndexNo' name='inputBrideIndexNo' value='" . $bride_index . "' readonly>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputBrideSubdivision'> Sub-division </label>
                                                            <input type='text' class='form-control' id='inputBrideSubdivision' name='inputBrideSubdivision' value='" . $bride_subdivision . "' readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='inputBrideName'>Name of the Bride </label>
                                                    <input type='text' class='form-control' id='inputBrideName' name='inputBrideName' value='$bride_name' readonly>
                                                </div>
                                                <div class='form-row'>
                                                    <div class='form-group col-md-4'>
                                                        <label for='inputBrideBirthday'>Birthday </label>
                                                        <input type='text' class='form-control' id='inpuBridetBirthday' name='inpuBridetBirthday' value='$bride_dob' readonly>
                                                    </div>
                                                    <div class='form-group col-md-5'>
                                                        <label for='inputBrideNIC'>National Identity Card </label>
                                                        <input type='text' class='form-control' id='inputBrideNIC' name='inputBrideNIC' value='$bride_nic' readonly>
                                                    </div>
                                                    <div class='form-group col-md-3'>
                                                        <label for='inputBrideAge'>Age </label>
                                                        <input type='text' class='form-control' id='inputBrideAge' name='inputBrideAge' value='$bride_age' readonly>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='inputBrideAddress'> Address </label>
                                                    <textarea rows='5' class='form-control' id='inputBrideAddress' name='inputBrideAddress' value='$bride_address' readonly>$bride_address</textarea>
                                                </div>
                                                <div class='form-row'>
                                                    <div class='form-group col-md-6'>
                                                        <label for='inputBrideTP'>Telephone Number </label>
                                                        <input type='text' class='form-control' id='inputBrideTP' name='inputBrideTP' value='$bride_tp' readonly>
                                                    </div>
                                                </div>
                                                ";
                                                }
                                                else {
                                                    echo "
                                                    <div class='form-group'>
                                                        <label for='inputBrideName'>Name of the Bride </label>
                                                        <input type='text' class='form-control' id='inputBrideName' name='inputBrideName' value='$bride_name'>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-4'>
                                                            <label for='inputBrideBirthday'>Birthday </label>
                                                            <input type='text' class='form-control' id='inpuBridetBirthday' name='inpuBridetBirthday' value='$bride_dob'>
                                                        </div>
                                                        <div class='form-group col-md-5'>
                                                            <label for='inputBrideNIC'>National Identity Card </label>
                                                            <input type='text' class='form-control' id='inputBrideNIC' name='inputBrideNIC' value='$bride_nic'>
                                                        </div>
                                                        <div class='form-group col-md-3'>
                                                            <label for='inputBrideAge'>Age </label>
                                                            <input type='text' class='form-control' id='inputBrideAge' name='inputBrideAge' value='$bride_age'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='inputBrideAddress'> Address </label>
                                                        <textarea rows='5' class='form-control' id='inputBrideAddress' name='inputBrideAddress' value='$bride_address'>$bride_address</textarea>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputBrideTP'>Telephone Number </label>
                                                            <input type='text' class='form-control' id='inputBrideTP' name='inputBrideTP' value='$bride_tp'>
                                                        </div>
                                                    </div>
                                                    ";
                                                }
                                                ?>
                                                <p class="card-description"> Details of the Guardian </p>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="inputBrideGuardianName"> Name of the Guardian </label>
                                                    <input type="text" class="form-control" id="inputBrideGuardianName" name="inputBrideGuardianName" value="<?php echo $bride_guard_name ?>" placeholder="Name of the Guardian" required>
                                                </div>
                                                <?php
                                                if ($bride_village == "Home Village") {
                                                    echo "
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inputGroomGuardianIndex'> Index No of the Guardian </label>
                                                            <input type='text' class='form-control' id='inputGroomGuardianIndex' name='inputGroomGuardianIndex' placeholder='Index No' value='$bride_guard_index'>
                                                        </div>
                                                    </div>
                                                ";
                                                }
                                                ?>
                                                <?php
                                                if ($bride_village == "Not Home Village") {
                                                    echo "
                                                <div>
                                                    <p class='card-description'> Details of the Mosque </p>
                                                    <hr>
                                                    <div class='form-group'>
                                                        <label for='inputBrideMosque'>Name of the Mosque </label>
                                                        <input type='text' class='form-control' id='inputBrideMosque' name='inputBrideMosque' value='$bride_mosque_name'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='inputBrideMosqueAddress'> Address </label>
                                                        <textarea rows='5' class='form-control' id='inputBrideMosqueAddress' name='inputBrideMosqueAddress' value='$bride_mosque_add'>$bride_mosque_add</textarea>
                                                    </div>
                                                </div>
                                                ";
                                                }
                                                ?>
                                                <div class="w-100 text-right">
                                                    <button class="btn btn-success btn-lg" id="nikkahPrev2">Previous</button>
                                                    <button class="btn btn-primary btn-lg" id="nikkahNext2">Next</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                                            <div id="nikkahDonation">
                                                <h4 class="card-title">Nikkah Donation Form</h4>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputdonation"> Donation Amount </label>
                                                        <input type="text" class="form-control" id="inputdonation" name="inputdonation" placeholder="Amount" value="<?php echo $donation ?>">
                                                    </div>
                                                </div>
                                                <div class="w-100 text-right">
                                                    <button class="btn btn-success btn-lg" id="nikkahPrev3">Previous</button>
                                                    <button class="btn btn-primary btn-lg" id="editNikkah" name="editNikkah">Edit Details</button>
                                                </div>
                                            </div>
                                    </div>
                                    </form>

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