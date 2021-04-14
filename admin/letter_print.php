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

if (isset($_GET['action'])) {
    $action = $_GET['action'];
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

    .card-body {
        background-color: #f6f6f6;
        border-radius: 30px;

    }

    .card {
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
                        <div class="col-md-12 grid-margin stretch-card">
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
                                                    if ($action == "letter1") {
                                                        echo "<h3 class='card-title top'> Character Certificate Letter </h3>";
                                                    } else {
                                                        echo "<h3 class='card-title top'> Mahalla Member Confirmation Letter </h3>";
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
                        <div class="col-md-12">
                            <div class="">
                                <div class="">
                                    <div class="">
                                        <div id="letter1">
                                            <p class="mt-5">
                                                மதிப்புக்குறிய
                                            </p>
                                            <br><br>
                                            <p class="text-center font-weight-bold">மஹல்லா நற்சான்றிதழ்</p>
                                            <hr  width="20%" id="heading-underline">
                                            <br>
                                            <p class="mt-3">
                                                அல்ஹாஜ் / ஜனாப் ........................................................................... என்பவர் எமது பள்ளிவாசல் மஹல்லாவாசியாக உள்ளார் என்பதையும் எமது நிர்வாக சபையின் பார்வையில் சம்பந்தப்பட்டவரின் நடத்தை மற்றும் வெளிநடவடிக்கைகள் யாவும் நன்றாக இருக்கின்றது என்பதை உறுதிப்படுத்தி இக்கடிதத்த்தை ........................................................................................................................................... நன்றியுடன் சமர்ப்பிக்கின்றோம்
                                            </p>
                                            <br><br><br>
                                            <p class="mt-5 font-weight-bold">
                                                தலைவர் / செயலாளர்
                                            </p>
                                        </div>
                                        <div id="letter2">
                                            <p class="mt-5">
                                                மதிப்புக்குறிய
                                            </p>
                                            <br><br>
                                            <p class="text-center font-weight-bold">மஹல்லாவாசி என்பதை உறுதிப்படுத்தல்</p>
                                            <hr id="heading-underline2">
                                            <br>
                                            <p class="mt-3">
                                                மேலே பெயர் குறிப்பிடப்பட்ட அல்ஹாஜ்/ஜனாப் ........................................................... என்பவர்
                                                எமது பள்ளிவாசல் மஹல்லாவுக்குட்பட்ட நிரந்தர குடியிருப்பாளர் என்பதையும் சந்தா தாரி
                                                என்பதையும் உறுதிப்படுத்துகிறோம்.
                                            </p>
                                            <br><br><br>
                                            <p class="mt-5 font-weight-bold">
                                                தலைவர் / செயலாளர்
                                            </p>
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
    </div>
    <!-- container-scroller -->

    <!-- footer -->
    <script src="<?php $server_name ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</body>

<script type="text/javascript">
    var action = "<?php echo $action ?>";
    $(document).ready(function() {
        console.log(action)
        if (action == "letter1") {
            $("#letter1").show();
            $("#letter2").hide();
        } else if (action == "letter2") {
            
            $("#letter2").show();
            $("#letter1").hide();
        }
    });

    window.onload = function() {
        window.print();
    }
</script>

</html>