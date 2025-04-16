<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = $_POST['income'];
    $rent = $_POST['rent'];
    $groceries = $_POST['groceries'];
    $transport = $_POST['transport'];
    $entertainment = $_POST['entertainment'];
    $utilities = $_POST['utilities'];
    
    $totalExpenses = $rent + $groceries + $transport + $entertainment + $utilities;
    $remaining = $income - $totalExpenses;

    echo "<h2>Budget Summary</h2>Income: ₹$income<br>Total Expenses: ₹$totalExpenses<br>Remaining: ₹$remaining";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Budget Tracker</title>
    <style>
        body {font-family:Arial;background:#f0f0f0;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateBudget()">
    <h3>Monthly Budget Tracker</h3>
    <input type="number" name="income" id="income" placeholder="Monthly Income" required>
    <input type="number" name="rent" placeholder="Rent Expense" required>
    <input type="number" name="groceries" placeholder="Groceries Expense" required>
    <input type="number" name="transport" placeholder="Transportation Expense" required>
    <input type="number" name="entertainment" placeholder="Entertainment Expense" required>
    <input type="number" name="utilities" placeholder="Utilities Expense" required>
    <button type="submit">Save Budget</button>
</form>
<script>
function validateBudget() {
    let income = parseFloat(document.getElementById('income').value);
    return income > 0;
}
</script>
</body>
</html>
