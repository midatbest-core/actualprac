<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle = $_POST['vehicle'];
    $pickup = $_POST['pickup'];
    $return = $_POST['return'];
    $customer = $_POST['customer'];
    $contact = $_POST['contact'];

    if ($return <= $pickup) {
        $error = "Return date must be after Pickup date.";
    } else {
        $days = (strtotime($return) - strtotime($pickup)) / (60*60*24);
        echo "<h2>Reservation Confirmed!</h2>Vehicle: $vehicle<br>Days Reserved: $days<br>Customer: $customer";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Rental</title>
    <style>
        body {font-family:Arial;background:#f2f2f2;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        select,input {width:100%;margin:5px 0;padding:8px;}
        button {background:#28a745;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateVehicle()">
    <h3>Vehicle Rental Reservation</h3>
    <select name="vehicle" required>
        <option value="">Select Vehicle</option>
        <option>Car</option>
        <option>Bike</option>
        <option>Truck</option>
    </select>
    <input type="date" name="pickup" id="pickup" required>
    <input type="date" name="return" id="return" required>
    <input type="text" name="customer" placeholder="Customer Name" required>
    <input type="text" name="contact" placeholder="Contact Number" required>
    <button type="submit">Reserve</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateVehicle() {
    let pickup = document.getElementById('pickup').value;
    let ret = document.getElementById('return').value;
    if (ret <= pickup) {
        alert("Return date must be after pickup date.");
        return false;
    }
    return true;
}
</script>
</body>
</html>
