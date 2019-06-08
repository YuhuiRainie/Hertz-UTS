<?php
$id = $_GET["id"];

session_start();

// retrieve xml database
$xml = simplexml_load_file("CarDate.xml") or die("Error: Cannot create Object");
foreach ($xml->children() as $cars) {
    if (($id == $cars->id) && ("Y" == $cars->Availability)){
        // add item to shopping cart
        $car_detail = array(
            "id" => (int)$cars->id,
            "Mileage" => (string) $cars->Mileage,
            "FuelType" => (string) $cars->FuelType,
            "Seats" => (string) $cars->Seats,
            "Brand" => (string) $cars->Brand,
            "Model" => (string) $cars->Model,
            "Year" => (string) $cars->Year,
            "PricePerDay" => (int) $cars->PricePerDay,
            "rentDay" => 1
        );
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array($id => $car_detail);
        } else if (!isset($_SESSION["cart"][$id])) {
            $_SESSION["cart"][$id] = $car_detail;
        }
        echo $cars->Availability;
        return;
    }
}
?>