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

$sql =  "INSERT INTO COMMENTary (title, comment)
          VALUES ('$title' , '$comment')";


$sql2= mysqli_query($conn, $sql);

 if ($sql2){

  header('Location:logout.php');
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
<link rel="stylesheet" href="addPostcss.css" type="text/css" />
<script>
let btnClear = ducument.querySelector('buttton');
let inputs = document.querySelectorAll('input');

btnClear.addEventListener('click', () => {
     inputs.forEach(input => input.value = '');});

function preventDefault(){
 
if (document.getElementById('title').value == "" && document.getElementById('comment').value == ""){
   
   alert("please fill in the title and the comment");
   document.getElementById('title').style.borderColor = "red";
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
<a href="#modal" class="btn-modal">Preview</a>
 <div class="content-modal" id="modal">
  <div class="modal">
    <a href="#" class="close">X</a>
     <p> <img src="blogcap.png" width="900" height="400" </p>
   </div>
  </div>

<form onsubmit="return preventDefault()" action="#" form method="POST">
 <legend>Please add your comment</legend>

<section id="section1">
 <p>
<label for="title">Title</label>
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