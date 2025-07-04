<?php

//  Envoie un e-mail de confirmation de planification de visite.
require_once __DIR__ . '/../PHPMailer/src/Exception.php';
require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Envoie un e-mail de confirmation de visite
 *
 * @param string $destinataire Email du client
 * @param string $nomClient Nom du client (facultatif)
 * @param string $dateVisite Date et heure de la visite (facultatif)
 * @return bool Retourne true si l'e-mail est envoyé, false sinon
 */
function envoyerEmailVisite($destinataire, $nomClient = '', $dateVisite = '', $bien)
{

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mouhameddiop165@gmail.com';
        $mail->Password = 'nkne ffmb mhsy fnho'; // Mot de passe d'application Google
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('mouhameddiop165@gmail.com', 'Agence Immobiliere Immo');
        $mail->addAddress($destinataire, $nomClient);

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation de votre visite';

        $body = "<h3>Bonjour";
        if (!empty($nomClient)) {
            $body .= " $nomClient";
        }
        $body .= ",</h3>";
        $body .= "<p>Votre demande de visite a bien été enregistrée.</p>";

        if (!empty($dateVisite)) {
            $body .= "<p>Date prévue : <strong>$dateVisite</strong></p>";
        }
        if (!empty($bien)) {
            $body .= "<p>pour : <strong>$bien</strong></p>";
        }

        $body .= "<p>Nous reviendrons vers vous pour confirmer ou modifier si nécessaire.</p>";
        $body .= "<p>Cordialement,<br>L'équipe de l'agence immobilière d'Immo.</p>";

        $mail->Body = $body;

        // Envoi
        $mail->send();
        return true;
    } catch (Exception $e) {
        // En cas d'erreur, afficher le message (à désactiver en production)
        echo "Erreur : {$mail->ErrorInfo}";
        return false;
    }
}
// Fonction pour envoyer une notification à l'administrateur
function envoyernotifAdmin($destinataire, $nomClient = '', $objet = '', $contenu)
{

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mouhameddiop165@gmail.com';
        $mail->Password = 'nkne ffmb mhsy fnho'; // Mot de passe d'application Google
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('mouhameddiop165@gmail.com', 'Agence Immobiliere Immo');
        $mail->addAddress($destinataire, $nomClient);

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = $objet;

        $body = $contenu;

        $body .= "<p>Cordialement,<br>L'équipe de l'agence immobilière d'Immo.</p>";

        $mail->Body = $body;

        // Envoi
        $mail->send();
        return true;
    } catch (Exception $e) {
        // En cas d'erreur, afficher le message (à désactiver en production)
        echo "Erreur : {$mail->ErrorInfo}";
        return false;
    }
}

// Fonction pour envoyer une notification au a l'agence immobilière
function envoyernotifCLient($emailclient, $nomClient = '', $objet = '', $contenu)
{

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mouhameddiop165@gmail.com';
        $mail->Password = 'nkne ffmb mhsy fnho'; // Mot de passe d'application Google
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom($emailclient, $nomClient);
        $mail->addAddress('mouhameddiop165@gmail.com', 'Agence Immobiliere Immo');

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = $objet;

        $body = $contenu;
        $body .= "<p>Cordialement,<br>$nomClient</p>";

        $mail->Body = $body;

        // Envoi
        $mail->send();
        return true;
    } catch (Exception $e) {
        // En cas d'erreur, afficher le message (à désactiver en production)
        echo "Erreur : {$mail->ErrorInfo}";
        return false;
    }
}
