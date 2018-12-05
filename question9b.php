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
<ol>
<?php
   $pid = $_GET["pid"];
   $query = "SELECT (SELECT SUM(quantity) FROM purchase WHERE productid = {$pid}) * cost AS revenue, (SELECT SUM(quantity) FROM purchase WHERE productid = {$pid}) AS totalsold, description FROM product WHERE productid = {$pid}";
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["description"] . " - Total Sold: " . $row["totalsold"] . " - Revenue: " . $row["revenue"];
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
