<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

$database = new databases();
if (isset($_GET['updated'])) {
    $message = "Record successfully edited and Updated..!";
}

?>
<script type="text/javascript">

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
                    if (isset($_GET['updated'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
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
                                                    <h3 class="card-title top"> Mahalla Member Confirmation Letter </h3>
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
                                <div class="card-body text-dark">
                                    <div class="special-text">
                                        <p class="mt-5">
                                            மதிப்புக்குறிய
                                        </p>
                                        <br><br>
                                        <p class="text-center font-weight-bold"><u>மஹல்லாவாசி என்பதை உறுதிப்படுத்தல்</u></p>
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