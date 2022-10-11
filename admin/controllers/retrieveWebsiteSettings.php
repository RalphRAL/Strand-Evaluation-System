<?php

require_once '../../database/db_config.php';
//SELECT LAST ID FROM TABLE
$select_id_qry = $connection->query("SELECT website_settings_id FROM website_settings WHERE website_settings_id = (SELECT MAX(website_settings_id) FROM website_settings)");
$slct_row = $select_id_qry->fetch_assoc();
$id_selected = $slct_row['website_settings_id'];

$sql = "SELECT * FROM website_settings WHERE website_settings_id = '$id_selected'";

$query = $connection->query($sql);
//$rows = $query->num_rows;
$result = $query->fetch_assoc();


/**if($rows < 1){
	array("banner_title"='', "subbanner_title"=>37, "Joe"=>43);
	echo json_encode($result);

} else {
	// close database connection
	$connection->close();
	echo json_encode($result);
}**/
$connection->close();
echo json_encode($result);
?>