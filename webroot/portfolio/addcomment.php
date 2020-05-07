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

   $title=$_POST['title'];
   $comment=$_POST['comment'];

$sql =  "INSERT INTO COMMENTs (title, comment)
          VALUES ('$title' , '$comment')";


$sql2= mysqli_query($conn, $sql);

 if ($sql2){

  header('Location:logout2.php');
}
 
else {

  echo "fail";
}



  
}
 if(isset($_POST['preview']))

{

   $title=$_POST['title'];
   $comment=$_POST['comment'];

$sql =  "INSERT INTO PREVIEW (title, comment)
          VALUES ('$title' , '$comment')";


$sql2= mysqli_query($conn, $sql);

}

  



 $conn->close();



?>

<!doctype html>
<html>

<head>
<link rel="stylesheet" href="reset2.css" type="text/css" />
<link rel="stylesheet" href="addPostcss.css" type="text/css" />
<script>
let btnClear = ducument.querySelector('button');
let inputs = document.querySelectorAll('input');
btnClear.addEventListener('click', () => {
     inputs.forEach(input => input.value = '');});


function preventDefault(){
if (document.getElementById('title').value == "" &&document.getElementById('comment').value == ""){
   
   alert("please fill in the title and comment");
   document.getElementById('title').style.borderColor = "red";
   document.getElementById('comment').style.borderColor = "red";
   return false;
   } 

else if (document.getElementById('title').value == "" ){
   
   alert("please fill in the title");
   document.getElementById('title').style.borderColor = "red";
   return false;
   }
else if (document.getElementById('comment').value == ""){
   alert("please fill in the comment");
   document.getElementById('comment').style.borderColor = "red";
   return false;


  }


}

</script>
</head>

<body>




<form onsubmit="return preventDefault()" action="#" form method="POST">
 <legend>Please add your comment</legend>

<section id="section1">
 <p>
<label for="title">Your name</label>
<br>
<input type="text" name="title" id="title">
<br>

<label for="comment">Your comment</label>
<br>
<textarea rows="5" id="comment" name="comment"></textarea>
<br>
</p>
</section>

<section id="buttons">
<input type="submit" value="Post" id="button" name="submit">


<button id="button">clear</button>
</section>
</form>

</body>

</html>