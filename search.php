<?php

$cars = [
    ['brand' => 'Toyota', 'year' => 2020, 'color' => 'Red'],
    ['brand' => 'Honda', 'year' => 2018, 'color' => 'Blue'],
];

$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';
$color = isset($_GET['color']) ? $_GET['color'] : '';

$filteredCars = array_filter($cars, function($car) use ($brand, $year, $color) {
    return (empty($brand) || stripos($car['brand'], $brand) !== false) &&
           (empty($year) || stripos($car['year'], $year) !== false) &&
           (empty($color) || stripos($car['color'], $color) !== false);
});

echo json_encode($filteredCars);
?>
