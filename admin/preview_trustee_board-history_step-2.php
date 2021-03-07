<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

$id = $_GET['id'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_GET['deleted'])) {
    $message = "Record successfully Deleted..!";
}
elseif (isset($_GET['edited'])) {
    $message = "Record successfully Updated..!";
}


$where = array(
    'th_id' => $id
);

$elected_ID = "";
$record = "";

$trustee_board_history = $database->select_where('tbl_trusteeboardhistory', $where);
foreach ($trustee_board_history as $trustee_board_history_item) {
    $elected_ID = $trustee_board_history_item['tb_electedYYMM'];
    $record = $trustee_board_history_item['th_record'];
    if ($record == "") {
        $record = "-";
    }
}

?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    var id = "<?php echo $id; ?>";
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
                    if (isset($_GET['deleted'])) {
                        echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    elseif (isset($_GET['edited'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> Trustee Board History </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_trustee_board-history.php">Details Preview</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details Preview Step-2</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="mt-5 text-dark col-auto " id="">
                                        <h4 class="card-title"> Details Preview Step-2 </h4>
                                        <table class="table table-responsive previewTable">
                                            <tr>
                                                <th>Trusteeboard ID</th>
                                                <td> : </td>
                                                <td><?php echo $elected_ID ?></td>
                                            </tr>
                                            <tr>
                                                <th>Details</th>
                                                <td> : </td>
                                                <td><?php echo $record ?></td>
                                            </tr>
                                        </table>
                                        <div id="editable">
                                            <div class="form-group">
                                                <label for="inputDetails"> Enter Details </label>
                                                <textarea rows="5" class="form-control" id="inputDetails" name="inputDetails"></textarea>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-lg" id="addTBHistory" name="addTBHistory">Enter Details</button>
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