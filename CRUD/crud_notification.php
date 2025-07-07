<?php
require_once("con_db.php");

// fonction pour ajouter une notification
function ajout_notif($contenu, $typenotif, $idutilisateur)
{
    global $con;
    $req = "INSERT INTO notifications (contenu, typenotif, idutilisateur) VALUES (?, ?, ?)";
    $stmt = $con->prepare($req);
    $stmt->bind_param("sss", $contenu, $typenotif, $idutilisateur);

    if ($stmt->execute()) {
        return true; // Notification ajoutée avec succès
    } else {
        echo "Erreur lors de l'ajout de la notification : " . $con->error;
        return false; // Échec de l'ajout de la notification
    }
}
// fonction pour récupérer les notifications
function get_notif()
{
    global $con;
    $req = "SELECT * FROM notifications";
    $result = $con->query($req);

    if ($result) {
        $notifications = [];
        while ($row = $result->fetch_assoc()) {
            $notifications[] = $row;
        }
        return $notifications; // Retourne un tableau de notifications
    } else {
        echo "Erreur lors de la récupération des notifications : " . $con->error;
        return false; // Échec de la récupération des notifications
    }
}

// recuperer un notification par son id
function get_notif_by_id($id)
{
    global $con;
    $req = "SELECT * FROM notifications WHERE id = ?";
    $stmt = $con->prepare($req);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        return $result->fetch_assoc(); // Retourne la notification correspondante
    } else {
        echo "Erreur lors de la récupération de la notification : " . $con->error;
        return false; // Échec de la récupération de la notification
    }
}

// fonction pour récupérer l'email de l'utilisateur par son ID
function getemailUtilisateur($id)
{
    $req = "SELECT email FROM utilisateur WHERE idutilisateur = '$id'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['email']; // Retourne l'email de l'utilisateur
    } else {
        echo "Erreur lors de la récupération de l'email de l'utilisateur : " . $con->error;
        return false; // Échec de la récupération de l;email
    }
}
function getphoneUtilisateur($id)
{
    $req = "SELECT telephone FROM utilisateur WHERE idutilisateur = '$id'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['telephone']; // Retourne le numero de l'utilisateur
    } else {
        echo "Erreur lors de la récupération du numero de l'utilisateur : " . $con->error;
        return false; // Échec de la récupération du numero
    }
}

// fonction pour modifier le statut d'une notification
function modifier_statut_notif($idnotif, $statut)
{
    global $con;
    $req = "UPDATE notifications SET statut = ? WHERE idnotif = ?";
    $stmt = $con->prepare($req);
    $stmt->bind_param("ss", $statut, $idnotif);

    if ($stmt->execute()) {
        return true; // Statut mis à jour avec succès
    } else {
        echo "Erreur lors de la mise à jour du statut de la notification : " . $con->error;
        return false; // Échec de la mise à jour du statut
    }
}
