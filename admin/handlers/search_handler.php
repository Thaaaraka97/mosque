<?php
include "../include/db-connection.php";

$database = new databases();
$URL = "";

if (isset($_POST['item'])) {
    $item = $_POST['item'];
}

if ($item == 1) {
    $URL = "form_villagers-registration-form.php";
}
elseif ($item == 2) {
    $URL = "form_nikkah-details-form.php";
}
elseif ($item == 3) {
    $URL = "form_trustee-board-form.php";
}
elseif ($item == 4) {
    $URL = "form_quran-registration-form.php";
}
elseif ($item == 5) {
    $URL = "form_janaza-details-form.php";
}
elseif ($item == 6) {
    $URL = "form_bhayan-details.php";
}
elseif ($item == 7) {
    $URL = "form_bills.php";
}
elseif ($item == 8) {
    $URL = "form_expenses.php";
}
elseif ($item == 9) {
    $URL = "form_pesh-imaam-details.php";
}
elseif ($item == 10) {
    $URL = "form_muazzin-details.php";
}
elseif ($item == 11) {
    $URL = "form_salary.php";
}
elseif ($item == 12) {
    $URL = "form_other-servant-salary.php";
}
elseif ($item == 13) {
    $URL = "form_saandha-collector-registration.php";
}
elseif ($item == 14) {
    $URL = "form_nonmahalla-saandha-registration.php";
}
elseif ($item == 15) {
    $URL = "kanji_ingredients.php";
}
elseif ($item == 16) {
    $URL = "kanji_people.php";
}
elseif ($item == 17) {
    $URL = "form_rental-places.php";
}
elseif ($item == 18) {
    $URL = "form_new-rental-registration.php";
}
elseif ($item == 19) {
    $URL = "form_add-payment.php";
}
elseif ($item == 20) {
    $URL = "form_disaster-relief-donations.php";
}
elseif ($item == 21) {
    $URL = "form_board-member-donations.php";
}
elseif ($item == 22) {
    $URL = "form_other-donations.php";
}
elseif ($item == 23) {
    $URL = "form_friday-collection.php";
}
elseif ($item == 24) {
    $URL = "form_kanduri-collection.php";
}
elseif ($item == 25) {
    $URL = "form_undiyal-collection.php";
}
elseif ($item == 26) {
    $URL = "form_lailathul-kadhir-collection.php";
}
elseif ($item == 27) {
    $URL = "form_saandha-collection.php";
}
elseif ($item == 28) {
    $URL = "form_nonmahalla_saandha_collection.php";
}
elseif ($item == 29) {
    $URL = "form_collector-settlement.php";
}
elseif ($item == 30) {
    $URL = "form_funds-collection.php";
}
elseif ($item == 31) {
    $URL = "preview_villager-details.php?action=allvillagers&sort1=0&sort2=0&sort7=0&sort8=0&sort9=0&sort10=0&sort11=".date('Y-m-t')."&sort12=0&sort13=0";
}
elseif ($item == 32) {
    $URL = "preview_nikkah-details.php?sort1=0&sort5=0&sort6=" . date('Y-m-t') ."";
}
elseif ($item == 33) {
    $URL = "preview_janaza-details.php?sort1=0&sort2=0&sort5=0&sort6=" . date('Y-m-t') ."";
}
elseif ($item == 34) {
    $URL = "preview_q_madrasa-details.php";
}
elseif ($item == 35) {
    $URL = "preview_saandha-amount-fixing-history.php";
}
elseif ($item == 36) {
    $URL = "preview_expenses.php?sort3=0";
}
elseif ($item == 37) {
    $URL = "preview_non-mahalla-saandha-registration.php";
}
elseif ($item == 38) {
    $URL = "preview_friday-attendance.php";
}
elseif ($item == 39) {
    $URL = "preview_private-loans.php";
}
elseif ($item == 40) {
    $URL = "preview_donation-details.php?action=alldonations";
}
elseif ($item == 41) {
    $URL = "preview_trustee_board-details.php?action=present";
}
elseif ($item == 42) {
    $URL = "preview_trustee_board-history.php";
}
elseif ($item == 43) {
    $URL = "preview_pesh_imaam-details.php";
}
elseif ($item == 44) {
    $URL = "preview_muazzin-details.php";
}
elseif ($item == 45) {
    $URL = "preview_salary.php?sort3=0&sort4=0";
}
elseif ($item == 46) {
    $URL = "preview_rental-places.php";
}
elseif ($item == 47) {
    $URL = "preview_new-rental-registration.php";
}
elseif ($item == 48) {
    $URL = "preview_rental-incomes.php";
}
elseif ($item == 49) {
    $URL = "preview_collector-collection.php";
}
elseif ($item == 50) {
    $URL = "preview_friday-collection.php?action=fridayregular";
}
elseif ($item == 51) {
    $URL = "preview_kanduri-collection.php";
}
elseif ($item == 52) {
    $URL = "preview_lailathul-kadhir-collection.php?sort5=" . date('Y-m-01') ."&sort6=" . date('Y-m-t') ."";
}
elseif ($item == 53) {
    $URL = "preview_undiyal-collection.php";
}
elseif ($item == 54) {
    $URL = "preview_saandha-page.php?sort1=0&sort5=" . date('Y-m-01') ."&sort6=" . date('Y-m-t') ."&sort14=0000-00";
}
elseif ($item == 55) {
    $URL = "preview_nonmahalla_saandha_collection.php?sort5=" . date('Y-m-01') ."&sort6=" . date('Y-m-t') ."";
}
elseif ($item == 56) {
    $URL = "preview_funds.php";
}
elseif ($item == 57) {
    $URL = "trial_balance.php?sort5=" . date('Y-m-01') ."&sort6=" . date('Y-m-t') ."";
}
elseif ($item == 58) {
    $URL = "letter1.php";
}
elseif ($item == 59) {
    $URL = "letter2.php";
}
else {
    $URL = "wrong";
}


echo $URL;
