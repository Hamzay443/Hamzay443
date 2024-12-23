<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect data
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $satisfaction = htmlspecialchars($_POST['satisfaction']);
    $services = implode(", ", $_POST['services']); // Assume multiple checkboxes
    $feedback = htmlspecialchars($_POST['feedback']);

   
}
?>