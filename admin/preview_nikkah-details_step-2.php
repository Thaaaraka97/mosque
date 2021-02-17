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
                                    <div class="text-dark col-auto" id="viewDetails">
                                        <h4 class="card-title"> Details Preview Step-2 </h4>
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
                                            <tr class="text-center">
                                                <td colspan="3" class="align-items-center badge badge-secondary ">Groom Details</td>
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
                                                <th>Name of the Guardian</th>
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

                                    <div class="text-dark" id="editDetails">
                                        <div id="groomdetails">
                                            <h4 class="card-title">Edit Details </h4>
                                            <div class="form-group col-md-6 pl-5">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="form-label">Groom belongs to</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputGroomVillage" id="inputGroomVillageY" value="Our Village" <?php echo ($groom_village == 'Our Village') ? 'checked' : '' ?>> Our Village </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="inputGroomVillage" id="inputGroomVillageN" value="Not Our Village" <?php echo ($groom_village == 'Not Our Village') ? 'checked' : '' ?>> Not Our Village </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputIndexNo"> Index Number </label>
                                                        <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No" value="<?php echo $groom_index ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputSubdivision"> Sub-division </label>
                                                        <select id="inputSubdivision" name="inputSubdivision" class="form-control">
                                                            <option value="0" <?php echo ($groom_subdivision == '0') ? 'selected' : '' ?>>Choose...</option>
                                                            <?php
                                                            $sub_division = $database->select_data('tbl_subdivision');
                                                            foreach ($sub_division as $sub_division_item) {
                                                                $selected = "";
                                                                if ($sub_division_item["sb_name"] == $groom_subdivision) {
                                                            ?>
                                                                    <option value=' <?php echo $sub_division_item["sb_name"]; ?>' selected> <?php echo $sub_division_item["sb_name"]; ?> </option>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <option value=' <?php echo $sub_division_item["sb_name"]; ?>'> <?php echo $sub_division_item["sb_name"]; ?> </option>

                                                                <?php
                                                                }
                                                                ?>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputGroomName">Name of the Groom </label>
                                                <input type="text" class="form-control" id="inputGroomName" name="inputGroomName" placeholder="Name" value="<?php echo $groom_name ?>" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputGroomBirthday">Birthday </label>
                                                    <input type="date" class="form-control" id="inputGroomBirthday" name="inputGroomBirthday" value="<?php echo $groom_dob ?>" required>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputGroomNIC">National Identity Card </label>
                                                    <input type="text" class="form-control" id="inputGroomNIC" name="inputGroomNIC" placeholder="NIC" value="<?php echo $groom_nic ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputGroomAge">Age </label>
                                                    <input type="text" class="form-control" id="inputGroomAge" name="inputGroomAge" placeholder="Age" value="<?php echo $groom_age ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputGroomTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputGroomTP" name="inputGroomTP" placeholder="077xxxxxxx" value="<?php echo $groom_tp ?>" required>
                                                </div>
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
                                            <div class="form-group">
                                                <label for="inputGroomAddress">Address </label>
                                                <textarea rows="5" class="form-control" id="inputGroomAddress" name="inputGroomAddress" value="<?php echo $groom_address ?>" required></textarea>
                                            </div>
                                            <p class="card-description"> Details of the Guardian </p>
                                            <div class="form-group">
                                                <label for="inputGroomGuardianName">Name of the Guardian </label>
                                                <input type="text" class="form-control" id="inputGroomGuardianName" name="inputGroomGuardianName" value="<?php echo $groom_guard_name ?>" placeholder="Name of the Guardian" required>
                                            </div>
                                            <div class="form-row" id="groomGuardianIndex">
                                                <div class="form-group col-md-6">
                                                    <label for="inputGroomGuardianIndex"> Index No of the Guardian </label>
                                                    <input type="text" class="form-control" id="inputGroomGuardianIndex" name="inputGroomGuardianIndex" placeholder="Index No" value="<?php echo $groom_guard_index ?>">
                                                </div>
                                            </div>
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
                                            <div id="">
                                                <p class="card-description"> Details of the Mosque </p>
                                                <div class="form-group">
                                                    <label for="inputGroomMosque">Name of the Mosque </label>
                                                    <input type="text" class="form-control" id="inputGroomMosque" name="inputGroomMosque" placeholder="Mosque" value="<?php echo $groom_mosque_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputGroomMosqueAddress"> Address </label>
                                                    <textarea rows="5" class="form-control" id="inputGroomMosqueAddress" name="inputGroomMosqueAddress" value="<?php echo $groom_mosque_add ?>"></textarea>
                                                </div>
                                            </div>
                                            <div class="w-100 text-right">
                                                <button class="btn btn-primary btn-lg" id="nikkahNext">Next</button>
                                            </div>
                                        </div>
                                        <div id="bridedetails">
                                            <h4 class="card-title pt-2">Bride Details Form</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 pl-5">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class="form-label">Bride belongs to</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputBrideVillage" id="inputBrideVillageY" value="Our Village" <?php echo ($bride_village == 'Our Village') ? 'checked' : '' ?>> Our Village </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="inputBrideVillage" id="inputBrideVillageN" value="Not Our Village" <?php echo ($bride_village == 'Not Our Village') ? 'checked' : '' ?>> Not Our Village </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputBrideIndexNo"> Index Number </label>
                                                        <input type="text" class="form-control" id="inputBrideIndexNo" name="inputBrideIndexNo" placeholder="Index No" value="<?php echo $bride_index ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputSubdivision"> Sub-division </label>
                                                        <select id="inputSubdivision" name="inputSubdivision" class="form-control">
                                                        <option value="0" <?php echo ($bride_subdivision == '0') ? 'selected' : '' ?>>Choose...</option>
                                                            <?php
                                                            $sub_division = $database->select_data('tbl_subdivision');
                                                            foreach ($sub_division as $sub_division_item) {
                                                                $selected = "";
                                                                if ($sub_division_item["sb_name"] == $bride_subdivision) {
                                                            ?>
                                                                    <option value=' <?php echo $sub_division_item["sb_name"]; ?>' selected> <?php echo $sub_division_item["sb_name"]; ?> </option>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <option value=' <?php echo $sub_division_item["sb_name"]; ?>'> <?php echo $sub_division_item["sb_name"]; ?> </option>

                                                                <?php
                                                                }
                                                                ?>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputBrideName">Name of the Bride </label>
                                                <input type="text" class="form-control" id="inputBrideName" name="inputBrideName" placeholder="Name" value="<?php echo $bride_name ?>" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputBrideBirthday">Birthday </label>
                                                    <input type="date" class="form-control" id="inpuBridetBirthday" name="inpuBridetBirthday" value="<?php echo $bride_dob ?>" required>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputBrideNIC">National Identity Card </label>
                                                    <input type="text" class="form-control" id="inputBrideNIC" name="inputBrideNIC" placeholder="NIC" value="<?php echo $bride_nic ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputBrideAge">Age </label>
                                                    <input type="text" class="form-control" id="inputBrideAge" name="inputBrideAge" placeholder="Age" value="<?php echo $bride_age ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputBrideTP">Telephone Number </label>
                                                    <input type="text" class="form-control" id="inputBrideTP" name="inputBrideTP" placeholder="077xxxxxxx" value="<?php echo $bride_tp ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputBrideAddress"> Address </label>
                                                <textarea rows="5" class="form-control" id="inputBrideAddress" name="inputBrideAddress" value="<?php echo $bride_address ?>" required></textarea>
                                            </div>
                                            <p class="card-description"> Details of the Guardian </p>
                                            <div class="form-group">
                                                <label for="inputBrideGuardianName"> Name of the Guardian </label>
                                                <input type="text" class="form-control" id="inputBrideGuardianName" name="inputBrideGuardianName" value="<?php echo $bride_guard_name ?>" placeholder="Name of the Guardian" required>
                                            </div>
                                            <div class="form-row" id="brideGuardianIndex">
                                                <div class="form-group col-md-6">
                                                    <label for="inputBrideGuardianIndex"> Index No of the Guardian </label>
                                                    <input type="text" class="form-control" id="inputBrideGuardianIndex" name="inputBrideGuardianIndex" value="<?php echo $bride_guard_index ?>" placeholder="Index No">
                                                </div>
                                            </div>
                                            <div id="">
                                                <p class="card-description"> Details of the Mosque </p>
                                                <div class="form-group">
                                                    <label for="inputBrideMosque">Name of the Mosque </label>
                                                    <input type="text" class="form-control" id="inputBrideMosque" name="inputBrideMosque" placeholder="Mosque" value="<?php echo $bride_mosque_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputBrideMosqueAddress"> Address </label>
                                                    <textarea rows="5" class="form-control" id="inputBrideMosqueAddress" name="inputBrideMosqueAddress" value="<?php echo $bride_mosque_add ?>"></textarea>
                                                </div>
                                            </div>
                                            <div class="w-100 text-right">
                                                <button class="btn btn-success btn-lg" id="nikkahPrev2">Previous</button>
                                                <button class="btn btn-primary btn-lg" id="nikkahNext2">Next</button>
                                            </div>
                                        </div>
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