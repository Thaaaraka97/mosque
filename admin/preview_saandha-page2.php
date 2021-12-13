<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
$id = "";
$where = "";

if (isset($_GET['deleted'])) {
    $message = "Record successfully Deleted..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successfully Updated..!";
}
$sort15 = 0;
$sort16 = 0;
if (isset($_GET['sort15'])) {
    $sort15 = $_GET['sort15'];
}
if (isset($_GET['sort16'])) {
    $sort16 = $_GET['sort16'];
}


// find saandha collection
$settled_amount = 0;
$settled_people = 0;
$current_collection_subdivision = 0;
$current_collection_index = 0;
$saandha_collections = $database->select_dates('tbl_saandhacollection', 'collection_id ', $sort15, $sort16);



?>
<script type="text/javascript">
    var sort15 = "<?php echo $sort15; ?>";
    var sort16 = "<?php echo $sort16; ?>";
</script>

<style>
    .dataTables_filter, .dataTables_length, .dataTables_info, .dataTables_paginate { display: none; }
</style>

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
                                                    <h3 class="card-title top"> Saandha Record Search Page </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="individualRecords">
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
                                                                <label for="sortRef1">Reference No</label>
                                                                <input class="form-control" type="text" name="sortRef1" id="sortRef1" value="<?php echo $sort15 . "-" . $sort16 ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for=""></label>
                                                                <div class="btn btn-primary form-control " id="btnFindRef" name="btnFindRef">Find</div>
                                                                <!-- <input type="button" value="Find" class="form-control btn btn-primary"> -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <table class="table table-data2">
                                                        <thead>
                                                            <tr class="tr-shadow">
                                                                <th>Reference No</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Index</th>
                                                                <th>Sub-Division</th>
                                                                <th>Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $total_sum_for_record = 0;
                                                            $receipt_no = 1;
                                                            $name = "";
                                                            $current_index = 0;
                                                            $current_subdivision = 0;
                                                            $current_date = 0;


                                                            foreach ($saandha_collections as $saandha_collections_item) {
                                                                $total_sum_for_record = $total_sum_for_record + $saandha_collections_item['collection_paidAmount'];
                                                                $current_index = $saandha_collections_item['collection_index'];
                                                                $current_subdivision = $saandha_collections_item['collection_subdivision'];
                                                                $current_date = $saandha_collections_item['collection_date'];
                                                                $name = $saandha_collections_item['collection_name'];



                                                                // foreach ($saandha_collection_person_details as $saandha_collection_person_item) {
                                                                //     $where = array(
                                                                //         'collection_index'     =>     $saandha_collection_person_item['collection_index'],
                                                                //         'collection_subdivision'     =>     $saandha_collection_person_item['collection_subdivision'],
                                                                //         'collection_date'     =>     $saandha_collection_date_item['collection_date']
                                                                //     );
                                                                //     $person_saandha_collection = $database->select_where('tbl_saandhacollection', $where);
                                                                //     foreach ($person_saandha_collection as $person_saandha_collection_item) {
                                                                //         if (isset($person_saandha_collection_item['collection_id'])) {
                                                                //             $total_sum_for_person = $total_sum_for_person + $person_saandha_collection_item['collection_paidAmount'];
                                                                //         }
                                                                //     }
                                                                //     if ($total_sum_for_person != 0 && $person_saandha_collection_item['collection_date'] <= $sort6 && $person_saandha_collection_item['collection_date'] >= $sort5) {
                                                                //         echo "
                                                                //             <tr>
                                                                //                 <td>" . $receipt_no . "</td>
                                                                //                 <td>" . $saandha_collection_date_item['collection_date'] . "</td>
                                                                //                 <td>" . $total_sum_for_person . "</td>
                                                                //                 <td>" . $saandha_collection_person_item['collection_index'] . "</td>
                                                                //                 <td>" . $saandha_collection_person_item['collection_subdivision'] . "</td>
                                                                //                 <td>" . $saandha_collection_person_item['collection_name'] . "</td>
                                                                //             </tr>
                                                                //             ";
                                                                //         $total_sum_for_person = 0;
                                                                //         $receipt_no = $receipt_no + 1;
                                                                //     }
                                                                // }
                                                            }
                                                            echo "
                                                                            <tr>
                                                                                <td>" . $sort15 . "-" . $sort16 . "</td>
                                                                                <td>" . $current_date . "</td>
                                                                                <td>" . $total_sum_for_record . "</td>
                                                                                <td>" . $current_index . "</td>
                                                                                <td>" . $current_subdivision . "</td>
                                                                                <td>" . $name . "</td>
                                                                            </tr>
                                                                            ";
                                                            // $saandha_collection_person_details = $database->select_distinct3('tbl_saandhacollection', 'collection_index', 'collection_subdivision', 'collection_name');
                                                            // $saandha_collection_date_details = $database->select_distinct1('tbl_saandhacollection', 'collection_date');
                                                            // foreach ($saandha_collection_date_details as $saandha_collection_date_item) {
                                                            //     foreach ($saandha_collection_person_details as $saandha_collection_person_item) {
                                                            //         $where = array(
                                                            //             'collection_index'     =>     $saandha_collection_person_item['collection_index'],
                                                            //             'collection_subdivision'     =>     $saandha_collection_person_item['collection_subdivision'],
                                                            //             'collection_date'     =>     $saandha_collection_date_item['collection_date']
                                                            //         );
                                                            //         $person_saandha_collection = $database->select_where('tbl_saandhacollection', $where);
                                                            //         foreach ($person_saandha_collection as $person_saandha_collection_item) {
                                                            //             if (isset($person_saandha_collection_item['collection_id'])) {
                                                            //                 $total_sum_for_person = $total_sum_for_person + $person_saandha_collection_item['collection_paidAmount'];
                                                            //             }
                                                            //         }
                                                            //         if ($total_sum_for_person != 0 && $person_saandha_collection_item['collection_date'] <= $sort6 && $person_saandha_collection_item['collection_date'] >= $sort5) {
                                                            //             echo "
                                                            //                 <tr>
                                                            //                     <td>" . $receipt_no . "</td>
                                                            //                     <td>" . $saandha_collection_date_item['collection_date'] . "</td>
                                                            //                     <td>" . $total_sum_for_person . "</td>
                                                            //                     <td>" . $saandha_collection_person_item['collection_index'] . "</td>
                                                            //                     <td>" . $saandha_collection_person_item['collection_subdivision'] . "</td>
                                                            //                     <td>" . $saandha_collection_person_item['collection_name'] . "</td>
                                                            //                 </tr>
                                                            //                 ";
                                                            //             $total_sum_for_person = 0;
                                                            //             $receipt_no = $receipt_no + 1;
                                                            //         }
                                                            //     }
                                                            // }

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