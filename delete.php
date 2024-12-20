<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './db.php'; // Include your database connection

    $car_id = isset($_POST['car_id']) ? (int)$_POST['car_id'] : 0;

    if ($car_id > 0) {
        $sql = "DELETE FROM cars WHERE id = $car_id";
        echo "<p>Executing query: $sql</p>";
        if ($conn->query($sql)) {
            echo "<p>Car deleted successfully.</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Please provide a valid car ID.</p>";
    }

    $conn->close();
}
?>