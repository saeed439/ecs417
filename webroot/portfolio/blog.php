

<!DOCTYPE html>
<html>
<head>
<title>Blog</title>
</head>
<body>

<table>
  <tr>
   <th>Title</th>
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
</table>
</body>
</html>

