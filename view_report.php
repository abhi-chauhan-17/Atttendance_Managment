<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_id'])) {
    header("Location: index.php");
    exit();
}

$class_id = $_GET['class_id'] ?? null;
$attendance = $conn->query("SELECT * FROM attendance")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head><title>Attendance Report</title>
<link rel="stylesheet" href="assets/css/view1.css">
</head>
<body>
    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attendance Report</h2>
    <table>
        <tr><th>Date</th><th>Student ID</th><th>Status</th></tr>
        <?php
        foreach ($attendance as $record) {
            echo "<tr>
                    <td>{$record['date']}</td>
                    <td>{$record['student_id']}</td>
                    <td>{$record['status']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
