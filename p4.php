<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student'];
    $scores = [$_POST['s1'], $_POST['s2'], $_POST['s3'], $_POST['s4'], $_POST['s5']];
    $average = array_sum($scores) / count($scores);
    $grade = ($average >= 90) ? "A" : (($average >= 80) ? "B" : (($average >= 70) ? "C" : (($average >= 60) ? "D" : "F")));

    echo "<h2>Result for $name</h2>";
    echo "Scores: " . implode(", ", $scores) . "<br>Average: $average<br>Grade: $grade";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
    <style>
        body { font-family: Arial; background: #f8f8f8; display:flex; justify-content:center; align-items:center; height:100vh;}
        form { background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input { width:100%; margin:5px 0; padding:8px; }
        button { padding:10px; width:100%; background:green; color:#fff; border:none; border-radius:5px; }
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateScores()">
    <h3>Grade Calculator</h3>
    <input type="text" name="student" placeholder="Student Name" required>
    <input type="number" name="s1" placeholder="Subject 1 Score" required>
    <input type="number" name="s2" placeholder="Subject 2 Score" required>
    <input type="number" name="s3" placeholder="Subject 3 Score" required>
    <input type="number" name="s4" placeholder="Subject 4 Score" required>
    <input type="number" name="s5" placeholder="Subject 5 Score" required>
    <button type="submit">Calculate</button>
</form>
<script>
function validateScores() {
    let inputs = document.querySelectorAll('input[type=number]');
    for (let i of inputs) {
        if (i.value === "" || i.value < 0 || i.value > 100) {
            alert("Scores must be between 0 and 100.");
            return false;
        }
    }
    return true;
}
</script>
</body>
</html>
