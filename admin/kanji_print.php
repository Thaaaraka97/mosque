<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
if (isset($_GET['left'])) {
    $message = "Record successsfully updated..!";
} elseif (isset($_GET['edited'])) {
    $message = "Record successsfully Edited and Updated..!";
} elseif (isset($_GET['saandha'])) {
    $message = "Saandha Status successsfully Edited and Updated..!";
}

if (isset($_GET['list'])) {
    $list = $_GET['list'];
}

$kanji_ingredients = $database->select_data('tbl_kanjiingredients');
$kanji_people = $database->select_data('tbl_kanjipeople');
$i = 1;
$j = 1;
?>
<style>
    table.dataTable.no-footer {
        border-bottom: 0;
    }

    .table-data2.table tbody tr td:last-child {
        padding-right: 0;
    }

    body,
    html {
        background-color: white;
    }
    .card-body{
        background-color: #f6f6f6;
        border-radius: 30px;

    }
    .card{
        border-radius: 30px;
        border-width: 1px;
    }
    
</style>

<body>
    <div class="mt-8">
        <!-- partial -->
        <div class="">
            <!-- partial -->
            <div class="">
                <div class="wrapper">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td class="pl-5">
                                                <div>
                                                    <?php
                                                    if ($list == "ingredients") {
                                                        echo "<h3 class='card-title top'> Kanji Ingredients List </h3>";
                                                    }
                                                    else {
                                                        echo "<h3 class='card-title top'> Kanji List </h3>";
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
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="">
                                <div class="">
                                    <div class="text-center">
                                        <table class="table table-bordered table-lg" id="ingredients">
                                            <thead>
                                                <tr class="tr-shadow">
                                                    <th>No</th>
                                                    <th>Ingredient</th>
                                                    <th>Paal Kanji</th>
                                                    <th>Vegitable</th>
                                                    <th>Meat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($kanji_ingredients as $kanji_ingredients_item) {
                                                    if (isset($kanji_ingredients_item['kji_ingredient'])) {
                                                        echo "
                                                         <tr>
                                                            <td class='text-dark font-weight-bold'>" . $i . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_ingredients_item['kji_ingredient'] . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_ingredients_item['kji_paalkanji'] . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_ingredients_item['kji_vegetable'] . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_ingredients_item['kji_meat'] . "</td>
                                                        <tr>";
                                                    $i = $i + 1;
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-lg" id="people">
                                            <thead>
                                                <tr class="tr-shadow">
                                                    <th>No</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th> Contact Number</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($kanji_people as $kanji_people_item) {
                                                    if (isset($kanji_people_item['kjp_date'])) {
                                                        echo "
                                                         <tr>
                                                            <td class='text-dark font-weight-bold'>" . $j . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_people_item['kjp_date'] . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_people_item['kjp_name'] . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_people_item['kjp_tp'] . "</td>
                                                            <td class='text-dark font-weight-bold'>" . $kanji_people_item['kjp_address'] . "</td>
                                                        <tr>";
                                                        $j = $j + 1;
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
                    <!-- content-wrapper ends -->

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>
    <!-- container-scroller -->

    <!-- footer -->
    <script src="<?php $server_name ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</body>

<script type="text/javascript">
    var list = "<?php echo $list ?>";
    $(document).ready(function () {
        if (list == "ingredients") {
            $("#ingredients").show();
            $("#people").hide();
        }
        else if (list == "people") {
            $("#people").show();
            $("#ingredients").hide();
        }
    });

    window.onload = function() {
        window.print();
    }
</script>

</html>