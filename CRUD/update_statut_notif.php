<?php
require_once("./crud_notification.php");

if (isset($_POST['idnotif'])) {
    $idnotif = intval($_POST['idnotif']);
    $statut = 'lu';

    if (modifier_statut_notif($idnotif, $statut)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
