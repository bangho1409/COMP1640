<?php
	include('ideaCRUD.php');
	$obj = new ideaCRUD();
	//read data
	$list = $obj->ReadIdea();
	if($list)
	{
	/*	foreach($list as $item)
		{
			$content = "";
			foreach($item as $key => $value)
			{
				$content = $content . $key . ": " . $value . "<br>";
			}
			echo $content . "<br>";
		}
	} */

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
	<td><a href="createidea.php">Add New</a></td>
			<?php foreach($list as $item) { ?>
			<div>
				<td><?php echo $item['id_idea'] ?> </td>
				<td><?php echo $item['title'] ?> </td>
        <td><?php echo $item['content'] ?> </td>
				<td><?php echo $item['created_date'] ?> </td>
				<td><?php echo $item['last_modified_date'] ?> </td>
				<td><a href="updateidea.php?id_idea=<?php echo $item['id_idea'];?>">Edit</a> &nbsp; | &nbsp; <a href="deleteidea.php?id_idea=<?php echo $item['id_idea'];?>">Delete</a>  </td>
			</div>
			<?php } ?>
			<?php } ?>
		</table>
	</div>
</body>
</html>
