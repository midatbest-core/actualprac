<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipment = $_POST['equipment'];
    $available = $_POST['available'];
    $quantity = $_POST['quantity'];
    $duration = $_POST['duration'];
    $customer = $_POST['customer'];
    
    if ($quantity <= 0 || $duration <= 0) {
        $error = "Quantity and Duration must be positive!";
    } else {
        $remaining = $available - $quantity;
        $fee = $quantity * $duration * 50; // Flat ₹50 per day.
        echo "<h2>Rental Confirmed!</h2>Equipment: $equipment<br>Remaining Quantity: $remaining<br>Rental Fee: ₹$fee";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Equipment Rental</title>
    <style>
        body {font-family:Arial;background:#f0f8ff;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#28a745;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateRental()">
    <h3>Equipment Rental</h3>
    <input type="text" name="equipment" placeholder="Equipment Name" required>
    <input type="number" name="available" value="20" readonly>
    <input type="number" name="quantity" id="quantity" placeholder="Quantity to Rent" required>
    <input type="number" name="duration" id="duration" placeholder="Rental Duration (days)" required>
    <input type="text" name="customer" placeholder="Customer Name" required>
    <button type="submit">Rent</button>
</form>
<script>
function validateRental() {
    let q = document.getElementById('quantity').value;
    let d = document.getElementById('duration').value;
    return q > 0 && d > 0;
}
</script>
</body>
</html>
