<?php
require_once("con_db.php");
function verifConn($email, $mot_de_passe)
{
    global $con;
    $sql = "SELECT * FROM utilisateur WHERE email=? AND mot_de_passe=?";
    $stmt = $con->prepare($sql);
    if ($stmt) {
        $mot_de_passe_hashe = md5($mot_de_passe); // Utilisation de md5 pour le mot de passe pour l'instant
        $stmt->bind_param("ss", $email, $mot_de_passe_hashe);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    return false;//Si les credentials sont faux, on retourne false
}