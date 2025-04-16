<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $job = $_POST['jobtitle'];
    $phone = $_POST['phone'];
    $date = $_POST['workshopdate'];
    $attendees = $_POST['attendees'];
    $requests = $_POST['requests'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email Format!";
    } elseif (strtotime($date) < strtotime(date("Y-m-d"))) {
        $error = "Workshop Date can't be in the past.";
    } else {
        echo "<h2>Registration Confirmed!</h2>";
        echo "Name: $name<br>Company: $company<br>Job: $job<br>Email: $email<br>Phone: $phone<br>Date: $date<br>Attendees: $attendees<br>Requests: $requests";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workshop Registration</title>
    <style>
        body { font-family: Arial; background: #eef; display: flex; justify-content: center; align-items: center; height: 100vh;}
        form { background: #fff; padding: 20px; border-radius: 10px; width: 350px; box-shadow: 0 0 10px rgba(0,0,0,0.2);}
        input, textarea { width: 100%; margin: 5px 0; padding: 8px; }
        button { background: #28a745; color: white; padding: 10px; border: none; border-radius: 5px; width: 100%; }
        .error { color: red; }
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateWorkshop()">
    <h3>Digital Marketing Workshop</h3>
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="email" name="email" id="email" placeholder="Email Address" required>
    <input type="text" name="company" placeholder="Company Name" required>
    <input type="text" name="jobtitle" placeholder="Job Title" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <input type="date" name="workshopdate" id="workshopdate" required>
    <input type="number" name="attendees" placeholder="Number of Attendees" required>
    <textarea name="requests" placeholder="Special Requests"></textarea>
    <button type="submit">Register</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateWorkshop() {
    let email = document.getElementById('email').value;
    let date = document.getElementById('workshopdate').value;
    if (new Date(date) < new Date()) {
        alert("Workshop Date cannot be in the past.");
        return false;
    }
    return true;
}
</script>
</body>
</html>
