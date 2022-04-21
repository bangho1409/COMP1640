<?php
	include ('CRUD.php');

	$obj = new categoryCRUD();
	$list = $obj->ReadCategory();

	if(isset($_POST['add'])) {
			$timenow = date("Y-m-d H:i:s");
			$selectedtag = $_POST['id_category'];
			$filequery = "SELECT close_date FROM category WHERE id_category = '$selectedtag'";
			$resfile = mysqli_query($connect,$filequery);
			$rowfile = mysqli_fetch_assoc($resfile);

			$obj = new ideaCRUD();
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$folder="uploads/";
			$new_file_name = strtolower($file);
			$final_file=str_replace(' ','-',$new_file_name);
			$id = $_SESSION['id_idea'] + 1;

if ($rowfile['close_date'] >= $timenow) {
			$success = $obj->CreateIdea($_POST['id_idea'],$_POST['title'],$_POST['content'],$_POST['created_date'],$_POST['last_modified_date'],$_SESSION['username'], $_POST['id_category']);
			header('Location: read.php');
		  if(move_uploaded_file($file_loc,$folder.$final_file))
		  {
		   $sql="INSERT INTO file (file_path,last_modified_date,id_idea) VALUES('$final_file',NOW(), '{$id}')";
		   mysqli_query($connect,$sql);
		   echo "File sucessfully upload";
		  }
		  else
		  {
		   echo "Error.Please try again";
		 		}
		 }
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
          <form action="<?php echo $_SERVER['PHP_SELF'] ?> "method ="POST" enctype="multipart/form-data" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
            <div class="content">
              <img src="images/ava.jpg" alt="user's avatar">
              <div class="details">
                <p></p>
                <div class="privacy">
									<select name="id_category">
					 			 	<?php foreach($list as $item) { ?>
					 			 	<option value="<?php echo $item['id_category']  ?>"><?php echo $item['tag'] ?></option>
					 			 	<?php } ?>
					 			 </select>
                </div>
                <div class="department">
                  <i class="fas fa-laptop-house"></i>
                  <span>IT Department</span>
                </div>
              </div>
            </div>
						<input type="hidden"  name="username">
						<input type="hidden"  name="id_idea">
            <textarea placeholder="Your idea's title" spellcheck="false" class="content" name="title" required></textarea>
            <textarea placeholder="Your idea's content" spellcheck="false" class="description" name="content" required></textarea>
						<input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="created_date">
						<input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date">
            <div class="options">
              <ul class="list">
                <input type="file" accept=".zip" name="file" >
              </ul>
            </div>
              <input type="checkbox" required name="checkbox"value="check" id="agree" /> I have read and agree to the <a href="term.php" target="_blank">Terms and Conditions and Privacy Policy</a>
            <button type="submit" class="btn btn-default" name="add">Post</button>
          </form>
				</div>
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
