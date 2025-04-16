<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    if ($price <= 0 || $quantity < 1 || $quantity > 10) {
        $error = "Price must be >0 and Quantity between 1-10!";
    } else {
        $total = $price * $quantity;
        echo "<h2>Order Placed Successfully!</h2>Book: $title<br>Author: $author<br>Quantity: $quantity<br>Total Cost: ₹$total";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Order</title>
    <style>
        body {font-family:Arial;background:#fafafa;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#28a745;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateOrder()">
    <h3>Book Order</h3>
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="number" step="0.01" name="price" id="price" placeholder="Price" required>
    <input type="number" name="quantity" id="quantity" placeholder="Quantity (1-10)" required>
    <button type="submit">Order</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateOrder() {
    let p = parseFloat(document.getElementById('price').value);
    let q = parseInt(document.getElementById('quantity').value);
    if (p <= 0 || q < 1 || q > 10) {
        alert("Price must be >0 and Quantity must be 1-10.");
        return false;
    }
    return true;
}
</script>
</body>
</html>
