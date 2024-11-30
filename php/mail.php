<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání údajů z formuláře
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Nastavení e-mailu
    $to = "vasekcz230@gmail.com"; // Zde nastavte svou e-mailovou adresu
    $subject = "New Web Mail";
    $body = "Jméno: $name\nE-mail: $email\n\nZpráva:\n$message";
    $headers = "From: $email";

    // Odeslání e-mailu
    if (mail($to, $subject, $body, $headers)) {
        echo "Děkujeme za vaši zprávu!";
    } else {
        echo "Omlouváme se, došlo k chybě při odesílání zprávy.";
    }
}
?>
