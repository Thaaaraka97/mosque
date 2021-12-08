<?php
include "include/include.php";
include 'include/data_insert_controller.php';
include 'include/data_update_controller.php';

date_default_timezone_set("Asia/Calcutta");
$today = date('Y-m-d');
$sub_division = $database->select_data('tbl_subdivision');
$collector = $database->select_data('tbl_saandhacollector');

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>An-Noor Jumma Masjid</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php $server_name ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php $server_name ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php $server_name ?>assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?php $server_name ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php $server_name ?>assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php $server_name ?>assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php $server_name ?>assets/css/style.css">
    <!-- remove this -->
    <link rel="stylesheet" href="<?php $server_name ?>assets/css/theme.css">
    <link rel="stylesheet" href="<?php $server_name ?>assets/css/light-version.css">
    <link rel="stylesheet" href="<?php $server_name ?>assets/css/custom-styles.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php $server_name ?>assets/images/logo-mini.png" />
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


</head>

<script type="text/javascript">
    var donationaction = "";
    var villageraction = "";
    var action = "";
    var fridaycollectionaction = "";
    var av_isGuardian = "";
    var av_job = "";
    var av_married = "";
    var av_madChild_status = "";
    var av_scholStatus = "";
    var is_student = "";
    var av_eduQual = "";
    var TBlistDetails = "";
    var wrong_user = "";
</script>