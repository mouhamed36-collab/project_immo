<?php
require_once("con_db.php");

function verifConn($email, $mot_de_passe)
{
    global $con;

    // On récupère uniquement par email (et actif)
    $sql = "SELECT * FROM utilisateur WHERE email = ? AND actif = 1";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // ✅ Comparaison sécurisée avec le mot de passe haché
            if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
                return $user; // Connexion réussie
            }
        }
    }

    return false; // Échec de connexion
}
