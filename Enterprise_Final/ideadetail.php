<?php
include 'CRUD.php';
include 'reaction.php';

$obj = new ideaCRUD();
$objtag = new categoryCRUD();
$listcomment = new commentCRUD();
$comments = $listcomment -> ReadComment();
$listtag = $objtag->ReadCategory();

if(isset($_GET['id_idea'])) $id=$_GET['id_idea'];
$sql = "UPDATE idea SET view = view + 1 WHERE id_idea = '$id'";
mysqli_query($connect, $sql);

$query = "SELECT * FROM idea WHERE id_idea = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$value = $row['id_category'];
$tagquery = " SELECT * from category where id_category = '$value'";
$resutag = $connect->query($tagquery);


$_SESSION['title'] = $row['title'];
$_SESSION['content'] = $row['content'];
$_SESSION['view'] = $row['view'];
$_SESSION['id_idea'] = $row['id_idea'];

if( !isset($_SESSION['username']) ) {
 header("Location: index.php");
 exit;
 }
 // select loggedin users detail
 $userquery = "SELECT * FROM user WHERE username ='".$_SESSION['username']."' ORDER BY `id_user`" ;
 $res=mysqli_query($connect,$userquery);
 $userRow=mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>IdeaZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style_idea.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
    <a href="read.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Main Page</a>
    <?php if($_SESSION['id_role'] == 1 OR $_SESSION['id_role'] == 6) { ?>
    <a  href="categorycreate.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Create Tag</a>
		<?php } ?>
    <a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="index.php" class="w3-bar-item w3-display-topright w3-button w3-hide-small w3-padding-large w3-hover-white w3-gray">Logout</a>
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
</header>

<!-- Banner -->
<div class="banner w3-card w3-right">
  <p class="w3-xlarge w3-blue w3-text-white w3-center">Category</p>
  <p class="w3-xlarge w3-text-white w3-center">Library</p>
  <p class="blur w3-padding-32 w3-large w3-text-white w3-center"><?php if ($listtag){foreach ($listtag as $itemtag ) {echo $itemtag['tag'];}}?></p>
</div>

<?php  if ($restag = mysqli_fetch_assoc($resutag)) { ?>
<!-- Grid -->
<div class="w3-row-padding w3-padding-32 w3-container">
  <div class="w3-content">
    <div class="w3-twothird w3-light-gray w3-container">
      <!-- Title -->
      <h1 class="w3-xxlarge"><?php echo $_SESSION['title'] ?></h1>
      <!-- Uploader -->
      <p class="w3-text-grey w3-large">By <?php echo $_SESSION['username'] ?></p>
      <!-- Category -->
      <h6 class="">Category <?php echo $restag['tag'];?></h6>
      <!-- Content -->
      <p class="w3-large"><?php echo $_SESSION['content'] ?></p>
      <!-- Image -->
      <img src="images/library_1.jpeg" width="600"></br>
      <a href="comment.php?id_idea=<?php echo $_SESSION['id_idea'] ?>">Comment</a>
      <td class="w3-text-grey">&nbsp;&nbsp;&nbsp;&nbsp; -- view <?php echo $_SESSION['view']?> --</td>
    </div>
    </div>
</div>
<?php }?>
<?php foreach ($comments as $comment) { ?>
<div class="comment-wrapper">
      <div class="media-block">
        <a class="media-left"><img class="img-circle img-sm" alt="Profile Picture" src="images/ava.jpg"></a>
        <div class="media-body">
          <div class="mar-btm">
            <a class="btn-link text-semibold media-heading box-inline"><?php echo $comment['username'] ?></a>
            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> <?php echo $comment['last_modified_date'] ?></p>
          </div>
          <p><?php echo $comment['content'] ?></p>
          </div>
          <hr>
        </div>
      </div>
    </div>
<?php } ?>


<div class="w3-container w3-black w3-center w3-opacity w3-padding-32"></div>


<!-- Footer -->
<footer class="w3-container w3-padding-16 w3-center w3-opacity">
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

 src="reaction.js"


</script>

</body>
</html>
