<!DOCTYPE HTML>
<html>
    <head>
        <title>BMI PHP</title>
    </head>
    <h2> BMI Calculator </h2>
<body>
<form method="post" action="">
    <label>Enter your Full name</label><br>
    <input type="text" name="f_name"><br><br>

    <label>Enter your Age</label><br>
    <input type="number" name="age"><br><br>

    <label>Enter your Weight</label><br>
    <input type="number" name="weight"><br><br>

    <label>Enter your Height (cm)</label><br>
    <input type="number" name="height"><br><br>

    <label>Select Activity Level</label><br>
    <input type="radio" id="Sedentary" name="act_level" value="Sedentary">
    <label for="Sedentary">Sedentary</label>

    <input type="radio" id="Moderate" name="act_level" value="Moderate">
    <label for="Moderate">Moderate</label>

    <input type="radio" id="Active" name="act_level" value="Active">
    <label for="Active">Active</label><br><br>

    <input type="submit" name="submit" value="calculate"><br><br>
    
</form>
<?php
if(isset($_POST["submit"])) {
    $name = $_POST["f_name"];
    $age = $_POST["age"];
    $level = $_POST["act_level"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $BMI = $weight / ($height * $height) * 10000; 
    $BMI = number_format($BMI, 1);
if($BMI < 18.5) {
    $category = "Underweight";
} elseif($BMI < 24.9) {
    $category = "Normal";
} elseif($BMI < 29.9) {
    $category = "Overweight";
} else {
    $category = "Obese";
}
    echo "
    <table border='1' cellpadding='5'>
    <tr><td>Full Name</td><td>$name</td></tr></tr>  
    <tr><td>Age</td><td>$age</td></tr>  
    <tr><td>Weight</td><td>$weight</td></tr>  
    <tr><td>Height</td><td>$height</td></tr>  
    <tr><td>BMI</td><td>$BMI</td></tr>  
    <tr><td>BMI Category</td><td>$category</td></tr>
    <tr><td>Activity Level</td><td>$level</td></tr>   
    </table>
    ";
}
?>

</body>
</html>