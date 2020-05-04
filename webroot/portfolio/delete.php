<?php

 SESSION_START();
 $dbhost= getenv("MYSQL_SERVICE_HOST");
 $dbport= getenv("MYSQL_SERVICE_PORT");
 $dbuser= getenv("DATABASE_USER");
 $password= getenv("DATABASE_PASSWORD");
 $dbname= getenv("DATABASE_NAME");

 
 $conn = new mysqli($dbhost, $dbuser, $password, $dbname);
 if ($conn->connect_error){
      die("connection failed: " . $conn->connect_error);

}
 
$sql = "DELETE FROM COMMENTary WHERE ID='$_GET[id]'";

  if(mysqli_query($conn,$sql)){
header('Location:blog.php');
exit();
}
  else {echo "not deleted";

   exit();
}


$conn->close();







?>