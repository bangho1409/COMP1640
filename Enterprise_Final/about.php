<?php
include 'dbconnect.php'
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>IdeaZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">About</a>
    <a href="index.php" class="w3-bar-item w3-display-topright w3-button w3-hide-small w3-padding-large w3-hover-white w3-gray">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Main Page</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Tag</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">About</a>
  </div>
</div>

<!-- Popup -->
<div class="form-popup" id="myForm">
  <form class="form-container">
    <h1 class="w3-center">Available Category</h1>
    <div class="w3-padding-16 w3-margin-right"><img src="images/logo_suggest.png" width="50" alt="suggest"> Suggest your ideas to the staff</i></div>
    <div class="w3-padding-16"><img src="images/logo_complain.png" width="50" alt="complain"> Complain about what you don't like about the school</i></div>
    <div class="w3-padding-16"><img src="images/logo_month_april.png" width="50" alt="april"> April's Subject: Library</i></div>
    <div class="w3-padding-16"><img src="images/logo_month_may.png" width="50" alt="may"> May's Subject: Education</i></div>
    <div class="w3-padding-16"><img src="images/logo_month_june.png" width="50" alt="june"> June's Subject: Garden</i></div>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<!-- Header -->
<header class="w3-container w3-opacity-min w3-center" style="padding:128px 16px">
  <img src="images/IdeaZ.png" width="256">
  <p class="w3-xlarge w3-text-white">Your idea, our future</p>
</header>

<h1 class="w3-center"><strong>About</strong></h1>
<h2 class="w3-center">IdeaZ is created by IdeaZ Team:</h2>
<h2 class="w3-center">Huỳnh Thanh Phú</h2>
<h2 class="w3-center">Hồ Hữu Bằng</h2>
<h2 class="w3-center">Phan Hoàng Hiệp</h2>
<h2 class="w3-center">Trần Thành Hoàng</h2>

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

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>

</body>
</html>
