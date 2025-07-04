<?php
require_once("con_db.php");

// fonction pour recuperer le nom de l'utilisateur
function getnomUtilisateur($id)
{
    $req = "SELECT nom FROM utilisateur WHERE idutilisateur = '$id'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['nom']; // Retourne le nom de l'utilisateur
    } else {
        echo "Erreur lors de la récupération du nom de l'utilisateur : " . $con->error;
        return false; // Échec de la récupération du nom
    }
}

// fonction pour recuperer l'id de l;utilisateur
function getIdUtilisateur($email)
{
    $req = "SELECT idutilisateur FROM utilisateur WHERE email = '$email'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['idutilisateur']; // Retourne l'ID de l'utilisateur
    } else {
        echo "Erreur lors de la récupération de l'ID de l'utilisateur : " . $con->error;
        return false; // Échec de la récupération de l'ID
    }
}

function getnomUser($email)
{
    $req = "SELECT nom FROM utilisateur WHERE email = '$email'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['nom']; // Retourne l'ID de l'utilisateur
    } else {
        echo "Erreur lors de la récupération du nom de l'utilisateur : " . $con->error;
        return false; // Échec de la récupération de l'ID
    }
}

// fonction pour récupérer le titre du bien
function getnomBien($id)
{
    $req = "SELECT titre FROM bien WHERE idbien = '$id'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['titre']; // Retourne le titre du bien
    } else {
        echo "Erreur lors de la récupération du titre du bien : " . $con->error;
        return false; // Échec de la récupération du titre
    }
}

// fonction pour récupérer les visites
function getVisites()
{
    $req = "SELECT * FROM visite";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $visites = [];
        while ($row = $result->fetch_assoc()) {
            $visites[] = $row;
        }
        return $visites; // Retourne un tableau de visites
    } else {
        echo "Erreur lors de la récupération des visites : " . $con->error;
        return false; // Échec de la récupération des visites
    }
}

// fonction pour récupérer une visite par son ID
function getVisiteById($id)
{
    $req = "SELECT * FROM visite WHERE idvisite = '$id'";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $visite = $result->fetch_assoc();
        return $visite; // Retourne la visite trouvée
    } else {
        echo "Erreur lors de la récupération de la visite : " . $con->error;
        return false; // Échec de la récupération de la visite
    }
}


// fonction pour ajouter une visite
function ajoutVisite($date_visite, $statut, $motif_visite, $idUtilisateur, $idBien)
{
    $req = "INSERT INTO visite (date_visite, statut, motif_visite, idUtilisateur, idBien)
            VALUES (?, ?, ?, ?, ?)";
    global $con;
    $stmt = $con->prepare($req);
    $stmt->bind_param("sssss", $date_visite, $statut, $motif_visite, $idUtilisateur, $idBien);
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Visite ajoutée avec succès
    } else {
        echo "Erreur lors de l'ajout de la visite : " . $stmt->error;
        $stmt->close();
        return false; // Échec de l'ajout de la visite
    }
}

// foction pour recuperer les biens
function getbien()
{
    $req = "SELECT idbien, titre, localisation FROM bien";
    global $con;
    $result = $con->query($req);
    if ($result) {
        $biens = [];
        while ($row = $result->fetch_assoc()) {
            $biens[] = $row;
        }
        return $biens; // retourne un tableau de biens
    } else {
        echo "Erreur lors de la récupération des biens : " . $con->error;
        return false; // Échec de la récupération des biens
    }
}

// fonction pour modifier une visite
function modifierVisite($idVisite, $date_visite, $statut)
{
    $req = "UPDATE visite SET date_visite = ?, statut = ? WHERE idvisite = ?";
    global $con;
    $stmt = $con->prepare($req);
    $stmt->bind_param("sss", $date_visite, $statut, $idVisite);
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Visite modifiée avec succès
    } else {
        echo "Erreur lors de la modification de la visite : " . $stmt->error;
        $stmt->close();
        return false; // Échec de la modification de la visite
    }
}
