<?php
switch($_GET['ref']) {
    default :
        include "view/absen_view.php";
    break;

    case "absen_view":
        include "view/absen_view.php";
    break;

    case "absen_edit":
        include "view/absen_edit.php";
    break;
            
    case "stat_view":
        include "view/stat_view.php";
    break;

    case "acc_edit":
        include "view/acc_edit.php";
    break;
            
    case "acc_logout":
        include "core/logout.php";
    break;

    case "login-failed":
        include "core/login-page.php";
    break;
}
?>