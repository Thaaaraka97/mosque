<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'];
$where = array(
    'jd_janazaId' => $id
);

$date_of_death = "";
$index = "";
$name = "";
$gender = "";
$subdivision = "";
$date_of_funeral = "";
$address = "";
$relative = "";
$relative_index = "";
$relative_subdivision = "";
$relative_relationship = "";
$sp_notes = "";
$informed_date = "";

$janaza_details = $database->select_where('tbl_janazadetails', $where);
foreach ($janaza_details as $janaza_details_item) {
    $name = $janaza_details_item['jd_name'];
    $index = $janaza_details_item['jd_index'];
    $date_of_death = $janaza_details_item['jd_dateofDeath'];
    $gender = $janaza_details_item['jd_gender'];
    $subdivision = $janaza_details_item['jd_subDivision'];
    $date_of_funeral = $janaza_details_item['jd_dateofFuneral'];
    $address = $janaza_details_item['jd_addressofFuneral'];
    $relative = $janaza_details_item['jd_relativeName'];
    $relative_index = $janaza_details_item['jd_relativeIndex'];
    $relative_subdivision = $janaza_details_item['jd_relativeSubDivision'];
    $relative_relationship = $janaza_details_item['jd_relativeRelationship'];
    $sp_notes = $janaza_details_item['jd_specialNotes'];
    $informed_date = $janaza_details_item['jd_informedDate'];
    $informed_time = $janaza_details_item['jd_informedTime'];
    if ($gender == "M") {
        $gender = "Male";
    } else {
        $gender = "Female";
    }
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
                    <div class="page-header">
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_janaza-details.php">Details Preview</a></li>
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
                                                        echo "<h3 class='card-title top'> Janaza Details Preview </h3>";
                                                    }
                                                    if ($action == "edit") {
                                                        echo "<h3 class='card-title top'> Janaza Details (Edit) </h3>";
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
                                        <h4 class="card-title"> Person Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $name ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Index Number</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $index ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Sub Division</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $subdivision ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Gender</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $gender ?></p>
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
                                        <h4 class="card-title"> Funeral Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Date of Death</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $date_of_death ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Date of Funeral</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $date_of_funeral ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Address of the Funeral</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $address ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($sp_notes != "") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Special Notes</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$sp_notes</p>
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
                                        <h4 class="card-title"> Informer Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Informer :Name</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $relative ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($relative_index != "0") {
                                            echo "
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Informer :Index</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$relative_index</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='preview-list'>
                                                    <div class='preview-item border-bottom'>
                                                        <div class='preview-item-content d-sm-flex flex-grow'>
                                                            <div class='flex-grow'>
                                                                <h6 class='preview-subject'>Informer :Sub-Division</h6>
                                                            </div>
                                                            <div class='mr-auto text-sm-right pt-2 pt-sm-0'>
                                                                <p class='text-muted'>$relative_subdivision</p>
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
                                                        <h6 class="preview-subject">Relationship to the Informer</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $relative_relationship ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Informed Date</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $informed_date ?></p>
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
                                        <form class="pt-3" method="post">
                                            <h4 class="card-title">Edit Details</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputIndexNoDeceased"> Index Number of the Deceased </label>
                                                    <input type="text" class="form-control" id="inputIndexNoDeceased" name="inputIndexNoDeceased" value="<?php echo $index ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputJanazaSubdivision"> Sub-division </label>
                                                    <input type="text" class="form-control" id="inputJanazaSubdivision" name="inputJanazaSubdivision" value="<?php echo $subdivision ?>" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Name of the Deceased </label>
                                                <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $name ?>" readonly>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputSex"> Gender </label>
                                                    <input type="text" class="form-control" id="inputSex" name="inputSex" value="<?php echo $gender ?>" readonly>

                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputDeathDate">Date of Death </label>
                                                    <input type="date" class="form-control" id="inputDeathDate" name="inputDeathDate" value="<?php echo $date_of_death ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputFuneralDate">Date of the Funeral </label>
                                                    <input type="date" class="form-control" id="inputFuneralDate" name="inputFuneralDate" value="<?php echo $date_of_funeral ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress"> Place of the Funeral </label>
                                                <textarea rows="5" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $address ?>" required><?php echo $address ?></textarea>
                                            </div>
                                            <p class="card-description"> Details of person who give details </p>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputGName">Name </label>
                                                    <input type="text" class="form-control" id="inputGName" name="inputGName" placeholder="Name" value="<?php echo $relative ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputRelationship"> Relationship to the Deceased </label>
                                                    <input type="text" class="form-control" id="inputRelationship" name="inputRelationship" placeholder="Relationship" value="<?php echo $relative_relationship ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputIndexNo"> Index Number </label>
                                                    <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No" value="<?php echo $relative_index ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSubdivision"> Sub-division </label>
                                                    <select id="inputGSubdivision" name="inputGSubdivision" class="form-control">
                                                        <option value="0" <?php echo ($subdivision == '0') ? 'selected' : '' ?>>Choose...</option>
                                                        <?php
                                                        foreach ($sub_division as $sub_division_item) {
                                                            $selected = "";
                                                            if ($sub_division_item["sb_name"] == $subdivision) {
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
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputInformDate"> Informed Date </label>
                                                    <input type="date" class="form-control" id="inputInformDate" name="inputInformDate" value="<?php echo $informed_date ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputInformTime"> Informed Time </label>
                                                    <input type="time" class="form-control" id="inputInformTime" name="inputInformTime" value="<?php echo $informed_time ?>">
                                                </div>
                                            </div>
                                            <div class=" form-group">
                                                <label for="inputNotes">Special Notes </label>
                                                <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4" value="<?php echo $sp_notes ?>"><?php echo $sp_notes ?></textarea>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                                            <div class="text-center">
                                                <button name="editJanaza" id="editJanaza" class="btn btn-primary btn-lg">Edit Details</button>
                                            </div>
                                        </form>
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