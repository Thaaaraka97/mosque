<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';
print_r($_SESSION['username']) ;

$database = new databases();
$id = "";
$where = "";
$sort1 = "";

if (isset($_GET['deleted'])) {
    $message = "Record successfully Deleted..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successfully Updated..!";
}
$sort1 = "";
$sort5 = 0;
$sort6 = 0;
$sort14 = 0;
if (isset($_GET['sort5'])) {
    $sort5 = $_GET['sort5'];
}
if (isset($_GET['sort6'])) {
    $sort6 = $_GET['sort6'];
}
if (isset($_GET['sort1'])) {
    $sort1 = $_GET['sort1'];
}
if (isset($_GET['sort14'])) {
    $sort14 = $_GET['sort14'];
    // $sort14Month = date("Y-F");
    if ($sort14 != 0000-00) {
        $sort14Date = date_create($sort14);
        $sort14 = date_format($sort14Date, "Y-M");
        $sort14Month = date_format($sort14Date, "Y-m");
    }
}

// saandha amount
$saandha_amount = "";
$current_saandha_amount = "";
$YYMM = date('Y-M');
$saandha_amount_details = $database->select_data('tbl_saandhaamountfixing');
foreach ($saandha_amount_details as $saandha_amount_item) {
    $saandha_amount = $saandha_amount_item["saf_amount"];
    $saf_date = $saandha_amount_item["saf_date"];
    $saf_date = date_create($saf_date);
    $date = date_format($saf_date, "Y-M");
    if ($YYMM == $date) {
        $current_saandha_amount = $saandha_amount;
        break;
    } else {
        $current_saandha_amount = $saandha_amount;
    }
}

// find saandha registered people
$where = array(
    'av_saandhaStatus'     =>     1
);
$person_count1 = $database->select_count('tbl_allvillagers', $where);
// retrieve special saandha amounts
$person_count2 = 0;
$special_saandha_amount = 0;
$person_details = $database->select_where('tbl_allvillagers', $where);
foreach ($person_details as $person_details_item) {
    if ((float) $person_details_item["av_specialSaandhaAmt"] > 0) {
        $person_count2 = $person_count2 + 1;
        $special_saandha_amount = $special_saandha_amount + $person_details_item["av_specialSaandhaAmt"];
    }
}

// find saandha collection
$settled_amount = 0;
$settled_people = 0;
$current_collection_subdivision = 0;
$current_collection_index = 0;
$saandha_collections = $database->select_dates('tbl_saandhacollection', 'collection_date', $sort5, $sort6);
foreach ($saandha_collections as $saandha_collections_item) {
    if (isset($saandha_collections_item["collection_paidAmount"])) {
        $amount = $saandha_collections_item["collection_paidAmount"];
        if ($saandha_collections_item["collection_paidFor"] == $YYMM && $amount > 0) {
            $settled_amount = (float) $settled_amount + (float) $amount;
            $collection_index = $saandha_collections_item["collection_index"];
            $collection_subdivision = $saandha_collections_item["collection_subdivision"];
            if ($settled_people == 0) {
                $current_collection_index = $collection_index;
                $current_collection_subdivision = $collection_subdivision;
                $settled_people = $settled_people + 1;
            }
            if ($current_collection_index != $collection_index) {
                $settled_people = $settled_people + 1;
                $current_collection_index = $collection_index;
                $current_collection_subdivision = $collection_subdivision;
            }
        }
    }
}

$tot_amount_to_collect = ((int) ($person_count1 - $person_count2) * (float) $current_saandha_amount) + $special_saandha_amount;
$outstanding_amount = $tot_amount_to_collect - $settled_amount;

// total saandha due
$saandha_pay = 0;
$tot_due = 0;
foreach ($person_details as $person_details_item) {
    $index_saandha = $person_details_item["av_index"];
    $sub_saandha = $person_details_item["av_subDivision"];
    $where = array(
        'collection_index'     =>     $index_saandha,
        'collection_subdivision'     =>     $index_saandha
    );
    $person_saandha_collection = $database->select_count('tbl_saandhacollection', $where);
    foreach ($person_saandha_collection as $person_saandha_collection_item) {
        $person_collection_paidfor = $person_saandha_collection_item["collection_paidFor"];
        $person_collection_paidfor = date_create($person_collection_paidfor);
        $person_collection_paidfor = date_format($person_collection_paidfor, "Y-M");
        if ($person_collection_paidfor == $YYMM) {
            $months_count = $YYMM - $person_collection_paidfor;
            if ($person_details_item["av_specialSaandhaAmt"] > 0 && $months_count > 0) {
                $saandha_pay = $person_details_item["av_specialSaandhaAmt"];
                $tot_due = $tot_due + ($months_count * $saandha_pay);
            }
            else {
                $loop = 1;
                if ($months_count <= 0) {
                    $loop = 0;
                }
                while ($loop) {
                    foreach ($saandha_amount_details as $saandha_amount_item) {
                        $saandha_amount = $saandha_amount_item["saf_amount"];
                        $saf_date = $saandha_amount_item["saf_date"];
                        $saf_date = date_create($saf_date);
                        $date = date_format($saf_date, "Y-M");
                        $person_collection_paidfor = date('Y-M', strtotime('+1 month', strtotime($person_collection_paidfor)));
                        if ($person_collection_paidfor == $date) {
                            $current_saandha_amount = $saandha_amount;
                            break;
                        } else {
                            $current_saandha_amount = $saandha_amount;
                        }
                    }
                    $tot_due = $tot_due + $current_saandha_amount;
                    $months_count --;
                    if ($months_count <= 0) {
                        $loop = 0;
                    }
                }
            }
        }
    }
}

?>
<script type="text/javascript">
    var sort1 = "<?php echo $sort1; ?>";
    var sort5 = "<?php echo $sort5; ?>";
    var sort6 = "<?php echo $sort6; ?>";
    var sort14 = "<?php echo $sort14; ?>";
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
                                                    <h3 class="card-title top"> Saandha Page </h3>
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
                                            <div class="table-responsive table-responsive-data2">
                                                <div class="sorting">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="sortSaandhasubdivision">Filter By</label>
                                                            <select name="sortSaandhasubdivision" id="sortSaandhasubdivision" class="form-control">
                                                                <option value="0" selected>All Sub-Divisions</option>
                                                                <option value="Moragala Main-Street" <?= $sort1 == 'Moragala Main-Street' ? ' selected="selected"' : ''; ?>>Moragala Main-Street </option>
                                                                <option value="Old Rail Road" <?= $sort1 == 'Old Rail Road' ? ' selected="selected"' : ''; ?>>Old Rail Road </option>
                                                                <option value="Bandarawaththa" <?= $sort1 == 'Bandarawaththa' ? ' selected="selected"' : ''; ?>>Bandarawaththa </option>
                                                                <option value="Kothvila" <?= $sort1 == 'Kothvila' ? ' selected="selected"' : ''; ?>>Kothvila </option>
                                                                <option value="Palpitiya" <?= $sort1 == 'Palpitiya' ? ' selected="selected"' : ''; ?>>Palpitiya </option>
                                                                <option value="Ranaviru Mawatha" <?= $sort1 == 'Ranaviru Mawatha' ? ' selected="selected"' : ''; ?>>Ranaviru Mawatha </option>
                                                                <option value="Wekada-1" <?= $sort1 == 'Wekada-1' ? ' selected="selected"' : ''; ?>>Wekada-1 </option>
                                                                <option value="Wekada-2" <?= $sort1 == 'Wekada-2' ? ' selected="selected"' : ''; ?>>Wekada-2 </option>
                                                                <option value="Wekada-3" <?= $sort1 == 'Wekada-3' ? ' selected="selected"' : ''; ?>>Wekada-3 </option>
                                                                <option value="Eheliyagoda Town" <?= $sort1 == 'Eheliyagoda Town' ? ' selected="selected"' : ''; ?>>Eheliyagoda Town </option>
                                                                <option value="Other-1" <?= $sort1 == 'Other-1' ? ' selected="selected"' : ''; ?>>Other-1 </option>
                                                                <option value="Other-2" <?= $sort1 == 'Other-2' ? ' selected="selected"' : ''; ?>>Other-2 </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortSaandhaFrom">From</label>
                                                            <input class="form-control" type="date" name="sortSaandhaFrom" id="sortSaandhaFrom" value="<?php echo $sort5 ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortSaandhaTo">To</label>
                                                            <input class="form-control" type="date" name="sortSaandhaTo" id="sortSaandhaTo" value="<?php echo $sort6 ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="sortSaandhaPadiFor">Paid-For</label>
                                                            <input class="form-control" type="month" name="sortSaandhaPadiFor" id="sortSaandhaPadiFor" value="<?php echo $sort14Month ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr class="tr-shadow">
                                                            <th>Date</th>
                                                            <th>Paid-For</th>
                                                            <th>Amount</th>
                                                            <th>Index</th>
                                                            <th>Sub-Division</th>
                                                            <th>Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $where = array(
                                                            'collection_subdivision' => $sort1
                                                        );
                                                        $saandha_collection_details = $database->select_where('tbl_saandhacollection', $where);

                                                        if ($sort1 == "0") {
                                                            $saandha_collection_details = $database->select_dates('tbl_saandhacollection', 'collection_date', $sort5, $sort6);
                                                        }
                                                        if ($sort14 != 0000-00) {
                                                            $where = array(
                                                                'collection_paidFor' => $sort14
                                                            );
                                                            $saandha_collection_details = $database->select_where('tbl_saandhacollection', $where);
                                                        }
                                                        foreach ($saandha_collection_details as $saandha_collection_item) {
                                                            if (isset($saandha_collection_item['collection_id']) && $saandha_collection_item['collection_paidAmount'] > 0) {
                                                                $id = $saandha_collection_item['collection_id'];
                                                                $index = $saandha_collection_item['collection_index'];
                                                                $subdivision = $saandha_collection_item['collection_subdivision'];

                                                                echo "
                                                                <tr>
                                                                    <td>" . $saandha_collection_item['collection_date'] . "</td>
                                                                    <td>" . $saandha_collection_item['collection_paidFor'] . "</td>
                                                                    <td>" . $saandha_collection_item['collection_paidAmount'] . "</td>
                                                                    <td>" . $index . "</td>
                                                                    <td>" . $subdivision . "</td>
                                                                    <td>" . $saandha_collection_item['collection_name'] . "</td>
                                                                    <td>
                                                                        <a href='preview_villager-details_step-2.php?index=" . $index . "&subdivision=" . $subdivision . "&id=" . $id . "&action=view_saandha' class='item'><i class='fa fa-eye fa-lg' aria-hidden='true'></i></a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="otherDetails">
                        <div class="row justify-content-center">
                            <div class="col-md-10 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Monthly Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject"> Saandha Eligible Count </h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $person_count1 ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Total Income to Collect</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo "Rs." . $tot_amount_to_collect ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Settled Amount</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo "Rs." . $settled_amount ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Outstanding Due</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo "Rs." . $outstanding_amount ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">No of People Settled</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $settled_people ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">No of People to be Settled</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo $person_count1 - $settled_people ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="otherDetails2">
                        <div class="row justify-content-center">
                            <div class="col-md-10 grid-margin stretch-card">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"> Other Details </h4>
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Total Saandha Due</h6>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?php echo "Rs." . $tot_due ?></p>
                                                    </div>
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
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Delete Record ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this record? Once you click delete there's no going back.
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <a class="btn btn-danger" id="del">Delete</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>