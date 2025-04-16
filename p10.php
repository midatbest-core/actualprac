<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p1 = $_POST['p1']; $price1 = $_POST['price1']; $rating1 = $_POST['rating1'];
    $p2 = $_POST['p2']; $price2 = $_POST['price2']; $rating2 = $_POST['rating2'];

    $cheaper = ($price1 < $price2) ? "$p1 is cheaper." : (($price2 < $price1) ? "$p2 is cheaper." : "Both products cost the same.");
    $recommend = ($rating1 > $rating2) ? "$p1 has better ratings." : (($rating2 > $rating1) ? "$p2 has better ratings." : "Both have equal ratings.");
    
    echo "<h2>Comparison Result</h2>$cheaper<br>$recommend";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison</title>
    <style>
        body {font-family:Arial;background:#e8f5e9;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateCompare()">
    <h3>Product Comparison</h3>
    <input type="text" name="p1" placeholder="Product Name 1" required>
    <input type="number" name="price1" id="price1" placeholder="Product Price 1" required>
    <input type="number" name="rating1" id="rating1" placeholder="Product Rating 1 (1-5)" required>
    <input type="text" name="p2" placeholder="Product Name 2" required>
    <input type="number" name="price2" id="price2" placeholder="Product Price 2" required>
    <input type="number" name="rating2" id="rating2" placeholder="Product Rating 2 (1-5)" required>
    <button type="submit">Compare</button>
</form>
<script>
function validateCompare() {
    let price1 = document.getElementById('price1').value;
    let price2 = document.getElementById('price2').value;
    let r1 = document.getElementById('rating1').value;
    let r2 = document.getElementById('rating2').value;
    if (price1 <= 0 || price2 <= 0 || r1 < 1 || r1 > 5 || r2 < 1 || r2 > 5) {
        alert("Prices must be >0, Ratings must be between 1 and 5.");
        return false;
    }
    return true;
}
</script>
</body>
</html>
