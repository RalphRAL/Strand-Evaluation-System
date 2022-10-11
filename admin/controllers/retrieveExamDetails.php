<?php

require_once '../../database/db_config.php';

$exam_id = $_POST['exam_id'];

$sql = "SELECT * FROM exam_table WHERE exam_id='$exam_id'";
$query = $connection->query($sql);
$result = $query->fetch_assoc();

// close database connection
$connection->close();

echo json_encode($result);
?>