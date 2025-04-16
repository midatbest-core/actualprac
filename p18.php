<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity = $_POST['activity'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];
    $goal = $_POST['goal'];

    $calories = 0;
    if ($intensity == "low") $calories = $duration * 4;
    elseif ($intensity == "moderate") $calories = $duration * 7;
    elseif ($intensity == "high") $calories = $duration * 10;

    $remaining = $goal - $calories;
    echo "<h2>Activity Tracked!</h2>Activity: $activity<br>Calories Burned: $calories<br>Remaining Calorie Goal: $remaining";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fitness Tracker</title>
    <style>
        body {font-family:Arial;background:#eef;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:white;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        select,input {width:100%;margin:5px 0;padding:8px;}
        button {background:#28a745;color:white;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateFitness()">
    <h3>Fitness Tracker</h3>
    <select name="activity" required>
        <option value="">Select Activity</option>
        <option>Running</option><option>Walking</option><option>Cycling</option>
    </select>
    <input type="number" name="duration" id="duration" placeholder="Duration (in minutes)" required>
    <label><input type="radio" name="intensity" value="low" required>Low</label>
    <label><input type="radio" name="intensity" value="moderate" required>Moderate</label>
    <label><input type="radio" name="intensity" value="high" required>High</label>
    <input type="number" name="goal" placeholder="Calorie Intake Goal" required>
    <button type="submit">Calculate</button>
</form>
<script>
function validateFitness() {
    return document.getElementById('duration').value > 0;
}
</script>
</body>
</html>
