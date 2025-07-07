<?php
require_once("con_db.php");

// 1. Configuration du dossier d'upload
$dossier = __DIR__ . "/photosBiens/";
if (!is_dir($dossier)) {
    mkdir($dossier, 0755, true);
}
function ajouterBien($data)
{
    global $con, $dossier;
    // 2. Traitement de la photo
    if (!empty($_FILES['photo']['name'])) {
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $nouveauNom = uniqid('img_') . '.' . $extension;
        $chemin = $dossier . $nouveauNom;
        var_dump($chemin);
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $chemin)) {
            // Erreur upload
            return [
                'success' => false,
                'message' => "Erreur lors du téléchargement du fichier."
            ];
        }
        // On stockera le chemin relatif en BDD (par ex. "images/img_xxx.jpg")
        $urlPhoto = "photosBiens/" . $nouveauNom;
    } else {
        // Valeur par défaut si pas de photo
        $urlPhoto = null;
    }

    // 3. Récupération et validation minimale des champs
    $titre       = trim($data['titre'] ?? '');
    $description = trim($data['description'] ?? '');
    $prix        = floatval($data['prix'] ?? 0);
    $type   = trim($data['type'] ?? '');
    $localisation = trim($data['localisation'] ?? '');
    $surface     = floatval($data['surface'] ?? 0);
    $status = trim($data['status']); // Valeur par défaut

    // 4. Préparation et exécution de la requête
    $sql = "INSERT INTO bien (titre, description, prix, type, photo, localisation, surface, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        return [
            'success' => false,
            'message' => "Erreur de préparation SQL : " . $con->error
        ];
    }


    $stmt->bind_param("ssdsssds", $titre, $description, $prix, $type, $urlPhoto, $localisation, $surface, $status);

    if ($stmt->execute()) {
        return [
            'success' => true,
            'message' => "Bien ajouté avec succès."
        ];
    } else {
        return [
            'success' => false,
            'message' => "Erreur lors de l'ajout du bien : " . $stmt->error
        ];
    }
}

function getAllBiens()
{
    global $con;
    $sql = "SELECT * FROM bien";
    $result = $con->query($sql);
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function getBienById($id)
{
    global $con;
    $sql = "SELECT * FROM bien WHERE idbien = ?";
    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    return null;
}
function deleteBien($id)
{
    global $con;
    $sql = "DELETE FROM bien WHERE idbien = ?";
    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    return false;
}


function updateBien($data)
{
    global $con, $dossier;
    $id = intval($data['idbien']);

    // 1. Traitement de la photo
    if (!empty($_FILES['photo']['name'])) {
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $nouveauNom = uniqid('img_') . '.' . $extension;
        $chemin = $dossier . $nouveauNom;

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $chemin)) {
            return [
                'success' => false,
                'message' => "Erreur lors du téléchargement du fichier."
            ];
        }
        $urlPhoto = "photosBiens/" . $nouveauNom;
    } else {
        $urlPhoto = null;
    }

    // 2. Récupération et validation  des champs
    $titre       = trim($data['titre'] ?? '');
    $description = trim($data['description'] ?? '');
    $prix        = floatval($data['prix'] ?? 0);
    $type   = trim($data['type'] ?? '');
    $localisation = trim($data['localisation'] ?? '');
    $surface     = floatval($data['surface'] ?? 0);
    $status = trim($data['status'] ?? ''); 
    // 3. Préparation et exécution de la requête
    if ($urlPhoto) {
        // Mise à jour avec nouvelle photo
        $sql = "UPDATE bien SET titre=?, description=?, prix=?, type=?, photo=?, localisation=?, surface=?, status=? WHERE idbien=?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return [
                'success' => false,
                'message' => "Erreur de préparation SQL : " . $con->error
            ];
        }
        $stmt->bind_param("ssdsssssi", $titre, $description, $prix, $type, $urlPhoto, $localisation, $surface, $status, $id);
    } else {
        // Mise à jour sans nouvelle photo
        $sql = "UPDATE bien SET titre=?, description=?, prix=?, type=?, localisation=?, surface=?, status=? WHERE idbien=?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return [
                'success' => false,
                'message' => "Erreur de préparation SQL : " . $con->error
            ];
        }
        $stmt->bind_param("ssdssssi", $titre, $description, $prix, $type, $localisation, $surface,$status, $id);
    }
    if ($stmt->execute()) {
        return [
            'success' => true,
            'message' => "Bien mis à jour avec succès."
        ];
    } else {
        return [
            'success' => false,
            'message' => "Erreur lors de la mise à jour du bien : " . $stmt->error
        ];
    }
}

function deleteBienById($id)
{
    global $con;
    $bien = getBienById($id);
    if ($bien) {
        // Supprimer la photo du projet
        if ($bien['photo']) {
            $cheminPhoto = __DIR__ . "/photosBiens/" . basename($bien['photo']);
            if (file_exists($cheminPhoto)) {
                unlink($cheminPhoto);
            }
        }
        return deleteBien($id);
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouterBien'])) {
    $result = ajouterBien($_POST);
    if ($result['success']) {
        header("Location: http://localhost/project_immo/pages/dashboard/gestion_biens.php");
    } else {
        echo json_encode($result);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifierBien'])) {
    $result = updateBien($_POST);
    if ($result['success']) {
        header("Location: http://localhost/project_immo/pages/dashboard/gestion_biens.php");
    } else {
        echo json_encode($result);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimerBien'])) {
    $id = intval($_POST['idbien']);
    $result = deleteBienById($id);
    header("Location: http://localhost/project_immo/pages/dashboard/gestion_biens.php");
    exit;
}