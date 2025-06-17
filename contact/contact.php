<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nom = htmlspecialchars($_POST["mf-first-name"]);
    $email = htmlspecialchars($_POST["mf-email"]);
    $sujet = htmlspecialchars($_POST["mf-subject"]);
    $message = nl2br(htmlspecialchars($_POST["mf-comment"])); // nl2br pour garder les sauts de ligne

    // Adresse email de destination
    $to = "fakh25adem@gmail.com"; // Remplacez par l'adresse email de réception
    $subject = "demande contact Ms Group";

    // Créer le contenu de l'email
    $emailContent = "
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Demande contact MS-Group</title>
    </head>
    <body>
        <h2>Vous avez reçu un nouveau message de contact (MS-Group)</h2>
        <p><strong>Nom :</strong> {$n}</p>
        <p><strong>Email :</strong> {$email}</p>
        <p><strong>Objet :</strong> {$subject}</p>
        <p><strong>Message :</strong><br>{$message}</p>
    </body>
    </html>
    ";

    // En-têtes pour l'email (important pour HTML et UTF-8)
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Envoyer l'email
    if (mail($to, $subject, $emailContent, $headers)) {
        header("Location: ./"); 
            exit;
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer.";
    }
}

?>
