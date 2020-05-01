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



  if(isset($_GET['sort'])){

  $order = $_GET['order'];

}
  else{
   $order = 'asset_num';
}
   
  if(isset($_GET['sort'])){
     $sort = $_GET['order'];

}
   else {

    $sort= 'DESC';
}

$resultSet = $mysqli_query("SELECT * FROM COMMENTary ORDER BY $order $sort");

if ($resultSet->num_rows >0){

  echo"

  <table border='1'>

     <th>Title</th>

     <th>Comment</th>
     
     <th>Date and Time</th>
";
    while($rows = $resultSet->fetch_assoc()){


    $title=$rows['title'];
    $comment= $rows['comment'];
    $date= $rows['date'];

   echo"

   <tr>

     <td>$title</td>
     <td>$comment</td>
     <td>$date</td>

    </tr>";
}
   echo"</table>";
}


else { echo "no records returned.";}


?>

