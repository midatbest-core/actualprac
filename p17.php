<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $desc = $_POST['description'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $budget = $_POST['budget'];

    $expenses = $amount;
    $remaining = $budget - $expenses;

    echo "<h2>Expense Added!</h2>Description: $desc<br>Amount: ₹$amount<br>Date: $date<br>Budget Remaining: ₹$remaining";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <style>
        body {font-family:Arial;background:#f3f3f3;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateExpense()">
    <h3>Expense Tracker</h3>
    <input type="text" name="description" placeholder="Expense Description" required>
    <input type="number" name="amount" id="amount" placeholder="Amount" required>
    <input type="date" name="date" required>
    <input type="number" name="budget" placeholder="Total Budget" required>
    <button type="submit">Add Expense</button>
</form>
<script>
function validateExpense() {
    return document.getElementById('amount').value > 0;
}
</script>
</body>
</html>
