<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="matrix.css">
<meta charset="utf-8">
<h1> Product List </h1>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<ol>
<?php
   $order = $_GET["order"];
   $direction = $_GET["direction"];
   $query = "SELECT * FROM product ORDER BY {$order} {$direction}";

   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
 	echo '<li>';       
        echo $row["description"];
     }
     mysqli_free_result($result);
?>
<?php
   mysqli_close($connection);
?>
</ol>
</body>

<br>
<form action="main.php">
<input type="submit" value="Back">
</form>
</html>
