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
?>
<script type="text/javascript">
    var action = "";
    var villageraction = "<?php echo $action; ?>";
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
                    if (isset($message)) {
                        if (isset($_GET['left'])) {
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
                        } elseif (isset($_GET['saandha'])) {
                            echo "
                            <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                        }
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
                                                    <h3 class="card-title top"> Kanji List </h3>
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
                                    <form method="post" id="kanjiingredients">
                                        <div id="row">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputIngredient"> Ingredient </label>
                                                    <input type="text" class="form-control" id="inputIngredient[]" name="inputIngredient[]">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPaalKanji"> Paal Kanji </label>
                                                    <input type="text" class="form-control" id="inputPaalKanji[]" name="inputPaalKanji[]">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputVegitable"> Vegitable </label>
                                                    <input type="text" class="form-control" id="inputVegitable[]" name="inputVegitable[]">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputMeat"> Meat </label>
                                                    <input type="text" class="form-control" id="inputMeat[]" name="inputMeat[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="dynamic_fields"></div>
                                        <div class="form-row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <a class="btn btn btn-success btn-lg" id="kanjilist">+ ADD</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn btn-primary btn-lg" id="submitkanjilist">Print</a>
                                            </div>
                                        </div>
                                    </form>
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