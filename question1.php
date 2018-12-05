<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="matrix.css">
<meta charset="utf-8">
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1> Here is what they purchased: </h1>
<ol>
<?php
   $cid = $_GET["customer"];
   
   $query = 'SELECT product.description, customer.firstname, customer.lastname FROM purchase JOIN customer ON customer.customerid = purchase.customerid JOIN product ON product.productid = purchase.productid WHERE customer.customerid = "' . $cid . '"';
   
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
</ol>

<?php
   mysqli_close($connection);
?>


</body>

<br>
<form action="main.php">
<input type="submit" value="Back">
</form>

</html>
