<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $current = $_POST['current'];
    $new = $_POST['new'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['cost'];

    if ($new <= 0 || $cost <= 0) {
        $error = "Quantity and Cost must be positive!";
    } else {
        $updated = $current + $new;
        $totalCost = $cost * $new;
        echo "<h2>Inventory Updated!</h2>Product: $product<br>New Stock: $updated<br>Total Cost for Added Stock: ₹$totalCost";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Tracker</title>
    <style>
        body {font-family:Arial;background:#fafafa;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#28a745;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateInventory()">
    <h3>Product Inventory</h3>
    <input type="text" name="product" placeholder="Product Name" required>
    <input type="number" name="current" placeholder="Quantity In Stock" required>
    <input type="number" name="new" id="new" placeholder="New Stock Quantity" required>
    <input type="text" name="supplier" placeholder="Supplier Name" required>
    <input type="number" name="cost" id="cost" step="0.01" placeholder="Cost Per Unit" required>
    <button type="submit">Update Inventory</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateInventory() {
    let newStock = document.getElementById('new').value;
    let cost = document.getElementById('cost').value;
    if (newStock <= 0 || cost <= 0) {
        alert("Quantity and Cost must be positive.");
        return false;
    }
    return true;
}
</script>
</body>
</html>
