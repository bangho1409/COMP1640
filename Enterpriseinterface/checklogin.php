<?php
include('dbconnect.php');

//register function
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password  = $_POST['password'];
  $email = $_POST['email'];
  $querycheck = "SELECT * FROM user WHERE username='$username'";
  $resultcheck = mysqli_query($connect, $querycheck);
  $check = mysqli_num_rows($resultcheck);
  if ($check == 0) {
    $query = "INSERT INTO user ( username, email, password) VALUES ( '{$username}', '{$email}', '{$password}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: login.php?msg=1");
    } 
  } else {
    header("Location: login.php?fail");
  }
}


//login function
 if (isset($_POST['login'])) {
   $email = $_POST['username'];
   $upass  = $_POST['password'];
   $query = "SELECT * FROM user WHERE username='$email'";
   $result = mysqli_query($connect, $query);
   $num_rows = mysqli_num_rows($result);
   if ($num_rows == 0) {
     header("Location: login.php?fail=1");
   } else {

     $row = mysqli_fetch_array($result);
    if ($upass != $row['password']) {
       header("Location: login.php?fail=1");

     } else {
       header("Location: index.php?msg=1");
       $_SESSION['username'] = $email;
       $_SESSION['id_user'] = $row['id_user'];
       $_SESSION['id_role'] = $row['id_role'];
     }
   }
 }
