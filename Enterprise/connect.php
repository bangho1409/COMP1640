<?php

$connect = mysqli_connect ('localhost', 'root', '', 'webenterprise_1') or die ('Cannot connect to database');
mysqli_set_charset($connect, 'UTF8');

if($connect === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
else {

}
session_start();
?>
