<?php
// here ins_zip is your index file button name
if(isset($_POST['ins_zip']))
{
   // here files is a database
   $conn = mysqli_connect('localhost','root','','webenterprise2');
   if(!$conn)
   {
      die('Connection not Establish');
   }
   // here $_FILES is a method for storing file
   if(!empty($_FILES['zip']['tmp_name']))
   {
      $file = $_FILES['zip'];
      $file_path = $_FILES['zip']['tmp_name'];
      $query = "insert into file (file_path,file) values ('$file_path',$file)";
      $ins_query = mysqli_query($conn,$query);
      if($ins_query)
      {
         echo 'Successfully uploaded Zip file';
      }
      else
      {
         echo 'Problem in uploading Zip file';
      }
   }
}
?>

<!Doctype html>
<html>
<head>
   <title>How to insert zip file in database using php</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
   <div class="row">
      <div class="col-sm-12">
         <h3 align="center">Upload Zip file in databse using php</h3>
      </div>
      <div class="col-sm-6">
         <form method="post" enctype="multipart/form-data" action="">
            <input type="file" class="form-control" name="zip"/>
            <p><button class="btn btn-success" name="ins_zip">Insert Zip File</button></p>
         </form>
      </div>
   </div>
</body>
</html>
