<!DOCTYPE HTML>
<html>
<head>
    <title>PDP</title>
</head>
<h2>Personal Budget Planner</h2>
<body>
<form method="post" action="">
    <label>Budget Name Text</label><br>
    <input type="text" name="title" required><br><br>

    <label>Month: </label><br>
    <input type="date" name="date" required><br><br>

    <label>Monthly Income: </label><br>
    <input type="number" name="inc" required><br><br>

    <label>Food Expense: </label><br>
    <input type="number" name="food" required><br><br>

    <label>Transport Expense: </label><br>
    <input type="number" name="transpo" required><br><br>

    <label>Shopping Expense: </label><br>
    <input type="number" name="shop" required><br><br>

    <label for="savings">Saving Goal(%) </label><br>
    <input type="range" id="savings" name="savings" min="10" max="50"><br><br>

    <input type="submit" name="submit" value="calculate"><br><br>
</form>
<?php 
if(isset($_POST["submit"])) {
    $title = $_POST["title"];
    $income = $_POST["inc"];
    $food = $_POST["food"];
    $transpo = $_POST["transpo"];
    $shop = $_POST["shop"];
    $savings = $_POST["savings"];

    $d_savings = $savings / 100;
    $e_total = $food + $transpo + $shop;
    $target = $income * $d_savings;
    $remaining = $income - $e_total;
    if($remaining >= $target) {
        $s_savings = "Goal Met!";
    } else {
        $need = $target - $remainig;
        $s_savings = "Short by ₱$need ";
    }

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Budget Name</td><td>$title</td></tr>
    <tr><td>Monthly Income</td><td>₱$income</td></tr>
    <tr><td>Total Expenses</td><td>₱$e_total</td></tr>
    <tr><td>Saving Goal</td><td>$savings%</td></tr>
    <tr><td>Target Savings</td><td>₱$target</td></tr>
    <tr><td>Remaining Balance</td><td>₱$remaining</td></tr>
    <tr><td>Saving Status</td><td>$s_savings</td></tr>
    ";
}
?>
</body>
</html>
