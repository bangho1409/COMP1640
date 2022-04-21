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
					<form method ="POST">
						<div class="content">
							<img src="images/ava.jpg" alt="user's avatar">
							<div class="details" >
								<div class="department" >
									<h1><?php echo $_SESSION['username'] ?></h1>
								</div>
							</div>
						</div>
						<input type="hidden"  name="id_idea">
						<input type="hidden"  name="username" value="<?php echo $_SESSION['username'] ?>" >
						<textarea placeholder="Your Comment" spellcheck="false" class="description" name="content"></textarea>
						<input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="created_date">
						<input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date">

						<button type="submit" class="btn btn-default" name="addcomment">Comment</button>
					</form>
				</div>
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

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else {
		x.className = x.className.replace(" w3-show", "");
	}
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFilter() {
	document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
	if (!event.target.matches('.dropbtn')) {
		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			}
		}
	}
}

</script>
</body>
</html>
