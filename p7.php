<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $name = $_POST['reviewer'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email Format!";
    } else {
        echo "<h2>Review Submitted!</h2>Product: $product<br>Name: $name<br>Rating: $rating/5<br>Review: $review";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Review</title>
    <style>
        body {font-family:Arial;background:#efefef;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input,textarea {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
        .error {color:red;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateReview()">
    <h3>Product Review</h3>
    <input type="text" name="product" placeholder="Product Name" required>
    <input type="text" name="reviewer" placeholder="Reviewer Name" required>
    <input type="email" name="email" id="email" placeholder="Email Address" required>
    <select name="rating" required>
        <option value="">Select Rating</option>
        <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
    </select>
    <textarea name="review" placeholder="Your Review" required></textarea>
    <button type="submit">Submit Review</button>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<script>
function validateReview() {
    return true; // Basic form relies on HTML5 'required' for now.
}
</script>
</body>
</html>
