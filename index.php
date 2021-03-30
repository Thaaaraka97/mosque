<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admin/login.php");
    exit();
}
else {
    header("Location: admin/forms.php");
    exit(); 
}