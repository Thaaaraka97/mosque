<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';

?>
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
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
                    <div class="page-header">
                        <h3 class="page-title">Trustee Board Details</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="card-title">Trustee Board Preview (Past)</h4>
                                        <div class="mt-5">
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Position</th>
                                                        <th>Name</th>
                                                        <th>Telephone Number</th>
                                                        <th>Duration</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>President</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td>
                                                            <a href="preview_step-2.php" class="btn btn-primary btn-sm">View</a>
                                                            <a href="#" class="btn btn-danger btn-sm">X</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Vice President</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Secretary</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assistant Secretary</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Treasurer</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <table class="display datatable">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5">Advisory Board</th>
                                                        <th style="display: none;"></th>
                                                        <th style="display: none;"></th>
                                                        <th style="display: none;"></th>
                                                        <th style="display: none;"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Position</th>
                                                        <th>Name</th>
                                                        <th>Telephone Number</th>
                                                        <th>Duration</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Al Haj. xxxxxxxxxxxxxxxxxxx</td>
                                                        <td>011xxxxxxx</td>
                                                        <td>2020/1/1 - 2020/12/31</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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