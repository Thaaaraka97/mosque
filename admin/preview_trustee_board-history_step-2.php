<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();

$id = $_GET['id'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_GET['deleted'])) {
    $message = "Record successfully Deleted..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successfully Updated..!";
}

$elected_ID = "";
$record = "";
$where = array(
    'th_id' => $id
);
$trustee_board_history = $database->select_where('tbl_trusteeboardhistory', $where);
foreach ($trustee_board_history as $trustee_board_history_item) {
    $elected_ID = $trustee_board_history_item['th_electedYYMM'];
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
                    } elseif (isset($_GET['edited'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="page-header">
                        <h3 class="page-title"> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>preview_trustee_board-history.php">Details Preview</a></li>
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
                                                    <h3 class="card-title top"> Trusteeboard History Preview </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">Trusteeboard ID</h6>
                                                </div>
                                                <div class="mr-auto text-sm-left pt-2 pt-sm-0">
                                                    <p class="text-muted"><?php echo $elected_ID ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">Details</h6>
                                                </div>
                                                <div class="mr-auto text-sm-left pt-2 pt-sm-0">
                                                    <p class="text-muted">
                                                    <?php 
                                                        $where = array(
                                                            'th_electedYYMM' => $elected_ID
                                                        );
                                                        $trustee_board_history = $database->select_where('tbl_trusteeboardhistory', $where);
                                                        foreach ($trustee_board_history as $trustee_board_history_item) {
                                                            $elected_ID = $trustee_board_history_item['th_electedYYMM'];
                                                            $record = $trustee_board_history_item['th_record'];
                                                            if ($record == "") {
                                                                $record = "-";
                                                            }
                                                            echo $record."<br>";
                                                        }
                                                    ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="editable">
                        <div class="row justify-content-center">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card shadow top-card">
                                    <div class="card-body top-card">
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