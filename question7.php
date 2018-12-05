<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="matrix.css">
<meta charset="utf-8">
</head>
<body>
<?php
include 'connecttodb.php';
$quantity = $_GET["quantity"];
echo "<h1> Here are the customers who bought more than " . $quantity . " products:</h1>"
?>

<ol>
<?php
   $quant = $_GET["quantity"];
   $query = "SELECT purchase.productid, purchase.customerid, purchase.quantity, product.description, customer.firstname, customer.lastname FROM purchase, product, customer WHERE purchase.quantity > {$quant} AND product.productid = purchase.productid AND customer.customerid = purchase.customerid";
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["firstname"] . " " . $row["lastname"] . " - " . $row["description"] . " - " . $row["quantity"];
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

