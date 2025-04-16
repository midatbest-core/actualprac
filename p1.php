<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email Format!";
    } else {
        echo "<h2>Registration Successful!</h2>";
        echo "Username: $username<br>";
        echo "Email: $email<br>";
        echo "Mobile: $mobile<br>";
        echo "Gender: $gender<br>";
        echo "DOB: $dob<br>";
        echo "Address: $address<br>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dance Competition Registration</title>
    <style>
        body { font-family: Arial; background: #f9f9f9; display: flex; justify-content: center; align-items: center; height: 100vh;}
        form { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input, textarea { display: block; margin-bottom: 10px; padding: 8px; width: 100%; }
        button { background: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; }
        .error {color: red;}
    </style>
</head>
<body>
    <form method="POST" onsubmit="return validateForm()">
        <h3>Dance Competition Registration</h3>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirmpass" placeholder="Confirm Password" required>
        <input type="email" name="email" id="email" placeholder="Email Address" required>
        <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" required>
        <div>
            Gender:
            <input type="radio" name="gender" value="Male" required>Male
            <input type="radio" name="gender" value="Female" required>Female
            <input type="radio" name="gender" value="Other" required>Other
        </div>
        <input type="date" name="dob" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <button type="submit">Register</button>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>

    <script>
        function validateForm() {
            let email = document.getElementById('email').value;
            let mobile = document.getElementById('mobile').value;
            let pattern = /^[0-9]{10}$/;
            if (!pattern.test(mobile)) {
                alert("Mobile number must be 10 digits.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
