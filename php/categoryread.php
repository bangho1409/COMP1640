<?php
	include('CRUD.php');
	$obj = new categoryCRUD();
	//read data
	$list = $obj->ReadCategory();
	if($list)
{

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
	<div class="container">
	<td><a href="categorycreate.php">Add New</a></td>
			<?php foreach($list as $item) { ?>
			<div>
				<td><?php echo $item['id_category'] ?> </td>
				<td><?php echo $item['name'] ?> </td>
        <td><?php echo $item['tag'] ?> </td>
				<td><?php echo $item['description'] ?> </td>
				<td><?php echo $item['close_date'] ?> </td>
				<td><a href="categoryupdate.php?id_category=<?php echo $item['id_category'];?>">Edit</a> &nbsp; | &nbsp; <a href="categorydelete.php?id_category=<?php echo $item['id_category'];?>">Delete</a>  </td>
			</div>
			<?php } ?>
			<?php } ?>
	</div>
</body>
</html>
