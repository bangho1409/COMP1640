<?php
include 'CRUD.php';
$obj = new categoryCRUD();
$list = $obj->ReadCategory();
$id=$_GET['id_idea'];
$query=mysqli_query($connect,"select * from `idea` where id_idea ='$id'");
$row=mysqli_fetch_assoc($query);

if (isset($_POST['update'])){
$id=$_GET['id_idea'];
$title=$_POST['title'];
$content=$_POST['content'];
$id_category=$_POST['id_category'];
$last_modified_date= date('Y-m-d H:i:s');
$timenow = date("Y-m-d H:i:s");
$selectedtag = $_POST['id_category'];
$filequery = "SELECT close_date FROM category WHERE id_category = '$selectedtag'";
$resfile = mysqli_query($connect,$filequery);
$rowfile = mysqli_fetch_assoc($resfile);

if ($rowfile['close_date'] >= $timenow) {
$sql = "UPDATE `idea` SET title='$title', content='$content', last_modified_date='$last_modified_date', id_category = '$id_category' WHERE id_idea='$id'";
if ($connect->query($sql) === TRUE) {
	header('Location: read.php');
	}
}
$connect->close();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>IdeaZ</title>
    <link rel="stylesheet" href="style_submit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-red w3-left-align w3-card w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="read.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Main Page</a>
				<?php if($_SESSION['id_role'] == 1 OR $_SESSION['id_role'] == 6) { ?>
				<a  href="categorycreate.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Create Tag</a>
				<?php } ?>
        <a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
      </div>

      <!-- Navbar on small screens -->
      <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Main Page</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Tag</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">About</a>
      </div>
    </div>

		<div class="container">
			<div class="wrapper">
				<section class="post">
					<header>Idea Submission</header>
					<form  method ="POST">
						<div class="content">
							<img src="images/ava.jpg" alt="user's avatar">
							<div class="details">
								<p>Select Category</p>
								<div class="privacy">
									<select name="id_category">
									<?php foreach($list as $item) { ?>
									<option value="<?php echo $item['id_category']  ?>"><?php echo $item['tag'] ?></option>
									<?php } ?>
								 </select>
								</div>
							</div>
						</div>
						<textarea placeholder="Your idea's title" spellcheck="false" class="content" name="title" required></textarea>
						<textarea placeholder="Your idea's content" spellcheck="false" class="description" name="content" required></textarea>
						<input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date">
							<input type="checkbox" required name="checkbox"value="check" id="agree" /> I have read and agree to the <a href="term.php" target="_blank">Terms and Conditions and Privacy Policy</a>
						<button type="submit" class="w3-margin-top-post btn btn-default" name="update">Update</button>
					</form>
				</div>
</body>
</html>
