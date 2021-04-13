<?php
session_start();
if ($_SESSION['login'] != true) {
     ?>
     <script> location.replace("login.php"); </script>
     <?php
    exit();
}