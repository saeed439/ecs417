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



 if(isset($_POST['submit']))

{

   $title=$_POST['username'];
   $comment=$_POST['password'];

$sql =  "INSERT INTO USER (username, password)
          VALUES ('$title' , '$comment')";


$sql2= mysqli_query($conn, $sql);

 if ($sql2){

  header('Location:index.html');
}
 
else {

  echo "fail";
}



  
}

  



 $conn->close();



?>
<!doctype html>
<html>

<head>
<link rel="stylesheet" href="reset2.css" type="text/css" />
<link rel="stylesheet" href="logincss.css" type="text/css" />
</head>

<body>


<form action="#" method="POST">
 <legend>Create Your User and Pass</legend>

 <section id="section1">
 <label for="username">username</label>
 <div>
 <input type="text" name="username" id="pass" required>
<div>
 <label for="password">password</label>
<div>
 <input type="text" name="password" id="pass" required>
<div>
</section>
<section id="buttons">

<input type="submit" value="signup" id="button" name="submit">
</section>
</form>

</body>

</html>