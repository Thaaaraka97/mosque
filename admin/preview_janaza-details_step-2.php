<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'] ;
$where = array(
    'jd_janazaId' => $id
);

$date_of_death = "";
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
    if ($gender == "M") {
        $gender = "Male";
    }
    else {
        $gender = "Female";
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
                        <h3 class="page-title"> Janaza Details </h3>
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
                                    <div class="mt-5 text-dark col-auto content-center " id="viewDetails">
                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Name</th>
                                                <td> : </td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Death</th>
                                                <td> : </td>
                                                <td><?php echo $date_of_death ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td> : </td>
                                                <td><?php echo $gender ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Funeral</th>
                                                <td> : </td>
                                                <td><?php echo $date_of_funeral ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address of the Funeral</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informer Name</th>
                                                <td> : </td>
                                                <td><?php echo $relative ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informer Index</th>
                                                <td> : </td>
                                                <td><?php echo $relative_index ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informer Sub Division</th>
                                                <td> : </td>
                                                <td><?php echo $relative_subdivision ?></td>
                                            </tr>
                                            <tr>
                                                <th>Relationship to the Informer</th>
                                                <td> : </td>
                                                <td><?php echo $relative_relationship ?></td>
                                            </tr>
                                            <tr>
                                                <th>Special Notes</th>
                                                <td> : </td>
                                                <td><?php echo $sp_notes ?></td>
                                            </tr>
                                            <tr>
                                                <th>Informed Date</th>
                                                <td> : </td>
                                                <td><?php echo $informed_date ?></td>
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