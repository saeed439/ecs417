<!doctype html>
<html>

<head>
<link rel="stylesheet" href="reset2.css" type="text/css" />
<link rel="stylesheet" href="addPostcss.css" type="text/css" />

</head>

<body>

<table> 
 <tr>
   <th>ID</th>
   <th>title</th>
   <th>comment</th>
   <th>date</th>
   <th>time</th>
 </tr>
<?php

 $dbhost= getenv("MYSQL_SERRVICE_HOST");
 $dbport= getenv("MYSQL_SERRVICE_PORT");
 $dbuser= getenv("DATABASE_USER");
 $password=getenv("DATABASE_PASSWORD");
 $dbname= getenv("DATABASE_NAME");
 $conn = new mysqli($dbhost, $dbuser, $password, $dbname);
if ($conn->connect_error){
      die("connection failed: " . $conn->connect_error);}

  $sql="SELECT ID, title, comment, date, time from COMMENTSECTION";
  $result = $conn-> query($sql);

  if ($result -> num_rows >0){
   while ($row = $result-> fetch_assoc()) {
    echo "<tr><td>". $row["ID"] ."</td><td>". $row["title"] ."</td><td>". $row[
   "comment"] ."</td><td>". $row["date"] ."</td><td>". $row["time"] ."</td></tr>";
                             }
echo "</table>";
}
else{
   echo "no comments";}

$conn -> close();
?>






</table>




</body>
</html>