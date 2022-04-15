<?php
		include ('CRUD.php');
		/*	$obj = new ideaCRUD();
			$success = $obj-> DeleteIdea($_GET['id_idea']);
			header('Location: read.php');
			*/
			if(isset($_REQUEST['id_idea']) and $_REQUEST['id_idea']!=""){
			$id=$_GET['id_idea'];
			$sql = "DELETE FROM idea WHERE id_idea ='$id'";
			if ($connect->query($sql) === TRUE) {
			header('Location: read.php');
			} else {
			echo "Error updating record: " . $connect->error;
			}
			$connect->close();
			}
?>
