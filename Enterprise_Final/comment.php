<?php
include 'CRUD.php';


$id=$_GET['id_idea'];
$query=mysqli_query($connect,"select * from `idea` where id_idea ='$id'");
$row=mysqli_fetch_assoc($query);
$_SESSION['id_idea'] = $row['id_idea'];


$userquery = "SELECT * FROM user WHERE username ='".$_SESSION['username']."' ORDER BY `id_user`" ;
$res=mysqli_query($connect,$userquery);
$userRow=mysqli_fetch_array($res);

?>
<form method="POST" class="form">
<h2>Edit Idea</h2>


<label>Content: <input type="text" name="content" required></label><br/>
<div>
	<input type="hidden" name="id_idea" >
	<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" >
</div>
<label><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="created_date"></label><br/>
<label><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date"></label><br/>
<input type="submit" value="Comment" name="addcomment">


<?php
if (isset($_POST['addcomment'])){
$id=$_GET['id_idea'];
$user=$_POST['username'];
$content = $_POST['content'];


// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "INSERT INTO comment (content, created_date, last_modified_date, username, id_idea) VALUES ('{$content}', NOW(), NOW(),'{$user}', '{$id}') ";
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
