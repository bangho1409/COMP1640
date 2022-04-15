<?php
		include ('CRUD.php');
		/*	$obj = new ideaCRUD();
			$success = $obj-> DeleteIdea($_GET['id_idea']);
			header('Location: read.php');
			*/
			if(isset($_REQUEST['id_category']) and $_REQUEST['id_category']!=""){
			$id=$_GET['id_category'];
			$sql = "DELETE FROM category WHERE id_category ='$id'";
			if ($connect->query($sql) === TRUE) {
			header('Location: categoryread.php');
			} else {
			echo "Error updating record: " . $connect->error;
			}
			$connect->close();
			}
?>
