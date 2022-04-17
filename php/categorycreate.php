<?php
	include ('CRUD.php');

	if(isset($_POST['add_category'])) {
		$obj = new categoryCRUD();
		$success = $obj->CreateCategory($_POST['id_category'],$_POST['name'],$_POST['tag'],$_POST['description'], $_POST['close_date']);
		header('Location: categoryread.php');


	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
			<a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Main Page</a>
			<a onclick="openForm()" href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tag</a>
			<a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
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



	<div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Creating Category</header>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?> "method ="POST" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
						<input type="hidden" name="id_category">
            <textarea placeholder="Category Name" class="description" name="name" required></textarea>
            <textarea placeholder="Category Description" class="description" name="description" required></textarea>
						<textarea  id="tag" class="description" placeholder="Enter Tag" name="tag" required></textarea>
            <div >
								<input class="description" type="date" name="close_date">
            </div>
            <button type="submit" class="btn btn-default" name="add_category" >Post</button>
          </form>
      </div>
    </div>
</body>
</html>
