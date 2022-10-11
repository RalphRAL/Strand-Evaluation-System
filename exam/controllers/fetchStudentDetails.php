<?php

require_once '../../database/db_config.php';

$student_id = $_POST['student_id'];

$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
$query = $connection->query($sql);
$result = $query->fetch_assoc();

// close database connection
$connection->close();

echo json_encode($result);
?>