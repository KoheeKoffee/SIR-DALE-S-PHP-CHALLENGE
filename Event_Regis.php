<!DOCTYPE HTML>
<html>
<head>
    <title>Event Registration</title>
</head>
<h2>Event Registration with Group Discount!?</h2>
<body>
<form method="post" action="">
    <label>Enter Fullname: </label><br>
    <input type="text" name="f_name" required><br><br>

    <label>Enter Email: </label><br>
    <input type="email" name="email" required><br><br>

    <label>Enter Contact Number</label><br>
    <input type="number" name="contact" required><br><br>

    <label>Date: </label><br>
    <input type="date"><br><br>

    <label>Time: </label><br>
    <input type="time"><br><br>

    <label>Number of Attendees: </label><br>
    <input type="number" name="attendees" required><br><br>

    <label>Ticket Type: </label><br>
    <select name="ticket">
        <option value="Regular">Regular ₱300</option>
        <option value="VIP">VIP ₱600</option>
        <option value="Student">Student ₱200</option>
</select><br><br>

    <label>Gender: </label><br>
    <input type="radio" id="Male" name="gender" value="Male">
    <label for="Male">Male</label><br>

    <input type="radio" id="Female" name="gender" value="Female">
    <label for="Female">Female</label><br><br>

    <label>Add-ons</label><br>
    <input type="checkbox" id="snack" name="addons[]" value="Snack">
    <label for="snack">Snack ₱50</label><br>

    <input type="checkbox" id="shirt" name="addons[]" value="T-Shirt">
    <label for="shirt">T-Shirt ₱150</label><br>

    <input type="checkbox" id="back" name="addons[]" value="Backstage_Pass">
    <label for="back">Backstage Pass ₱300</label><br><br>

    <input type="submit" name="submit" value="submit">

</form>
<?php
if(isset($_POST["submit"])) {
    $name = $_POST["f_name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $attendee = $_POST["attendees"];
    $ticket = $_POST["ticket"];
    $gender = $_POST["gender"];
    $addons = $_POST["addons"] ?? [];
    $addons_list = implode(", ", $addons);
    switch($ticket) {
        case 'Regular': $pticket = 300; break;
        case 'VIP': $pticket = 600; break;
        case 'Student': $pticket = 200; break;
    }
    $ini_total = $pticket * $attendee;

    if($attendee > 5){
        $discount = $ini_total * 0.10;
    } else {
        $discount = 0;
    }

    $subtotal = $ini_total - $discount;

    $addon_p = [
        "Snack" => 50,
        "T-Shirt" => 150,
        "Backstage_Pass" => 300
    ];

    $a_total = 0;
    foreach($addons as $a){
        if($attendee > 5){
            $a_total += $addon_p[$a] * $attendee;
        } else {
            $a_total += $addon_p[$a];
        }
        
    }

    $f_total = $subtotal + $a_total;

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Fullname</td><td>$name</td></tr>
    <tr><td>Email</td><td>$email</td></tr>
    <tr><td>Number of Attendees</td><td>$attendee</td></tr>
    <tr><td>Ticket Type</td><td>$ticket</td></tr>
    <tr><td>Addons</td><td>$addons_list</td></tr>
    <tr><td>Subtotal</td><td>₱$subtotal</td></tr>
    <tr><td>Group Discount</td><td>₱$discount</td></tr>
    <tr><td>Add-ons Total</td><td>₱$a_total</td></tr>
    <tr><td>Final Total</td><td>₱$f_total</td></tr>
    ";
}
?>
</body>
</html>