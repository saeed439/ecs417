

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

<table>
  <tr>
   <th>Title</th>
   <th>Comment</th>
   <th>Date and Time</th>
   <th>Delete</th>
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
  $sql = "SELECT title, comment, date from COMMENTary order by id desc";
  $result = $conn ->query($sql);
  if ($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
       echo "<tr><td>". $row["title"] ."</td><td>". $row["comment"] ."</td><td>". $row["date"] ."</td></tr>";
}

echo "</table>";



}

else { echo "no results";}

$conn->close();
?>
<a href="index.html"> <button>Home</button></a>
</table>
</body>
</html>

