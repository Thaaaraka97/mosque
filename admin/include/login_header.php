<?php

// login details
if (!isset($_SESSION['username'])) {
    $url='login.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    ?>
    <!-- <script> location.replace("login.php"); </script> -->
    <?php
    exit();
}