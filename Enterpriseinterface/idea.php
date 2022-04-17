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
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Main Page</a>
    <a onclick="openForm()" href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tag</a>
    <a href="about.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
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

<!-- Banner -->
<div class="banner w3-card w3-right">
  <p class="w3-xlarge w3-blue w3-text-white w3-center">April's Subject</p>
  <p class="w3-xlarge w3-text-white w3-center">Library</p>
  <p class="blur w3-padding-32 w3-large w3-text-white w3-center">Book is the source of knowledge and knowledge is power hence the library is always considered one of the most important facilities of humanity.
    That's why today we want your feedback about the school's library to further improve the quality of the library so that such knowledge will be accessed more efficient and quicker.</p>
</div>

<!-- Grid -->
<div class="w3-row-padding w3-padding-32 w3-container">
  <div class="w3-content">
    <div class="w3-twothird w3-light-gray w3-container">
      <!-- Title -->
      <h1 class="w3-xxlarge">There's a problem with the library</h1>
      <!-- Uploader -->
      <h5 class="w3-padding-32">By User_01</h5>
      <!-- Image -->
      <img src="images/library_1.jpeg" width="500">
      <!-- Content -->
      <p class="w3-text-grey w3-large w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <textarea class="form-control" placeholder="Add Public Comment" cols="80" rows="5"></textarea><br>
        <button class="btn-primary btn">Add Comment</button>

      </div>
    </div>



    <div class="comment-wrapper">
      <div class="media-block">
        <a class="media-left"><img class="img-circle img-sm" alt="Profile Picture" src="images/ava.jpg"></a>
        <div class="media-body">
          <div class="mar-btm">
            <a class="btn-link text-semibold media-heading box-inline">Bobby Marz</a>
            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 7 min ago</p>
          </div>
          <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
          <div class="pad-ver">
            <div class="btn-group">
              <a class="btn btn-sm btn-default btn-hover-success active" href="#"><i class="fa fa-thumbs-up"></i></a>
              <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="media-block">
        <a class="media-left"><img class="img-circle img-sm" alt="Profile Picture" src="images/ava.jpg">
        </a>
        <div class="media-body">
          <div class="mar-btm">
            <a class="btn-link text-semibold media-heading box-inline">Lucy Moon</a>
            <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - From Web - 2 min ago</p>
          </div>
          <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
          <div class="pad-ver">
            <div class="btn-group">
              <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
              <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
</div>



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
