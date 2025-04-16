<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $current = $_POST['current'];
    $order = $_POST['order'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['cost'];

    if ($order <= 0) {
        $error = "Order quantity must be positive.";
    } else {
        $newStock = $current + $order;
        $totalCost = $order * $cost;
        echo "<h2>Order Placed Successfully!</h2>Product: $product<br>Updated Stock: $newStock<br>Total Cost: ₹$totalCost";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Order</title>
    <style>
        body {font-family:Arial;background:#f1f1f1;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateStockOrder()">
    <h3>Stock Management</h3>
    <input type="text" name="product" placeholder="Product Name" required>
    <input type="number" name="current" placeholder="Current Quantity" required readonly value="100">
    <input type="number" name="order" id="order" placeholder="Quantity to Order" required>
    <input type="text" name="supplier" placeholder="Supplier Name" required>
    <input type="number" name="cost" placeholder="Cost Per Unit" required>
    <button type="submit">Place Order</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateStockOrder() {
    return document.getElementById('order').value > 0;
}
</script>
</body>
</html>
