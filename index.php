<?php
session_start();
$wrong_user = 0;
if (isset($_GET['wrong_user'])) {
    $wrong_user = 1;
}
if (!isset($_SESSION['username'])) {
    if ($wrong_user == 1) {
        header("Location: admin/login.php?wrong_user=1");
        exit();
    } else {
        header("Location: admin/login.php");
        exit();
    }
} else {
    header("Location: admin/dashboard.php");
    exit();
}
