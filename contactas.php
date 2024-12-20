<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['senderName']);
    $email = htmlspecialchars($_POST['senderEmail']);
    $message = htmlspecialchars($_POST['message']);

    // SMTP configuration
    $smtpServer = 'smtp.gmail.com';
    $smtpPort = 587;
    $username = 'your_email@gmail.com'; // Your Gmail address
    $password = 'your_email_password'; // Your Gmail password

    // Create the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Create the email body
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // Connect to the SMTP server
    $socket = fsockopen($smtpServer, $smtpPort);
    if (!$socket) {
        echo "<script>alert('Could not connect to SMTP server.');</script>";
        exit;
    }

    // SMTP handshake
    fputs($socket, "EHLO $smtpServer\r\n");
    fgets($socket, 1024);
    fputs($socket, "AUTH LOGIN\r\n");
    fgets($socket, 1024);
    fputs($socket, base64_encode($username) . "\r\n");
    fgets($socket, 1024);
    fputs($socket, base64_encode($password) . "\r\n");
    fgets($socket, 1024);
    fputs($socket, "MAIL FROM: <$email>\r\n");
    fgets($socket, 1024);
    fputs($socket, "RCPT TO: <knightCreativity@gmail.com>\r\n");
    fgets($socket, 1024);
    fputs($socket, "DATA\r\n");
    fgets($socket, 1024);
    fputs($socket, $headers . "\r\n" . $body . "\r\n.\r\n");
    fgets($socket, 1024);
    fputs($socket, "QUIT\r\n");
    fgets($socket, 1024);

    // Close the socket
    fclose($socket);

    echo "<script>alert('Your message has been sent successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Processed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thank you for your message!</h2>
        <p>Your message has been successfully sent. We will get back to you as soon as possible.</p>
        <a href="contactas.html" class="btn btn-primary">Go back to Contact Us</a>
    </div>
</body>
</html>