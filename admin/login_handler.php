<?php
include "include/db-connection.php";
$database = new Databases;

  $inputUsername = $_POST['username'];
  $inputPW = $_POST['pw'];
  $login_details = $database->Login($inputUsername, $inputPW);
  $URL = '../index.php';

  if ($login_details != "") {
      echo $URL;
  }
  else {
      echo $URL;
  }

?>