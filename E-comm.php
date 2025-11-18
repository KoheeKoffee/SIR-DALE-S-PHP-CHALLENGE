<!DOCTYPE HTML>
<html>
<head>
    <title>E-Commerce with Shipping</title>
</head>
<h2>E-Commerce with Shipping</h2>
<body>
<form method="post" action="">
    <label>Customer Name: </label><br>
    <input type="text" name="f_name" required><br><br>

    <label>Item: </label><br>
    <select name="item">
        <option value="Mug">Mug ₱120</option>
        <option value="Shirt">Shirt ₱250</option>
        <option value="Hoodie">Hoodie ₱450</option>
        <option value="Water Bottle">Water Bottle ₱180</option>
    </select><br><br>

    <label>Quantity: </label><br>
    <input type="number" name="quantity" required><br><br>

    <label>Color: </label><br>
    <input type="color" name="color"><br><br>

    <label>Shipping Region</label><br>
    <input type="radio" id="MTM" name="region" value="Metro Manila">
    <label for="MTM">Metro Manila ₱50</label><br>

    <input type="radio" id="Luz" name="region" value="Luzon">
    <label for="Luz">Luzon ₱100</label><br>

    <input type="radio" id="Vis" name="region" value="Visayas">
    <label for="Vis">Visayas ₱150</label><br>

    <input type="radio" id="Min" name="region" value="Mindanao">
    <label for="Min">Mindanao ₱200</label><br><br>

    <label>Add-ons</label><br>
    <input type="checkbox" id="gw" name="addons[]" value="Gift Wrap">
    <label for="gw">Gift Wrap ₱25</label><br>

    <input type="checkbox" id="ed" name="addons[]" value="Express Delivery">
    <label for="ed">Express Delivery ₱100</label><br>

    <input type="checkbox" id="Ins" name="addons[]" value="Insurance">
    <label for="Ins">Insurance ₱50</label><br><br>

    <input type="submit" name="submit" value="submit">
</form>
<?php 
if(isset($_POST["submit"])) {
    $name = $_POST["f_name"];
    $item = $_POST["item"];
    $qua = $_POST["quantity"];
    $ship = $_POST["region"];
    $addon = $_POST["addons"] ?? [];
    $a_list = implode(", ", $addon);

    switch($item) {
        case 'Mug': $item_cost = 50; break;
        case 'Shirt': $item_cost = 100; break;
        case 'Hoodie': $item_cost = 150; break;
        case 'Water Bottle': $item_cost = 200; break;
    }

    switch($ship) {
        case 'Metro Manila': $ship_cost = 50; break;
        case 'Luzon': $ship_cost = 100; break;
        case 'Visayas': $ship_cost = 150; break;
        case 'Mindanao': $ship_cost = 200; break;
    }

    $i_subtotal = $item_cost * $qua;


    $addon_p = [
        "Gift Wrap" => 25,
        "Express Delivery" => 100,
        "Insurance" => 50
    ];

    $a_total = 0;
    foreach($addon as $a){
        $a_total += $addon_p[$a];
    }

    $f_total = $i_subtotal + $ship_cost + $a_total;

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Customer Name</td><td>$name</td></tr>
    <tr><td>Item</td><td>$item</td></tr>
    <tr><td>Quantity</td><td>$qua</td></tr>
    <tr><td>Shipping Region</td><td>$ship</td></tr>
    <tr><td>Add-ons</td><td>$a_list</td></tr>
    <tr><td>Item Subtotal</td><td>$i_subtotal</td></tr>
    <tr><td>Shipping Cost</td><td>$ship_cost</td></tr>
    <tr><td>Add-ons Total</td><td>$a_total</td></tr>
    <tr><td>Final Total</td><td>$f_total</td></tr>
    ";
}
?>
</body>
</html>