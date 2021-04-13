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
                                                    <h3 class="card-title top"> Letter 1 </h3>
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
                                        <p>
                                            அந் நூர் ஜும்ஆ மஸ்ஜித்,<br>
                                            மோரகளை,<br>
                                            கேஹலியகொடை<br>
                                        </p>
                                        <p class="mt-3">
                                            முழுப்பெயர்<br>
                                            முகவரி<br>
                                            திகதி<br>
                                        </p>
                                        <p class="mt-3">
                                            மதிப்புக்குறிய
                                        </p>

                                        <p class="mt-3">
                                            அல்ஹாஜ்/ஜனாப், .......................................................
                                            என்பவர் எமது பள்ளிவாசல் மஹல்லாவாசியாக உள்ளார் என்பதையும் எமது நிர்வாக
                                            சபையின் பார்வையில் சம்பந்தப்பட்டவரின் நடத்தை மற்றும் வெளிநடவடிக்கைகள்
                                            யாவும் நன்றாக இருக்கின்றது என்பதை உறுதிப்படுத்தி இக்கடிதத்த்தை
                                            ,......................................... நன்றியுடன் சமர்ப்பிக்கின்றோம்
                                        </p>
                                        <p class="mt-3">
                                            தலைவர் / செயலாளர்
                                        </p>
                                        <p class="mt-3">
                                            பள்ளிவாசல் சீல்
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