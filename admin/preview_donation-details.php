<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$sort5 = 0;
$sort6 = 0;
if (isset($_GET['sort5'])) {
    $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
    $sort6 = $_GET['sort6'];
}
?>
<script type="text/javascript">
    var sort5 = "<?php echo $sort5; ?>";
    var sort6 = "<?php echo $sort6; ?>";
    var donationaction = "<?php echo $action; ?>";
    var villageraction = "";
    var action = "";
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
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <h3 class="card-title top"> Donation Details Preview </h3>
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
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                            <label for="donationlistDetails">List Down</label>
                                            <select name="donationlistDetails" id="donationlistDetails">
                                                <option value="alldonations" <?= $action == 'alldonations' ? ' selected="selected"' : ''; ?>>All Donations</option>
                                                <option value="trusteeboard" <?= $action == 'trusteeboard' ? ' selected="selected"' : ''; ?>>Trusteeboard Donations</option>
                                                <option value="disaster" <?= $action == 'disaster' ? ' selected="selected"' : ''; ?>>Disaster Relief Donations</option>
                                                <option value="other" <?= $action == 'other' ? ' selected="selected"' : ''; ?>>Other Donations</option>
                                            </select>
                                            <hr>
                                            <?php
                                            $donation_details = $database->select_dates('tbl_trusteeboarddonation','tbd_date',$sort5,$sort6);
                                            $where2 = array(
                                                'd_donationType'     =>    'Disaster Relief Donation'
                                            );
                                            $donation_details2 = $database->select_where('tbl_donations', $where2);
                                            $where3 = array(
                                                'd_donationType'     =>    'Other Donation'
                                            );
                                            $donation_details3 = $database->select_where('tbl_donations', $where3);

                                            ?>
                                            <div id="alldonations">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Donation Type</th>
                                                                <th>Amount</th>
                                                                <th>Notes</th>
                                                                <th>Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($action == "alldonations") {
                                                                foreach ($donation_details as $donation_details_item) {
                                                                    $id = $donation_details_item['tbd_id'];
                                                                    echo "
                                                                 <tr>
                                                                    <td>" . $donation_details_item['tbd_name'] . "</td>
                                                                    <td>" . "Trusteeboard Donations" . "</td>
                                                                    <td>" . $donation_details_item['tbd_amount'] . "</td>
                                                                    <td>" . $donation_details_item['tbd_notes'] . "</td>
                                                                    <td>" . $donation_details_item['tbd_date'] . "</td>
                                                                    <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                                }
                                                                foreach ($donation_details2 as $donation_details_item2) {
                                                                    $id2 = $donation_details_item2['d_id'];
                                                                    echo "
                                                                 <tr>
                                                                    <td>" . $donation_details_item2['d_name'] . "</td>
                                                                    <td>" . $donation_details_item2['d_donationType'] . "</td>
                                                                    <td>" . $donation_details_item2['d_amount'] . "</td>
                                                                    <td>" . $donation_details_item2['d_notes'] . "</td>
                                                                    <td>" . $donation_details_item2['d_date'] . "</td>
                                                                    <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id2 . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                                }
                                                                foreach ($donation_details3 as $donation_details_item3) {
                                                                    $id3 = $donation_details_item3['d_id'];
                                                                    echo "
                                                                 <tr>
                                                                    <td>" . $donation_details_item3['d_name'] . "</td>
                                                                    <td>" . $donation_details_item3['d_donationType'] . "</td>
                                                                    <td>" . $donation_details_item3['d_amount'] . "</td>
                                                                    <td>" . $donation_details_item3['d_notes'] . "</td>
                                                                    <td>" . $donation_details_item3['d_date'] . "</td>
                                                                    <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id3 . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="trusteeboard">
                                                <div class="table-responsive table-responsive-data2">
                                                    <div class="sorting">
                                                        <div class="row">
                                                            <div class="form-group col-md-3">
                                                                <label for="sortTBDonFrom">From</label>
                                                                <input class="form-control" type="date" name="sortTBDonFrom" id="sortTBDonFrom" value="<?php echo $sort5 ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="sortTBDonTo">To</label>
                                                                <input class="form-control" type="date" name="sortTBDonTo" id="sortTBDonTo" value="<?php echo $sort6 ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Designation</th>
                                                                <th>Amount</th>
                                                                <th>Notes</th>
                                                                <th>Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($action == "trusteeboard") {
                                                                foreach ($donation_details as $donation_details_item) {
                                                                    $id = $donation_details_item['tbd_id'];
                                                                    echo "
                                                                 <tr>
                                                                    <td>" . $donation_details_item['tbd_name'] . "</td>
                                                                    <td>" . $donation_details_item['tbd_designation'] . "</td>
                                                                    <td>" . $donation_details_item['tbd_amount'] . "</td>
                                                                    <td>" . $donation_details_item['tbd_notes'] . "</td>
                                                                    <td>" . $donation_details_item['tbd_date'] . "</td>
                                                                    <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                                }
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="disaster">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Amount</th>
                                                                <th>Notes</th>
                                                                <th>Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($action == "disaster") {
                                                                foreach ($donation_details2 as $donation_details_item2) {
                                                                    $id = $donation_details_item2['d_id'];
                                                                    echo "
                                                                 <tr>
                                                                    <td>" . $donation_details_item2['d_name'] . "</td>
                                                                    <td>" . $donation_details_item2['d_amount'] . "</td>
                                                                    <td>" . $donation_details_item2['d_notes'] . "</td>
                                                                    <td>" . $donation_details_item2['d_date'] . "</td>
                                                                    <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                                }
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="other">
                                                <div class="table-responsive table-responsive-data2">
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Name</th>
                                                                <th>Contact Number</th>
                                                                <th>Amount</th>
                                                                <th>Notes</th>
                                                                <th>Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($donation_details3 as $donation_details_item3) {
                                                                $id = $donation_details_item3['d_id'];
                                                                echo "
                                                             <tr>
                                                                <td>" . $donation_details_item3['d_name'] . "</td>
                                                                <td>" . $donation_details_item3['d_tp'] . "</td>
                                                                <td>" . $donation_details_item3['d_amount'] . "</td>
                                                                <td>" . $donation_details_item3['d_notes'] . "</td>
                                                                <td>" . $donation_details_item3['d_date'] . "</td>
                                                                <td>
                                                                    <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
                                                                </td>
                                                            </tr>
                                                             ";
                                                            }


                                                            ?>
                                                        </tbody>
                                                    </table>
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