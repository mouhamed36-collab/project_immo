<?php
require_once 'con_db.php';
// fonction pour afficher les utilisateurs
function afficherUtilisateurs()
{
    $sql = "SELECT * FROM utilisateur";
    global $con;
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $utilisateurs = [];
        while ($row = $result->fetch_assoc()) {
            $utilisateurs[] = $row;
        }
        return $utilisateurs;
    } else {
        return [];
    }
}

// fonction pour recuperer un utilisateur par son ID
function recupererUtilisateurParId($id)
{
    $sql = "SELECT * FROM utilisateur WHERE idutilisateur = ?";
    global $con;
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// fonction pour ajouter un utilisateur
function ajouterUtilisateur($nom, $email, $phone, $password)
{
    //  Récupération et validation minimale des champs
    $nom      = trim($_POST['nom'] ?? '');
    $email    = trim($_POST['email']    ?? '');
    $phone    = trim($_POST['phone']    ?? '');
    $password = $_POST['password']      ?? '';

    //  Hachage sécurisé du mot de passe
    $hash_Password = password_hash($password, PASSWORD_DEFAULT);

    // 5. Préparation et exécution de la requête
    $sql = "INSERT INTO utilisateur (nom, telephone, email, mot_de_passe)
        VALUES (?, ?, ?, ?)";
    global $con;
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        echo json_encode([
            'success' => false,
            'message' => "Erreur de préparation SQL : " . $con->error
        ]);
        exit;
    }

    // Tous les champs sont strings, on utilise donc "ssss"
    $stmt->bind_param("ssss", $nom, $phone, $email, $hash_Password);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo json_encode([
            'success' => false,
            'message' => "Erreur lors de l'ajout : " . $stmt->error
        ]);
    }
    exit;
}

// fonction pour afficher le nombre de visite planifier par un utilisateur
function nombreVisitePlanifier($idutilisateur)
{
    $sql = "SELECT COUNT(*) as nombre FROM visite WHERE idutilisateur = ?";
    global $con;
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idutilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['nombre'];
    } else {
        return 0;
    }
}

// fonction pour afficher le nombre de notification envoyer par un utilisateur
function nombreNotifEnvoyer($idutilisateur)
{
    $sql = "SELECT COUNT(*) as nombre FROM notifications WHERE idutilisateur = ?";
    global $con;
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idutilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['nombre'];
    } else {
        return 0;
    }
}

// fonction pour afficher le nombre de biens pour un utilisateur

// fonction pour desactivation d'un utilisateur
function desactiverUtilisateur($idutilisateur)
{
    $sql = "UPDATE utilisateur SET actif = ? WHERE idutilisateur = ?";
    global $con;
    $stmt = $con->prepare($sql);
    $actif = 0; // 0 pour inactif
    $stmt->bind_param("ii", $actif, $idutilisateur);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// fonction pour l'activation d'un utilisateur
function activerUtilisateur($idutilisateur)
{
    $sql = "UPDATE utilisateur SET actif = ? WHERE idutilisateur = ?";
    global $con;
    $stmt = $con->prepare($sql);
    $actif = 1; // 1 pour actif
    $stmt->bind_param("ii", $actif, $idutilisateur);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['idutilisateur'])) {
    $id = intval($_POST['idutilisateur']);
    $action = $_POST['action'];

    if ($action === 'activer') {
        if (activerUtilisateur($id)) {
            header('Location: http://localhost/project_immo/pages/dashboard/gestion-utilisateur.php');
            exit;
        } else {
            header('Location: http://localhost/project_immo/pages/dashboard/gestion-utilisateur.php');
            exit;
        }
    }

    if ($action === 'desactiver') {
        if (desactiverUtilisateur($id)) {
            header('Location: http://localhost/project_immo/pages/dashboard/gestion-utilisateur.php');
            exit;
        } else {
            header('Location: http://localhost/project_immo/pages/dashboard/gestion-utilisateur.php');
            exit;
        }
    }
}
