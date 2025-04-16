<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meal = $_POST['meal'];
    $cal = $_POST['calories'];
    $protein = $_POST['protein'];
    $carb = $_POST['carb'];
    $fat = $_POST['fat'];

    echo "<h2>Meal Planned!</h2>Meal: $meal<br>Calories: $cal<br>Protein: $protein g<br>Carbs: $carb g<br>Fat: $fat g";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Meal Planner</title>
    <style>
        body {font-family:Arial;background:#f4f4f4;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateMeal()">
    <h3>Meal Planner</h3>
    <input type="text" name="meal" placeholder="Meal Name" required>
    <input type="number" name="calories" id="calories" placeholder="Calories" required>
    <input type="number" name="protein" placeholder="Protein (g)" required>
    <input type="number" name="carb" placeholder="Carbohydrates (g)" required>
    <input type="number" name="fat" placeholder="Fat (g)" required>
    <button type="submit">Calculate</button>
</form>
<script>
function validateMeal() {
    return document.getElementById('calories').value > 0;
}
</script>
</body>
</html>
