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



<form onsubmit="return preventDefault()" action="#" form method="POST" name='myform'>\

<input type="submit" value="Post" id="button" name="submit">
   </p>
   </div>
  </div>

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
<input type="button" href="#modal" class="btn-modal" id="button" value="Preview" onclick="AddRow()">
<input type="submit" value="Preview" id="button" name="preview" onclick='check(); return false'>
<button id="button">clear</button>

<div class="content-modal" id="modal">
  <div class="modal">
    <a href="#" class="close">X</a>
     <p>  <table id="show">
  <tr>
   <th>Title</th>
   <th>Comment</th>
   <th>Date and Time</th>
  </tr>



<script>
var list1=[];
var list2=[];
var n = 1;
var x = 0;
function AddRow(){

var AddRown = document.getElementById('show');
var NewRow = AddRown.insertRow(n);

list1[x]=document.getElementById("title").value;
list2[x]=document.getElementById("comment").value;

var cel1= NewRow.insertCell(0);
var cel2= NewRow.insertCell(1);
cel1.innerHTML=list1[x];
cel2.innerHTML=list2[x];
n++;
x++;
}

</script> 

<tr><td> <p id='f1'></p>  </td><td> <p id='f2'></p>  </td>


<td><?php echo date("Y/m/d"); echo "  " . date("h:i:sa"); ?> </td></tr>
</table>
</section>
</form>

</body>

</html>