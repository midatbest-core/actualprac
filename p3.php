<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = isset($_POST['availability']) ? implode(", ", $_POST['availability']) : "";
    $interest = $_POST['interest'];
    $comments = $_POST['comments'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email Format!";
    } elseif (empty($availability)) {
        $error = "Select at least one Availability.";
    } else {
        echo "<h2>Volunteer Registration Confirmed!</h2>";
        echo "Name: $name<br>Email: $email<br>Phone: $phone<br>Availability: $availability<br>Area of Interest: $interest<br>Comments: $comments";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Registration</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; display: flex; justify-content: center; align-items: center; height: 100vh;}
        form { background: white; padding: 20px; border-radius: 8px; width: 350px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input, textarea, select { width: 100%; margin: 5px 0; padding: 8px; }
        .error { color: red; }
        button { background: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; width: 100%; }
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateVolunteer()">
    <h3>Community Event Volunteer</h3>
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="email" name="email" id="email" placeholder="Email Address" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <p>Availability:</p>
    <label><input type="checkbox" name="availability[]" value="Morning"> Morning</label>
    <label><input type="checkbox" name="availability[]" value="Afternoon"> Afternoon</label>
    <label><input type="checkbox" name="availability[]" value="Evening"> Evening</label>
    <label><input type="checkbox" name="availability[]" value="Weekend"> Weekend</label>
    <select name="interest" required>
        <option value="">Select Interest</option>
        <option value="Event Setup">Event Setup</option>
        <option value="Registration">Registration</option>
        <option value="Clean-up">Clean-up</option>
    </select>
    <textarea name="comments" placeholder="Additional Comments"></textarea>
    <button type="submit">Register</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateVolunteer() {
    if (document.querySelectorAll('input[name="availability[]"]:checked').length === 0) {
        alert("Please select at least one availability option.");
        return false;
    }
    return true;
}
</script>
</body>
</html>
