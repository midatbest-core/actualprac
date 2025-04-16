<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $current = $_POST['current'];
    $date = $_POST['date'];

    $roi = (($current - $amount) / $amount) * 100;
    echo "<h2>Investment Summary</h2>Name: $name<br>Invested: ₹$amount<br>Current: ₹$current<br>ROI: ".round($roi,2)."%";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Investment Tracker</title>
    <style>
        body {font-family:Arial;background:#fafafa;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateInvestment()">
    <h3>Investment Tracker</h3>
    <input type="text" name="name" placeholder="Investment Name" required>
    <input type="number" name="amount" id="amount" placeholder="Investment Amount" required>
    <input type="date" name="date" required>
    <input type="number" name="current" id="current" placeholder="Current Value" required>
    <button type="submit">Calculate ROI</button>
</form>
<script>
function validateInvestment() {
    return document.getElementById('amount').value > 0 && document.getElementById('current').value > 0;
}
</script>
</body>
</html>
