<?php
	include('CRUD.php');
	include('reaction.php');
	$obj = new ideaCRUD();
	//read data
	$list = $obj->ReadIdea();
	if($list)
	{

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

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


				<i <?php if (userLiked($item['id_idea'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $item['id_idea'] ?>"></i>
      	<span class="likes"><?php echo getLikes($item['id_idea']); ?></span>


				 &nbsp; | &nbsp;

				<i
      	  <?php if (userDisliked($item['id_idea'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $item['id_idea'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($item['id_idea']); ?></span>

				<td>   <a href="comment.php?id_idea=<?php echo $item['id_idea'];?>">Comment</a>  &nbsp; | &nbsp; <a href="updateidea.php?id_idea=<?php echo $item['id_idea'];?>">Edit</a> &nbsp; | &nbsp; <a href="deleteidea.php?id_idea=<?php echo $item['id_idea'];?>">Delete</a>  </td>
			</div>
			<?php } ?>
			<?php } ?>
		</table>
	</div>
	<script src="reactions.js">

	</script>
</body>
</html>
