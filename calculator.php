<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if selectedParts and quantities are set
    if (isset($_POST['selectedParts']) && isset($_POST['quantities'])) {
        // Retrieve selected parts and quantities from the form
        $selectedParts = $_POST['selectedParts']; // An array of selected parts
        $quantities = $_POST['quantities']; // Corresponding quantities

        // Initialize total cost
        $totalCost = 0;
        $billDetails = []; // To store details for the bill summary

        // Loop through selected parts and calculate total cost
        foreach ($selectedParts as $index => $part) {
            $price = getPriceForPart($part); // Fetch part price
            $quantity = isset($quantities[$index]) ? (int)$quantities[$index] : 0; // Ensure quantity is an integer
            $cost = $price * $quantity; // Calculate cost for this part
            $totalCost += $cost; // Add to total cost

            // Store details for the bill summary
            $billDetails[] = [
                'part' => $part,
                'quantity' => $quantity,
                'price' => $price,
                'cost' => $cost
            ];
        }

        // Display the total cost and bill summary
        echo "<div style='max-width: 600px; margin: auto; padding: 20px; background-color:#000a1f; border-radius: 10px; color: white;'>";
        echo "<h3>Bill Summary</h3>";
        echo "<table style='width: 100%; color: white; border-collapse: collapse;'>";
        echo "<thead><tr><th style='text-align: left;'>Part</th><th style='text-align: left;'>Quantity</th><th style='text-align: left; color: white;'>Cost</th></tr></thead>";
        echo "<tbody>";

        foreach ($billDetails as $detail) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars(ucfirst($detail['part'])) . "</td>";
            echo "<td>" . htmlspecialchars($detail['quantity']) . "</td>";
            echo "<td>$" . number_format($detail['cost'], 2) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "<h4 style='margin-top: 20px;'>Total Cost: $" . number_format($totalCost, 2) . "</h4>"; // Display total cost
        echo "</div>";
    } else {
        echo "<div style='color: red;'>No parts selected or quantities provided.</div>";
    }
}

function getPriceForPart($part) {
    $prices = [
        'oilFilter' => 25,
        'sparkPlugs' => 40,
        'shockAbsorber' => 120,
        'brakeDisc' => 40,
        'brakePads' => 45,
        'airFilter' => 30,
        'batteryNew' => 150,
        'radiator' => 200,
        'alternator' => 180,
        'fuelPump' => 95,
        'timingBelt' => 70,
        'wiperBlade' => 65,
    ];
    return isset($prices[$part]) ? $prices[$part] : 0; // Return price or 0 if not found
}
?>