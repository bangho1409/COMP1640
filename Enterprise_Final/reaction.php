<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');


$id_user = $_SESSION['id_user'];

if (!$conn) {
  die("Error connecting to database: " . mysqli_connect_error($conn));
  exit();
}

// if user clicks like or dislike button
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
  mysqli_query($conn, $sql);
  echo getRating($id_idea);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM reaction
  		  WHERE id_idea = $id AND reaction='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM reaction
  		  WHERE id_idea = $id AND reaction='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM reaction WHERE id_idea = $id AND reaction='like'";
  $dislikes_query = "SELECT COUNT(*) FROM reaction
		  			WHERE id_idea = $id AND reaction='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
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
  echo "like";
  global $conn;
  global $id_user;
  $sql = "SELECT * FROM reaction WHERE id_user=$id_user
  		  AND id_idea=$id_idea AND reaction='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($id_idea)
{
  global $conn;
  global $id_user;
  $sql = "SELECT * FROM reaction WHERE id_user=$id_user
  		  AND id_idea=$id_idea AND reaction='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

$sql = "SELECT * FROM idea";
$result = mysqli_query($conn, $sql);
// fetch all idea from database
// return them as an associative array called $idea
$idea = mysqli_fetch_all($result, MYSQLI_ASSOC);
