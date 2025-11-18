<!DOCTYPE HTML>
<html>
<head>
    <title>TBC</title>
</head>
<h2>Travel Booking Calculator</h2>

<body>
<form method="post" action="">
    <label>Traveler Name </label><br>
    <input type="text" name="name" required><br><br>

    <select name="destination">
        <option value="Boracay">Boracay ₱3,500</option>
        <option value="Palawan">Palawan ₱4,000</option>
        <option value="Cebu">Cebu ₱3,000</option>
        <option value="Baguio">Baguio ₱2,500</option>
    </select><br><br>

    <label>Number of Travelers </label><br>
    <input type="number" name="num_trav" required><br><br>

    <label>Number of Days </label><br>
    <input type="number" name="days" required><br><br> 

    <label>Departure Date </label><br>
    <input type="date" name="date" required><br><br>

    <input type="checkbox" id="hotel" name="addons[]" value="Hotel">
    <label for="hotel">Hotel ₱2000/night</label><br>

    <input type="checkbox" id="breakfast" name="addons[]" value="Breakfast">
    <label for="breakfast">Breakfast ₱300/day</label><br>

    <input type="checkbox" id="guide" name="addons[]" value="Tour Guide">
    <label for="guide">Tour Guide ₱800/day</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php 
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $destination = $_POST["destination"];
    $passengers = $_POST["num_trav"];
    $days = $_POST["days"];
    $addons = $_POST["addons"] ?? [];
    $a_list = implode(", ", $addons);
    switch($destination){
        case 'Boracay': $destination_c = 3500;
        case 'Palawan': $destination_c = 4000;
        case 'Cebu': $destination_c = 3000;
        case 'Baguio': $destination_c = 2500;
    }

    $b_cost = $destination_c * $days * $passengers;

    $addon_p = [
        "Hotel" => 2000,
        "Breakfast" => 300,
        "Tour Guide" => 800,
    ];

    $a_total = 0;
    foreach($addons as $a){
        $a_total += $addon_p[$a]; 
    }
    
    $f_total = $b_cost + $a_total;


    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Traveller Name</td><td>$name</td></tr>
    <tr><td>Destination</td><td>$destination ₱$destination_c</td></tr>
    <tr><td>Number of Travelers</td><td>$passengers</td></tr>
    <tr><td>Number of Days</td><td>$days days</td></tr>
    <tr><td>Add-ons Selected</td><td>$a_list</td></tr>
    <tr><td>Base Travel Cost</td><td>₱$b_cost</td></tr>
    <tr><td>Add-ons Total</td><td>₱$a_total</td></tr>
    <tr><td>Final Total</td><td>₱$f_total</td></tr>
    ";
}
?>
</body>
</html>