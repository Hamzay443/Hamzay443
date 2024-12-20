<?php
// update.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './db.php';

// Get the form data
$registration_number = $_POST['registration_number'];
$new_brand = $_POST['new_brand'];
$new_year = $_POST['new_year'];
$new_color = $_POST['new_color'];

// Prepare and bind
$stmt = $conn->prepare("UPDATE cars SET brand = ?, year = ?, color = ? WHERE id = ?");
$stmt->bind_param("siss", $new_brand, $new_year, $new_color, $registration_number);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
}
?>