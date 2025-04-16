<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grades = ['A'=>4, 'B'=>3, 'C'=>2, 'D'=>1, 'F'=>0];
    $student = $_POST['student'];
    $courses = [$_POST['c1'], $_POST['c2'], $_POST['c3'], $_POST['c4'], $_POST['c5']];
    $credits = [3, 4, 3, 2, 3]; // assumed
    $total = 0;
    $sumCredits = array_sum($credits);

    foreach ($courses as $index => $grade) {
        $total += $grades[strtoupper($grade)] * $credits[$index];
    }
    $gpa = round($total / $sumCredits, 2);
    echo "<h2>$student's GPA: $gpa</h2>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator</title>
    <style>
        body {font-family:Arial;background:#eef;display:flex;justify-content:center;align-items:center;height:100vh;}
        form {background:#fff;padding:20px;border-radius:8px;box-shadow:0 0 8px rgba(0,0,0,0.2);}
        input {width:100%;margin:5px 0;padding:8px;}
        button {background:#007bff;color:#fff;padding:10px;border:none;border-radius:5px;width:100%;}
    </style>
</head>
<body>
<form method="POST" onsubmit="return validateGrades()">
    <h3>GPA Calculator</h3>
    <input type="text" name="student" placeholder="Student Name" required>
    <input type="text" name="c1" placeholder="Course 1 Grade (A-F)" required>
    <input type="text" name="c2" placeholder="Course 2 Grade (A-F)" required>
    <input type="text" name="c3" placeholder="Course 3 Grade (A-F)" required>
    <input type="text" name="c4" placeholder="Course 4 Grade (A-F)" required>
    <input type="text" name="c5" placeholder="Course 5 Grade (A-F)" required>
    <button type="submit">Calculate GPA</button>
</form>
<script>
function validateGrades() {
    let valid = ["A","B","C","D","F"];
    let inputs = document.querySelectorAll('input[type=text]');
    for (let i of inputs) {
        if (!valid.includes(i.value.toUpperCase()) && i.name !== 'student') {
            alert("Grades must be A, B, C, D or F only.");
            return false;
        }
    }
    return true;
}
</script>
</body>
</html>
