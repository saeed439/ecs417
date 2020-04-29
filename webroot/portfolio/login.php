<?php

 $host="localhost";
 $user="root";
 $password="";
 $db="login";

 mysql_connect($host,$user,$password);
 mysql_select_db($db);

 if(isset(['username'])){

  $user=$_POST['username'];
  $password=$_POST['password'];
  $sql="select * from loginform where User='".$user."'AND Pass='".$password."'
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