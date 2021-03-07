<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
?>
<script type="text/javascript">
    var donationaction = "<?php echo $action; ?>";
    var villageraction = "";
    var action = "";
    var fridaycollectionaction = "";
    console.log(donationaction)
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
                        <h3 class="page-title"> Donations Details </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title"> Donations Details Preview </h4>
                                        <div class="mt-5">
                                            <label for="donationlistDetails">List Down</label>
                                            <select name="donationlistDetails" id="donationlistDetails">
                                                <option value="alldonations" <?= $action == 'alldonations' ? ' selected="selected"' : ''; ?>>All Donations</option>
                                                <option value="trusteeboard" <?= $action == 'trusteeboard' ? ' selected="selected"' : ''; ?>>Trusteeboard Donations</option>
                                                <option value="disaster" <?= $action == 'disaster' ? ' selected="selected"' : ''; ?>>Disaster Relief Donations</option>
                                                <option value="other" <?= $action == 'other' ? ' selected="selected"' : ''; ?>>Other Donations</option>
                                            </select>
                                            <?php
                                            $donation_details = $database->select_data('tbl_trusteeboarddonation');
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
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
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
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='btn btn-primary btn-md'>View</a>
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
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id2 . "&action=view' class='btn btn-primary btn-md'>View</a>
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
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id3 . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="trusteeboard">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
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
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                            }
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="disaster">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
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
                                                                        <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='btn btn-primary btn-md'>View</a>
                                                                    </td>
                                                                </tr>
                                                                 ";
                                                            }
                                                        }
                                                        
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="other">
                                                <table class="display datatable">
                                                    <thead>
                                                        <tr>
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
                                                                    <a href='preview_villager-details_step-2.php?index=" . $id . "&action=view' class='btn btn-primary btn-md'>View</a>
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