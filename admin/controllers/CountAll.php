<?php

require_once '../../database/db_config.php';

if (isset($_POST["CountAllUsers"])) {
	
	if ($_POST["CountAllUsers"] == "CountAllUsers") {

		$sql = "SELECT * FROM users";
		$query = $connection->query($sql);
		$numberofRows = $query->num_rows;

		//CLOSE DATABASE CONNECTION
		$connection->close();
		echo json_encode($numberofRows);
	}
}

if (isset($_POST["CountAllStudents"])) {
	
	if ($_POST["CountAllStudents"] == "CountAllStudents") {

		$sql = "SELECT * FROM students";
		$query = $connection->query($sql);
		$numberofRows = $query->num_rows;

		//CLOSE DATABASE CONNECTION
		$connection->close();
		echo json_encode($numberofRows);
	}
}

if (isset($_POST["CountAllExams"])) {
	
	if ($_POST["CountAllExams"] == "CountAllExams") {

		$sql = "SELECT * FROM exam_table";
		$query = $connection->query($sql);
		$numberofRows = $query->num_rows;

		//CLOSE DATABASE CONNECTION
		$connection->close();
		echo json_encode($numberofRows);
	}
}

if (isset($_POST["countQuestions"])) {
	
	if ($_POST["countQuestions"] == "countQuestions") {

		$exam_id = $_POST['exam_id'];

		$sql = "SELECT * FROM questions WHERE exam_id_fk = '$exam_id'";
		$query = $connection->query($sql);
		$numberofRows = $query->num_rows;

		//CLOSE DATABASE CONNECTION
		$connection->close();
		echo json_encode($numberofRows);
	}
}

if (isset($_POST["CountAllTakers"])) {
	
	if ($_POST["CountAllTakers"] == "CountAllTakers") {

		$sql = "SELECT * FROM students WHERE exam_attempt = '1'";
		$query = $connection->query($sql);
		$numberofRows = $query->num_rows;

		//CLOSE DATABASE CONNECTION
		$connection->close();
		echo json_encode($numberofRows);
	}
}

?>