<?php
include 'dbconnect.php';
if(isset($_POST["exportidea"]))
{
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=dataidea.csv');
$output = fopen("php://output", "w");
fputcsv($output, array('id_idea',	'title','content','created_date','last_modified_date','username','id_category','view'));
$query = "SELECT * from idea ORDER BY id_idea DESC";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result))
{
     fputcsv($output, $row);
}
fclose($output);
}


if(isset($_POST["exportuser"]))
{
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=datauser.csv');
$output = fopen("php://output", "w");
fputcsv($output, array('id_user',	'username','email','password','id_role','id_department'));
$query = "SELECT * from user ORDER BY id_user DESC";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result))
{
     fputcsv($output, $row);
}
fclose($output);
}


?>
