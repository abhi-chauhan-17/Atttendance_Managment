<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_id = $_POST['class_id'];
    $date = $_POST['date'];
    foreach ($_POST['attendance'] as $student_id => $status) {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, class_id, date, status) VALUES (:student_id, :class_id, :date, :status)");
        $stmt->execute([':student_id' => $student_id, ':class_id' => $class_id, ':date' => $date, ':status' => $status]);
    }
    echo "Attendance marked successfully!";
}
?>

<!DOCTYPE html>
<html>
<head><title>Mark Attendance</title>
<link rel="stylesheet" href="assets/css/mark.css">
</head>
<body>
    <form method="post">
        <label>Date:</label>
        <input type="date" name="date" required>
        <label>Class:</label>
        <input type="number" name="class_id" required>
        <table>
            <tr><th>Student Name</th><th>Present</th><th>Absent</th></tr>
            <?php
            $students = $conn->query("SELECT * FROM students")->fetchAll();
            foreach ($students as $student) {
                echo "<tr>
                        <td>{$student['student_name']}</td>
                        <td><input type='radio' name='attendance[{$student['student_id']}]' value='Present'></td>
                        <td><input type='radio' name='attendance[{$student['student_id']}]' value='Absent'></td>
                      </tr>";
            }
            ?>
        </table>
        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>
