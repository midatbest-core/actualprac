<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supply = $_POST['supply'];
    $current = $_POST['current'];
    $request = $_POST['request'];
    $supplier = $_POST['supplier'];
    $date = $_POST['delivery'];

    if ($request <= 0) {
        $error = "Quantity must be positive.";
    } else {
        $newTotal = $current + $request;
        echo "<h2>Supply Request Placed!</h2>Supply: $supply<br>New Quantity: $newTotal<br>Delivery Date: $date";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Medical Supply Request</title>
    <style>
        body {font-family:Arial;background:#f7f7f7;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#28a745;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateSupply()">
    <h3>Medical Supply Request</h3>
    <input type="text" name="supply" placeholder="Supply Name" required>
    <input type="number" name="current" value="100" readonly>
    <input type="number" name="request" id="request" placeholder="Quantity to Request" required>
    <input type="text" name="supplier" placeholder="Supplier Name" required>
    <input type="date" name="delivery" required>
    <button type="submit">Submit Request</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateSupply() {
    return document.getElementById('request').value > 0;
}
</script>
</body>
</html>
