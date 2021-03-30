<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
$database = new databases();
if (isset($_GET['updated'])) {
    $message = "Record successfully edited and Updated..!";
}

?>
<script type="text/javascript">

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
                    <?php
                    if (isset($_GET['updated'])) {
                        echo "
                        <div class='alert alert-warning alert-dismissible' role='alert'>" . $message . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow top-card">
                                <div class="card-body top-card">
                                    <table class="card-table">
                                        <tr>
                                            <td class="image-td">
                                                <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img class="top-card-logo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" style="float:left" /></a>
                                            </td>
                                            <td>
                                                <div>
                                                    <h3 class="card-title top"> History </h3>
                                                    <span class="top-span">AN-NOOR JUMMA MASJID</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card shadow">
                                <div class="card-body text-dark">
                                    <h4 class="pl-3">ආරම්භය හා විස්තර : </h4>
                                    <div>
                                        <span class="pl-5">ලියාපදිංචි අංකය - RR/370/R11</span><br>
                                        <span class="pl-5">කුරාන් මදුරසා ලි. අංකය - RPQ/370/R11/05</span>
                                    </div>
                                    <div class="special-text">
                                        <p>
                                            මෝරගල ග්‍රාමයේ වාසය කල මුස්ලිම් ජනයා ආගමික වතාවන්ට 1930 ට කලින් සිට අස්ගඟුල පුරාන දේවස්ථාන දායකත්වය යටතේ ක්‍රියා කලේය. 1930 වර්ෂයේදී ගමන් දුෂ්කර නිසා මෝරගල ගමේම පල්ලියක් තනා ගැනීමට අදිටන් කර දැනට දේවස්ථානය පිහිටි ඉඩමේ ඉදිකිරීමට අදහස් කර ඉඩම් හිමි මෝරගල ගමේම පදිංචි මීගහවත්තේ මුහන්දිරම්ලාගේ සේහද්දු ලෙබ්බේ යූසුබ් ලෙබ්බේ මහතා පරිත්‍යාගයෙන් ආරම්භක කටයුතු පටානි මුහන්දිරම්ලාගේ සේගුමදාර් ලෙබ්බේ රසීදු ලෙබ්බේ මහතාගේ මූලිකත්වයෙන් ගමේ අයවලුන්ගේ ශ්‍රමාදාරයෙන් කුඩා ගොඩනැගිල්ලක පොල් අතු සෙවිලි කර තනා ආගමික කටයුදු සිදුකරමින් සිට පසුව මීගහවත්තේ මුහන්දිරම්ලාගේ සේහද්දු ලෙබ්බේ මොහමඩ් සලාහුදීන් මහත්මාගේ මාර්ග උපදේශකත්වයෙන් බැතිමතුන්ගේ ආදාරයෙන් අංගසම්පූර්ණ දේවස්ථානයක් ඉදිකර 1954 වර්ෂයේ බැතිමතුන්ගේ ප්‍රයෝජනයට පත් කරන ලදී.
                                        </p>
                                        <br>
                                        <p>
                                            එම වකවානුවලදී දේවස්ථාන ලියපදිංචිය ආරම්භ කර තිබූ නිසා 1958 වර්ෂයේ ඉහත ලියාපදිංචි අංකය වන RR/370/R/11 යටතේ ලියාපදිංචිය කරන ලදී. ආගමික කටයුතු සඳහා ළමුන් ආගමික දැනුම ලබාදීමට දේවස්ථානයට යාබද ගොඩනැගිල්ලක් කුඩාවට තනා ගන්නා ලදී. මෙම දේවස්ථානය පාලනය කිරීමට මීගහවත්තේ මුහන්දිරම්ලාගේ සේහද්දු ලෙබ්බේ මොහමඩ් හනීෆා හාජියාර් මහත්මාට පවරන ලදී. එතුමා එය ඉතා හොදින් ඉටුකර ගෙන යන ලදී. ඒ අතර ළමයින්ගේ දහම් දැනුම ඉගෙනීමට ඉඩකඩ මදිවූ විට ගොඩනැගිල්ලක ඔසන් ලෙබ්බේ අහමඩ් ඉස්මයිල් හාජියාර් මහතා තමන්ගේ මුදල් වියදම් කර ඉදිකර දෙන ලදී.
                                        </p>
                                        <br>
                                        <p>
                                            හනීෆා හාජියාර් මහතාට අසනීප තත්වය නිසාත් වයෝවෘධ නිසාත් මීගහවත්තේ මුහන්දිරම්ලාගේ මොහමඩ් සලාහුද්දීන් මොහම්මදු හාදි හාජියාර් මහතා පත්කර භාරදෙන ලදී. ඔහුගේ උදව්වට මීගහවත්තේ මුහන්දිරම්ලාගේ අබ්දුල් හමීඩ් මොහමඩ් මව්ජූද් හාජියාර් මහතා පත්කර පාලන කටයුතු සිදු කරගෙන යන ලදී. ඉන් 70 දශකගේ පාලන කමිටුවක් පත් කරගෙන එමගින් පාලනය කර ගෙන යන ලදී. එහි ආරම්භක සභාපති වශයෙන් මව්ජූද් හාජියාර් මහතා පත් කරගන්නා ලදී. ඉන්පසු අසූව දශකයේ දී පාලන කමිටුවට අබ්දුල් රහ්මාන් මොහමඩ් ජව්ෆර් හාජියාර් මහතා සභාපති වශයෙන් යුත් කමිටුවක් පත්කර ලේකම් වශයෙන් පටානි මුහන්දිරම්ලාගේ මොහම්මදු දරූක් මහතා පත් වී පරිපාලන කටයුතු ඉතා හොඳින් කරගෙන යන ලදී.
                                        </p>
                                        <br>
                                        <p>
                                            1994 වර්ෂයේ දේවස්ථානයේ ඉඩකඩ මදිවීම අබලන් වීම හේතුකොටගෙන අලුත් දේවස්ථානයක් නිර්මාණය කිරීමට හා කමිටුවක් පත්කර ගන්නා ලදී. එහි සාමාජිකයින් වුයේ ඒ.ඒ.එම්. මුනීර් හාජියාර්, ඒ.එස්.එම්. හිල්මි හාජියාර් ඇතුලු කමිටුවකින්ය. තැනීම් ආරම්භ කර ඉටු කරමින් සිටිද්දී අලුත් කමිටුවක් මීගහවත්තේ මුහන්දිරම්ලාගේ මොහමඩ් මවුජූද් කලීලුර් රහ්මාන් මහතාගේ සභාපතිත්වයෙන් කමිටුවක් පත්කර ඉතිරි කටයුතු සිදු කරගෙන යන ලදී. ගමේ දායකයන්ගේ නොමසුරු සහයෝගයෙන් හා ආධාර අනුබලයෙන් හා පිටස්තර දානපතියන්ගේ ආධාරයෙන් අංග සම්පූර්ණ දේවස්ථානයක් ලස්සනට යා ඉතා අලංකාරාත්ව ඉදිකර කටයුතු 2015 වර්ෂයේ නිම කරන ලදී.
                                        </p>
                                        <br>
                                        <p>
                                            දැනට අහමඩ් ඉස්මයිල් කලීල් හාජියාර් මහතාගේ සභාපතිත්වයෙන් ඉතාමත් සාර්ථකව පරිපාලන කටයුදු කරමින් පවතී.
                                        </p>
                                        <br>
                                        <p>
                                            වස්සලාම්.....!
                                        </p>
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