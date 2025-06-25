<?php
require_once("con_db.php");

// 1. Configuration du dossier d'upload
$dossier = __DIR__ . "/images/";
if (!is_dir($dossier)) {
    mkdir($dossier, 0755, true);
}

// 2. Traitement de la photo
if (!empty($_FILES['photo']['name'])) {
    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $nouveauNom = uniqid('img_') . '.' . $extension;
    $chemin = $dossier . $nouveauNom;

    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $chemin)) {
        // Erreur upload
        echo json_encode([
            'success' => false,
            'message' => "Erreur lors du téléchargement du fichier."
        ]);
        exit;
    }
    // On stockera le chemin relatif en BDD (par ex. "images/img_xxx.jpg")
    $cheminBDD = "images/" . $nouveauNom;
} else {
    // Valeur par défaut si pas de photo
    $cheminBDD = null;
}

// 3. Récupération et validation minimale des champs
$nom      = trim($_POST['fullName'] ?? '');
$email    = trim($_POST['email']    ?? '');
$phone    = trim($_POST['phone']    ?? '');
$password = $_POST['password']      ?? '';

// (Ici vous pouvez ajouter des contrôles plus poussés sur email, téléphone, etc.)

// 4. Hachage sécurisé du mot de passe
$hash_Password = password_hash($password, PASSWORD_DEFAULT);

// 5. Préparation et exécution de la requête
$sql = "INSERT INTO utilisateur (nom, telephone, email, photo, mot_de_passe)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);

if (!$stmt) {
    echo json_encode([
        'success' => false,
        'message' => "Erreur de préparation SQL : " . $con->error
    ]);
    exit;
}

// Tous les champs sont strings, on utilise donc "sssss"
$stmt->bind_param("sssss", $nom, $phone, $email, $cheminBDD, $hash_Password);

if ($stmt->execute()) {
    header("location:http://localhost/project_immo/pages/page%20de%20connexion.php");
} else {
    echo json_encode([
        'success' => false,
        'message' => "Erreur lors de l'inscription : " . $stmt->error
    ]);
}
exit;
