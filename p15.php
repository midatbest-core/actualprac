<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room = $_POST['room'];
    $date = $_POST['date'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $employee = $_POST['employee'];
    $reason = $_POST['reason'];

    if ($end <= $start) {
        $error = "End Time must be after Start Time.";
    } else {
        $duration = (strtotime($end) - strtotime($start)) / 3600 . " hours";
        echo "<h2>Reservation Confirmed!</h2>Room: $room<br>Date: $date<br>Duration: $duration<br>Reserved By: $employee";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Conference Room Reservation</title>
    <style>
        body {font-family:Arial;background:#eee;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateReservation()">
    <h3>Room Reservation</h3>
    <input type="text" name="room" placeholder="Room Name" required>
    <input type="date" name="date" required>
    <input type="time" name="start" id="start" required>
    <input type="time" name="end" id="end" required>
    <input type="text" name="employee" placeholder="Employee Name" required>
    <input type="text" name="reason" placeholder="Reason for Reservation" required>
    <button type="submit">Reserve</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateReservation() {
    let start = document.getElementById('start').value;
    let end = document.getElementById('end').value;
    if (end <= start) {
        alert("End Time must be after Start Time!");
        return false;
    }
    return true;
}
</script>
</body>
</html>
