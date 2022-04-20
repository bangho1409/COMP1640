<!DOCTYPE html>
<html lang="en">
<head>
<title>IdeaZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style_login.css">
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
  </div>
  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Main Page</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Tag</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">About</a>
  </div>
</div>
<!--Register form-->
<h2 class="login_form w3-text-white"> Sign in</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="checklogin.php" method="POST">
			<h1>Create Account</h1>
			<div class="social-container">
        <a href="#"><img src="images/logo_facebook.png" width="40" alt="facebook"></a>
				<a href="#"><img src="images/logo_googleplus.png" width="40" alt="googleplus"></a>
				<a href="#"><img src="images/logo_linkedin.png" width="40" alt="linkedin"></a>
			</div>
			<span>or use your email for registration</span>
			<input type="username" placeholder="Username" name="username" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<button type="submit" name="register">Sign Up</button>
		</form>
	</div>
  <!--Login form-->
	<div class="form-container sign-in-container">
		<form action="checklogin.php" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#"><img src="images/logo_facebook.png" width="40" alt="facebook"></a>
				<a href="#"><img src="images/logo_googleplus.png" width="40" alt="googleplus"></a>
				<a href="#"><img src="images/logo_linkedin.png" width="40" alt="linkedin"></a>
			</div>
			<span>or use your account</span>
			<input type="username" placeholder="Username" name="username" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<a href="#" class="w3-padding-16">Forgot your password?</a>
			<button type="submit" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>


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
