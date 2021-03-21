<?php
include "../include/db-connection.php";
$database = new Databases;
date_default_timezone_set("Asia/Calcutta");
$today = date("Y-m-d");

$id = "";
$action = $_POST["action"];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if ($action == "submit_ingredients") {
    $database->delete_all('tbl_kanjiingredients');
    $count = count($_POST["inputIngredient"]);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $insert_kanji_ingredients = array(
                'kji_ingredient' => mysqli_real_escape_string($database->con, $_POST["inputIngredient"][$i]),
                'kji_paalkanji' => mysqli_real_escape_string($database->con, $_POST["inputPaalKanji"][$i]),
                'kji_vegetable' => mysqli_real_escape_string($database->con, $_POST["inputVegitable"][$i]),
                'kji_meat' => mysqli_real_escape_string($database->con, $_POST["inputMeat"][$i])

            );
            $database->insert_data('tbl_kanjiingredients', $insert_kanji_ingredients);
        }
        $URL = "kanji_print.php?list=ingredients";
        echo $URL;
    }
}
elseif ($action == "submit_people") {
    $database->delete_all('tbl_kanjipeople');
    $count = count($_POST["inputName"]);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $insert_kanji_people = array(
                'kjp_name' => mysqli_real_escape_string($database->con, $_POST["inputName"][$i]),
                'kjp_tp' => mysqli_real_escape_string($database->con, $_POST["inputTP"][$i]),
                'kjp_address' => mysqli_real_escape_string($database->con, $_POST["inputAddress"][$i]),
                'kjp_date' => mysqli_real_escape_string($database->con, $_POST["inputDate"][$i])

            );
            $database->insert_data('tbl_kanjipeople', $insert_kanji_people);
        }
        $URL = "kanji_print.php?list=people";
        echo $URL;
    }
}
