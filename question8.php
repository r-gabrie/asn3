
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
<h1> Here are the products that have not yet been purchased: </h1>
<ol>
<?php
   $quant = $_GET["quantity"];
   $query = "SELECT DISTINCT product.description FROM purchase, product WHERE product.productid NOT IN (SELECT productid FROM purchase)";
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

