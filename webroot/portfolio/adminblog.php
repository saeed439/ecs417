
<!DOCTYPE html>
<html>
<head>
<title>Blog</title>

 <style>

table{
border-collapse: collapse;
width:100%;
color:#d96444;
font-family: monospace;
font-size: 25px;
text-align: left;
}

th{
background-color:#d96444;
color:white;
}
tr:nth-child(even) {
background-color: #f2f2f2
}


</style>

</head>
<body>
<a href="logout2.php"> <button>Back to Comments</button></a>
<table>
  <tr>
   <th>ID</th>
   <th>Name</th>
   <th>Comment</th>
   <th>Date and Time</th>
   
  </tr>
<?php
 $dbhost= getenv("MYSQL_SERVICE_HOST");
 $dbport= getenv("MYSQL_SERVICE_PORT");
 $dbuser= getenv("DATABASE_USER");
 $password= getenv("DATABASE_PASSWORD");
 $dbname= getenv("DATABASE_NAME");

 
 $conn = new mysqli($dbhost, $dbuser, $password, $dbname);
 if ($conn->connect_error){
      die("connection failed: " . $conn->connect_error);

                           }
  
  $sql = "SELECT ID, title, comment, date from COMMENTs order by id desc";
  $result = $conn ->query($sql);
  if ($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
       echo "<tr><td>". $row["ID"] ."</td><td>". $row["title"] ."</td><td>". $row["comment"] ."</td><td>". $row["date"] ."</td></tr>";
}

echo "</table>";



}

else { echo "no results";}

if(isset($_POST['delete'])){


$id = $_POST['field'];
  $query = "DELETE FROM COMMENTs WHERE ID = $id";
  $result2 = mysqli_query($conn, $query);
   if ($result2){
   header('Location:adminblog.php');
   echo 'data deleted';
   
}
   else{ echo 'data not deleted';}

}
$conn->close();
?>
<form action="#" method="POST"> 

<label for="username">Type in id number</label>
 <div>
 <input type="text" name="field">
<input type="submit" name="delete" value="Rmove comment">
</form>

</table>
</body>
</html>

