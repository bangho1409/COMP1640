<?php
	include ('CRUD.php');

	if(isset($_POST['add_category'])) {
		$obj = new categoryCRUD();
		$success = $obj->CreateCategory($_POST['id_category'],$_POST['name'],$_POST['tag'],$_POST['description'], $_POST['close_date']);
		header('Location: categoryread.php');


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
      <input type="hidden" class="form-control" id="ID_category" placeholder="Enter ID" name="id_category">
    </div>
	<div class="form-group">
      <label for="Title">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
	<div class="form-group">
      <label for="Tag">Tag:</label>
      <input type="text" class="form-control" id="tag" placeholder="Enter Tag" name="tag">
    </div>
	<div class="form-group">
      <label for="Description">Description: </label>
      <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
    </div>
		<div>
			<label for="CloseDate">Close Date: </label>
			<input type="date" id="description"  name="close_date">
		</div>


    <button type="submit" class="btn btn-default" name="add_category">Submit</button>
  </form>
</div>

</body>
</html>
