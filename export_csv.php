<?php
session_start();
include 'db.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=attendance_report.csv');

$attendance = $conn->query("SELECT * FROM attendance")->fetchAll();
$output = fopen("php://output", "w");
fputcsv($output, array('Date', 'Student ID', 'Status'));

foreach ($attendance as $record) {
    fputcsv($output, $record);
}
fclose($output);
exit();
?>
