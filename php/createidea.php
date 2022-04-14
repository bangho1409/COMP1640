<?php
	include ('ideaCRUD.php');

	if(isset($_POST['add'])) {
		$obj = new ideaCRUD();
		$success = $obj->CreateIdea($_POST['id_idea'],$_POST['title'],$_POST['content'],$_POST['created_date'],$_POST['last_modified_date']);
		header('Location: read.php');


	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?> "method ="POST" >
    <div class="form-group">
      <input type="hidden" class="form-control" id="ID_IDEA" placeholder="Enter ID" name="id_idea">
    </div>
	<div class="form-group">
      <label for="Title">Title:</label>
      <input type="text" class="form-control" id="Title" placeholder="Enter Title" name="title">
    </div>
	<div class="form-group">
      <label for="Content">Content:</label>
      <input type="text" class="form-control" id="Content" placeholder="Enter Content" name="content">
    </div>
	<div class="form-group">
      <label for="Create_Date"></label>
      <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="created_date">
    </div>
	<div class="form-group">
	     <label for="Last_modified_date"></label>
	     <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="last_modified_date">
	   </div>
		 <div class="form-group">
		 		 <label for="file"></label>
		 		 <input type="file" accept=".zip" name="file_path">
		 	 </div>

    <button type="submit" class="btn btn-default" name="add">Submit</button>
  </form>
</div>

</body>
</html>
