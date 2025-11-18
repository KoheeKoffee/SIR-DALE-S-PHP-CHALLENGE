<!DOCTYPE HTML>
<html>
<head>

</head>
<h2>Restaurant Bill Calculator</h2>
<body>
<form method="post" action="">
    <label>Restaurant Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Birthdate</label><br>
    <input type="date"><br><br>

    <label>Number of People</label><br>
    <input type="number" name="people" required><br><br>

    <label>Food Total</label><br>
    <input type="number" name="food" required><br><br>

    <label>Drinks Total</label><br>
    <input type="number" name="drinks" required><br><br>

    <label>Hase Senior Citizen?</label><br>
    <input type="checkbox" id="discount" name="ans" value="yes">
    <label for="discount">Yes</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $people = $_POST["people"];
    $food = $_POST["food"];
    $drinks = $_POST["drinks"];
    $subtotal = $food + $drinks;
    if(isset($_POST["ans"])) {
        $discount = $subtotal * 0.20;
    } else {
        $discount = 0;
    }

    $a_discount = $subtotal - $discount;

    $service = $a_discount * 0.10;

    $total = $a_discount + $service;

    $p_total = $total / $people;




    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Restaurant Name</td><td>$name</td></tr>
    <tr><td>Number of People</td><td>$people</td></tr>
    <tr><td>Food + Drinks Subtotal</td><td>₱$subtotal</td></tr>
    <tr><td>Senior Discount (20%)</td><td>-$discount</td></tr>
    <tr><td>After Discount</td><td>$a_discount</td></tr>
    <tr><td>Sevice Charge (10%)</td><td>$service</td></tr>
    <tr><td>Total Bill</td><td>$total</td></tr>
    <tr><td>Per Person</td><td>$p_total</td></tr>
    ";
}
?>
</body>
</html>