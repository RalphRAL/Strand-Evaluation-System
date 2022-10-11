<?php

require_once '../../database/db_config.php';

$user_id = $_POST['user_id'];

$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$query = $connection->query($sql);
$result = $query->fetch_assoc();

// close database connection
$connection->close();

echo json_encode($result);
?>