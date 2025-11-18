<!DOCTYPE HTML>
<html>
<head>
    <title>SLC</title>
</head>
<body>
<form method="post" action="">
    <label>Borrower Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Loan Amount</label><br>
    <input type="number" name="loan" required><br><br>

    <label>Annual Interest Rate (%)</label><br>
    <input type="number" name="rate" required><br><br>

    <label>Loan Term (months)</label><br>
    <input type="number" name="term" required><br><br>

    <input type="checkbox" id="yes" name="ans" value="yes">
    <label for="yes">Yes</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $amount = $_POST["loan"];
    $interest = $_POST["rate"];
    $months = $_POST["term"];
    
    if(isset($_POST["ans"])) {
        $fee = $amount * 0.02;
    } else {
        $fee = 0;
    }

    $i_rate = ($interest / 100) / 12;
    $t_rate = $amount * $i_rate * $months;
    $amount_p = $amount + $t_rate;
    $m_payment = ($amount_p + $fee) / $months;

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Borrower Name</td><td>$name</td></tr>
    <tr><td>Loan Amount</td><td>₱$amount</td></tr>
    <tr><td>Interest Rate</td><td>$interest% per year</td></tr>
    <tr><td>Loan Term</td><td>$months months</td></tr>
    <tr><td>Total Interest</td><td>₱$t_rate</td></tr>
    <tr><td>Processing Fee (2%)</td><td>₱$fee</td></tr>
    <tr><td>Amount to Pay</td><td>₱$amount_p</td></tr>
    <tr><td>Monthly Payment</td><td>₱$m_payment</td></tr>
    </table>
    ";

}
?>
</body>
</html>