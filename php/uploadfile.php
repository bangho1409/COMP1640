<?php
// Include the database configuration file
include 'dbconnect.php';

if(isset($_POST['upload']))
{

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
 $folder="../uploads";
 $new_file_name = strtolower($file);
 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO file (file_path,last_modified_date) VALUES('$final_file',NOW())";
  mysqli_query($connect,$sql);
  echo "File sucessfully upload";
 }
 else
 {
  echo "Error.Please try again";
		}
	}

if(isset($_POST['download']))
{
  $url =
    'http://localhost/phpmyadmin/index.php?route=/table/get-field&db=webenterprise2&table=file&where_clause_sign=6884dd34f9ad71350ef482ba9ddc4bd733d942724f0d05c500b40fed476a6841&where_clause=%60file%60.%60id_file%60+%3D+5&transform_key=file_path&sql_query=SELECT+%2A+FROM+%60file%60';

    // Initialize the cURL session
    $ch = curl_init($url);

    // Initialize directory name where
    // file will be save
    $dir = './';

    // Use basename() function to return
    // the base name of file
    $file_name = basename($url);

    // Save file into file location
    $save_file_loc = $dir . $file_name;

    // Open file
    $fp = fopen($save_file_loc, 'wb');

    // It set an option for a cURL transfer
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // Perform a cURL session
    curl_exec($ch);

    // Closes a cURL session and frees all resources
    curl_close($ch);

    // Close file
    fclose($fp);
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
  <form method="post" enctype="multipart/form-data">
  <input type="file" name="file" />
  <button type="submit" name="upload">upload</button>
  <button type="download" name="">download</button>
</form>
   </div>
</body>
</html>
