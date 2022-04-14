<!DOCTYPE html>
<html>
<head>
<title>Editing MySQL Data</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
include 'categoryCRUD.php';
$id=$_GET['id_category'];
$query=mysqli_query($connect,"select * from `category` where id_category ='$id'");
$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
<h2>Edit Idea</h2>



<label>Name: <input type="text" name="name"></label><br/>
<label>Tag: <input type="text" name="tag"></label><br/>
<label>Description: <input type="text" name="description"></label><br/>
<input type="submit" value="update" name="update_category">
<?php
if (isset($_POST['update_category'])){
$id=$_GET['id_category'];
$name=$_POST['name'];
$tag=$_POST['tag'];
$description=$_POST['description'];

// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "UPDATE `category` SET name='$name', tag='$tag', description='$description' WHERE id_category='$id'";
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
