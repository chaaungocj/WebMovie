<?php
	require('conn.php');
	
	$id = $_GET['id'];
	
	$sql = 'DELETE FROM movie WHERE id = ' . $id;
	
	if ($conn->query($sql) === TRUE) {
		header('location: list.php');
	} else {
		echo "Error deleting record: " . $conn->error;
	}
	
	$conn->close();
?>