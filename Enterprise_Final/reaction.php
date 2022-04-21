<?php
$connect = mysqli_connect('localhost', 'root', '', 'webenterprise2');
// if user clicks like or dislike button
$id_user = $_SESSION['id_user'];

if (isset($_POST['action'])) {

  $id_idea = $_POST['id_idea'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO reaction (id_user, id_idea, reaction)
         	   VALUES ($id_user, $id_idea, 'like')
         	   ON DUPLICATE KEY UPDATE reaction='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO reaction (id_user, id_idea, reaction)
               VALUES ($id_user, $id_idea, 'dislike')
         	   ON DUPLICATE KEY UPDATE reaction='dislike'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM reaction WHERE id_user=$id_user AND id_idea=$id_idea";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM reaction WHERE id_user=$id_user AND id_idea=$id_idea";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($connenect, $sql);
  echo getRating($id_idea);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $connect;
  $sql = "SELECT COUNT(*) FROM reaction
  		  WHERE id_idea = $id AND reaction='like'";
  $rs = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $connect;
  $sql = "SELECT COUNT(*) FROM reaction
  		  WHERE id_idea = $id AND reaction='dislike'";
  $rs = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $connect;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM reaction WHERE id_idea = $id AND reaction='like'";
  $dislikes_query = "SELECT COUNT(*) FROM reaction
		  			WHERE id_idea = $id AND reaction='dislike'";
  $likes_rs = mysqli_query($connect, $likes_query);
  $dislikes_rs = mysqli_query($connect, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($id_idea)
{
  global $connect;
  global $id_user;
  $sql = "SELECT * FROM reaction WHERE id_user = $id_user
  		  AND id_idea = $id_idea AND reaction='like'";
  $result = mysqli_query($connect, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($id_idea)
{
  global $connect;
  global $id_user;
  $sql = "SELECT * FROM reaction WHERE id_user=$id_user
  		  AND id_idea = $id_idea AND reaction='dislike'";
  $result = mysqli_query($connect, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

$sql = "SELECT * FROM idea";
$result = mysqli_query($connect, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
