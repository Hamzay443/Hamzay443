<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected parts and quantities from the form
    $selectedParts = $_POST['selectedParts']; // An array of selected parts
    $quantities = $_POST['quantities']; // Corresponding quantities

    // Initialize total cost
    $totalCost = 0;
    foreach ($selectedParts as $index => $part) {
        $price = getPriceForPart($part); // Assume this function fetches part price
        $quantity = $quantities[$index];
        $totalCost += $price * $quantity;
    }

    // Return the total cost as a response
    echo "Total Cost: $" . number_format($totalCost, 2);
}

function getPriceForPart($part) {
    $prices = [
        'oilFilter' => 25,
        'sparkPlugs' => 40,
        'shockAbsorber' => 120,
        // add all parts and their prices here
    ];
    return isset($prices[$part]) ? $prices[$part] : 0;
}
?>
