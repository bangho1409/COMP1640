<!DOCTYPE html>
<html>
<head>
<title>Editing MySQL Data</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
include 'CRUD.php';
$obj = new categoryCRUD();
$list = $obj->ReadCategory();

$id=$_GET['id_idea'];
$query=mysqli_query($connect,"select * from `idea` where id_idea ='$id'");
$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
<h2>Edit Idea</h2>



<label>Title: <input type="text" name="title"></label><br/>
<label>Content: <input type="text" name="content"></label><br/>
<div>
	<select name="id_category">
	 <?php foreach($list as $item) { ?>
	 <option value="<?php echo $item['id_category'] ?>"><?php echo $item['tag'] ?></option>
	 <?php } ?>
	</select>
</div>
<label><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date"></label><br/>
<input type="submit" value="update" name="update">
<?php


if (isset($_POST['update'])){
$id=$_GET['id_idea'];
$title=$_POST['title'];
$content=$_POST['content'];
$id_category=$_POST['id_category'];
$last_modified_date= date('Y-m-d H:i:s');
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "UPDATE `idea` SET title='$title', content='$content', last_modified_date='$last_modified_date', id_category = '$id_category' WHERE id_idea='$id'";
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
