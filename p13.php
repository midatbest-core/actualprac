<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredient = $_POST['ingredient'];
    $current = $_POST['current'];
    $order = $_POST['order'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['cost'];

    if ($order <= 0 || $cost <= 0) {
        $error = "Order quantity and cost must be positive.";
    } else {
        $updated = $current + $order;
        $total = $order * $cost;
        echo "<h2>Order Placed Successfully!</h2>Ingredient: $ingredient<br>Updated Quantity: $updated<br>Total Cost: ₹$total";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ingredient Inventory</title>
    <style>
        body {font-family:Arial;background:#fcfcfc;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateIngredient()">
    <h3>Ingredient Inventory</h3>
    <input type="text" name="ingredient" placeholder="Ingredient Name" required>
    <input type="number" name="current" value="50" readonly>
    <input type="number" name="order" id="order" placeholder="Quantity to Order" required>
    <input type="text" name="supplier" placeholder="Supplier Name" required>
    <input type="number" name="cost" id="cost" step="0.01" placeholder="Cost Per Unit" required>
    <button type="submit">Place Order</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateIngredient() {
    return document.getElementById('order').value > 0 && document.getElementById('cost').value > 0;
}
</script>
</body>
</html>
