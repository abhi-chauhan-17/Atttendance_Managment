<?php
session_start();
if (!isset($_SESSION['teacher_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/dash1.css">

</head>
<body>
<main>
    <h2 align="center">Welcome to the Dashboard</h2>
    
    <ul>
        <li><a href="mark_attendance.php">Mark Attendance</a></li>
        <li><a href="view_report.php">View Attendance Report</a></li>
        <li><a href="export_csv.php">Export Attendance as CSV</a></li>
        
    </ul>
    <div >
        <a class="logout-button" href="logout.php">Logout</a>
    </div>
    </main>
</body>
</html>
