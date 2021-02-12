<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
$action = $_GET['action'] ;
$where = array(
    'nd_nikkahId' => $id
);

$date = "";
$bride_name = "";
$groom_name = "";
$address = "";

$nikkah_details = $database->select_where('tbl_nikkahdetails', $where);
foreach ($nikkah_details as $nikkah_details_item) {
    $date = $nikkah_details_item['nd_marriageDate'];
    $bride_name = $nikkah_details_item['nd_brideName'];
    $groom_name = $nikkah_details_item['nd_groomName'];
    $address = $nikkah_details_item['nd_groomAddress'];
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
                                    <div class="mt-5 text-dark col-auto" id="viewDetails">
                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Date</th>
                                                <td> : </td>
                                                <td><?php echo $date ?></td>
                                            </tr>
                                            <tr>
                                                <th>Bride Name</th>
                                                <td> : </td>
                                                <td><?php echo $bride_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Groom Name</th>
                                                <td> : </td>
                                                <td><?php echo $groom_name ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td> : </td>
                                                <td><?php echo $address ?></td>
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