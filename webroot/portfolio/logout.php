<?php
SESSION_START();

$_SESSION = array();

session_destroy();



?>






<html>

<head>
<link rel="stylesheet" href="reset2.css" type="text/css" />
<link rel="stylesheet" href="addentrycss.css" type="text/css" />
</head>

<body>


<form>

 <legend>Thank you for adding your comment</legend>

<section>
<?php 
   echo "CURRENT DATE ".date("m-d-y");
   ?>
<br>

<?php 
echo "CURRENT TIME ".date("h:i:s");
?>
</section>
<section id="buttons">
<a href="blog.php" ><button id="button">BLOG</button></a>

<a href="exercise2week5.html"><button id="button">HOME</button></a>
</section>
</form>

</body>

</html>