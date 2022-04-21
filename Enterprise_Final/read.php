<?php
	include 'CRUD.php';
	$obj = new ideaCRUD();
	$objtag = new categoryCRUD();
	if( !isset($_SESSION['username']) ) {
	 header("Location: index.php");
	 exit;
	 }
	 // select loggedin users detail
	 $userquery = "SELECT * FROM user WHERE username ='".$_SESSION['username']."' ORDER BY `id_user`" ;
	 $res=mysqli_query($connect,$userquery);
	 $userRow=mysqli_fetch_array($res);
	 $_SESSION['id_role'] = $userRow['id_role'];
	//read data
	$list = $obj->ReadIdea();
	$listtag = $objtag->ReadCategory();



?>


<!DOCTYPE html>
<html>
<head>
<title>IdeaZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-left-align w3-card w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="read.php" class="w3-bar-item w3-button w3-padding-large w3-white">Main Page</a>
		<?php if($_SESSION['id_role'] == 1 OR $_SESSION['id_role'] == 6) { ?>
    <a  href="categorycreate.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Create Tag</a>
		<?php } ?>
		<a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="index.php" class="w3-bar-item w3-display-topright w3-button w3-hide-small w3-padding-large w3-hover-white w3-gray">Logout</a>
	<?php if($_SESSION['id_role'] == 1 OR $_SESSION['id_role'] == 6) { ?>
		<a class="w3-bar-item w3-hide-small w3-padding-large">
				<span>ADMIN</span>
		</a>
	<?php } else { ?>
		<a class="w3-bar-item w3-hide-small w3-padding-large">
				<span>USER</span>
		</a>
		<?php } ?>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Main Page</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Tag</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">About</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-opacity-min w3-center" style="padding:128px 16px">
  <img src="images/IdeaZ.png" width="256">
  <p class="w3-xlarge w3-text-white">Your idea, our future</p>
  <a href= "createidea.php" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Submit your idea</a>
</header>

<!-- Filter -->
<div class="dropdown w3-padding-16">
	<form method="post" action="export.php">
		<input  type="submit" name="exportidea" value="Export Idea" class="w3-margin-bottom w3-round-medium w3-button w3-green btn btn-success" />
		<input  type="submit" name="exportuser" value="Export User" class="w3-margin-bottom w3-round-medium w3-button w3-green btn btn-success" />
	</form>
  <button onclick="myFilter()" class="dropbtn w3-round">Filters</button>
  <div id="myDropdown" class="dropdown-content">
    <a value= "trending" href="#">Trending</a>
    <a value= "top" href="#">Top</a>
    <a value= "recent" href="#">Recent</a>
  </div>
</div>

<!-- Banner -->
<div class="banner w3-card w3-right">
  <p class="w3-xlarge w3-blue w3-text-white w3-center">Category</p>
  <p class="w3-xlarge w3-text-white w3-center">Library</p>
  <p class="blur w3-padding-32 w3-large w3-text-white w3-center"> <?php if ($listtag){foreach ($listtag as $itemtag ) {echo $itemtag['tag'];}}?>  </p>
</div>

<?php if($list)
{ foreach($list as $item) { ?>
<!-- Grid -->
<div  class="w3-row-padding w3-padding-32 w3-container">
  <div class="w3-content">
    <a href= "ideadetail.php?id_idea=<?php echo $item['id_idea'] ?>" class="w3-twothird w3-light-gray w3-container">
      <!-- Title -->
      <h1 class="w3-xxlarge"><?php echo $item['title'] ?></h1>
      <!-- Uploader -->
      <p class="w3-text-grey">By <?php echo $item['username'] ?></p>
      <!-- Content -->
      <p class="w3-large"><?php echo $item['content'] ?></p>
			<!-- Image -->
      <img src="images/library_1.jpeg" width="600">
			<td>viewed <?php echo $item['view'] ?></td>
    </a>
  </div>
</div>
<p class="w3-content" >
	<a href="comment.php?id_idea=<?php echo $item['id_idea'];?>">Comment</a> &nbsp;  &nbsp;
	<?php if($_SESSION['id_role'] == 1 OR $_SESSION['id_role'] == 6) { ?>
	<a href="updateidea.php?id_idea=<?php echo $item['id_idea'];?>">Edit</a>&nbsp;  &nbsp;
	<a href="deleteidea.php?id_idea=<?php echo $item['id_idea'];?>">Delete</a> &nbsp;  &nbsp;

</p>
<?php } ?>
<?php } ?>
<?php } ?>

<!-- Footer -->
<footer class="w3-container w3-red w3-center">
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
</footer>




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
</script>

</body>
</html>
