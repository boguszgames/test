<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zbieranie danych z formularza
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Walidacja
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Wszystkie pola są wymagane i email musi być poprawny.";
        exit;
    }

    // Odbiorca wiadomości
    $recipient = "twojemail@domain.com";

    // Tytuł wiadomości
    $subject = "Nowa wiadomość od $name";

    // Treść wiadomości
    $email_content = "Imię: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Wiadomość:\n$message\n";

    // Nagłówki
    $email_headers = "From: $name <$email>";

    // Wysłanie wiadomości
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Dziękujemy! Twoja wiadomość została wysłana.";
    } else {
        http_response_code(500);
        echo "Oops! Coś poszło nie tak. Spróbuj ponownie.";
    }
} else {
    http_response_code(403);
    echo "Nie można wysłać wiadomości. Spróbuj ponownie później.";
}
?>
