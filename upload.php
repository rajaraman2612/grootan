<?php
$file =$_FILES["file"];



move_uploaded_file($file["tmp_name"],"uploads/" . $file["name"]);



?>




<html>
<h1>YOUR CSV FILE HAS UPLOADED SUCESSFULLY</h1>
<a href="reader.php">NEXT</a>
  </html>
