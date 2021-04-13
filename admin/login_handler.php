<?php
include "include/db-connection.php";
include 'include/login_header.php';

$database = new Databases;

$inputUsername = $_POST['username'];
$inputPW = $_POST['pw'];
$login_details = $database->Login($inputUsername, $inputPW);
$URL = '../index.php';

if ($login_details != "") {
  echo $URL;
} else {
  $URL = '../index.php?wrong_user=1';
  echo $URL;
}
