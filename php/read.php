<?php
	include('CRUD.php');
include ('reaction.php');

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
	<div class="container">
	<td><a href="createidea.php">Add New</a></td>
	   	<div class="post">
				<?php foreach ($posts as $post) { ?>
				<td><?php echo $post['id_idea'] ?> </td>
				<td><?php echo $post['title'] ?> </td>
				<td><?php echo $post['content'] ?> </td>
				<td><?php echo $post['created_date'] ?> </td>
				<td><?php echo $post['last_modified_date'] ?> </td>
				<td>   <a href="comment.php?id_idea=<?php echo $post['id_idea'];?>">Comment</a>  &nbsp; | &nbsp; <a href="updateidea.php?id_idea=<?php echo $post['id_idea'];?>">Edit</a> &nbsp; | &nbsp; <a href="deleteidea.php?id_idea=<?php echo $post['id_idea'];?>">Delete</a>  </td>





	      <div class="post-info">
		    <!-- if user likes post, style button differently -->
	      	<i <?php if (userLiked($post['id_idea'])): ?>
	      		  class="fa fa-thumbs-up like-btn"
	      	  <?php else: ?>
	      		  class="fa fa-thumbs-o-up like-btn"
	      	  <?php endif ?>
	      	  data-id="<?php echo $post['id_idea'] ?>"></i>
	      	<span class="likes"><?php echo getLikes($post['id_idea']); ?></span>

	      	&nbsp;&nbsp;&nbsp;&nbsp;

		    <!-- if user dislikes post, style button differently -->
	      	<i
	      	  <?php if (userDisliked($post['id_idea'])): ?>
	      		  class="fa fa-thumbs-down dislike-btn"
	      	  <?php else: ?>
	      		  class="fa fa-thumbs-o-down dislike-btn"
	      	  <?php endif ?>
	      	  data-id="<?php echo $post['id_idea'] ?>"></i>
	      	<span class="dislikes"><?php echo getDislikes($post['id_idea']); ?></span>
	      </div>




	   	</div>
			</div>
			<?php } ?>
			<?php } ?>
		</table>
	</div>
	  <script src="reaction.js"></script>
</body>
</html>
