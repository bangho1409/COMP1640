<?php
include 'CRUD.php';

$obj = new ideaCRUD();
$list = $obj->ReadIdea();

$id=$_GET['id_idea'];
$query=mysqli_query($connect,"select * from `idea` where id_idea ='$id'");
$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
<h2>Edit Idea</h2>


<label>Content: <input type="text" name="content" required></label><br/>
<div>
	<select name="id_idea">
	 <?php foreach($list as $item) { ?>
	 <option value="<?php echo $item['id_idea'] ?>"><?php echo $item['title'] ?></option>
	 <?php } ?>
	</select>
</div>
<label><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="created_date"></label><br/>
<label><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date"></label><br/>
<input type="submit" value="update" name="addcommnet">
<?php


if (isset($_POST['addcommnet'])){
$id=$_GET['id_idea'];
$content = $_POST['content'];

// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "INSERT INTO comment (content, created_date, last_modified_date, id_idea) VALUES ('{$content}', NOW(), NOW(), '{$id}') ";
if ($connect->query($sql) === TRUE) {
	header('Location: read.php');
} else {
echo "Error updating record: " . $connect->error;
}
$connect->close();
}
?>
</form>
</body>
</html>
