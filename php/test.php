
<?php
include('CRUD.php');
$obj = new categoryCRUD();
//read data
$list = $obj->ReadCategory();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <select name="listbox">
      <?php foreach($list as $item) { ?>
      <option value="<?php echo $item['tag'] ?>"><?php echo $item['tag'] ?></option>
      <?php } ?>
    </select>
<?php mysqli_close($connect); ?>
  </body>
</html>
