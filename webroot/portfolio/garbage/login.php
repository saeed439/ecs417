<?php

 $dbhost= getenv("");
 $dbport= getenv("");
 $dbuser= getenv("user");
 $password= getenv("password");
 $db= getenv("ecs417");

 //create connection
 $conn = new mysqli($dbhost, $dbuser, $dbuser, $dbname);
 //if ($conn->connect_error){
      die("connection failed: " . $conn->connect_error);

}



 if(isset($_POST['username'])){

  $user=$_POST['username'];
  $password=$_POST['password'];
  $sql="select * from ecs417 where User='".$user."'AND Pass='".$password."'
  limit 1";
  $result=mysql_query($sql);

  if(mysql_num_rows($result)==1){ 
   echo " you logged in ";
   exit();
}
  else{ 
   echo " you havent logged in";
   exit();
}

$conn->close();

}



?>
 





<!doctype html>
<html>

<head>
<link rel="stylesheet" href="reset2.css" type="text/css" />
<link rel="stylesheet" href="addentrycss.css" type="text/css" />
</head>

<body>


<form method="POST" action="#">
 <legend>Log in form</legend>

 <section id="section1">
 <label for="username">username</label>
 <div>
 <input type="text" name="username" id="pass" required>
<div>
 <label for="password">password</label>
<div>
 <input type="password" name="password" id="pass" required>
<div>
</section>
<section id="buttons">

<input type="submit" value="login" id="button">
</section>
</form>

</body>

</html>