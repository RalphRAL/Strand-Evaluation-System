<?php

require_once '../../database/db_config.php';

$question_id = $_POST['question_id'];

$sql = "SELECT * FROM questions WHERE question_id='$question_id'";
$query = $connection->query($sql);
$result = $query->fetch_assoc();

// close database connection
$connection->close();

echo json_encode($result);
?>